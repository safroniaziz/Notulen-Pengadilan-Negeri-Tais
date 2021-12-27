<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notulen;
use App\Models\Pimpinan;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class NotulenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAdmin']);
    }

    public function index(){
        $notulis = User::where('level_user','notulis')->get();
        $notulens = Notulen::join('users','users.id','notulens.notulis_id')
                    ->select('notulens.id','hari','tanggal','nm_user','peserta','tempat','materi_rapat','risalah_rapat')
                    ->orderBy('notulens.id','desc')->get();
        return view('administrator.notulen.index',compact('notulens','notulis'));
    }

    public function cetak($id){
        // return $id;
        $ketua = Pimpinan::where('status','aktif')->first();
        $data = Notulen::join('users','users.id','notulens.notulis_id')->where('notulens.id',$id)->first();
        // return $data;
        // return $data;
        $pdf = PDF::loadView('administrator/notulen/cetak',compact('data','ketua'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
