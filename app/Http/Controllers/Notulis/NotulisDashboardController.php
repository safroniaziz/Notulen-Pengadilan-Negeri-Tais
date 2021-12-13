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
        $total = count(User::where('level_user','!=','ketua')->get());
        return view('notulis/dashboard',compact('notulen','notulis','admin','total'));
    }
}
