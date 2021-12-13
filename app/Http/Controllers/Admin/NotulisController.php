<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class NotulisController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function index(){
        $notulis = User::where('level_user','notulis')->get();
        return view('administrator.notulis.index',compact('notulis'));
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'email' => ':attribute harus berisi email yang valid.',
            'numeric' => ':attribute harus angka',
        ];
        $attributes = [
            'nm_user'   =>  'Nama Notulis',
            'email'    =>  'Email',
            'password'    =>  'Password',
            'password_ulangi'    =>  'Password Konfirmasi',
        ];
        $this->validate($request,[
            'nm_user'  =>  'required',
            'email'  =>  'required|email',
            'password'  =>  'required|min:6',
            'password_ulangi'  =>  'required|min:6',
        ],$messages,$attributes);
        User::create([
            'nm_user'   =>  $request->nm_user,
            'email'   =>  $request->email,
            'password'   =>  bcrypt($request->password),
            'level_user'    =>  'notulis',
        ]);
        $notification = array(
            'message' => 'Berhasil, notulis baru berhasil ditambahkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }

    public function edit($id){
        $notulis = User::find($id);
        return $notulis;
    }

    public function update(Request $request){
        User::where('id',$request->id)->update([
            'nm_user'   =>  $request->nm_user,
            'email'   =>  $request->email,
        ]);
        $notification = array(
            'message' => 'Berhasil, Password notulis berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }

    public function delete(Request $request){
        User::destroy($request->id);
        $notification = array(
            'message' => 'Berhasil, data notulis berhasil dihapus!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }

    public function updatePassword(Request $request){
        User::where('id',$request->id)->update([
            'password'  =>  bcrypt($request->password),
        ]);
        $notification = array(
            'message' => 'Berhasil, Password notulis berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }

    public function nonaktifkanStatus($id){
        User::where('id',$id)->update([
            'status'    =>  'nonaktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, status notulis berhasil dinonaktifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }

    public function aktifkanStatus($id){
        User::where('id',$id)->update([
            'status'    =>  'aktif'
        ]);

        $notification = array(
            'message' => 'Berhasil, status notulis berhasil diakatifkan!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.notulis')->with($notification);
    }
}
