<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Notulen</title>
</head>
<style>
    .page_break { page-break-before: always; }

    .img-top {
        opacity: 0.6;
    }
    .top, tr, td {
        border: none !important;
        border-collapse: collapse;
    }

    .top td, th{
        border: 1px solid black;
    }

    td, th {
        /* border: 1px solid black; */
    }

    .page-break {
        page-break-after: always;
    }

    .sit-in-the-corner {
        float: left;
        margin-left: 5px;
        margin-top: -85px;
    }

    .logo-koperasi {
        text-align: center;
    }
</style>
<body>
    <table  cellspacing="0" cellpadding="0" style="width:100%" class="top">
        <tr >
            <td rowspan="4" style="width: 5% !important;" class="logo-koperasi"><img src="{{ asset('assets/images/logo-bw.png') }}" style="width: 75px !important"></td>
            <td style="width:95% !important;font-size:25px;" align="center"><b>PENGADILAN NEGERI TAIS KELAS II</b></td>
        </tr>
        <tr style="width: 100%">
            <td colspan="3" style="text-align: center;">Jl. S. Parman No. 1, Talang Saling, Tais, 38576</td>
        </tr>
        <tr style="width: 100%">
            <td colspan="3" style="text-align: center;">Telp. : (0736) 91047, Fax : (0736) 91313</td>
        </tr>
        <tr style="width: 100%">
            <td colspan="3" style="text-align: center;">Website : www.pn-tais.go.id Email : pn_tais@yahoo.co.id</td>
        </tr>
    </table>
    <hr style="height: 1px; background:black;">
    
    <h3 style="text-align: center">NOTULEN RAPAT</h3>

    <table style="width:100%;" class="top">
        <tr>
            <td style="width: 20% !important">Hari / Tanggal</td>
            <td> : </td>
            <td style="width: 75% !important">
                {{ $data->hari }}, {{ $data->tanggal->toDateString() }}
            </td>
        </tr>

        <tr>
            <td>Waktu</td>
            <td> : </td>
            <td>
                {{ $data->tanggal->format('H:i:s') }}
            </td>
        </tr>

        <tr>
            <td>Tempat</td>
            <td> : </td>
            <td>
                {{ $data->tempat }}
            </td>
        </tr>

        <tr>
            <td>Peserta</td>
            <td> : </td>
            <td>
                <p style="text-align: justify">
                    {{ $data->peserta }}
                </p>
            </td>
        </tr>

        <tr>
            <td>Notulis</td>
            <td> : </td>
            <td>
                <p style="text-align: justify">
                    {{ $data->nm_user }}
                </p>
            </td>
        </tr>
        <tr>
            <td>Materi Rapat</td>
            <td> : </td>
            <td>
                <p style="text-align: justify">
                    {{ $data->materi_rapat }}
                </p>
            </td>
        </tr>
    </table>

    <h3>Risalah Rapat</h3>
    {!! $data->risalah_rapat !!}
    <br>
    <br>
    <br>
    <br>
    <br>
    <table style="width: 100%">
        <tr style="margin-bottom: 100px;">
            <td style="width: 40%; text-align:center;">Mengetahui</td>
            <td></td>
            <td style="width:30%;text-align:center !important;">Bengkulu, {{ \Carbon\Carbon::parse(now())->format('j F Y') }}</td>
        </tr>
        <tr>
            <td style="text-align: center">Ketua Pengadilan Negeri Tais</td>
            <td style="text-align: center"></td>
            <td style="text-align: center">Notulis</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="text-align: center">
                @if (!empty($ketua))
                    {{ $ketua->nm_user }}
                @endif
                <hr style="width: 68%">
                NIP.197711252001121001                     
            </td>
            <td></td>
            <td style="text-align: center">
                @if (!empty($data))
                    {{ $data->nm_user }}
                @endif
            </td>
        </tr>
    </table>

    <div class="page_break"></div>
    <h4 style="text-align: center">Dokumentasi Rapat</h4>
    <table style="width: 100%;border-collapse: collapse; border:1px black solid;">
        <thead>
            <tr style="border:1px black solid;">
                <th>No</th>
                <th>Dokumentasi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($dokumentasi as $dokumentasi)
                <tr style="border:1px black solid !important; border-collapse:collapse">
                    <td style="border:1px black solid !important; border-collapse:collapse">{{ $no++ }}</td>
                    <td style="padding-top: 5px !important;border:1px black solid; border-collapse:collapse">
                        <img style="height:200px;" src="{{ asset('dokumentasi/'.$dokumentasi->dokumentasi) }}" alt="">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>