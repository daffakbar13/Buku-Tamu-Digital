@extends('template.main')

@section('title', 'Admin')

@section('otherScript')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#tombol').click(function() {
            $("#gambar_resepsionis").trigger('click');
            // console.log('oke')
        })
    })
</script>

@endsection

@section('content')

<div class="" style="height: 80px; position: fixed; float: left; top: 15px;left: 20px;">
    <div class="material-design-btn">
        <a href="{{url('home')}}">
            <button class="btn btn-danger waves-effect"><i class="notika-icon notika-left-arrow"></i> Back</button>
        </a>
    </div>
</div>

<div class="form-element-area">
    <div class="container">
        <div class="row" style="text-align: center;">
            @extends('template.header2')
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-element-list">
                    @if($tabel == 'resepsionis')
                    <form method="POST" action="{{ url('tambahResepsionis') }}" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <!-- Form Nama -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input id="nama" placeholder="Nama Resepsionis" type="text" class="form-control" name="nama_resepsionis" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <!-- Form Gambar -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="modals-default-cl">
                                            <a data-toggle="modal" data-target="#modal">
                                                <img src="{{asset('asset')}}/default.jpg" alt="" class="previewgambar_resepsionis">
                                            </a>
                                            <div class="modal fade" id="modal" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body" style="border: 2px dashed #00c292;">
                                                            <img src="{{asset('asset')}}/default.jpg" alt="" class="modalgambar_resepsionis">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <br>
                                        <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                            <div class="material-design-btn">
                                                <button id="tombol" type="button" class="btn btn-success btn-sm waves-effect">Pilih File</button>
                                            </div>
                                        </div>
                                        <label class="custom-file-label labelgambar_resepsionis" for="gambar_resepsionis">
                                            Pilih Gambar...
                                        </label>
                                        <input type="file" class="custom-file-input" id="gambar_resepsionis" name="gambar_resepsionis" style="opacity: 0;" onchange="previewImg('gambar_resepsionis')">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" style="text-align: center;">
                            <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                <div class="material-design-btn">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <form method="POST" action="{{ url('tambahKeperluan') }}">
                        <div class="row">
                            @csrf
                            <!-- Form Nama -->
                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input id="nama" placeholder="Nama Keperluan" type="text" class="form-control" name="nama_keperluan" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="" style="text-align: center;">
                            <div class="btn-group ib-btn-gp active-hook nk-email-inbox">
                                <div class="material-design-btn">
                                    <button type="submit" class="btn btn-success btn-sm waves-effect">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">

@endsection

@section('otherScript2')

<script>
    function previewImg(id) {
        const gambar = document.querySelector('#' + id)

        const imgPreview = document.querySelector('.preview' + id)

        const imgModal = document.querySelector('.modal' + id)

        const gambarLabel = document.querySelector('.label' + id)

        gambarLabel.textContent = gambar.files[0].name

        const fileGambar = new FileReader()
        fileGambar.readAsDataURL(gambar.files[0])

        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result
            imgModal.src = e.target.result
        }
        console.log(imgModal);
    }
</script>

@endsection