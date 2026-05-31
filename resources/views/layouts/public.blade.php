<!DOCTYPE html>
<html>

<head>
    <title>Project_Vyyy</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    @include('partials.navbar')

    @yield('content')

    @include('partials.footer')

</body>

</html>