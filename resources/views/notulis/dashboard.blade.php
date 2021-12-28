@extends('layouts.app')
@section('title', 'Dashboard')
@section('login_as', 'Notulis')
@section('user-login')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('user-login2')
    @if (Auth::check())
    {{ Auth::user()->nm_user }}
    @endif
@endsection
@section('sidebar-menu')
    @include('notulis/sidebar')
@endsection
@push('styles')
    <!-- Styles -->
    <style>
        #chartdiv, #chartdiv2 {
            width: 100%;
            height: 200px;
        }

        #chartdiv3, #chartdiv4 {
            width: 100%;
            height: 300px;
        }
    </style>
@endpush
@section('content')
{{-- {{ Auth::user()->pegNip }} --}}
<section class="panel" style="margin-bottom:20px;">
    <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
        <i class="fa fa-home"></i>&nbsp;Dashboard
        <span class="tools pull-right" style="margin-top:-5px;">
            <a class="fa fa-chevron-down" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
            <a class="fa fa-times" href="javascript:;" style="float: left;margin-left: 3px;padding: 10px;text-decoration: none;"></a>
        </span>
    </header>
    <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
        <div class="row" style="margin-right:-15px; margin-left:-15px;">
            <div class="col-md-12">Selamat datang <strong> {{ Auth::user()->pegNama }} </strong> di halaman dashboard pada<b> Aplikasi Notulensi Rapat Pengadilan Negeri Tais</b></div>
            <div class="col-md-12">
                <a onclick="ubahPassword( {{ Auth::user()->id }} )" class="btn btn-primary btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-key"></i>&nbsp; Ubah Password</a>
            </div>
        </div>
    </div>
    <!-- Modal Ubah Password-->
    <div class="modal fade" id="formubahpassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action=" {{ route('notulis.notulen.update_password') }} " method="POST">
                {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="modal-header">
                    <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-key"></i>&nbsp;Form Ubah Password Notulis</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" id="id_password">
                            <div class="form-group">
                                <label for="">Masukan Password Baru :</label>
                                <input type="password" name="password_baru" id="password_baru" class="form-control" placeholder="password baru">
                            </div>
                            <div class="form-group">
                                <label for="">Ulangi Password Baru :</label>
                                <input type="password" name="password_ulangi" id="password_ulangi" class="form-control" placeholder="ulangi password baru">
                                <small id="konfirmasi" style="display:none;" class="form-text text-success"><i>password sama</i></small>
                                <small id="konfirmasi-gagal" style="display:none;" class="form-text text-danger"><i>password tidak sama</i></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                    <button type="submit" class="btn btn-primary btn-sm" id="btn-submit" disabled><i class="fa fa-check-circle"></i>&nbsp; Simpan Perubahan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
                    <i class="fa fa-bar-chart"></i>&nbsp;Informasi Data Aplikasi
                </header>
                <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
                    <div class="row">
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-aqua" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($notulen != null)
                                        {{ $notulen }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Jumlah Notulen</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-red" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($notulis != null)
                                        {{ $notulis }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Jumlah Notulis</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-list-alt"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-yellow" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                    @if ($admin != null)
                                        {{ $admin }}
                                        @else
                                        -
                                    @endif
                                </h3>
        
                                <p>Jumlah Admin</p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-wpforms"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-xs-3 col-md-3" style="padding-bottom:10px !important;">
                            <!-- small box -->
                            <div class="small-box bg-green" style="margin-bottom:0px;">
                                <div class="inner">
                                <h3>
                                   @if (!empty($total))
                                       {{ $total }}
                                       @else
                                       -
                                   @endif
                                </h3>
        
                                <p>Jumlah User </p>
                                </div>
                                <div class="icon">
                                <i class="fa fa-check-circle"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        function ubahPassword(id){
            $('#formubahpassword').modal('show');
            $("#id_password").val(id);
        }

        $(document).ready(function(){
            $("#password_baru, #password_ulangi").keyup(function(){
                var password = $("#password_baru").val();
                var ulangi = $("#password_ulangi").val();
                if($("#password_baru").val() == $("#password_ulangi").val()){
                    $('#konfirmasi').show(100);
                    $('#konfirmasi-gagal').hide(100);
                    $('#btn-submit').attr("disabled",false);
                }
                else{
                    $('#konfirmasi').hide(100);
                    $('#konfirmasi-gagal').show(100);
                    $('#btn-submit').attr("disabled",true);
                }
            });
        });
    </script>
@endpush