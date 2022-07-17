<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Poliklinik | Kha'zix</title>

    <!-- Bootstrap -->
    <link href="{{ asset('Assets') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('Assets') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('Assets') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('Assets') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('Assets') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('Assets') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('Assets') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="{{ asset('Assets') }}/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="{{ asset('Assets') }}/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="{{ asset('Assets') }}/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('Assets') }}/build/css/custom.css" rel="stylesheet">

    @stack('style')
  </head>

  <body class="nav-md">
   
   @yield('content')
   


   @include('templates/footer')
   
   @include('templates/js')

   
  


