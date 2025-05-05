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

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    @stack('script')
</body>

</html>