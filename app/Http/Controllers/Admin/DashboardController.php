<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function dashboard(){
        $notulen = count(Notulen::all());
        $notulis = count(User::where('level_user','notulis')->get());
        $admin = count(User::where('level_user','admin')->get());
        $total = count(User::where('level_user','!=','ketua')->get());
        return view('administrator/dashboard',compact('notulen','notulis','admin','total'));
    }
}
