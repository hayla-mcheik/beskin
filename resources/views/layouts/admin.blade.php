<!DOCTYPE html><html lang="en">
<!-- Mirrored from html.nioboard.themenio.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Mar 2024 08:35:40 GMT -->
<head><meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Beskin</title><link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.css" integrity="sha512-NtU/Act0MEcVPyqC153eyoq9L+UHkd0s22FjIaKByyA6KtZPrkm/O5c5xzaia4pyCfReCS634HyQ7tJwKNxC/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style20d4.css?v1.1.2') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-rzxxIqQhuY/h/xYU9I2VBBJ4J6OHrmHqDjZCyb21ZYFTRxhU6QF5pwEcrA6OED" crossorigin="anonymous">
    <link href="{{ asset('node_modules/@fullcalendar/core/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('node_modules/@fullcalendar/daygrid/main.css') }}" rel="stylesheet" />

    <script src="{{ asset('node_modules/@fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('node_modules/@fullcalendar/daygrid/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
</head>
<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">  
        <div class="nk-main">

            @include('layouts.inc.admin.sidebar')

            <div class="nk-wrap">
                @include('layouts.inc.admin.navbar')
                @yield('content')
                <div class="position-fixed bottom-0 end-0 p-3" id="notification-div" style="z-index: 11; visibility: hidden;">
    <div id="liveToast" class="toast hide" style="margin-top: 10px; margin-bottom: 10px;" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-header">
            <img src="https://tecomsa.me/content/assets/images/new/logo70.png" height="10" class="rounded me-2" alt="...">
            <strong class="me-auto">New Vacation Request</strong>
            <small>Just Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage" class="text-white"></div>
    </div>
</div>
                @include('layouts.inc.admin.footer')
            </div>
        </div>
    </div>

</body>
@stack('scripts')
<div class="offcanvas offcanvas-end offcanvas-size-lg" id="notificationOffcanvas">
    <div class="offcanvas-header border-bottom border-light">
        <h5 class="offcanvas-title" id="offcanvasTopLabel">Recent Notification</h5><button type="button"
            class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body" data-simplebar>
        <ul class="nk-schedule">

            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">4:23 PM</span>
                        <div class="h6">Invitation for creative designs pattern</div>
                    </div>
                </div>
            </li>
       
            <li class="nk-schedule-item">
                <div class="nk-schedule-item-inner">
                    <div class="nk-schedule-symbol active"></div>
                    <div class="nk-schedule-content"><span class="smaller">3:23 PM</span>
                        <div class="h6">Assigned you to new database design project</div>
                    </div>
                </div>
            </li>
            <li class="nav-item d-flex align-items-center ">
                <div class="dropdown">
                <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton1"
                data-toggle="dropdown" aria-expanded="false">
                    <i id="notificationIcon" class="fas fa-bell"></i>
                    <span id="notificationBullet" class="badge bg-danger rounded-pill" style="visibility: hidden;"></span>
                </a>
                <!-- Notification Dropdown -->
                <ul class="dropdown-menu" id="notificationDropdown" aria-labelledby="dropdownMenuButton1">
            <span class="mx-1"> no Notification</span>
                </ul>
            </div>
            </li>
            

        </ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('admin/assets/js/bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>

<script src="{{ asset('admin/assets/js/charts/analytics-chart.js') }}"></script>
<script src="{{ asset('node_modules/@fullcalendar/core/main.js') }}"></script>
<script src="{{ asset('node_modules/@fullcalendar/daygrid/main.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
      window.addEventListener('message', event => {
          console.log('Message event triggered');
          console.log('Event details:', event.detail);
          const eventData = event.detail[0];
          alertify.set('notifier', 'position', 'top-right');
          alertify.notify(eventData.text, eventData.type);
      });
  </script>

<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.min.js"></script>

<!-- Initialize Laravel Echo -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>



<script>
document.addEventListener('DOMContentLoaded', function () {
var notificationDiv = document.getElementById("notification-div");
$('#notification-div').css('visibility', 'visible');

var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
    cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}',
});

var channel = pusher.subscribe('booking-channel');

var audioContext;

document.addEventListener('click', function () {
    if (!audioContext) {
        audioContext = new (window.AudioContext || window.webkitAudioContext)();
    }
});

channel.bind('App\\Events\\NewBookingNotification', function (data) {
    console.log('Received data:', data);
    var toast = document.getElementById("liveToast").cloneNode(true);
    var bsToast = new bootstrap.Toast(toast);
    var toastMessage = toast.querySelector("#toastMessage");

    var message = document.createTextNode("View Notification");
    var anchor = document.createElement("a");

    anchor.setAttribute("role", "button");
    anchor.setAttribute("aria-disabled", "true");
    anchor.href = url;

    var dataString = data.message || 'View Notification';
    anchor.textContent = dataString;

    toastMessage.appendChild(message);
    toastMessage.appendChild(anchor);

    bsToast.show();
    notificationDiv.appendChild(toast);

    // Add the new notification message to the dropdown
    var notificationDropdown = document.getElementById('notificationDropdown');

    // Clear existing content
    notificationDropdown.innerHTML = '';

    // Create a new list item element
    var notificationItem = document.createElement('li');

    // Update this line to correctly access the notification message from Pusher data
    var notificationContent = data.message || 'New Notification';

    if (data.message) {
        // Append a link for the notification
        notificationItem.innerHTML = `
no notification
        `;
    } else {
        notificationItem.innerHTML = `
            <a href="${url}" class="dropdown-item">
                <i class="fas fa-bell mr-2"></i>
                ${notificationContent}
            </a>
        `;
    }

    // Append the new item to the dropdown
    notificationDropdown.appendChild(notificationItem);

    console.log("New Notification");
});
});


</script>


  @livewireScripts
</html>