@extends('template.main')

@section('title', 'Table')

@section('otherScript')

@endsection

@section('content')

<body onload="window">

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                @extends('template.header')
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">

                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                @if($data['tabel'] == 'bukuTamu')
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No.Telpon</th>
                                        <th>Keperluan</th>
                                        <th>Resepsionis</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Tanda Tangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['tamu'] as $t)
                                    <tr>
                                        <td>{{ $t->nama_tamu }}</td>
                                        <td>{{ $t->alamat }}</td>
                                        <td>{{ $t->no_telp }}</td>
                                        <td>{{ $t->nama_keperluan }}</td>
                                        <td>{{ $t->nama_resepsionis }}</td>
                                        <td><?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = $t->created_at;
                                            $hariIni = new DateTime();
                                            $hariIni->setTimestamp($timestamp);
                                            echo $hariIni->format('H:i');
                                            ?> WIB
                                        </td>
                                        <td><?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = $t->created_at;
                                            $hariIni = new DateTime();
                                            $hariIni->setTimestamp($timestamp);
                                            echo $hariIni->format('d/m/Y');
                                            ?>
                                        </td>
                                        <td style="width: 15%;">
                                            <div class="modals-default-cl">
                                                <a data-toggle="modal" data-target="#modal{{ $t->id_tamu }}">
                                                    <img src="{{asset('upload')}}/{{$t->ttd}}" alt="">
                                                </a>
                                                <div class="modal fade" id="modal{{ $t->id_tamu }}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body" style="border: 2px dashed #00c292;">
                                                                <img src="{{asset('upload')}}/{{$t->ttd}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Instruksi</th>
                                        <th>Resepsionis</th>
                                        <th>Jam</th>
                                        <th>Tanggal</th>
                                        <th>Tanda Tangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($instruksi as $t)
                                    <tr>
                                        <td>{{ $t->nama_tamu }}</td>
                                        <td>{{ $t->jabatan_tamu }}</td>
                                        <td>{{ $t->instruksi }}</td>
                                        <td>{{ $t->nama_resepsionis }}</td>
                                        <td><?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = $t->created_at;
                                            $hariIni = new DateTime();
                                            $hariIni->setTimestamp($timestamp);
                                            echo $hariIni->format('H:i');
                                            ?> WIB
                                        </td>
                                        <td><?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = $t->created_at;
                                            $hariIni = new DateTime();
                                            $hariIni->setTimestamp($timestamp);
                                            echo $hariIni->format('d/m/Y');
                                            ?>
                                        </td>
                                        <td style="width: 15%;">
                                            <div class="modals-default-cl">
                                                <a data-toggle="modal" data-target="#modal{{ $t->id_tamu }}">
                                                    <img src="{{asset('upload')}}/{{$t->ttd}}" alt="">
                                                </a>
                                                <div class="modal fade" id="modal{{ $t->id_tamu }}" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>
                                                            <div class="modal-body" style="border: 2px dashed #00c292;">
                                                                <img src="{{asset('upload')}}/{{$t->ttd}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="{{'public_path(asset/)'}}footer2.png" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">

    @endsection

    @section('otherScript2')

    @endsection