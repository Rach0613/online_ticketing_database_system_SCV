@extends('layout')

@section('content')
<!-- Hero Section with Background Image and Overlay Form -->
<div class='bg-dark navbar-dark'>
<div class="hero-section">
    <div class="overlay">
        <h1>ONLINE EXCLUSIVE DEALS</h1>
        <!-- Display Validation Errors -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- Booking Form -->
    <form action="{{ route('ticket.timedate.store') }}" method="POST" class="search-box">
        @csrf
        <!-- Top Section: Date, Adults, and Children -->
        <div class="form-group row top-fields">
            <!-- Date Field -->
            <div class="col-12 col-sm-4 col-md-3">
                <label for="date" class="text-white">DATE</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <!-- Adults Field -->
            <div class="col-12 col-sm-4 col-md-3">
                <label for="adults" class="text-white">ADULT</label>
                <input type="number" name="adults" id="adults" min="1" value="1" class="form-control" required>
            </div>

            <!-- Children Field -->
            <div class="col-12 col-sm-4 col-md-3">
                <label for="children" class="text-white">CHILD</label>
                <input type="number" name="children" id="children" min="0" value="0" class="form-control">
            </div>
        </div>

        <!-- Middle Section: Ticket Cards -->
        <div class="ticket-cards row">
            <div class="ticket-card col-12 col-sm-6 col-md-4 col-lg-3">
                <input type="radio" name="slot" value="morning" id="morning" required hidden>
                <label for="morning">
                    <h3>Morning Show</h3>
                    <p>10:00AM - 12:00PM</p>
                </label>
            </div>
            <div class="ticket-card col-12 col-sm-6 col-md-4 col-lg-3">
                <input type="radio" name="slot" value="afternoon" id="afternoon" required hidden>
                <label for="afternoon">
                    <h3>Afternoon Show</h3>
                    <p>01:00PM - 03:00PM</p>
                </label>
            </div>
            <div class="ticket-card col-12 col-sm-6 col-md-4 col-lg-3">
                <input type="radio" name="slot" value="evening" id="evening" required hidden>
                <label for="evening">
                    <h3>Evening Show</h3>
                    <p>04:00PM - 06:00PM</p>
                </label>
            </div>
        </div>

        <!-- Bottom Section: Search Button -->
        <div class="search-btn-container">
            <button type="submit" class="search-btn">Search</button>
        </div>
    </form>     
    </div>
</div>

<div class="container mt-3 bg-dark text-white border border-light rounded safe">
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#aboutMovie">About the Show</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Ticket">What do you get?</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#question">Questions?</a>
        </li>
    </ul>


    <!-- Tab panes -->
    <div class="tab-content dark-bg p-4 rounded">
        <!-- About the Show -->
        <div id="aboutMovie" class="tab-pane active">
            <h3 style="color: #FF3B3B">About the Show</h3>
            <p style="text-align: justify;">
                Sarawak Cultural Village’s award-winning dancers and musicians present their famous multi-cultural performances. Spectacular costumes and elegant dance routines provide an entertaining and enjoyable introduction to Sarawak’s ethnic groups and their cultures. 
                Our dance troupe brings fame to the land, creating awes and gasps from Australia to the Americas and across the globe. Charming Orang Ulu maidens following the pattern of the hornbills or the rugged Iban warrior performing the ngajat, shield in hand, dancing with the rhythm of deep gongs and rainforest musical instruments.
            </p>
        </div>
        

        <!-- What Do You Get -->
        <div id="Ticket" class="tab-pane fade">
            <h3 style="color: #FF3B3B">What Do You Get?</h3>
            <div class="features-boxes d-flex flex-wrap gap-3 justify-content-center">
                <div class="feature-box text-center p-3 bg-secondary rounded">
                    <h2 style="border-bottom: #4C1C8C dashed 2px; font-weight: 700;">Entrance Ticket</h2>
                    <p>Daily access to all attractions. Unlimited visit to all the cultural house.</p>
                </div>
                <div class="feature-box text-center p-3 bg-secondary rounded">
                    <h2 style="border-bottom: #4C1C8C dashed 2px; font-weight: 700;">Food & Drinks</h2>
                    <p>Set of meals provided with the ticket. Wonderful Sarawak Local foods waiting for you!</p>
                </div>
                <div class="feature-box text-center p-3 bg-secondary rounded">
                    <h2 style="border-bottom: #4C1C8C dashed 2px; font-weight: 700;">Cultuverse</h2>
                    <p>Enjoy different culture in Sarawak!</p>
                </div>
            </div>
        </div>

        <!-- Questions -->
        <div id="question" class="tab-pane fade">
            <h3 style="color: #FF3B3B">Any Questions?</h3>
            <p>Please contact us, <a href="/contact" class="text-warning">click here</a>.</p>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ticketCards = document.querySelectorAll('.ticket-card');

        ticketCards.forEach(card => {
            card.addEventListener('click', () => {
                // Remove active class from all cards
                ticketCards.forEach(c => c.classList.remove('active'));
                
                // Add active class to the clicked card
                card.classList.add('active');
            });
        });
    });
</script>
@endsection

@push('timedate_styles')
<style>
:root {
    --dark-bg: #121212;
    --text-white: #fff;
    --accent-color: #FFD93D;
    --primary-color: #4C1C8C;
    --highlight-color: #f9a825;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    background-color: var(--dark-bg);
    color: #f8f9fe;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    width: 100%;
}

/* Hero Section */
.hero-section {
    background-image: url('{{ asset("images/IMG_5516 (1).JPG") }}');
    background-size: cover;
    background-position: center;
    text-align: center;
    position: relative;
    color: var(--text-white);
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 3rem 1rem; /* Adjusted padding for better spacing */
    min-height: 80vh; /* Full screen height */
}

/* Overlay Styling */
.overlay {
    background-color: rgba(0, 0, 0, 0.7); /* Adds a dark transparent background */
    padding: 2rem 1rem;
    width: 95%;
    max-width: 900px; /* Adjusted width for better alignment */
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Adds depth with shadow */
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 20px; /* Spacing between elements */
}

/* Form Styling */
.search-box {
    display: flex;
    flex-direction: column; /* Stack all items */
    align-items: center;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.1); /* Transparent background */
    box-shadow: 5px 5px 5px 5px rgba(254, 253, 253, 0.542);
    border: 3px solid var(--primary-color);
    padding: 1.5rem;
    border-radius: 10px;
    gap: 20px; /* Add spacing between form sections */
}

/* Top Fields Styling */
.top-fields {
    display: flex;
    justify-content: space-between;
    width: 100%;
    gap: 20px;
}

/* Ticket Cards Styling */
.ticket-cards {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    width: 100%;
}

/* Search Button Styling */
.search-btn-container {
    display: flex;
    justify-content: center;
    width: 100%;
    margin-top: 20px;
}

.search-btn {
    background-color: var(--primary-color);
    color: var(--text-white);
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-btn:hover {
    background-color: #ba70ef;
}

.form-control {
    width: 100%;
    padding: 0.5rem;
    border-radius: 4px;
    border: 1px solid #ddd;
    margin-top: 0.5rem;
}

/* Button */
.search-btn{
    padding: 0.5rem 1rem;
    background-color: #4CAF50;
    color: var(--text-white);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.ticket-card button {
    padding: 0.5rem 1rem;
    background-color: var(--primary-color);
    color: var(--text-white);
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-btn:hover, .ticket-card button:hover {
    background-color: #ba70ef;
}

/* Ticket Cards */
.ticket-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-top: 1rem;
    margin-bottom: 1rem;
    justify-content: center;
}

.ticket-card {
    background-color: rgba(255, 255, 255, 0.5);
    padding: 1.5rem;
    border-radius: 8px;
    transition: transform 0.3s ease;
    width: 100%;
    flex: 1;
    margin: 0 0.5rem;
    min-width: 235px;
    max-width: 650px;
    text-align: center;
    border: var(--highlight-color) 10px;
}

.ticket-card:hover {
    transform: translateY(-5px);
    border:var(--primary-color) dotted 2px;
}

.ticket-card.active {
    border:var(--primary-color) dotted 2px;
    background-color: rgba(255, 217, 61, 0.2);
    transform: scale(1.05);
}


.ticket-card h3 {
    margin-bottom: 0.5rem;
}

.ticket-card p {
    font-size: 1rem;
    margin: 0.5rem 0;
}

/* About Section */
.about-section, .features-section {
    padding: 2rem;
    text-align: center;
}

.about-section h2, .features-section h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 1rem;
}

.features-boxes {
    display: flex;
    justify-content: center;
    gap: 1.5rem;
    flex-wrap: wrap;
}

/* Feature Box */
.feature-box {
    background-color: #f3f3f3;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    flex: 1 1 100%;
    max-width: 300px;
    margin-bottom: 1rem;
    background: linear-gradient(45deg, #FF3B3B, #FF8C32);
}

.feature-box h3 {
    color: #4e73df;
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .overlay {
        width: 95%;
        padding: 1.5rem;
    }

    .ticket-cards {
        grid-template-columns: 1fr;
    }

    .form-group .col-12 {
        flex: 1 1 100%;
    }

    .ticket-card {
        width: 100%;
    }
}

@media (min-width: 576px) {
    .ticket-card {
        width: 50%;
    }

    .feature-box {
        flex: 1 1 45%;
    }
}

@media (min-width: 768px) {
    .ticket-card {
        width: 35%;
    }

    .form-group .col-md-3 {
        flex: 1 1 23%;
    }

    .feature-box {
        flex: 1 1 30%;
    }
}

@media (min-width: 1024px) {
    .ticket-card {
        width: 25%;
    }

    .feature-box {
        flex: 1 1 22%;
    }
}

/* Form Group */
.form-group label {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 5px;
    padding-right: 15px;
}

.form-group input, .form-group select {
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-align: center;
}

/* Tabs Styling */
.nav-tabs .nav-link {
    color: var(--text-white);
    background-color: transparent;
    border: none;
}

.nav-tabs .nav-link.active {
    color: black;
    background-color: var(--accent-color);
    font-weight: bold;
    border: 1px solid #444;
}
</style>
@endpush
