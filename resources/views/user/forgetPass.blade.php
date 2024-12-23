@extends('layout')

@section('title', 'Forgot Password')
@section('content')


  <div class="forgot-password-container">
    <!-- Left Section: Form -->
    <div class="form-section">
      <!-- Logo -->
      <img src="{{ asset('images/SCV Logo.png') }}" alt="Sarawak Cultural Village Logo">
      
      <h1>Forgot Password</h1>
      <form action="/comingsoon" method="get"> <!--should be"POST-->
        <label for="mobile">Mobile Number</label>
        <div style="width: 100%; display: flex; align-items: center;">
          <!-- Country Code Dropdown -->
          <select name="country_code" id="country_code" class="form-control" required>
            <option value="+60">+60 </option>
            <option value="+1">+1 </option>
            <!-- Add more countries and codes here -->
            
          </select>
          <!-- Mobile Number Input -->
          <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile number" required pattern="^\d{9,10}$" title="Please enter a valid phone number">
        </div>
        
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        
        <button type="submit" class="btn btn-warning">Reset Password</button>
      </form>
      <p>Remember your password? <a href="{{route('account.login')}}">Log in here</a></p>
    </div>
    
    <!-- Right Section: Background Image -->
    <div class="image-section"></div>
  </div>

  {{-- <!-- OTP Modal -->
  <div class="modal" tabindex="-1" role="dialog" id="otpModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">OTP Sent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>An OTP has been sent to your email address. Please check your inbox to reset your password.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> --}}

  <!-- Include jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  {{-- <script>
    // Function to show OTP modal
    function showOTPModal() {
      // Show the modal when the form is submitted
      $('#otpModal').modal('show');
      return false; // Prevent form submission for demo
    }
  </script> --}}
@endsection

@push('forgetPass_styles')
<style>
  /* Basic Reset */
  * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        height: 100vh;
        display: flex;
        justify-content: space-between;
        background-color: #000;
    }

  /* Full-screen Container */
  .forgot-password-container {
    display: flex;
    width: 100%;
    height: 100vh; /* Full screen height */
  }

  /* Left Section: Form Styling */
  .form-section {
    flex: 3; /* Adjusted to 30% of the container */
    padding: 40px;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)); /* Gradient for form */
  }

  .form-section img {
    width: 120px;
    height: 120px;
    margin-bottom: 20px;
    border-radius: 50%;
  }

  .form-section h1 {
    font-size: 28px;
    font-weight: bold;
    color: white;
    margin-bottom: 20px;
  }

  .form-section label {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
    width: 100%;
  }

  .form-section input,
  .form-section select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #767676;
    border-radius: 5px;
    background-color: #333;
    color: white; /* White text */
    font-size: 16px;
    transition: border-color 0.3s ease, background-color 0.3s ease, color 0.3s ease; /* Smooth color transition */
  }

  .form-section select {
    width: 30%;
    display: inline-block;
    margin-right: 10px; /* Add some space between the country code and the mobile number input */
  }

  /* Change background and outline color when focused */
  .form-section input:focus,
  .form-section select:focus {
    outline: 2px solid white;
    border-color: white;
    background-color: #444; /* Slightly lighter background */
    color: #fefefe; /* Optional: change text color on focus for better visibility */
  }

  .form-section input::placeholder {
    color: #888; /* Gray placeholder color */
  }

  .form-section a {
    color: #FFD700;
    font-size: 14px;
    text-decoration: none;
    margin-top: -10px;
    margin-bottom: 20px;
  }

  .form-section a:hover {
    text-decoration: underline;
  }

  .form-section button {
    width: 100%;
    padding: 12px;
    background-color: #FFD700;
    color: rgb(0, 0, 0);
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
  }

  .form-section button:hover {
    background-color: #FFA500;
  }

  .form-section p {
    margin-top: 20px;
    font-size: 14px;
    color: #888;
  }

  .form-section p a {
    color: #FFD700;
    font-weight: bold;
    text-decoration: none;
  }

  /* Right Section: Background Image */
  .image-section {
    flex: 7; /* 70% of the container */
    background: url('https://scv.com.my/wp-content/uploads/2018/08/event-banner-min.jpg') no-repeat center center;
    background-size: cover;
    opacity: 0.7;
  }

  /* Reset Password Modal Styling */
  .modal-content {
    background-color: #000; /* Black background */
    color: #f8f8f7; /* Yellow text */
    border-radius: 15px; /* Rounded corners */
    border: 2px solid #FFD700; /* Yellow outline */
  }

  .modal-header {
    border-bottom: 1px solid #ffffff;
    border-radius: 15px 15px 0 0; /* Rounded top corners */
  }

  .modal-footer {
    border-top: 1px solid #FFD700;
    border-radius: 0 0 15px 15px; /* Rounded bottom corners */
  }

  .modal-footer .btn-secondary {
    background-color: #FFD700; /* Yellow background */
    color: black;
    border: 1px solid #fdfcfb; /* Yellow border */
    border-radius: 5px; /* Rounded corners */
  }

  .modal-footer .btn-secondary:hover {
    background-color: #FFA500; /* Orange on hover */
  }

  .modal-header .close {
    color: white; /* Close button in white */
    opacity: 1; /* Remove default opacity */
  }

  .modal-body {
    color: #fdfdfc; /* Yellow text */
  }

  .modal-body p {
    font-size: 16px; /* Optional: increase text size for readability */
  }

  .modal-title {
    font-weight: bold;
    font-size: 18px;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .forgot-password-container {
      flex-direction: column;
      height: auto;
    }

    .form-section {
      width: 100%;
      padding: 20px;
    }

    .image-section {
      height: 300px;
    }
  }
</style>
@endpush
