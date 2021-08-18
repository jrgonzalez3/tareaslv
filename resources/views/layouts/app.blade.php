@include('layouts.header')

<body>
    <div id="app">
        @include('layouts.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('layouts.footer')
</body>

</html>