@extends('layouts.app')
@section('title', 'Manajemen Data Notulen')
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
    <style>
        #detail:hover{
            text-decoration: underline !important;
            cursor: pointer !important;
            color:teal;
        }
        #selengkapnya{
            color:#5A738E;
            text-decoration:none;
            cursor:pointer;
        }
        #selengkapnya:hover{
            color:#007bff;
        }
    </style>
@endpush
@section('content')
    <section class="panel" style="margin-bottom:20px;">
        <header class="panel-heading" style="color: #ffffff;background-color: #074071;border-color: #fff000;border-image: none;border-style: solid solid none;border-width: 4px 0px 0;border-radius: 0;font-size: 14px;font-weight: 700;padding: 15px;">
            <i class="fa fa-home"></i>&nbsp;Notulen Rapat Pengadilan Negeri Tais
        </header>
        <div class="panel-body" style="border-top: 1px solid #eee; padding:15px; background:white;">
            <div class="row" style="margin-right:-15px; margin-left:-15px;">
                <div class="col-md-12">
                    @if ($message   = Session::get('success'))
                        <div class="alert alert-success alert-block" id="keterangan">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong><i class="fa fa-info-circle"></i>&nbsp;Berhasil: </strong> {{ $message }}
                        </div>
                        @else
                            <div class="alert alert-success alert-block" id="keterangan">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut adalah data notulen yang diinputkan oleh notulis !!
                            </div>
                    @endif
                </div>
    
                <div class="row">
                    <form action="{{ route('notulis.notulen.post') }}" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masukan Hari</label>
                                <input type="text" name="hari" class="tags form-control @error('hari') is-invalid @enderror" />
                                @if ($errors->has('hari'))
                                    <small class="form-text text-danger">{{ $errors->first('hari') }}</small>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pilih Tanggal</label>
                                <input type="date" name="tanggal" class="tags form-control @error('tanggal') is-invalid @enderror" />
                                @if ($errors->has('tanggal'))
                                    <small class="form-text text-danger">{{ $errors->first('tanggal') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Pilih Waktu</label>
                                <input type="time" name="jam" class="tags form-control @error('jam') is-invalid @enderror" />
                                @if ($errors->has('jam'))
                                    <small class="form-text text-danger">{{ $errors->first('jam') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masukan Tempat</label>
                                <input type="text" name="tempat" class="tags form-control @error('tempat') is-invalid @enderror" />
                                @if ($errors->has('tempat'))
                                    <small class="form-text text-danger">{{ $errors->first('tempat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Masukan Peserta</label>
                                <textarea name="peserta" class="form-control" id="" cols="30" rows="5"></textarea>
                                @if ($errors->has('peserta'))
                                    <small class="form-text text-danger">{{ $errors->first('peserta') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Materi Rapat</label>
                                <textarea name="materi_rapat" class="form-control" id="materi_rapat" cols="30" rows="5"></textarea>
                                @if ($errors->has('materi_rapat'))
                                    <small class="form-text text-danger">{{ $errors->first('materi_rapat') }}</small>
                                @endif
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Risalah Rapat</label>
                                <textarea name="risalah_rapat" class="form-control" id="" cols="30" rows="10"></textarea>
                                @if ($errors->has('risalah_rapat'))
                                    <small class="form-text text-danger">{{ $errors->first('risalah_rapat') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <hr style="width: 50%" class="mt-0">
                            <a href="{{ route('notulis.notulen') }}" class="btn btn-warning btn-sm" style="color: white"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                            <button type="reset" name="reset" class="btn btn-danger btn-sm"><i class="fa fa-refresh"></i>&nbsp;Ulangi</button>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i>&nbsp;Simpan Berkas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>

    CKEDITOR.replace( 'risalah_rapat' );

    CKEDITOR.config.allowedContent = true;
    </script>
@endpush
