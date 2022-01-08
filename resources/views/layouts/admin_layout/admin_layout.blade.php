<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Udhavum Ullangal | {{ \Request::route()->getName() }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{{ url("images/admin_images/logos/favicon.ico") }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('plugins/bootstrap/css/bootstrap.css') }} " rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{ url('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('plugins/animate-css/animate.css') }} " rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="{{ url('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{ url('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ url('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{ url('plugins/dropzone/dropzone.css') }}" rel="stylesheet" />

    <!-- Multi Select Css -->
    <link href="{{ url('plugins/multi-select/css/multi-select.css') }}" rel="stylesheet" />

    <!-- Bootstrap Spinner Css -->
    <link href="{{ url('plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet" />

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{ url('plugins/nouislider/nouislider.min.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ url('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{ url('plugins/morrisjs/morris.css') }}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ url('plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="{{ url('plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ url('css/admin_css/style.css') }}" rel="stylesheet" />

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ url('css/admin_css/themes/all-themes.css') }}" rel="stylesheet" />
</head>

<body class="theme-indigo">

    @include('layouts.admin_layout.admin_header')

    <section>

        @include('layouts.admin_layout.admin_sidebar')

    </section>

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ url('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ url('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="{{ url('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{ url('plugins/dropzone/dropzone.js') }}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{ url('plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ url('plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{ url('plugins/jquery-spinner/js/jquery.spinner.js') }}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{ url('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{ url('plugins/nouislider/nouislider.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url('plugins/node-waves/waves.js') }}"></script>

    <!-- SweetAlert Plugin Js -->
    <script src="{{ url('plugins/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ url('plugins/autosize/autosize.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ url('plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ url('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ url('plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ url('plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ url('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ url('plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ url('plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ url('plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ url('plugins/flot-charts/jquery.flot.time.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ url('plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ url('js/admin_js/admin.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/ui/modals.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="{{ url('js/admin_js/admin_scripts.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/forms/basic-form-elements.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/forms/advanced-form-elements.js') }}"></script>
    <script src="{{ url('js/admin_js/pages/index.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ url('js/admin_js/demo.js') }}"></script>
</body>

</html>
