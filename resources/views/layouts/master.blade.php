<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/input-absensi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit_absensi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/update_jadwal.css') }}">
    <title>WRI Attendance | Sistem Absensi Miniclass</title>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="sidebar" id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="" class=""><img src="{{ asset('img/wri-logo-white.png') }}" alt="wri-polinema"></a>
            </div>
            <div class="list-group rounded-0">
                <a class="list-group-item d-inline-block text-truncate active" href="#!"><i class="fa-solid fa-border-all" style="padding-right: 12px;"></i>
                    <span>Dashboard</span></a>
                <a class="list-group-item d-inline-block text-truncate" href="#!"><i class="fa-solid fa-user" style="padding-right: 12px;"></i>
                    <span>Crud User</span></a>
                <a class="list-group-item d-inline-block text-truncate" href="#!"><i class="fa-solid fa-clipboard-user" style="padding-right: 14px;"></i><span>Update
                        Absensi</span></a>
                <a class="list-group-item d-inline-block text-truncate text-hover-red" href="#!"><i class="fa-solid fa-arrow-right-from-bracket" style="padding-right: 10px;"></i>
                    <span>Log
                        Out</span></a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid py-3 px-4">
                    <a class="btn-bar" id="sidebarToggle"><i class="fa-solid fa-bars"></i></a>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown ">
                            <a class="nav-link position-relative" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-sm-hidden">Dikhi Achmad Dani</span> <span class="item-users"><i class="fa-solid fa-user"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end my-2 position-absolute" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-hover-red" href=""><i class="fa-solid fa-arrow-right-from-bracket text-red" style="padding-right: 10px;"></i>Logout</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- page content --}}
            @yield('content')
            {{-- end page content --}}
        </div>
    </div>
</body>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/chart.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@yield('overrideScript')

</html>