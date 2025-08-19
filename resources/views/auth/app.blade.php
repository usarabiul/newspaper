
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
	@yield('title')

	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="">

    
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset(general()->favicon())}}">

	@yield('SEO')

    <link href="{{asset(assetLinkAdmin().'/css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    @stack('css')
</head>

<body class="h-100">
    @yield('contents')
    
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset(assetLinkAdmin().'/vendor/global/global.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/js/custom.min.js')}}"></script>
    <script src="{{asset(assetLinkAdmin().'/js/deznav-init.js')}}"></script>
    @stack('js')
</body>

</html>