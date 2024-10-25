<div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ url('/') }}" class="logo-link">
                <img src="{{ asset('assets/images/logo-png.png') }}" />
            </a>
            <div class="nk-compact-toggle me-n1">
                <button class="btn btn-md btn-icon text-light btn-no-hover compact-toggle">
                    <em class="icon off ni ni-chevrons-left"></em>
                    <em class="icon on ni ni-chevrons-right"></em>
                </button>
            </div>
            <div class="nk-sidebar-toggle me-n1">
                <button class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle">
                    <em class="icon ni ni-arrow-left"></em>
                </button>
            </div>
        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">

                    @if(auth()->user()->role_as == '1')
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/hero/banner') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa fa-image"></i></span>
                            <span class="nk-menu-text">Home Banner</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/services') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa fa-cogs"></i></span>
                            <span class="nk-menu-text">Services</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/doctors') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa fa-user-md"></i></span>
                            <span class="nk-menu-text">Doctors</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/testimonials') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><i class="fa fa-comments"></i></span>
                            <span class="nk-menu-text">Testimonials</span>
                        </a>
                    </li>
                    
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/portfolio') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-grid"></em></span>
                            <span class="nk-menu-text">Portfolio</span>
                        </a>
                    </li>
                    
      
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/blogs') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-article"></em></span>
                            <span class="nk-menu-text">Blogs</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/schedule') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span>
                            <span class="nk-menu-text">Doctors schedule</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/appointment') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-calendar-check"></em></span>
                            <span class="nk-menu-text">Appointment</span>
                        </a>
                    </li>
                    
                    <li class="nk-menu-item">
                        <a href="{{ url('admin/about') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-info"></em></span>
                            <span class="nk-menu-text">About Us</span>
                        </a>
                    </li>

                    @else 
                        @if(auth()->user()->role_as == '2')
                        <!-- Code for role 2 -->
                        @else
                            @if(auth()->user()->role_as == '4')
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link">
                                    <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                    <span class="nk-menu-text">Profile</span>
                                </a>
                            </li>
                            @endif
                        @endif
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('admin/assets/js/bundle.js') }}"></script>
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
@endpush
