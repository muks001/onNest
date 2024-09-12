<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel='stylesheet' type='text/css' media='screen' href='{{asset("css/custom.css")}}'>
        <link rel='stylesheet' type='text/css' media='screen' href='{{asset("css/bootstrap.min.css")}}'>
        <link rel="stylesheet" type="text/css" href='{{asset("css/sweetalert.min.css")}}'>

        <!-- Scripts -->
        @yield('css')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div id="app">
            <main>
                <div class="sidebar">
                    <div class="logo">
                        <img src="{{asset('images/logo1.png')}}" alt="logo" />
                    </div>
                    <ul class="menu">
                        <li class="item">
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="item sub-btn {{request()->is('admin/category*')?'sub-btn-active':''}} ">
                            <a href="javascript:void(0)">Users</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{route('admin.users')}}" class="sub-item">Users</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.users.create')}}" class="sub-item">Add Users</a>
                                </li>
                            </ul>
                        </li>

                    
                  
                    </ul>
                </div>
                <div class="dashboard-wrapper">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid p-0">
                            <button class="hamburger-menu" id="hamburgerMenu">
                                <img src="{{asset('images/hamburger-menu.svg')}}" alt="Hamburger Menu"/>
                            </button>
                            <div class="navbar-collapse">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown user-dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="{{asset('images/icon-user.png')}}" alt="Notification" /> {{Auth::user()->name}}
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">My Profile</a></li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="content-card">
                        <div class="content-outer">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>


        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    
    
        <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/dataTables.bootstrap5.min.js')}}"></script>
        <script type="text/javascript" >
             $(document).ready(function() {
    
    $(document).on('click', 'li.sub-btn', function() {
        $(this).siblings().find('.sub-menu').slideUp();
        $(this).find('.sub-menu').slideToggle();
        $(this).siblings().removeClass('sub-btn-active');
        $(this).toggleClass('sub-btn-active');
    });
    // Hamburger menu toggle
    $('#hamburgerMenu').on('click', function(){
        $('body').toggleClass('sidebar-active');
    });
    //Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    //Alert auto hide
    $(".custom-alert-msg").fadeTo(2000, 500).slideUp(500, function(){
        $(".custom-alert-msg").slideUp(500);
    });
    // File Input for Images - with preview
    if($('.image-input').length) {
        function inputFileValue() {
            $input = $('#imageInput');
            if($input.val().length > 0) {
                fileReader = new FileReader();
                fileReader.onload = function (data) {
                    $('.image-preview').attr('src', data.target.result);
                }
                fileReader.readAsDataURL($input.prop('files')[0]);
                $('.image-button').css('display', 'none');
                $('.image-preview').css('display', 'block');
                $('.change-image').css('display', 'block');
            }
        }
        $('#imageInput').on('change', function() {
            inputFileValue();
        });
        $('.change-image').on('click', function() {
            $control = $(this);			
            $('#imageInput').val('');	
            $preview = $('.image-preview');
            $preview.attr('src', '');
            $preview.css('display', 'none');
            $control.css('display', 'none');
            $('.image-button').css('display', 'flex');
        });            
    }
});


        </script>
        
    </body>
</html>
