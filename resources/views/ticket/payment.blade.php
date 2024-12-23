<!-- resources/views/payment.blade.php -->
@extends('layout')

@section('content')
<div class="safe">
    <!-- Progress Bar -->
    <div class="container progress-container1">
        <div class="progress-bar1">
            <div class="progress-step1">
                <div class="step-circle1">1</div>
                <div class="step-label1">Select Seat</div>
            </div>
            <div class="progress-step1">
                <div class="step-circle1">2</div>
                <div class="step-label1">Confirmation</div>
            </div>
            <div class="progress-step1 active1">
                <div class="step-circle1">3</div>
                <div class="step-label1">Payment</div>
            </div>
        </div>
    </div>

    <!-- Payment Form Card -->
    <div class="card shadow-sm" style="max-width: 500px; margin: 0 auto;">
        <div class="card-body p-4">
            <h5 class="word card-title mb-4">Payment Details</h5>
            <form action="{{ route('ticket.payment.process') }}" method="POST">
                @csrf
                <input type="hidden" name="total_amount" value="{{ $totalAmount }}">
                <div class="payment-options-flex mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment_method" value="credit_card" id="creditCard" checked>
                        <label class="word form-check-label" for="creditCard">Credit Card</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="payment_method" value="debit_card" id="debitCard">
                        <label class="word form-check-label" for="debitCard">Debit Card</label>
                    </div>
                </div>
            
                <div class="mb-3">
                    <label for="card_name" class="word form-label" >Name on Card</label>
                    <input type="text" name="card_name" class="form-control" id="card_name" placeholder="Enter name as shown on card" required>
                </div>
                <div class="mb-3">
                    <label for="card_number" class="word form-label">Card Number</label>
                    <input type="text" name="card_number" class="form-control" id="card_number" placeholder="XXXX XXXX XXXX XXXX" maxlength="16" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="expiry_date" class="word form-label">Expiry Date</label>
                        <input type="text" name="expiry_date" class="form-control" id="expiry_date" placeholder="MMYY" maxlength="4" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cvv" class="word form-label">CVV</label>
                        <input type="text" name="cvv" class="form-control" id="cvv" placeholder="3 digit number" maxlength="3" required>
                    </div>
                </div>             
                
                <div class="d-grid gap-2 mt-4">
                    <!-- Pay Now Button -->
                    <button type="submit" class="btn btn-primary">Pay Now</button>
                    <!-- Cancel Button -->
                    <a href="{{ route('ticket.payment.cancel') }}" class="btn btn-link text text-decoration-underline">Cancel</a>
                </div>
                
            </form>
        </div>
    </div>
                
                <!-- Success Modal -->
<div id="successModal" class="modal-custom {{ session('status') === 'success' ? 'show' : '' }}">
    <div class="modal-content-custom text-center">
        <div class="success-icon"></div>
        <p class="statusWord">Payment Successful!</p>
        <p class="text-muted mb-4">Your transaction has been completed successfully.</p>
        <div class="d-grid">
            <a href="{{ route('account.dashboard') }}" class="btn btn-primary">Close</a>
        </div>
    </div>
</div>

<!-- Cancel Modal -->
<div id="cancelModal" class="modal-customCancel {{ session('status') === 'cancel' ? 'show' : '' }}">
    <div class="modal-content-customCancel text-center">
        <div class="mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
        </div>
        <h4 class="statusWord">Payment Canceled</h4>
        <p class="text-muted mb-4">Your payment process has been canceled.</p>
        <a href="{{ route('ticket.timedate') }}" class="btn btn-primary">Back to Booking</a>
    </div>
</div>

<!-- Add JavaScript to Auto Trigger Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const status = "{{ session('status') }}";

        if (status === 'success') {
            const successModal = document.getElementById('successModal');
            successModal.style.visibility = 'visible';
            successModal.style.opacity = 1;
        } else if (status === 'cancel') {
            const cancelModal = document.getElementById('cancelModal');
            cancelModal.style.visibility = 'visible';
            cancelModal.style.opacity = 1;
        }
    });
</script>
       
@endsection

@push('payment_styles')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset("images/IMG_5588 (1).JPG") }}');
        background-size: cover;
        color: white;
        height: 100%;
        width: 100%;
    }

    .progress-container1 {
        max-width: 800px;
        margin: 2rem auto;
        margin-top: 0;
        padding: 2rem 1rem;
        position: relative;
        background: rgba(0, 0, 0, 0.3);
        background-size: cover;
        background-position: center;
        border-radius: 10%;
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

    .card {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .word {
        color: aliceblue;
    }

    .payment-options-flex {
        flex: 1;
        text-align: center;
    }

    .modal-custom {
        visibility: hidden;
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1050;
        transition: all 0.3s;
    }

        .action-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-top: 20px;
    }

    .action-buttons .btn {
        min-width: 100px;
        text-align: center;
    }

    .action-buttons .btn-link {
        font-size: 1rem;
        color: #007bff;
        text-decoration: underline;
        cursor: pointer;
    }


    .modal-custom:target {
        visibility: visible;
        opacity: 1;
    }

    .modal-content-custom {
        background: white;
        width: 90%;
        max-width: 400px;
        padding: 2rem;
        border-radius: 8px;
        position: relative;
        transform: translateY(-100px);
        transition: all 0.3s;
    }

    .modal-custom:target .modal-content-custom {
        transform: translateY(0);
    }

    .success-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #28a745;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto 1rem;
    }

    .success-icon::before {
        content: '';
        width: 30px;
        height: 15px;
        border-left: 4px solid white;
        border-bottom: 4px solid white;
        transform: rotate(-45deg);
        margin-top: -5px;
    }

    .modal-customCancel {
        visibility: hidden;
        opacity: 0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1050;
        transition: all 0.3s;
    }

    .modal-customCancel:target {
        visibility: visible;
        opacity: 1;
    }

    .modal-content-customCancel {
        background: white;
        width: 90%;
        max-width: 400px;
        padding: 2rem;
        border-radius: 8px;
        position: relative;
        transform: translateY(-100px);
        transition: all 0.3s;
    }

    .modal-customCancel:target .modal-content-customCancel {
        transform: translateY(0);
    }

    .statusWord {
        color: black;
        font-size: 25px;
    }

    .safe{
        margin: 2vw 2vh 2vw 2vh;
    }
</style>
@endpush
