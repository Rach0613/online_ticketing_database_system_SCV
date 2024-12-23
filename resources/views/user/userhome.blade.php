@extends('layout')

@section('title', 'User Dashboard')

@section('content')
<div>
    <div class="row">
        <!-- Main Content -->
        <div class="col-12 p-4">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <div class="banner-overlay"></div> <!-- Overlay element -->
                <h2>Welcome, {{ auth()->user()->name }}! Explore Cultural Events</h2>
                <p>Discover Sarawak's cultural heritage through vibrant performances at the Sarawak Cultural Village</p>
            </div>

            <!-- Upcoming Events -->
            <h4 class="text-white mb-4">Upcoming Events</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="ticket-card">
                        <h5>Gawai Festival</h5>
                        <p class="event-date">June 1-2, 2024</p>
                        <p>Celebrate the Dayak community’s most significant festival with music, dance, and traditional foods.</p>
                        <a href="/comingsoon">
                        <button class="btn btn-modern w-100">Learn More</button>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ticket-card">
                        <h5>Sape Workshop</h5>
                        <p class="event-date">June 15, 2024</p>
                        <p>Join a masterclass on playing the Sape, Sarawak's unique string instrument.</p>
                        <a href="/comingsoon">
                        <button class="btn btn-modern w-100">Learn More</button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Featured Experiences -->
            <h4 class="text-white mb-4 mt-5">Featured Experiences</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="movie-poster" style="background-image: url('../images/traditional_perf.avif');"></div>
                    <h5 class="text-center mt-3 text-white">Traditional Dance Performance</h5>
                </div>
                <div class="col-md-4">
                    <div class="movie-poster" style="background-image: url('../images/SCV_food.jpg');"></div>
                    <h5 class="text-center mt-3 text-white">Sarawak Cuisine Tasting</h5>
                </div>
            </div>

            <!-- Account Details Section -->
            <div class="account-details mt-5">
                <h4 class="text-white mb-4">Account Details</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user-name" class="form-label text-white">Full Name</label>
                            <input type="text" class="form-control" id="user-name" placeholder="Enter your full name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user-email" class="form-label text-white">Email Address</label>
                            <input type="email" class="form-control" id="user-email" placeholder="Enter your email address" value="{{ auth()->user()->email }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="user-phone" class="form-label text-white">Phone Number</label>
                            <input type="tel" class="form-control" id="user-phone" placeholder="Enter your phone number" value="{{ auth()->user()->phone }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="user-nationality" class="form-label text-white">Nationality</label>
                            <select id="user-nationality" name="user-nationality" class="form-control" required>
                                <option value="Sarawakian">Malaysia: Sarawakian</option>
                                <option value="Malaysian">Malaysian: Non-Sarawakian</option>
                                <option value="Non-Malaysian">Non-Malaysian</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('userhome_styles')
<style>
/* Root Variables */
:root {
    --primary-red: #FF3B3B;
    --primary-yellow: #FFD93D;
    --primary-black: #1A1A1A;
    --accent-color: #4C1C8C;
    --gradient-1: linear-gradient(45deg, #FF3B3B, #FF8C32);
    --gradient-2: linear-gradient(45deg, #4C1C8C, #8C1C4C);
    --dark-bg: #121212;
}

/* Global Styles */
body {
    background-color: var(--dark-bg);
    color: #f8f9fe;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 100%
}

/* Styles specific to the userhome navbar */
#user-navbar {
    margin: 0; /* No additional margins */
    padding: 0.8rem 1.5rem;
}
.navbar-toggler {
    position: relative; /* Ensures proper positioning of the text */
    padding: 0.5rem 1rem;
}

.navbar-toggler .navbar-toggler-text {
    margin-left: 0.5rem;
    font-size: 1rem;
    color: white; /* Adjust to your theme */
}


/* Adjustments for smaller screens */
@media (max-width: 768px) {
    #user-navbar {
        margin: 3px;
        padding: 1rem; /* Add padding for better spacing */
    }

    .navbar-toggler{
        margin-bottom: 8px;
    }

    #user-navbar .nav-item {
        margin-bottom: 0.5rem; /* Add spacing between links */
    }

    #user-navbar .nav-link {
        text-align: center; /* Center-align links */
    }
}

#user-navbar.navbar {
    background-color: var(--dark-bg);
    border-top: 2px solid var(--accent-color);
    border-bottom: 2px solid var(--accent-color);
}

#user-navbar .nav-link {
    color: var(--primary-yellow);
    padding: 0.8rem 1rem;
    border-radius: 8px;
    margin-left: 5px;
}

#user-navbar .nav-link:hover,
#user-navbar .nav-link.active  {
    color: #FFF;
    background-color: var(--accent-color);
}

/* Welcome Banner */
.welcome-banner {
    position: relative;
    background-color: #4C1C8C;
    color: white;
    padding: 2.5rem;
    margin-bottom: 2rem;
    border-radius: 20px;
    overflow: hidden;
    text-align: center;
}

.banner-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('../images/img_overlay.jpg');
    background-size: cover;
    background-position: center;
    filter: brightness(0.6) contrast(1.2) saturate(1.3);
    opacity: 0.7;
    z-index: 1;
    transition: opacity 0.3s ease-in-out;
}

.welcome-banner h2,
.welcome-banner p {
    position: relative;
    z-index: 2;
    font-weight: 700;
}

.welcome-banner h2 {
    font-size: 2.5rem;
}

.welcome-banner p {
    font-size: 1.2rem;
    max-width: 70%;
    margin: 0 auto;
}



/* Ticket Card */
.ticket-card {
    background-color: #1a1a1a;
    color: #FFF;
    border: 1px solid #333;
    border-radius: 10px;
    padding: 1.2rem;
    transition: all 0.3s ease;
}

.ticket-card:hover {
    background: black;
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.4);
}

.ticket-card .event-date {
    font-weight: bold;
    color: var(--primary-red);
}

/* Movie Posters */
.movie-poster {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease;
    height: 280px;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.movie-poster:hover {
    transform: scale(1.05);
}

/* Buttons */
.btn-modern {
    background: var(--gradient-1);
    color: white;
    border-radius: 5px;
    padding: 0.7rem 1.2rem;
    border: none;
    transition: background 0.3s ease;
}

.btn-modern:hover {
    background: var(--gradient-2);
    transform: translateY(-2px);
}

/* Account Details */
.account-details {
    background-color: rgba(0, 0, 0, 0.262);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 5px 5px 5px rgba(254, 253, 253, 0.542);
}

.form-label {
    font-size: 1.1rem;
}

.form-control {
    border-radius: 10px;
    box-shadow: none;
    border: 1px solid #e0e0e0;
}

.form-control:focus {
    border-color: #4c1c8c;
    box-shadow: 0 0 0 3px rgba(76, 28, 140, 0.2);
}

.btn-success {
    border-radius: 10px;
    padding: 0.8rem 1.5rem;
    font-weight: bold;
}

.btn-success:hover {
    background-color: var(--primary-red);
}

/* Notification Badge */
.notification-badge {
    position: relative;
    display: inline-flex;
    cursor: pointer;
    align-items: center;
    transition: transform 0.3s ease;
}

.badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #f44336;
    color: white;
    padding: 5px 10px;
    border-radius: 50%;
    font-size: 1rem;
}

.badge-pulse {
    animation: pulse 1s ease infinite;
}

/* Pulse Animation */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}

.notification-badge:hover .badge {
    animation: pulse 1s ease infinite;
}

.notification-badge:hover .fa-bell {
    animation: pulse 1s ease infinite;
}

</style>
@endpush
