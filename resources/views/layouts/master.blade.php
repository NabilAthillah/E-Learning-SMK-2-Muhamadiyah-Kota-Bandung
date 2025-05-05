<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body>
    @include('includes.navbar')
    <main class="min-h-screen max-w-screen w-full">
        @yield('content')
    </main>

    @stack('script')
</body>

</html>