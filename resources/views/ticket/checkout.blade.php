<!-- resources/views/checkout.blade.php -->
@extends('layout')

@section('content')
<!-- Progress Bar -->
<div class="container progress-container1">
    <div class="progress-bar1">
        <div class="progress-step1">
            <div class="step-circle1">1</div>
            <div class="step-label1">Select Seat</div>
        </div>
        <div class="progress-step1 active1">
            <div class="step-circle1">2</div>
            <div class="step-label1">Confirmation</div>
        </div>
        <div class="progress-step1">
            <div class="step-circle1">3</div>
            <div class="step-label1">Payment</div>
        </div>
    </div>
</div>

<!-- Main Container -->
<div class="main-container">
    <!-- User Information -->
    <div class="info-card">
        <div class="card-header">
            <h2>Your Information</h2>
        </div>
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-input" value="{{ auth()->user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label>Contact Number</label>
            <input type="tel" class="form-input" value="{{ auth()->user()->phone }}" readonly>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-input" value="{{ auth()->user()->email }}" readonly>
        </div>
    </div>

    <!-- Order Details -->
    <div class="info-card">
        <h2>Order Details</h2>
        
        <!-- Show Date and Time -->
        <div class="order-section">
            <h3>Date</h3>
            <p>{{ session('timedate')['date'] }}</p>
        </div>
        <div class="order-section">
            <h3>Time Slot</h3>
            <p>{{ ucfirst(session('timedate')['slot']) }}</p>
        </div>

        <!-- Selected Seats -->
        <div class="order-section">
            <div class="section-header">
                <h3>Seats</h3>
                <button class="edit-btn" onclick="window.history.back()">
                    <i class="fas fa-edit"></i> EDIT SEATS
                </button>
            </div>
            <p class="seats-info">
                @foreach ($seats as $seat)
                    {{ $seat->row }}{{ $seat->number }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </p>
        </div>

        <!-- Adults -->
        <div class="order-section">
            <h3>Adults</h3>
            <div class="price-row">
                <span>{{ session('timedate')['adults'] }} × RM50</span>
                <span>RM{{ session('timedate')['adults'] * 50 }}</span>
            </div>
        </div>

        <!-- Children -->
        <div class="order-section">
            <h3>Children</h3>
            <div class="price-row">
                <span>{{ session('timedate')['children'] }} × RM25</span>
                <span>RM{{ session('timedate')['children'] * 25 }}</span>
            </div>
        </div>

        <!-- Total Price -->
        <div class="total-section">
            <div class="price-row">
                <span class="total-label">Total</span>
                <span class="total-amount">RM{{ (session('timedate')['adults'] * 50) + (session('timedate')['children'] * 25) }}</span>
            </div>
        </div>
    </div>

    <!-- Confirmation Button -->
    <div class="button-container">
        <form action="{{ route('ticket.checkout.create') }}" method="POST">
            @csrf
            <button type="submit" class="continue-btn">Confirm Booking</button>
        </form>        
    </div>
</div>
@endsection

@push("checkout_styles")
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                    url('{{ asset("images/IMG_5588 (1).JPG") }}');
        background-size: cover;
        color: white;
        height: 100%;
        width: 100%
    }

    .progress-container1 {
    max-width: 800px;
    margin: 2rem auto;
    margin-top: 0;
    padding: 2rem 1rem;
    position: relative;
    background:rgba(0, 0, 0, 0.5)
    background-size: cover;
    background-position: center;
    border-radius: 10px;
    overflow: hidden;
}

.progress-container1::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    backdrop-filter: blur(5px);
    z-index: 1;
}

.progress-bar1 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    padding: 0 20px;
    z-index: 2;
}

.progress-bar1::before {
    content: '';
    position: absolute;
    background: #666;
    height: 2px;
    width: calc(100% - 40px);
    top: 15px;
    z-index: 1;
    left: 20px;
}

.progress-step1 {
    text-align: center;
    z-index: 2;
    position: relative;
}

.step-circle1 {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
}

.progress-step1.active1 .step-circle1 {
    background: #4CAF50;
}

.step-label1 {
    font-size: 0.9rem;
    color: #fff;
    position: absolute;
    width: 100px;
    text-align: center;
    left: 50%;
    transform: translateX(-50%);
    top: 35px;
    white-space: nowrap;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
}

.progress-step1.active1 .step-label1 {
    color: #4CAF50;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
}

        .fa-chevron-right {
            margin: 0 1rem;
        }

        .main-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .info-card {
            background-color: rgba(0, 0, 0, 0.7); /* Dark overlay color */
            padding: 2rem;
            
            border-radius: 8px; /* Optional: Rounded corners */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); /* Shadow around the box */
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .edit-btn {
            color: #2563eb;
            background: none;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #BDC3C7;
        }

        .form-input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        .order-section {
            margin-bottom: 1rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.5rem;
        }

        .seats-info {
            color: #BDC3C7;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            color: #BDC3C7;
            margin-top: 0.25rem;
        }

        .total-section {
            border-top: 2px solid #ddd;
            margin-top: 1rem;
            padding-top: 1rem;
        }

        .total-label, .total-amount {
            font-weight: bold;
            color: white;
        }
        
        .button-container {
            display: flex;
            justify-content: center; /* Centers the button horizontally */
            align-items: center; /* Centers the button vertically, if needed */
            width: 100%; /* Ensures the container spans the full width */
            margin-top: 1rem; /* Optional: Adds some space above the button */
}

        .continue-btn {
            width: 100%;
            position: center;
            padding: 1rem;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .continue-btn:hover {
            background-color: #1d4ed8;
        }

        h2 {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: white;
        }

        h3 {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: white;
        }

        @media (max-width: 640px) {
            .progress-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .main-container {
                padding: 0 0.5rem;
            }
        }
</style>
@endpush
