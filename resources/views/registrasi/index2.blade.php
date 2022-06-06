@extends('template.main')

@section('title', 'Buku Instruksi')

@section('otherScript')

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">
    function Keperluan(val) {
        var element = document.getElementById('lainnya');
        if (val == null || val == 'Keperluan lainnya')
            element.style.display = 'block';
        else
            element.style.display = 'none';
    }
</script>

@endsection

@section('content')

<div class="" style="height: 80px; position: fixed; float: left; top: 15px;left: 20px;">
    <div class="material-design-btn">
        <a href="{{url('')}}">
            <button class="btn btn-danger waves-effect"><i class="notika-icon notika-left-arrow"></i> Back</button>
        </a>
    </div>
</div>

<div class="form-element-area">
    <div class="container">

        @extends('template.header2')

        <div class="row" style="margin-top: 10px;">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="invoice-hs">
                    <span>Tamu Hari Ini(<?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        $timestamp = date_timestamp_get(new DateTime('midnight now'));
                                        $hari = new DateTime();
                                        $hari->setTimestamp($timestamp);
                                        echo $hari->format('d F Y');
                                        ?>)
                    </span>
                    <h2><?php
                        if ($hariIni == 0) {
                            echo "Tidak ada tamu";
                        } else {
                            echo $hariIni . " Tamu";
                        }
                        ?>
                    </h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="invoice-hs date-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <span>Tamu Bulan Ini(<?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = date_timestamp_get(new DateTime('midnight now'));
                                            $hari = new DateTime();
                                            $hari->setTimestamp($timestamp);
                                            echo $hari->format('F');
                                            ?>)
                    </span>
                    <h2><?php
                        if ($bulanIni == 0) {
                            echo "Tidak ada tamu";
                        } else {
                            echo $bulanIni . " Tamu";
                        }
                        ?>
                    </h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                <div class="invoice-hs wt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <span>Tamu Tahun Ini(<?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $timestamp = date_timestamp_get(new DateTime('midnight now'));
                                            $hari = new DateTime();
                                            $hari->setTimestamp($timestamp);
                                            echo $hari->format('Y');
                                            ?>)
                    </span>
                    <h2><?php
                        if ($tahunIni == 0) {
                            echo "Tidak ada tamu";
                        } else {
                            echo $tahunIni . " Tamu";
                        }
                        ?>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    <form method="POST" action="{{ url('/ttdInstruksi') }}">
                        @csrf
                        <?php
                        if ($success == "Registrasi berhasil!") {
                        ?>
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong><?= $success; ?></strong>
                            </div>
                        <?php
                        } else {
                            $success = '';
                        }
                        ?>
                        <div class="row">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                                Form
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                                harus diisi
                            </div>
                            @endif
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <!-- Form Resepsionis -->
                            <input type="hidden" value="{{$resepsionis}}" name="resepsionis">
                            <!-- Form Nama -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input id="nama" placeholder="Nama" type="text" class="form-control" name="nama" autocomplete="off" value="{{ old('nama') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Jabatan -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input placeholder="Jabatan" type="text" class="form-control" name="jabatan" autocomplete="off" value="{{ old('jabatan') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Instruksi -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <textarea class="form-control" rows="4" placeholder="Instruksi" name="instruksi">{{ old('instruksi') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" style="text-align: center;">
                            <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                <div class="material-design-btn">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">
@endsection

@section('otherScript2')

<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<script type="text/javascript">
    var signaturePad = $('#signaturePad').signature({
        syncField: '#signature64',
        syncFormat: 'PNG'
    });
    $('#clear').click(function(e) {
        e.preventDefault();
        signaturePad.signature('clear');
        $("#signature64").val('');
    });
</script>

@endsection