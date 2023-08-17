<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('image/logo/norsu2.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('image/logo/norsu2.png') }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/nifty.min.css" rel="stylesheet">
  <link href="css/demo/nifty-demo-icons.min.css" rel="stylesheet">
  <link href="plugins/pace/pace.min.css" rel="stylesheet">
  <script src="plugins/pace/pace.min.js"></script>
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('datatable/buttons.dataTables.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />
  <link href="plugins/unitegallery/css/unitegallery.min.css" rel="stylesheet">

  
  
  <link rel="stylesheet" type="text/css" href="{{ asset('toast/toast.css') }}">
  <!-- for Select2 -->
  <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />
  
  {{-- <link href="css/demo/nifty-demo.min.css" rel="stylesheet"> --}}
  <!-- Styles -->
  @livewireStyles
  <!-- Scripts -->
  {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
  <script src="{{ asset('js/app.js') }}" defer></script>
  
  </head>


  <body>
  <div id="container" class="effect aside-float aside-bright mainnav-lg">
  
  
  
    @include('layouts.shared.header')
  
  
  <div class="boxed">
  
  
    {{ $slot }}
  
  
  
  
  
    @include('layouts.shared.main_nav')
  
  
  </div>
  
  
  
  @include('layouts.shared.footer')
  
  
  
  
  <button class="scroll-top btn">
  <i class="pci-chevron chevron-up"></i>
  </button>
  
  </div>
  
  
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/nifty.min.js"></script>
  {{-- <script src="js/demo/nifty-demo.min.js"></script> --}}
  <script src="plugins/flot-charts/jquery.flot.min.js"></script>
  <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
  <script src="plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  {{-- <script src="js/demo/dashboard.js"></script> --}}
  <script src="js/demo/icons.js"></script>
  
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTables.buttons.min.js"></script>
  <script src="datatable/jszip.min.js"></script>
  <script src="datatable/pdfmake.min.js"></script>
  <script src="datatable/vfs_fonts.js"></script>
  <script src="datatable/buttons.html5.min.js"></script>
  <script src="datatable/buttons.print.min.js"></script>
  
  <!--toast -->
  <script type="text/javascript" src="toast/toast.js"></script>
  <!--sweet alert -->
  <script type="text/javascript" src="swal/sweetalert.js"></script>
  <!--select2 -->
  <script type="text/javascript" src="select2/js/select2.min.js"></script>

  <script src="plugins/unitegallery/js/unitegallery.min.js"></script>
  <script src="plugins/unitegallery/themes/carousel/ug-theme-carousel.js"></script>
  
  <script>
    $(document).on('nifty.ready', function () {
        
  
  $("#demo-gallery").unitegallery({
      tile_enable_shadow: false
  });
  
  
      
    });
</script>

<script>
  $(document).on('nifty.ready', function () {
      

$("#demo-gallery2").unitegallery();


    
  });
</script>

  @livewireScripts
  @stack('admin-table-scripts')
  @stack('client-table-scripts')
  @stack('school-facilities-table-scripts')
  @stack('equipment-table-scripts')
  @stack('school-bus-rental-table-scripts')
  @stack('manage-facilities-reservation-table-scripts')
  @stack('manage-equipment-reservation-table-scripts')
  @stack('manage-bus-reservation-table-scripts')
  
  
  @stack('facilities-reservation-table-scripts')
  @stack('equipment-reservation-table-scripts')
  @stack('bus-reservation-table-scripts')
  
  </body>
</html>
