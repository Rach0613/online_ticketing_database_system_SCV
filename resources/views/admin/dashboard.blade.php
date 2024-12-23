@extends('layout')

@section('title', 'Admin Dashboard')
@section('content')
    <div class="dashboard-animation">
        <div id="sky">
            <div id="moon"></div>
            <div class="star star-1"></div>
            <div class="star star-2"></div>
            <div class="star star-3"></div>
            <div class="star star-4"></div>
            <div class="star star-5"></div>
            <div class="star star-6"></div>
            <div class="star star-7"></div>
            <div class="star star-8"></div>
            <div class="star star-9"></div>
            <div class="star star-10"></div>
            <div class="star star-11"></div>
            <div class="star star-12"></div>
            <div class="blink blink-1"></div>
            <div class="blink blink-2"></div>
            <div class="blink blink-3"></div>
            <div class="blink blink-4"></div>
            <div class="blink blink-5"></div>
            <div class="blink blink-6"></div>
            <div class="blink blink-7"></div>
            <div class="blink blink-8"></div>
            <div class="blink blink-9"></div>
            <div class="blink blink-10"></div>
            <div style="text-align: center;">
                <img src="{{ asset('images/SCV Logo.png') }}" alt="Sarawak Culture Village Logo" class="img-fluid" style="max-height: 150px;">
                <br>
                <h2>Hello Admin, {{ Auth::guard('admin')->user()->name }}!</h2>
                <p><span id="date-time"></span></p>
            </div>
            
        </div>
    </div>
    <script>
        function updateDateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
            document.getElementById('date-time').textContent = now.toLocaleDateString('en-US', options);
        }
    
        // Update every second
        setInterval(updateDateTime, 1000);
        updateDateTime(); // Initial call
    </script>
@endsection

@push('Admin_dahsboard_styles')
<style>
    /* ------------ Reset ------------ */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        width: 100%;
        height: 100%;

        font-family: Arial, sans-serif;
    }

    /* ------------ Container ------------ */
    .dashboard-animation {
        position: relative;
        width: 100%;
        height: 60vh; /* Place between navbar and footer */
        overflow: hidden;
    }

    /* Sky Background */
    #sky {
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, #0d1b2a, #1b263b);
    display: flex; /* Enables Flexbox */
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    text-align: center; /* Aligns text properly */
}

    /* Moon */
    #moon {
        position: absolute;
        top: 10%;
        right: 15%;
        width: 80px;
        height: 80px;
        background: #f2f542;
        border-radius: 50%;
        box-shadow: 0 0 40px 15px rgba(242, 245, 66, 0.5);
        z-index: 1000;
    }

    /* Stars */
    .star {
        position: absolute;
        width: 1px;
        height: 1px;
        background: #fff;
        border-radius: 50%;
        opacity: 0;
        animation: fall 5s linear infinite;
        z-index: 800;
    }

    .star::after {
        content: "";
        display: block;
        border: solid;
        border-width: 60px 0 60px 2px;
        border-color: transparent transparent rgba(255, 255, 255, 1) transparent;
        transform: rotate(45deg);
        box-shadow: 0 0 2px rgba(255, 255, 255, 0.5);
    }

    .star-1 { top: 5%; left: 10%; animation-delay: 1.2s; }
    .star-2 { top: 10%; left: 25%; animation-delay: 2.1s; }
    .star-3 { top: 15%; left: 50%; animation-delay: 2.8s; }
    .star-4 { top: 20%; left: 70%; animation-delay: 3.5s; }
    .star-5 { top: 30%; left: 40%; animation-delay: 1.7s; }
    .star-6 { top: 40%; left: 60%; animation-delay: 2.4s; }
    .star-7 { top: 50%; left: 20%; animation-delay: 1.5s; }
    .star-8 { top: 60%; left: 80%; animation-delay: 3s; }
    .star-9 { top: 70%; left: 50%; animation-delay: 1.8s; }
    .star-10 { top: 80%; left: 10%; animation-delay: 4.2s; }
    .star-11 { top: 85%; left: 75%; animation-delay: 2.6s; }
    .star-12 { top: 90%; left: 30%; animation-delay: 3.8s; }



    /* Blinking Stars */
    .blink {
        position: absolute;
        width: 3px;
        height: 3px;
        background: #fff;
        border-radius: 50%;
        animation: blingbling 3s linear infinite;
    }

    .blink-1 { top: 10%; left: 15%; animation-delay: 1.2s; }
    .blink-2 { top: 20%; left: 35%; animation-delay: 1.8s; }
    .blink-3 { top: 30%; left: 55%; animation-delay: 2.3s; }
    .blink-4 { top: 40%; left: 70%; animation-delay: 2.6s; }
    .blink-5 { top: 50%; left: 20%; animation-delay: 1.5s; }
    .blink-6 { top: 60%; left: 45%; animation-delay: 2.9s; }
    .blink-7 { top: 70%; left: 60%; animation-delay: 1.9s; }
    .blink-8 { top: 80%; left: 30%; animation-delay: 3.2s; }
    .blink-9 { top: 85%; left: 75%; animation-delay: 2.7s; }
    .blink-10 { top: 90%; left: 50%; animation-delay: 3.5s; }



    /* Animations */
    @keyframes blingbling {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }

    @keyframes move {
        0% { bottom: -100px; }
        50% { bottom: -90px; }
        100% { bottom: -100px; }
    }

    @keyframes fall {
        0% { opacity: 0; transform: scale(0.5) translate(0, 0); }
        50% { opacity: 1; }
        100% { opacity: 0; transform: scale(1.2) translate(-300px, 300px); }
    }


    @media screen and (min-width: 820px) and (min-height: 1024px) {
    .dashboard-animation {
        position: relative;
        width: 100%;
        height: 75vh; /* Full screen height */
        overflow: hidden;
    } 
    }
</style>
@endpush