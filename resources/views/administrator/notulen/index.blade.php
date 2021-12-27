@extends('layouts.app')
@section('title', 'Manajemen Data Notulen')
@section('login_as', 'Administrator')
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
    @include('administrator/sidebar')
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Filter Per Notulis</label>
                        <select name="notilis" id="notulis" class="form-control">
                            <option disabled selected>-- pilih notulis --</option>
                            @foreach ($notulis as $notulis)
                                <option value="{{ $notulis->nm_user }}">{{ $notulis->nm_user }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center">Hari</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Waktu</th>
                                <th style="text-align:center">Tempat</th>
                                <th style="text-align:center">Peserta</th>
                                <th style="text-align:center">Notulis</th>
                                <th style="text-align:center">Materi Rapat</th>
                                <th style="text-align:center">Risalah Rapat</th>
                                <th style="text-align:center">Cetak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($notulens as $notulens)
                                <tr>
                                    <td style="text-align:center;;"> {{ $no++ }} </td>
                                    <td style="text-align:center;"> {{ $notulens->hari }} </td>
                                    <td style="text-align:center;"> {{ $notulens->tanggal->toDateString() }} </td>
                                    <td style="text-align:center;"> {{ $notulens->tanggal->format('H:i:s'); }} </td>
                                    <td style="text-align:center;"> {{ $notulens->tempat }} </td>
                                    <td style="text-align:center;"> {{ $notulens->peserta }} </td>
                                    <td style="text-align:center;"> {{ $notulens->nm_user }} </td>
                                    <td style="text-align:center;"> {{ $notulens->materi_rapat }} </td>
                                    <td style="text-align:center;"> {!! $notulens->risalah_rapat !!} </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route('admin.cetak',[$notulens->id]) }}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-file-pdf-o"></i>&nbsp; Cetak</a>
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
    <script>
        var table = $('#table').DataTable();
        $('#notulis').change(function() {
            table.columns(6)
            .search(this.value)
            .draw();
        });
    </script>
@endpush
