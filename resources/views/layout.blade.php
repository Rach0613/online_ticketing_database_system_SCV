<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sarawak Culture Village')</title>
    <link rel="icon" href="{{ asset('images/SCV Logo.png') }}" type="image/png">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @stack('home_styles')
    @stack('admin_styles')
    @stack('timedate_styles')
    @stack('seat_styles')
    @stack('checkout_styles')
    @stack('payment_styles')
    @stack('userhome_styles')
    @stack('userLogin_styles')
    @stack('forgetPass_styles')
    @stack('signUp_styles')
    @stack('signUp2_styles')
    @stack('signUp3.styles')
    @stack('tickets_styles')
    @stack('contact_styles')
    @stack('about_styles')
    @stack('team_styles')
    @stack('Admin_dahsboard_styles')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/SCV Logo.png') }}" alt="Sarawak Culture Village Logo" height="40">
            </a>
            <span class="navbar-text text-white">Sarawak Cultural Village</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ourteam">Team Page</a>
                    </li>
                </ul>

                <!-- Log In Dropdown -->
                <div class="d-flex align-items-center">
                    @if(Auth::guard('admin')->check())
                        <div class="d-flex align-items-center">
                            <span class="text-light me-3">
                                <i class="fas fa-user-shield"></i> Hi Admin, {{ Auth::guard('admin')->user()->name }}!
                            </span>
                            <button class="btn btn-danger" onclick="window.location='{{ route('admin.logout') }}'">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </div>
                    @elseif(Auth::guard('web')->check())
                        <span class="text-light me-3">
                            Welcome, {{ Auth::guard('web')->user()->name }}!
                        </span>
                        <button class="btn btn-danger" onclick="window.location='{{ route('account.logout') }}'">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    @else
                        <div class="dropdown auth-buttons">
                            <button class="btn btn-warning me-2" onclick="window.location='{{ route('account.register') }}'">Sign Up</button>
                            <button class="btn btn-warning dropdown-toggle" type="button" id="loginDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                Log In
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="loginDropdown">
                                <li><a class="dropdown-item" href="{{ route('account.login') }}">User Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Horizontal Navigation Bar (For Logged-in Users and Admins Only) -->
    @if(Auth::guard('web')->check())
        <nav id="user-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-text">Menu</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('account.dashboard') }}">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ticketsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ticket me-2"></i>Tickets
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ticketsDropdown">
                                <li><a class="dropdown-item" href="{{ route('all_tickets') }}">View Tickets</a></li>
                                <li><a class="dropdown-item" href="{{ route('ticket.timedate') }}">Purchase Tickets</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @elseif(Auth::guard('admin')->check())
        <nav id="user-navbar" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-text">Menu</span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ticketsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-tachometer-alt me-2"></i>Admin Tools
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="ticketsDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.getcontactus') }}">Contact Us Form</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Users List</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.shows.index') }}">Manage Shows</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.bookings.index') }}">View Bookings</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    <!-- Main Content -->
    <div>
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3">
        <p class="mb-1" style="margin-left: 2vw; margin-right:2vw">
            <strong>Address:</strong> Cultural Village Sdn. Bhd., Pantai Damai, Santubong, P.O.Box 2632, 93752 Kuching, Sarawak, Malaysia.
        </p>
        <p class="mb-1" style="margin-left: 2vw; margin-right:2vw">
            <strong>Contact Number:</strong> (6082) 846 108 / (6082) 846 078 / (6082) 846 988
        </p>
        <p class="mb-1" style="margin-left: 2vw; margin-right:2vw">
            <strong>Email:</strong> scv4you@gmail.com
        </p>
        <p>
            <a href="https://www.facebook.com/SarawakCulturalVillageOFFICIAL/" target="_blank" class="text-warning mx-2">Facebook</a>
            <a href="https://www.instagram.com/sarawakcv/" target="_blank" class="text-warning mx-2">Instagram</a>
        </p>
        <p class="mt-2">&copy; 2024 Sarawak Cultural Village. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
