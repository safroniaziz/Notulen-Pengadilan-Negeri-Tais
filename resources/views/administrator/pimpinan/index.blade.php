@extends('layouts.app')
@section('title', 'Manajemen Data Pimpinan')
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
                                <strong><i class="fa fa-info-circle"></i>&nbsp;Perhatian: </strong> Berikut adalah data pimpinan , silahkan tambahkan pimpinan baru jika dibutuhkan !!
                            </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <a onclick="tambahAdmin()" class="btn btn-primary btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-user-plus"></i>&nbsp; Tambah Pimpinan Rapat</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="table" style="width:100%;">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center">Nama Pimpinan</th>
                                <th style="text-align:center">NIP</th>
                                <th style="text-align:center">Status</th>
                                <th style="text-align:center">Ubah Status</th>
                                <th style="text-align:center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($pimpinans as $pimpinan)
                                <tr>
                                    <td style="text-align:center;;"> {{ $no++ }} </td>
                                    <td style="text-align:center;"> {{ $pimpinan->nm_pimpinan }} </td>
                                    <td style="text-align:center;"> {{ $pimpinan->nip }} </td>
                                    <td style="text-align:center;">
                                        @if ($pimpinan->status == "aktif")
                                            <label class="badge badge-success"><i class="fa fa-check-circle"></i>&nbsp; Aktif</label>
                                            @else
                                            <label class="badge badge-danger"><i class="fa fa-minus-circle"></i>&nbsp; Tidak Aktif</label>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        @if ($pimpinan->status == "aktif")
                                            <form action="{{ route('admin.pimpinan.nonaktifkan',[$pimpinan->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></button>
                                            </form>
                                            @else
                                            <form action="{{ route('admin.pimpinan.aktifkan',[$pimpinan->id]) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                                <button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-thumbs-up"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a onclick="hapusData( {{ $pimpinan->id }} )" class="btn btn-danger btn-sm" style="color:white; cursor:pointer;"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Modal Hapus-->
                <div class="modal fade modal-danger" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action=" {{ route('admin.pimpinan.delete') }} " method="POST">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <div class="modal-header">
                                <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-key"></i>&nbsp;Form Konfirmasi Hapus Data</p>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="id" id="id_hapus">
                                        Apakah anda yakin ingin menghapus data? klik hapus jika iya !!
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline pull-left" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                                <button type="submit" style="border: 1px solid #fff;background: transparent;color: #fff;" class="btn btn-sm btn-outline"><i class="fa fa-check-circle"></i>&nbsp; Ya, Hapus</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ubah -->
            <div class="modal fade" id="modaltambah" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action=" {{ route('admin.pimpinan.post') }} " method="POST">
                        {{ csrf_field() }} {{ method_field('POST') }}
                        <div class="modal-header">
                            <p style="font-size:15px; font-weight:bold;" class="modal-title"><i class="fa fa-key"></i>&nbsp;Form Tambah Data Pimpinan Rapat</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id" id="id_ubah">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap :</label>
                                        <input type="text" name="nm_pimpinan" value="{{ old('nm_pimpinan') }}" class="form-control @error('nm_pimpinan') is-invalid @enderror" placeholder="nama lengkap">
                                        <small class="form-text text-danger">{{ $errors->first('nm_pimpinan') }}</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">NIP :</label>
                                        <input type="text" name="nip" value="{{ old('nip') }}" class="form-control @error('nip') is-invalid @enderror" placeholder="nip ">
                                        <small class="form-text text-danger">{{ $errors->first('nip') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Batalkan</button>
                            <button type="submit" class="btn btn-primary btn-sm" id="btn-submit-tambah"><i class="fa fa-check-circle"></i>&nbsp; Simpan Data</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                responsive : true,
            });
        } );

        function tambahAdmin(){
            $('#modaltambah').modal('show');
        }

        @if($errors->any())
            $('#modaltambah').modal('show');
        @endif

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

        $(document).ready(function(){
            $("#password_tambah, #password_tambah_ulangi").keyup(function(){
                var password = $("#password_tambah").val();
                var ulangi = $("#password_tambah_ulangi").val();
                if($("#password_tambah").val() == $("#password_tambah_ulangi").val()){
                    $('#konfirmasi-tambah').show(100);
                    $('#konfirmasi-gagal-tambah').hide(100);
                    $('#btn-submit-tambah').attr("disabled",false);
                }
                else{
                    $('#konfirmasi-tambah').hide(100);
                    $('#konfirmasi-gagal-tambah').show(100);
                    $('#btn-submit-tambah').attr("disabled",true);
                }
            });
        });

        function ubahData(id){
            $.ajax({
                url: "{{ url('administrator/manajemen_pimpinan') }}"+'/'+ id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data){
                    $('#modalubah').modal('show');
                    $('#id_ubah').val(id);
                    $('#nm_user_edit').val(data.nm_user);
                    $('#email_edit').val(data.email);
                    $('#unit_id_edit').val(data.unit_id);
                },
                error:function(){
                    alert("Nothing Data");
                }
            });
        }

        function hapusData(id){
            $('#modalhapus').modal('show');
            $('#id_hapus').val(id);
        }

        $(document).ready(function() {
            $('#unit_id').select2({width:'100%'});
        });
    </script>
@endpush
