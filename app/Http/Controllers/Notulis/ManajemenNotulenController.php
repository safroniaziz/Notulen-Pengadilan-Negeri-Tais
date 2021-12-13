<?php

namespace App\Http\Controllers\Notulis;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
