<?php

namespace App\Http\Controllers\Notulis;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Notulen;
use App\Models\Pimpinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Support\Str;

class ManajemenNotulenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isNotulis']);
    }

    public function index(){
        $notulens = Notulen::join('users','users.id','notulens.notulis_id')
        ->select('notulens.id','hari','tanggal','nm_user','peserta','tempat','materi_rapat','risalah_rapat')
                    ->where('notulis_id',Auth::user()->id)->get();
        return view('notulis.notulen.index',compact('notulens'));
    }

    public function add(){
        return view('notulis.notulen.add');
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus berisi email yang valid.',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'hari'   =>  'Nama Hari',
            'tanggal'    =>  'Tanggal',
            'tempat'    =>  'Tempat',
            'peserta'    =>  'Peserta',
            'materi_rapat'    =>  'Materi Rapat',
            'risalah_rapat'    =>  'Risalah Rapat',
        ];
        $this->validate($request,[
            'hari'  =>  'required',
            'tanggal'  =>  'required',
            'jam'  =>  'required',
            'tempat'  =>  'required',
            'peserta'  =>  'required',
            'materi_rapat'  =>  'required',
            'risalah_rapat'  =>  'required',
        ],$messages,$attributes);
        Notulen::create([
            'notulis_id'    =>  Auth::user()->id,
            'hari'   =>  $request->hari,
            'tanggal'   =>  $request->tanggal.' '. $request->jam,
            'tempat'   =>  $request->tempat,
            'peserta'    =>  $request->peserta,
            'materi_rapat'    =>  $request->materi_rapat,
            'risalah_rapat'    =>  $request->risalah_rapat,
        ]);
        $notification = array(
            'message' => 'Berhasil, notulis baru berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('notulis.notulen')->with($notification);
    }

    public function delete($id){
        Notulen::destroy($id);
        return redirect()->route('notulis.notulen');
    }

    public function cetak($id){
        // return $id;
        $dokumentasi = Dokumentasi::where('notulen_id',$id)->get();
        $ketua = Pimpinan::where('status','aktif')->first();
        $data = Notulen::join('users','users.id','notulens.notulis_id')->where('notulens.id',$id)->first();
        // return $data;
        // return $data;
        $pdf = PDF::loadView('notulis/notulen/cetak',compact('data','ketua','dokumentasi'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function dokumentasi($id){
        $notulen = Notulen::where('id',$id)->first();
        $dokumentasis = Dokumentasi::where('notulen_id',$id)->get();
        return view('notulis/notulen.dokumentasi',compact('dokumentasis','notulen'));
    }

    public function dokumentasiPost(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'max'    =>  ':attribute tidak boleh lebih dari :max',
        ];
        $attributes = [
            'dokumentasi'               =>  'Dokumentasi',
        ];
        $this->validate($request, [
            'dokumentasi'               =>  'required|max:1500',
        ],$messages,$attributes);

        $model['dokumentasi'] = null;
        $model = $request->all();
        $model2 = Notulen::where('id',$request->notulen_id)->first();

        if ($request->hasFile('dokumentasi')){
            $model['dokumentasi'] = Str::slug($model2['tanggal'], '-').Str::random(9).'.'.$request->dokumentasi->getClientOriginalExtension();
            $request->dokumentasi->move(public_path('/dokumentasi/'), $model['dokumentasi']);
            $dokumentasi = new Dokumentasi();
            $dokumentasi->notulen_id = $request->notulen_id;
            $dokumentasi->dokumentasi = $model['dokumentasi'];
            $dokumentasi->save();

            $notification = array(
                'message' => 'Berhasil, dokumentasi berhasil ditambahkan!',
                'alert-type' => 'success'
            );
            return redirect()->route('notulis.notulen.dokumentasi',[$request->notulen_id])->with($notification);
        }
    }

    public function dokumentasiDelete($id,$notulen_id){
        // $notulen = Notulen::where('id',$notulen_id)->first();
        // return $notulen;
        $dokumentasi = Dokumentasi::where('id',$id)->first();
        if (!$dokumentasi->dokumentasi == NULL){
            unlink(public_path('/dokumentasi/'.$dokumentasi->dokumentasi));
        }
        Dokumentasi::destroy($id);
        $notification = array(
            'message' => 'Berhasil, dokumentasi berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('notulis.notulen.dokumentasi',[$notulen_id])->with($notification);
    }
}
