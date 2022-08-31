<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content="{{ csrf_token() }}" />

  <title>@yield('title' , env('APP_NAME'))</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminassets/dist/css/adminlte.min.css')}}">
    <link rel='stylesheet'
        href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />


  <style>
    .table th,
    .table td{
        vertical-align:middle

    }
  </style>
     @if (app()->currentLocale() == 'ar')
     <style>
         body {
             direction: rtl;
             text-align: right
         }
         @media (min-width: 768px) {
           body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
               margin-right: 250px;
               margin-left: 0;
           }
         }
         ul {
             padding: 0
         }
         .nav-sidebar .nav-link>.right, .nav-sidebar .nav-link>p>.right {
           right: unset;
           left: 1rem;
         }
     </style>
     @endif

     @yield('styles')

</head>
