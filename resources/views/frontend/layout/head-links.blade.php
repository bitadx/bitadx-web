<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="Bawari Food" name="author">
		<meta name="description" content="@yield('meta_description','')">
		<meta name="keywords" content="@yield('meta_keywords','')"/>
		<meta name="seo" content="@yield('meta_tag','')" />
		@yield('meta_extra_seo')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Favicon -->
		<link rel="icon" href="{{asset('common/assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('common/assets/images/brand/favicon.ico')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Title -->
		<title>@yield('title','')</title>

        <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&amp;display=swap"
        rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/font-awsome/font-awsome-v5.7.2.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
	</head>
