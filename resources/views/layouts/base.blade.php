<!DOCTYPE html>
<html lang="en">

<head>
	<title>@yield('page.title', config('app.name'))</title>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="{{ asset('css/style.min.css?_v=20240809175623') }}">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js?_v=20240823203121"></script>
</head>

<body>
	<div class="wrapper">

        @include('includes.header')

		<main>

            @yield('content')

		</main>

        @include('includes.footer')

	</div>
	{{-- <script src="{{ asset('js/app.min.js?_v=20240809175623') }}"></script> --}}
	<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>