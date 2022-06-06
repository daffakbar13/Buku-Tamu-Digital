<!doctype html>
<html>

<head>
    <title>Tanda Tangan</title>
</head>
</head>

<body>
    @extends('template.header')
    <style>
        #signature {
            width: 300px;
            height: 200px;
            border: 1px solid black;
        }
    </style>
    <div class="" style="margin: 0 auto; position:fixed; top: 0;">

    </div>

    <!-- Signature -->
    <center>

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div id="signature" style="">
            <canvas id="signature-pad" class="signature-pad" width="300px" height="200px"></canvas>
        </div>
    </center>
    <br />
    <form method="POST" action="{{ url('/ttdTamu') }}">
        @csrf
        <input type="hidden" name="nama" value="{{$tamu}}">
        <input type="hidden" name="resepsionis" value="{{$resepsionis}}">
        <input type="hidden" name="alamat" value="{{$alamat}}">
        <input type="hidden" name="no_telp" value="{{$no_telp}}">
        <input type="hidden" name="keperluan" value="{{$keperluan}}">
        <input type="hidden" name="keperluan_lainnya" value="{{$keperluan_lainnya}}">
        <br>
        <center>
            <button type="submit">Ulang</button>
        </center>
    </form>

    <form method="POST" action="{{ url('reg1') }}">
        @csrf
        <input type="hidden" name="nama" value="{{$tamu}}">
        <input type="hidden" name="resepsionis" value="{{$resepsionis}}">
        <input type="hidden" name="alamat" value="{{$alamat}}">
        <input type="hidden" name="no_telp" value="{{$no_telp}}">
        <input type="hidden" name="keperluan" value="{{$keperluan}}">
        <input type="hidden" name="keperluan_lainnya" value="{{$keperluan_lainnya}}">
        <textarea id='output' name="signed" style="display: none;"></textarea><br />
        <center>
            <button id="click" type="submit" value="click">Simpan</button>
        </center>
    </form>


    <!-- Preview image -->
    <img src='' id='sign_prev' style='display: none;' />

    <!-- Script -->
    <script src="{{ asset('signature/jquery-3.0.0.js')}}" type='text/javascript'></script>
    <script src="{{ asset('signature/signature_pad.js')}}"></script>

    <script>
        $(document).ready(function() {
            var signaturePad = new SignaturePad(document.getElementById('signature-pad'));

            $('#click').click(function() {
                var data = signaturePad.toDataURL('image/png');
                $('#output').val(data);

                $("#sign_prev").show();
                $("#sign_prev").attr("src", data);
                // Send data to server instead...
                //window.open(data);
            });
        })
    </script>

    <img src="{{asset('asset/footer2.png')}}" alt="" style="height: 80px; position: fixed; float: right; margin-right: 10px; bottom: 10px;right: 0;">

</body>

</html>