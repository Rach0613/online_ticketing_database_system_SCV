<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sarawak Cultural Village User Login</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
      background-color: #000;
    }

    .login-container {
      display: flex;
      width: 100%;
      height: 100vh;
    }

    /* Left Section: Form Styling */
    .form-section {
      flex: 3;
      max-width: 30%;
      padding: 40px;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6));
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

    .form-section input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #767676;
      border-radius: 5px;
      background-color: #333;
      color: white;
      font-size: 16px;
    }

    .form-section input:focus {
      border-color: white;
      background-color: #444;
    }

    .form-section a {
      color: #FFD700;
      font-size: 14px;
      text-decoration: none;
      cursor: pointer;
    }

    .form-section a:hover {
      text-decoration: underline;
    }

    .form-section button {
      width: 100%;
      padding: 12px;
      background-color: #FFD700;
      color: #000;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }

    .form-section button:hover {
      background-color: #FFA500;
    }



    .progress-container {
      width: 80%;
      max-width: 400px;
      margin-top: 20px;
    }

    .loading-text {
      color: white;
      text-align: center;
      margin-bottom: 10px;
    }

    .progress {
      background-color: black;
      border-radius: 5px;
      overflow: hidden;
    }

    .progress-bar {
      background: linear-gradient(90deg, #FFD700 0%, #FFD700 100%);
      border-radius: 5px;
    }

    /* Right Section: Background Image */
    .image-section {
      flex: 7;
      background: url('https://scv.com.my/wp-content/uploads/2018/08/event-banner-min.jpg') no-repeat center center;
      background-size: cover;
      opacity: 0.7;
    }

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
  </style>
</head>
<body>
  <div class="login-container">
    <!-- Left Section: Form -->
    <div class="form-section">
      <img src="SCV logo.png" alt="Sarawak Cultural Village Logo">
      <h1>Log In</h1>
      <form>
        <label for="mobile">Mobile Number</label>
        <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        <a onclick="redirectToForgotPassword()">Forgot Password?</a>
        <button type="submit">Login</button>
      </form>
    </div>

    <!-- Right Section: Background Image -->
    <div class="image-section"></div>
  </div>
</body>
</html>