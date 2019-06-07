 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/pages/assets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/pages/assets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/pages/assets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/pages/assets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('backend/pages/assets/img/favicons/manifest.json')}}">
    <meta name="msapplication-TileImage" content="{{asset('backend/pages/assets/img/favicons/mstile-150x150.png')}}">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="{{asset('backend/pages/assets/css/theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/pages/assets/lib/datatables-bs4/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/pages/assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('backend/pages/assets/lib/select2/select2.min.css')}}" rel="stylesheet">
</head>
