<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/grin/default/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Mar 2024 14:10:01 GMT -->
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/boxicons.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/flaticon-two.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/countrySelect.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/dark.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<title>Beskin</title>

<style>
    /* https://www.youtube.com/watch?v=neWDNG2iX7I */
            body::-webkit-scrollbar {
            width: 10px;
        }

        body::-webkit-scrollbar-track {
            background: #fff;
        }

        body::-webkit-scrollbar-thumb {
            background-color: #6A7460;
            border-radius: 0px;
            border: 2px solid #6A7460;
        }
        body, html {
    margin: 0;
    padding: 0;
    width: 100%;
    height: 100%;
    cursor: none; /* Hide the default cursor */
}

.custom-cursor, .custom-cursor-inner {
    position: fixed; /* Change to fixed positioning */
    border-radius: 1px;
    pointer-events: none; /* Ensure the cursor does not block interactions */
    transition: transform 0.1s ease-out;
    transform: translate(-50%, -50%);
    z-index: 999999; /* Ensure it is on top */
}

.custom-cursor {
    width: 10px;
    height: 10px;
    background-color: #6A7460;
    transition: width 0.3s ease, height 0.3s ease, background-color 0.3s ease;
}

.custom-cursor-inner {
    width: 8px;
    height: 8px;
    background-color: #6A7460;
    transition: transform 0.1s ease-out;
}
        </style>
@livewireStyles
</head>
<body class="position-relative">
    <div class="custom-cursor"></div>
    <div class="custom-cursor-inner"></div>
    @include('layouts.inc.frontend.navbar')

            @yield('content')

      
            @include('layouts.inc.frontend.footer')
     

    @stack('scripts')
    

    
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
    
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/nice-select.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/countrySelect.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
    
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        function sendMessage() {
            var phoneNumber = '+96176620245';
            var message = encodeURIComponent("Hello, how can we assist you");
            var whatsappLink = 'https://wa.me/' + phoneNumber + '?text=' + message;
            window.open(whatsappLink, '_blank');
        }
        // script.js
// script.js
document.addEventListener('DOMContentLoaded', () => {
    const customCursor = document.querySelector('.custom-cursor');
    const customCursorInner = document.querySelector('.custom-cursor-inner');

    document.addEventListener('mousemove', (e) => {
        customCursor.style.left = `${e.clientX}px`;
        customCursor.style.top = `${e.clientY}px`;

        customCursorInner.style.left = `${e.clientX}px`;
        customCursorInner.style.top = `${e.clientY}px`;
    });

    document.querySelectorAll('a, button').forEach(el => {
        el.addEventListener('mouseover', () => {
            customCursor.style.width = '20px';
            customCursor.style.height = '20px';
            customCursor.style.backgroundColor = 'rgba(0, 0, 255, 0.2)';
        });

        el.addEventListener('mouseout', () => {
            customCursor.style.width = '10px';
            customCursor.style.height = '10px';
            customCursor.style.backgroundColor = 'rgba(193, 11, 111, 0.2)';
        });
    });
});

        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const customCursor = document.querySelector('.custom-cursor');
                const customCursorInner = document.querySelector('.custom-cursor-inner');
                docuement.addEventListener('mousemove', (e) => {

                });
                
            });
            </script>
    @livewireScripts
    </body>
    
    <!-- Mirrored from templates.hibootstrap.com/grin/default/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Mar 2024 14:10:14 GMT -->
    </html>