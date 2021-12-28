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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Silahkan Tambahkan Dokumentasi Pada Notulen Tanggal {{ $notulen->tanggal }}
                            </div>
                    @endif
                </div>
            </div>
            <form action="{{ route('notulis.notulen.dokumentasiPost') }}" enctype="multipart/form-data" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="row">
                    <div class="form-group col-md-12">
                        <input type="hidden" name="notulen_id" value="{{ $notulen->id }}">
                        <label for="exampleInputEmail1">Masukan Hari</label>
                        <input type="file" name="dokumentasi" class="tags form-control @error('dokumentasi') is-invalid @enderror" />
                        @if ($errors->has('dokumentasi'))
                            <small class="form-text text-danger">{{ $errors->first('dokumentasi') }}</small>
                        @endif
                    </div>

                    <div class="col-md-12" style="text-align: center">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Tambah Dokumentasi</button>
                    </div>
                </div>
                <hr>
                
            </form>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <th>Foto</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($dokumentasis as $dokumentasi)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>
                                        <img style="height: 100px;" src="{{ asset('dokumentasi/'.$dokumentasi->dokumentasi) }}" alt="">
                                    </td>
                                    <td>
                                        <form action="{{ route('notulis.notulen.dokumentasiDelete',[$dokumentasi->id,$notulen->id]) }}" method="POST">
                                            {{ csrf_field() }} {{ method_field("DELETE") }}
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
