@extends('layout')

@section('title', 'Ticket')

@section('content')
    <!-- Add a unique parent container -->
    <div class="ticket-page mb-5">
        <!-- Main Content -->
        <div class="container mt-5">
            <h1 class="text-center section-title">My Tickets</h1>

            <div class="ticket-card-container">
                @foreach($bookings as $booking)
                <div class="col">
                    <div class="ticket-card">
                        <h5 class="capitalize">{{ $booking->show->slot }} Show</h5>
                        <p><i class="fas fa-calendar-alt me-2"></i>{{ $booking->show->date }}</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Sarawak Cultural Village</p>
                        <p><i class="fas fa-couch me-2"></i>Seats: 
                            @foreach($booking->seats as $seat)
                                {{ $seat->row }}{{ $seat->number }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </p>
                        <a href="/comingsoon">
                            <button class="btn btn-view-ticket w-100">View Ticket</button>
                        </a>
                    </div>
                </div>
                @endforeach

                {{-- <!-- Ticket 1 -->
                <div class="col">
                    <div class="ticket-card">
                        <h5>Gawai Festival</h5>
                        <p><i class="fas fa-calendar-alt me-2"></i>June 1-2, 2024</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Sarawak Cultural Village</p>
                        <p>Celebrate the Dayak community’s most significant festival with music, dance, and traditional foods.</p>
                        <a href="/comingsoon">
                        <button class="btn btn-view-ticket w-100">View Ticket</button>
                        </a>
                    </div>
                </div>

                <!-- Ticket 2 -->
                <div class="col">
                    <div class="ticket-card">
                        <h5>Sape Workshop</h5>
                        <p><i class="fas fa-calendar-alt me-2"></i>June 15, 2024</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Sarawak Cultural Village</p>
                        <p>Join a masterclass on playing the Sape, Sarawak's unique string instrument.</p>
                        <a href="/comingsoon">
                        <button class="btn btn-view-ticket w-100">View Ticket</button>
                        </a>
                    </div>
                </div>

                <!-- Ticket 3 -->
                <div class="col">
                    <div class="ticket-card">
                        <h5>Bamboo Craft Workshop</h5>
                        <p><i class="fas fa-calendar-alt me-2"></i>June 20, 2024</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i>Sarawak Cultural Village</p>
                        <p>Learn the art of crafting bamboo items in this interactive workshop.</p>
                        <a href="/comingsoon">
                        <button class="btn btn-view-ticket w-100">View Ticket</button>
                        </a>
                    </div>
                </div>
            </div> --}}

            {{-- <!-- Load More Tickets -->
            <div class="text-center mt-4">
                <button class="btn btn-load-more">Load More Tickets</button>
            </div> --}}
        </div>
    </div>
@endsection

@push('tickets_styles')
    <!-- External Stylesheets -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- Internal Styles -->
    <style>
        /* General Styling */
        :root {
            --primary-red: #FF3B3B;
            --primary-yellow: #FFD93D;
            --primary-black: #1A1A1A;
            --accent-color: #4C1C8C;
            --gradient-1: linear-gradient(45deg, #FF3B3B, #FF8C32);
            --gradient-2: linear-gradient(45deg, #4C1C8C, #8C1C4C);
            --dark-bg: #121212;
        }

        body {
            background-color: black;
            color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('../images/sarawak_perf.jpg'), linear-gradient(to bottom right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 50%);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        /* Scoped Navbar Styling for Ticket Page */
        .ticket-page .navbar {
            background-color: #121212;
            color: gold;
        }

        .ticket-page .navbar a {
            color: gold;
        }

        .ticket-page .navbar a:hover {
            color: #adb5bd;
        }

        /* Section Title Styling */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            color: #FFD93D;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        /* Ticket Card Styling */
        .ticket-card {
            background-color: #292b36;
            border-radius: 15px;
            padding: 20px;
            color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s;
            margin: 5px;
            height: 100%;
        }

        .capitalize {
            text-transform: capitalize;
        }


        .ticket-card:hover {
            transform: scale(1.05);
            background-color: #1a1a1a;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
        }

        /* Buttons */
        .btn-view-ticket, .btn-load-more {
            background-color: #198754;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-view-ticket:hover, .btn-load-more:hover {
            background-color: #145c32;
            transform: scale(1.05);
        }

        /* Grid Layout */
        .ticket-card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .ticket-card-container .col {
            display: flex;
            justify-content: center;
        }
    </style>
@endpush