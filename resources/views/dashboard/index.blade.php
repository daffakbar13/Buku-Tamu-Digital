@extends('template.main')

@section('title', 'Dashboard')

@section('otherScript')

<script type="text/javascript">
    function BukuTamu(val) {
        <?php
        for ($i = 0; $i < count($resepsionis); $i++) {
        ?>
            var e<?= $resepsionis[$i]->id_resepsionis; ?> = document.getElementById('resepsionisTamu<?= $resepsionis[$i]->id_resepsionis; ?>');
            e<?= $resepsionis[$i]->id_resepsionis; ?>.style.display = 'none';
            if (val == '<?= $resepsionis[$i]->nama_resepsionis; ?>') {
                e<?= $resepsionis[$i]->id_resepsionis; ?>.style.display = 'block';
            }
        <?php
        }
        ?>

    }

    function BukuInstruksi(val) {
        <?php
        for ($i = 0; $i < count($resepsionis); $i++) {
        ?>
            var e<?= $resepsionis[$i]->id_resepsionis; ?> = document.getElementById('resepsionisInstruksi<?= $resepsionis[$i]->id_resepsionis; ?>');
            e<?= $resepsionis[$i]->id_resepsionis; ?>.style.display = 'none';
            if (val == '<?= $resepsionis[$i]->nama_resepsionis; ?>') {
                e<?= $resepsionis[$i]->id_resepsionis; ?>.style.display = 'block';
            }
        <?php
        }
        ?>
    }
</script>

@endsection

@section('content')

<div class="container">
    <div class="row">
        @extends('template.header2')
    </div>
    <div class="row">
        @if ($errors->any())
        <div class="alert-list">
            <div class="alert alert-danger alert-dismissible alert-mg-b-10" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                Pilih
                @foreach ($errors->all() as $error)
                {{ $error }}
                @endforeach
                terlebih dahulu
            </div>
        </div>
        @endif
        <!-- Buku Tamu -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="dialog-inner" style="background-image: url('<?= asset('asset/tamu.jpg'); ?>'); height: 250px; background-size: 555px; background-position-y: -85px;">
                <div class="contact-hd dialog-hd">
                    <strong>
                        <h1 style="color: #fff; text-shadow: 2px 2px 2px black; margin-top:20%; margin-left:3%">Buku Tamu</h1>
                    </strong>
                </div>
                <div class="modals-default-cl">
                    <div class="material-design-btn">
                        <button type="button" class="btn notika-btn-green waves-effect" data-toggle="modal" data-target="#bukuTamu" style="position: absolute; bottom:20px; right:30px; float:right;">Masuk</button>
                    </div>
                    <div class="modal fade" id="bukuTamu" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{url('registrasi1')}}" method="GET">
                                    @csrf
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" title="Resepsionis" onchange='BukuTamu(this.value);' name="resepsionis">
                                            @foreach($resepsionis as $r)
                                            <option value="{{$r->nama_resepsionis}}">{{$r->nama_resepsionis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @foreach($resepsionis as $r)

                                    <div class="" id="resepsionisTamu{{$r->id_resepsionis}}" style="display: none;">
                                        <img src="<?= asset('asset/' . $r->gambar_resepsionis) ?>" alt="" style="margin: 10px 0;">
                                        <h4 style="text-align: center; margin-bottom: -5px;">{{$r->nama_resepsionis}}</h4>
                                    </div>

                                    @endforeach
                                    <div class="btn-group ib-btn-gp active-hook nk-email-inbox" style="margin-top: 10px;">
                                        <button class="btn btn-success btn-sm waves-effect">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Buku Instruksi -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="dialog-inner sm-res-mg-t-30" style="background-image: url('<?= asset('asset/instruksi.jpg'); ?>'); height: 250px; background-size: 555px; background-position-y: -65px;">
                <div class="contact-hd dialog-hd">
                    <h1 style="color: #fff; text-shadow: 2px 2px 2px black; margin-top:20%; margin-left:3%">Buku Instruksi</h1>
                </div>
                <div class="modals-default-cl">
                    <div class="material-design-btn">
                        <button type="button" class="btn notika-btn-green waves-effect" data-toggle="modal" data-target="#modalTamu" style="position: absolute; bottom:20px; right:30px; float:right;">Masuk</button>
                    </div>
                    <div class="modal fade" id="modalTamu" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{url('registrasi2')}}" method="GET">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" title="Resepsionis" onchange='BukuInstruksi(this.value);' name="resepsionis">
                                            @foreach($resepsionis as $r)
                                            <option value="{{$r->nama_resepsionis}}">{{$r->nama_resepsionis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @foreach($resepsionis as $r)

                                    <div class="" id="resepsionisInstruksi{{$r->id_resepsionis}}" style="display: none;">
                                        <img src="<?= asset('asset/' . $r->gambar_resepsionis) ?>" alt="" style="margin: 10px 0;">
                                        <h4 style="text-align: center; margin-bottom: -5px;">{{$r->nama_resepsionis}}</h4>
                                    </div>

                                    @endforeach
                                    <div class="btn-group ib-btn-gp active-hook nk-email-inbox" style="margin-top: 10px;">
                                        <button class="btn btn-success btn-sm waves-effect">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Tabel -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="dialog-inner mg-t-30" style="background-image: url('<?= asset('asset/table.jpg'); ?>'); height: 250px; background-size: 555px; background-position-y: -55px;">
                <div class="contact-hd dialog-hd">
                    <h1 style="color: #fff; text-shadow: 2px 2px 2px black; margin-top:20%; margin-left:3%">Tabel</h1>
                </div>
                <div class="modals-default-cl">
                    <div class="material-design-btn">
                        <button type="button" class="btn notika-btn-green waves-effect" data-toggle="modal" data-target="#modalTabel" style="position: absolute; bottom:20px; right:30px; float:right;">Masuk</button>
                    </div>
                    <div class="modal fade" id="modalTabel" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{url('table')}}" method="GET">
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" title="Tabel" name="tabel">
                                            <option value="bukuTamu">Buku Tamu</option>
                                            <option value="bukuInstruksi">Buku Instruksi</option>
                                        </select>
                                    </div>
                                    <div class="btn-group ib-btn-gp active-hook nk-email-inbox" style="margin-top: 10px;">
                                        <button class="btn btn-success btn-sm waves-effect">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Grafik -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="dialog-inner mg-t-30" style="background-image: url('<?= asset('asset/chart.jpg'); ?>'); height: 250px; background-size: 555px; background-position-y: -65px;">
                <div class="contact-hd dialog-hd">
                    <h1 style="color: #fff; text-shadow: 2px 2px 2px black; margin-top:20%; margin-left:3%">Grafik</h1>
                </div>
                <div class="modals-default-cl">
                    <div class="material-design-btn">
                        <button type="button" class="btn notika-btn-green waves-effect" data-toggle="modal" data-target="#modalGrafik" style="position: absolute; bottom:20px; right:30px; float:right;">Masuk</button>
                    </div>
                    <div class="modal fade" id="modalGrafik" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="{{url('chart')}}" method="POST">
                                    @csrf
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" title="Grafik" name="grafik">
                                            <option value="bukuTamu">Buku Tamu</option>
                                            <option value="bukuInstruksi">Buku Instruksi</option>
                                        </select>
                                    </div>
                                    <div class="btn-group ib-btn-gp active-hook nk-email-inbox" style="margin-top: 10px;">
                                        <button class="btn btn-success btn-sm waves-effect">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Admin -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="dialog-inner mg-t-30" style="background-image: url('<?= asset('asset/admin.jpg'); ?>'); height: 250px; background-size: 555px; background-position-y: -55px;">
                <div class="contact-hd dialog-hd">
                    <h1 style="color: #fff; text-shadow: 2px 2px 2px black; margin-top:20%; margin-left:3%">Admin</h1>
                </div>
                <div class="modals-default-cl">
                    <div class="material-design-btn">
                        <a href="{{url('login')}}">
                            <button type="button" class="btn notika-btn-green waves-effect" style="position: absolute; bottom:20px; right:30px; float:right;">Masuk</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br>

<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">


@endsection

@section('otherScript2')

@endsection