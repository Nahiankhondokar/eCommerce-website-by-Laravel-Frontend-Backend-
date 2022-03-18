<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Ecommerce Admin - Dashboard</title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

  {{-- Toster css file --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	  
  {{-- font awesome file --}}
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
     
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">

    {{-- Header Section --}}
    @include('admin.body.header')
  
    {{-- Sidebar Section --}}
    @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  
    {{-- Admin Section --}}
    @yield('admin')


  </div>
  <!-- /.content-wrapper -->

  {{-- Footer Section --}}
  @include('admin.body.footer')


  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	<!-- Vendor JS -->
	<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>	
	<script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
	<script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
	

	<!-- Sunny Admin App -->
	<script src="{{ asset('backend/js/template.js') }}"></script>
	<script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>

  {{-- jQuer file --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  {{-- Toster js file --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  {{-- font awesome file --}}
  <script src="https://use.fontawesome.com/d9e47b0de4.js"></script>

   {{-- Yajra data table --}}
   <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js') }}"></script>
   <script src="{{ asset('backend/js/pages/data-table.js') }}"></script>

   {{-- Sweet alert --}}
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  {{-- custom js --}}
  <script src="{{ asset('backend/js/custom.js') }}"></script>

  <script>
    @if (Session::has('message'))

    let type = "{{ Session::get('alert-type', 'info') }}"

    switch(type){

      case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;

      case 'success':
      toastr.success("{{ Session::get('message') }}");
      break;

      case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;

      case 'error':
      toastr.error("{{ Session::get('message') }}");
      break;  


    }
      
    @endif
  </script>
	
	
</body>
</html>
