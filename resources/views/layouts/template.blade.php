@include('includes.head')

@include('includes.styles')

@stack('style')

@yield('styles')

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3526831488251657"
    crossorigin="anonymous"></script>

</head>

<body>
    <div class="main-wrapper">

        @include('includes.navigation')

        @include('includes.flash-message')

        @yield('content')

        @include('includes.footer')

    </div>

    <div class="progress-wrap active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
            </path>
        </svg>
    </div>

    @include('includes.scripts')

    @stack('scripts')

</body>

</html>