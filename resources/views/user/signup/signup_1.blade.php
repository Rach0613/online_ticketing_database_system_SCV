@extends('layout')

@section('title', 'Sign Up NOW!')

@section('content')
<div class="signup-container">
  <h1 class="form-title">Sign Up</h1>
  <p class="form-subtitle">Fill in your details</p>

  <form id="signupForm" action="{{ route('account.processRegister') }}" method="post">
    @csrf
    <!-- Full Name -->
    <div class="form-group">
      <label class="form-label">Full Name</label>
      <input type="name" value="{{ old('name') }}" class="form-input @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name" required>
      @error('name')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Email Address -->
    <div class="form-group">
      <label class="form-label">Email Address</label>
      <input type="email" value="{{ old('email') }}" class="form-input @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" required>
      @error('email')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Mobile Number -->
    <div class="form-group">
      <label class="form-label">Mobile Number</label>
      <div class="mobile-input-group">
        <select class="form-input country-code" name="country_code">
          <option value="+60">+60</option>
          <!-- Add more country codes here -->
        </select>
        <input type="phone" value="{{ old('phone') }}" class="form-input @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your mobile number" required>
      </div>
      @error('phone')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Password -->
    <div class="form-group">
      <label class="form-label">Password</label>
      <input type="password" id="password" class="form-input @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required>
      @error('password')
        <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Confirm Password -->
    <div class="form-group">
      <label class="form-label">Confirm Password</label>
      <input type="password" id="confirm_password" class="form-input" name="password_confirmation" placeholder="Confirm your password" required>
    </div>

    <!-- Terms and Conditions -->
    <div class="terms-checkbox">
      <input type="checkbox" id="terms" name="terms" required>
      <div class="terms-text">
        I have read and agreed to Sarawak Cultural Village's 
        <a href="/comingsoon">Terms of Use</a> and 
        <a href="/comingsoon">Privacy Policy</a>.
      </div>
      @error('terms')
      <p class="invalid-feedback">{{ $message }}</p>
      @enderror
    </div>

    <!-- Submit Button -->
    <button type="submit" id="submitBtn">Sign Up</button>
  </form>
</div>
@endsection

@push('signUp_styles')
<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  body {
    font-family: Arial, sans-serif;
    min-height: 100vh;
    background: url("https://scv.com.my/wp-content/uploads/2018/08/event-banner-min.jpg") no-repeat center center fixed;
    background-size: cover;
    display: flex;
    color: white;
  }

  body::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 0;
  }

  .signup-container {
    position: relative;
    z-index: 1;
    max-width: 480px;
    padding: 2rem;
    background-color: rgba(0, 0, 0, 0.8);
    border-radius: 8px;
    justify-content: center;
    align-items: center;
    max-width: 400px; /* Set a fixed max width */
    width: 100%; /* Make it responsive */
    margin: auto;
    margin-top: 3vh;
    margin-bottom: 3vh;
  }

  .form-title {
    text-align: center;
    margin-bottom: 0.5rem;
    font-size: 2rem;
  }

  .form-subtitle {
    text-align: center;
    color: #ccc;
    margin-bottom: 2rem;
  }

  .form-group {
    margin-bottom: 1.5rem;
  }

  .form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-size: 1rem;
  }

  .form-input {
    width: 100%;
    padding: 0.75rem;
    background-color: transparent;
    border: 1px solid #555;
    border-radius: 4px;
    color: white;
    font-size: 1rem;
  }

  .mobile-input-group {
    display: flex;
    gap: 1rem;
  }

  .country-code {
    width: 120px;
  }

  .terms-checkbox {
    display: flex;
    align-items: flex-start;
    gap: 0.5rem;
    margin: 1.5rem 0;
  }

  .terms-checkbox input {
    margin-top: 0.25rem;
  }

  .terms-text a {
    color: #FFD700;
    text-decoration: none;
  }

  #submitBtn {
    width: 100%;
    padding: 1rem;
    background-color: #FFD700;
    border: none;
    border-radius: 4px;
    color: black;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
  }

  #submitBtn:hover {
    background-color: #e6c200;
  }
</style>
@endpush