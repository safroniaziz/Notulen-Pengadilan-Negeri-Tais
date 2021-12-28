<?php

namespace App\Http\Controllers\Notulis;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use App\Models\User;
use Illuminate\Http\Request;

class NotulisDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isNotulis']);
    }
    
    public function dashboard(){
        $notulen = count(Notulen::all());
        $notulis = count(User::where('level_user','notulis')->get());
        $admin = count(User::where('level_user','admin')->get());
        $total = count(User::all());
        return view('notulis/dashboard',compact('notulen','notulis','admin','total'));
    }

    public function updatePassword(Request $request){
        // return $request->all();
        User::where('id',$request->id)->update([
            'password'  =>  bcrypt($request->password_baru),
        ]);
        $notification = array(
            'message' => 'Berhasil, Password notulis berhasil diubah!',
            'alert-type' => 'success'
        );
        return redirect()->route('notulis.dashboard')->with($notification);
    }
}
