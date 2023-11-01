<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">
        <script src="resources/js/confetti.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            

            form .sendbutton {
                background-color: rgb(1,0,164) !important;
                color: #fff !important;
            }

            input {
                border: 1px solid #ccc;
                outline: none;
            }
            .radiolabel {
                position: relative;
            }
            .radiolabel label {
                position: relative;
                z-index: 100;
                pointer-events: none;
                display: block;
                padding: 6px 15px;
            }

            .radiolabel input {
                position: absolute;
                overflow: hidden;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
            }
            .radiolabel input::after {
                width: 100%;
                height: 100%;
                pointer-events: none;
                position: absolute;
                left: 0;
                top: 0;
                content: '';
            }
            .radiolabel input:checked::after {
                background-color: #ff9e9e !important;
            }


        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>

        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            [{ 'header': [1, 2, 3, 4, 5, 6, false] },{ 'font': [] }],
            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

            ['blockquote', 'code-block', 'image'], // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction


            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];

        var options = {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Typ iets leuks ofzo (of niet)',
            theme: 'snow'
        };
        new Quill('#editor', options)
    </script>
</html>
