<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simple App! - @yield('title')</title>
  
	<!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ url('css/style.css') }}" />
  
	<!-- Icons -->
  <link rel="stylesheet" href="{{ url('themify-icons/themify-icons.css') }}" />
  
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

    <!-- Header -->
    @include('partials._header')

    <!-- Content -->
    @yield('content')
    
    <!-- Footer -->
    @include('partials._footer')

    @stack('scripts')

</body>
</html>
