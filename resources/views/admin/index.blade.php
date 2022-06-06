@extends('template.main')

@section('title', 'Admin')

@section('otherScript')

@endsection

@section('content')

<div class="" style="height: 80px; position: fixed; float: left; top: 15px;left: 20px;">
    <div class="material-design-btn">

        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <button class="btn btn-danger waves-effect"><i class="notika-icon notika-left-arrow"></i> Back</button>
        </a>


        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>

<div class="container">

    <div class="row">
        @extends('template.header2')
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h2>Tabel Resepsionis</h2>
                    <form action="{{url('formTambah')}}" method="POST">
                        @csrf
                        <input type="hidden" name="tabel" value="resepsionis">
                        <div class="material-design-btn">
                            <button type="submit" class="btn notika-btn-green waves-effect" style="float: right; top: -30px; right:20px;">Tambah</button>
                        </div>
                    </form>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($resepsionis as $r)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$r->nama_resepsionis}}</td>
                                <td style="width: 25%;">
                                    <div class="modals-default-cl">
                                        <a data-toggle="modal" data-target="#modal{{$r->id_resepsionis}}">
                                            <img src="{{asset('asset')}}/{{$r->gambar_resepsionis}}" alt="" style="width: 50%;">
                                        </a>
                                        <div class="modal fade" id="modal{{$r->id_resepsionis}}" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body" style="border: 2px dashed #00c292;">
                                                        <img src="{{asset('asset')}}/{{$r->gambar_resepsionis}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="width: 15%;">
                                    <div class="" style="display: inline;">
                                        <form action="{{url('formEdit')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="tabel" value="resepsionis">
                                            <input type="hidden" name="id_resepsionis" value="{{$r->id_resepsionis}}">
                                            <input type="hidden" name="nama_resepsionis" value="{{$r->nama_resepsionis}}">
                                            <input type="hidden" name="gambar_resepsionis" value="{{$r->gambar_resepsionis}}">
                                            <div class="material-design-btn">
                                                <button type="submit" class="btn notika-btn-cyan waves-effect">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{url('hapusResepsionis')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_resepsionis" value="{{$r->id_resepsionis}}">
                                            <input type="hidden" name="gambar_resepsionis" value="{{$r->gambar_resepsionis}}">
                                            <div class="material-design-btn">
                                                <button type="submit" class="btn notika-btn-red waves-effect">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h2>Tabel Keperluan</h2>
                    <form action="{{url('formTambah')}}" method="POST">
                        @csrf
                        <input type="hidden" name="tabel" value="keperluan">
                        <div class="material-design-btn">
                            <button type="submit" class="btn notika-btn-green waves-effect" style="float: right; top: -30px; right:20px;">Tambah</button>
                        </div>
                    </form>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Keperluan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($keperluan as $k)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$k->nama_keperluan}}</td>
                                <td style="width: 15%;">
                                    <div class="" style="display: inline;">
                                        <form action="{{url('formEdit')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="tabel" value="keperluan">
                                            <input type="hidden" name="id_keperluan" value="{{$k->id_keperluan}}">
                                            <input type="hidden" name="nama_keperluan" value="{{$k->nama_keperluan}}">
                                            <div class="material-design-btn">
                                                <button type="submit" class="btn notika-btn-cyan waves-effect">Edit</button>
                                            </div>
                                        </form>
                                        <form action="{{url('hapusKeperluan')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id_keperluan" value="{{$k->id_keperluan}}">
                                            <div class="material-design-btn">
                                                <button type="submit" class="btn notika-btn-red waves-effect">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="row" style="display: none;">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-element-list">
                <form method="POST" action="">
                    <div class="row">
                        @csrf
                        <!-- Form Resepsionis -->
                        <input type="hidden" value="" name="resepsionis">
                        <!-- Form Nama -->
                        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-support"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input id="nama" placeholder="Nama" type="text" class="form-control" name="nama" autocomplete="off" value="">
                                </div>
                            </div>
                        </div>
                        <!-- Form Alamat/Instansi -->
                        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-map"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input placeholder="Alamat/Instansi" type="text" class="form-control" name="alamat" autocomplete="off" value="">
                                </div>
                            </div>
                        </div>
                        <!-- Form No. Telpon -->
                        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-map"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input placeholder="No. Telpon" type="text" class="form-control" name="no_telp" autocomplete="off" value="" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                </div>
                            </div>
                        </div>
                        <!-- Form Keperluan -->
                        <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12" style="margin-bottom: 15px;">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" title="Keperluan" onchange='Keperluan(this.value);' name="keperluan">
                                    <option value=""></option>
                                    <option value="Keperluan lainnya">Keperluan lainnya</option>
                                </select>
                            </div>
                        </div>
                        <!-- Form Keperluan Lainnya -->
                        <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12" id="lainnya" style="display: none;">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-edit"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input placeholder="Ketik Disini" type="text" class="form-control" name="keperluan_lainnya" autocomplete="off">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">

@endsection

@section('otherScript2')

@endsection