<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>@yield('title')</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('notika/img/favicon.ico')}}">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/bootstrap.min.css')}}">
  <!-- font awesome CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/font-awesome.min.css')}}">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{ asset('notika/css/owl.theme.css')}}">
  <link rel="stylesheet" href="{{ asset('notika/css/owl.transitions.css')}}">
  <!-- meanmenu CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/meanmenu/meanmenu.min.css')}}">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/animate.css')}}">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/normalize.css')}}">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
  <!-- jvectormap CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
  <!-- codemirror CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/code-editor/codemirror.css')}}">
  <link rel="stylesheet" href="{{ asset('notika/css/code-editor/ambiance.css')}}">
  <!-- dropzone CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/dropzone/dropzone.css')}}">
  <!-- summernote CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/summernote/summernote.css')}}">
  <!-- charts CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/c3/c3.min.css')}}">
  <!-- Data Table JS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/jquery.dataTables.min.css')}}">
  <!-- dialog CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/dialog/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('notika/css/dialog/dialog.css')}}">
  <!-- Range Slider CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/themesaller-forms.css')}}">
  <!-- bootstrap select CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/bootstrap-select/bootstrap-select.css')}}">
  <!-- datapicker CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/datapicker/datepicker3.css')}}">
  <!-- Color Picker CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/color-picker/farbtastic.css')}}">
  <!-- notification CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/notification/notification.css')}}">
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/wave/waves.min.css')}}">
  <link rel="stylesheet" href="{{ asset('notika/css/wave/button.css')}}">
  <link rel="stylesheet" href="css/wave/button.css">

  <!-- Notika icon CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/notika-custom-icon.css')}}">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/main.css')}}">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/style.css')}}">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="{{ asset('notika/css/responsive.css')}}">
  <!-- modernizr JS
		============================================ -->
  <script src="{{ asset('notika/js/vendor/modernizr-2.8.3.min.js')}}"></script>

  @yield('otherScript')

</head>

<body>

  @yield('content')

  @yield('otherScript2')

  <!-- jquery
		============================================ -->
  <script src="{{ asset('notika/js/vendor/jquery-1.12.4.min.js')}}"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="{{ asset('notika/js/bootstrap.min.js')}}"></script>
  <!-- wow JS
		============================================ -->
  <script src="{{ asset('notika/js/wow.min.js')}}"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="{{ asset('notika/js/jquery-price-slider.js')}}"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="{{ asset('notika/js/owl.carousel.min.js')}}"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="{{ asset('notika/js/jquery.scrollUp.min.js')}}"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="{{ asset('notika/js/meanmenu/jquery.meanmenu.js')}}"></script>
  <!-- counterup JS
		============================================ -->
  <script src="{{ asset('notika/js/counterup/jquery.counterup.min.js')}}"></script>
  <script src="{{ asset('notika/js/counterup/waypoints.min.js')}}"></script>
  <script src="{{ asset('notika/js/counterup/counterup-active.js')}}"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="{{ asset('notika/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="{{ asset('notika/js/sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{ asset('notika/js/sparkline/sparkline-active.js')}}"></script>
  <!-- flot JS
		============================================ -->
  <script src="{{ asset('notika/js/flot/jquery.flot.js')}}"></script>
  <script src="{{ asset('notika/js/flot/jquery.flot.resize.js')}}"></script>
  <script src="{{ asset('notika/js/flot/jquery.flot.pie.js')}}"></script>
  <script src="{{ asset('notika/js/flot/jquery.flot.tooltip.min.js')}}"></script>
  <script src="{{ asset('notika/js/flot/jquery.flot.orderBars.js')}}"></script>
  <script src="{{ asset('notika/js/flot/curvedLines.js')}}"></script>
  <script src="{{ asset('notika/js/flot/flot-active.js')}}"></script>
  <!-- knob JS
		============================================ -->
  <script src="{{ asset('notika/js/knob/jquery.knob.js')}}"></script>
  <script src="{{ asset('notika/js/knob/jquery.appear.js')}}"></script>
  <script src="{{ asset('notika/js/knob/knob-active.js')}}"></script>
  <!--  wave JS
		============================================ -->
  <script src="{{ asset('notika/js/wave/waves.min.js')}}"></script>
  <script src="{{ asset('notika/js/wave/wave-active.js')}}"></script>
  <!--  Chat JS
            ============================================ -->
  <script src="{{ asset('notika/js/dialog/sweetalert2.min.js')}}"></script>
  <script src="{{ asset('notika/js/dialog/dialog-active.js')}}"></script>
  <!--  Chat JS
		============================================ -->
  <script src="{{ asset('notika/js/chat/jquery.chat.js')}}"></script>
  <!-- Charts JS
		============================================ -->
  <script src="{{ asset('notika/js/charts/Chart.js')}}"></script>
  <script src="{{ asset('notika/js/charts/area-chart.js')}}"></script>
  <!-- summernote JS
		============================================ -->
  <script src="{{ asset('notika/js/summernote/summernote-updated.min.js')}}"></script>
  <script src="{{ asset('notika/js/summernote/summernote-active.js')}}"></script>
  <!-- dropzone JS
		============================================ -->
  <script src="{{ asset('notika/js/dropzone/dropzone.js')}}"></script>
  <!-- icheck JS
		============================================ -->
  <script src="{{ asset('notika/js/icheck/icheck.min.js')}}"></script>
  <script src="{{ asset('notika/js/icheck/icheck-active.js')}}"></script>
  <!-- Data Maps JS
		============================================ -->
  <script src="{{ asset('notika/js/data-map/d3.min.js')}}"></script>
  <script src="{{ asset('notika/js/data-map/topojson.js')}}"></script>
  <script src="{{ asset('notika/js/data-map/datamaps.all.min.js')}}"></script>
  <script src="{{ asset('notika/js/data-map/data-maps-active.js')}}"></script>
  <!-- Data Table JS
		============================================ -->
  <script src="{{ asset('notika/js/data-table/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('notika/js/data-table/data-table-act.js')}}"></script>
  <!-- Input Mask JS
		============================================ -->
  <script src="{{ asset('notika/js/jasny-bootstrap.min.js')}}"></script>
  <!-- rangle-slider JS
		============================================ -->
  <script src="{{ asset('notika/js/rangle-slider/jquery-ui-1.10.4.custom.min.js')}}"></script>
  <script src="{{ asset('notika/js/rangle-slider/jquery-ui-touch-punch.min.js')}}"></script>
  <script src="{{ asset('notika/js/rangle-slider/rangle-active.js')}}"></script>
  <!-- datapicker JS
		============================================ -->
  <script src="{{ asset('notika/js/datapicker/bootstrap-datepicker.js')}}"></script>
  <script src="{{ asset('notika/js/datapicker/datepicker-active.js')}}"></script>
  <!-- bootstrap select JS
		============================================ -->
  <script src="{{ asset('notika/js/bootstrap-select/bootstrap-select.js')}}"></script>
  <!--  color-picker JS
		============================================ -->
  <script src="{{ asset('notika/js/color-picker/farbtastic.min.js')}}"></script>
  <script src="{{ asset('notika/js/color-picker/color-picker.js')}}"></script>
  <!--  notification JS
		============================================ -->
  <script src="{{ asset('notika/js/notification/bootstrap-growl.min.js')}}"></script>
  <script src="{{ asset('notika/js/notification/notification-active.js')}}"></script>
  <!--  chosen JS
		============================================ -->
  <script src="{{ asset('notika/js/chosen/chosen.jquery.js')}}"></script>
  <!-- autosize JS
		============================================ -->
  <script src="{{ asset('notika/js/autosize.min.js')}}"></script>
  <!-- Google map JS
		============================================ -->
  <script src="{{ asset('notika/js/google.maps/google.maps2-active.js')}}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVOIQ3qXUCmKVVV7DVexPzlgBcj5mQJmQ&callback=initMap"></script>
  <!-- cropper JS
		============================================ -->
  <script src="{{ asset('notika/js/cropper/cropper.min.js')}}"></script>
  <script src="{{ asset('notika/js/cropper/cropper-actice.js')}}"></script>
  <!--  todo JS
		============================================ -->
  <script src="{{ asset('notika/js/todo/jquery.todo.js')}}"></script>
  <!-- plugins JS
		============================================ -->
  <script src="{{ asset('notika/js/plugins.js')}}"></script>
  <!-- main JS
		============================================ -->
  <script src="{{ asset('notika/js/main.js')}}"></script>
  <!-- tawk chat JS
		============================================ -->
  <!-- <script src="{{ asset('notika/js/tawk-chat.js')}}"></script> -->
</body>

</html>