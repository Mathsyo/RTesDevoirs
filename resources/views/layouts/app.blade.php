<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- CSRF --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{-- Title --}}
        <title>RTesDevoirs</title>
        
        <style> html { background-color: #f4f6f9; } </style>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @vite(['resources/js/app.js', 'resources/sass/app.scss'])
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        @livewireStyles
        @stack('styles')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js" integrity="sha512-AJUWwfMxFuQLv1iPZOTZX0N/jTCIrLxyZjTRKQostNU71MzZTEPHjajSK20Kj1TwJELpP7gl+ShXw5brpnKwEg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    </head>
    
    <body class="sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse">

        <div id="app" class="wrapper">
            <div class="main-header">
                @include('layouts.nav')
            </div>
            @include('layouts.sidebar')
            <main class="content-wrapper p-5">
                @yield('content')
            </main>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
        @if (session()->has('success')) 
            <script>
                var notyf = new Notyf({dismissible: true})
                notyf.success('{{ session('success') }}')
            </script> 
        @endif
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('imageViewer', (src = '') => {
                    return {
                        imageUrl: src,
        
                        refreshUrl() {
                            this.imageUrl = this.$el.getAttribute("image-url")
                        },
        
                        fileChosen(event) {
                            this.fileToDataUrl(event, src => this.imageUrl = src)
                        },
        
                        fileToDataUrl(event, callback) {
                            if (! event.target.files.length) return
        
                            let file = event.target.files[0],
                                reader = new FileReader()
        
                            reader.readAsDataURL(file)
                            reader.onload = e => callback(e.target.result)
                        },
                    }
                })
            })
        </script>
    </body>
</html>