<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')
</head>

<body>
    <nav class="navbar bg-base-100 w-full fixed top-0 h-10 z-50 shadow-lg overflow-hidden">
        @include('layouts.navbar')
    </nav>
    <div class="flex gap-2 max-w-7xl mt-20 mb-5 mx-auto">
        @include('pages.viewProfile')
        @yield('home')
        {{-- @include('pages.rightSide') --}}
    </div>

    @include('layouts.footer')
</body>

</html>
