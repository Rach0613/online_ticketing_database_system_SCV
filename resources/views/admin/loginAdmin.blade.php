@extends('layout')

@section('title', 'Admin Login')

@section('content')
<div class="login-container">
    <!-- Left Section: Form -->
    <div class="form-section">
        <img src="{{ asset('images/SCV Logo.png') }}" alt="Sarawak Cultural Village Logo">
        <h1>Admin LogIn</h1>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('admin.authenticate') }}" method="post">
            
        @csrf
        <!-- Email Field -->
        <label for="email">Email Address</label>
        <div class="mb-3" style="width: 100%;">
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Enter your email address" 
                value="{{ old('email') }}"
                required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Field -->
        <label for="password">Password</label>
        <div class="password-container mb-3">
            <input 
                type="password" 
                id="password" 
                name="password" 
                placeholder="Enter your password"
                style="padding-right: 40px;"
                required>
            <span class="password-toggle" id="toggle-password" onclick="togglePassword()">
                <i class="fas fa-eye-slash"></i>
            </span>
            @error('password')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>
            <button class="margin-top:3vh;" type="submit">Login</button>
        </form>
    </div>

    <!-- Right Section: Background Image -->
    <div class="image-section"></div>
</div>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
    <div class="spiral-loader"></div>
    <div class="progress-container">
        <div class="loading-text" id="loadingText">Loading... 0%</div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" id="loadingBar" style="width: 0%;"></div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
function togglePassword() {
        const passwordInput = document.getElementById("password");
        const toggleIcon = document.getElementById("toggle-password").querySelector("i");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>
@endsection

@push('userLogin_styles')
<style>
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
        background-color: #242423;
    }

    .login-container {
        display: flex;
        width: 100%;
        height: 100vh;
        background-color: #242423
    }

    /* Left Section: Form Styling */
    .form-section {
        flex: 3;
        max-width: 30%;
        padding: 40px;
        background: linear-gradient(to top, rgba(41, 40, 40, 0.27), rgba(116, 112, 112, 0.115));
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
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
        margin-bottom: 20px;
    }

    .form-section label {
        display: block;
        font-size: 14px;
        margin-bottom: 8px;
        width: 100%;
    }

    /* Input Styling */
    .form-section input,
    .form-section select {
        width: 100%;
        padding: 10px;
        border: 1px solid #767676;
        border-radius: 5px;
        background-color: #333;
        color: white;
        font-size: 16px;
        margin-bottom: 0; /* Remove margin between input boxes */
    }

    .form-section select {
        width: 80px; /* Fixed width for dropdown */
        padding: 8px;
        margin-right: 10px; /* Space between select and input */
    }

    .form-section input:focus,
    .form-section select:focus {
        border-color: white;
        background-color: #444;
    }

    .form-section a {
    color: #FFD700 !important;
    font-size: 14px;
    text-decoration: none;
    cursor: pointer;
    }

.form-section a:hover {
    text-decoration: underline !important;
    }

    .form-section button {
        width: 100%;
        padding: 12px;
        background-color: #FFD700;
        color: #23231f;
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
    /* Error Message Styling */
.error-message {
    color: #FF0000; /* Uniform red color for error text */
    font-size: 12px; /* Smaller font size */
    margin-top: 5px; /* Space between input and error */
    margin-bottom: 0; /* Ensure no extra space */
    display: block; /* Ensure it appears below the input */
    text-align: left; /* Align with the input field */
    font-family: Arial, Helvetica, sans-serif;
}

    /* Password Container Styling */
    .password-container {
        position: relative;
        width: 100%;
    }

    .password-toggle {
        position: absolute;
        top: 40%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        color: #fff;
        font-size: 16px;
        color: #767676; 
        font-size: 20px; 
        z-index: 10; 
    }

    input[type="password"] {
        padding-right: 40px; /* Space for the toggle icon */
    }

    /* Right Section: Background Image */
    .image-section {
        flex: 7;
        background: url('https://scv.com.my/wp-content/uploads/2018/08/event-banner-min.jpg') no-repeat center center;
        background-size: cover;
        opacity: 0.7;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
        }

        .image-section {
            height: 300px;
        }

        .form-section {
            max-width: 100%;
            padding: 20px;
        }
    }
        /* Loading Overlay */
        .loading-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      display: none; /* Hidden by default */
      flex-direction: column;
    }

    .spiral-loader {
      border: 5px solid rgba(255, 255, 255, 0.2);
      border-top: 5px solid #FFD700;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(360deg);
      }
    }
</style>
@endpush
