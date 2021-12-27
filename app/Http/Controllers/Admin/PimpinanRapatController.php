<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pimpinan;
use Illuminate\Http\Request;

class PimpinanRapatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function index(){
        $pimpinans = Pimpinan::all();
        return view('administrator/pimpinan.index',compact('pimpinans'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'nm_pimpinan'   =>  'Nama Pimpinan',
            'nip'    =>  'NIP',
        ];
        $this->validate($request,[
            'nm_pimpinan'  =>  'required',
            'nip'  =>  'required',
        ],$messages,$attributes);
        Pimpinan::create([
            'nm_pimpinan'   =>  $request->nm_pimpinan,
            'nip'   =>  $request->nip,
        ]);
        $notification = array(
            'message' => 'Berhasil, pimpinan rapat baru berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pimpinan')->with($notification);
    }

    public function delete(Request $request){
        Pimpinan::destroy($request->id);
        $notification = array(
            'message' => 'Berhasil, data pimpinan berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pimpinan')->with($notification);
    }

    public function aktifkan($id){
        Pimpinan::where('id','!=',$id)->update([
            'status'    =>  'nonaktif'
        ]);
        Pimpinan::where('id',$id)->update([
            'status'    =>  'aktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, data pimpinan berhasil diaktifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pimpinan')->with($notification);
    }

    public function nonaktifkan($id){
        Pimpinan::where('id',$id)->update([
            'status'    =>  'nonaktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, data pimpinan berhasil dinonaktifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.pimpinan')->with($notification);
    }
}
