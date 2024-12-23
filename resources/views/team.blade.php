@extends('layout')

@section('title', 'Our Team')
@section('content')
<section class="top-image">
    <img src="https://assets.change.org/photos/4/lw/yy/nJlwYyctKmQOiuO-1600x900-noPad.jpg?1639138023" alt="Sarawak Cultural Village" class="top-image-img" style="object-fit: fill">
  </section>

<!-- Team Section -->
<section id="team" class="team-section">
    <div class="team-title-container">
      <h1 class="team-title">MEET THE TEAM MEMBERS</h1>
    </div>
    <div class="team-container">
      <!-- Team Member 1 -->
      <div class="team-member">
        <img src="https://eleap.unimas.my/pluginfile.php/16332/user/icon/mb2nl/f1?rev=51112" alt="TAN AIK HUA" class="team-image">
        <p class="team-caption">TAN AIK HUA</p>
      </div>
  
      <!-- Team Member 2 -->
      <div class="team-member">
        <img src="https://eleap.unimas.my/pluginfile.php/12131/user/icon/mb2nl/f1?rev=108062" alt="YUVARANI A/P JAGATHESAN @ JIWA" class="team-image">
        <p class="team-caption">YUVARANI A/P JAGATHESAN @ JIWA</p>
      </div>
  
      <!-- Team Member 3 -->
      <div class="team-member">
        <img src="https://eleap.unimas.my/pluginfile.php/7137/user/icon/mb2nl/f1?rev=110940" alt="CHOO KIAN MIN" class="team-image">
        <p class="team-caption">CHOO KIAN MIN</p>
      </div>
  
      <!-- Team Member 4 -->
      <div class="team-member">
        <img src="https://eleap.unimas.my/pluginfile.php/11602/user/icon/mb2nl/f1?rev=108122" alt="KRYSTAL WONG WEI-WEN" class="team-image">
        <p class="team-caption">KRYSTAL WONG WEI-WEN</p>
      </div>
  
      <!-- Team Member 5 -->
      <div class="team-member">
        <img src="https://eleap.unimas.my/pluginfile.php/11449/user/icon/mb2nl/f1?rev=275722" alt="Britney Moh Yi Wei" class="team-image">
        <p class="team-caption">BRITNEY MOH YI WEI</p>
      </div>
    </div>
  </section>

  <!-- Reflection Section -->
<section class="reflection-section">
    <div class="reflection-title-container">
      <h1 class="reflection-title">REFLECTION</h1>
    </div>
    <div class="reflection-content">
      <p>This project, focused on building a website for the Sarawak Cultural Village, has been an incredibly valuable learning experience for us. It has given us the chance to apply the skills we’ve developed in HTML, CSS, Bootstrap, and Laravel in a practical setting, pushing us to explore new aspects of web development. Designing a website that highlights the rich cultural offerings of Sarawak, including ethnic replicas, cultural storytelling, and award-winning dance performances, has allowed us to merge creativity with technical knowledge. Throughout this journey, we have been able to refine our skills while striving to create an engaging and functional website that showcases the cultural heritage of Sarawak in an impactful way.<br><br>
        Our motivation for this project has been to create a website that is not only visually appealing but also user-friendly and informative. We aimed to develop a platform that can serve as an effective digital representation of the Sarawak Cultural Village, helping visitors understand and appreciate the significance of Sarawak’s culture. This has been a great opportunity to improve our web development skills and learn how to design for both functionality and aesthetics. We’ve gained a better understanding of responsive design, user interaction, and how to implement a variety of web development tools effectively to achieve a seamless experience for users.<br><br>
        We are deeply grateful for this opportunity and thankful for the guidance provided by our lecturer, Ms. Oon Yin Bee, whose support has been instrumental throughout this project. Her feedback and encouragement have been invaluable in helping us meet the challenges of the assignment and improve the quality of our work. This experience has been a significant milestone in our academic journey at University Malaysia Sarawak (UNIMAS), and we are excited to apply everything we’ve learned in future projects. We look forward to continuing our growth as web developers, building on the foundation of skills and knowledge we've gained through this assignment..</p>
    </div>
    
    <!-- Separator Line Before Footer -->
    <div class="reflection-separator"></div>
  </section>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@push('team_styles')
<style>
    /* General Styles */
    body {
      background-color: #242423;
      color: #CFDBD5;
      font-family: Arial, sans-serif;
    }
    
    .navbar {
      display: flex;
      align-items: center;
      background-color: #242423;
      padding: 10px 20px;
    }
    
    .navbar .logo img {
      height: 50px;
      margin-right: 10px;
    }
    
    .navbar .site-name {
      color: #CFDBD5;
      font-size: 20px;
      font-weight: bold;
      margin-right: 20px;
    }
    
    .navbar a {
      color: #CFDBD5;
      text-decoration: none;
      margin: 0 10px;
      font-size: 16px;
    }
    
    .auth-buttons {
      margin-left: auto;
    }
    
    .auth-buttons .signup, .auth-buttons .login {
      background-color: #F5CB5C;
      color: #242423;
      border: none;
      padding: 8px 15px;
      margin-left: 10px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      border-radius: 5px;
    }
    
    .auth-buttons .signup:hover, .auth-buttons .login:hover {
      opacity: 0.8;
    }
    
    footer {
      background-color: #242423;
      color: #CFDBD5;
      text-align: center;
      padding: 20px 0;
    }
    
    footer a {
      color: #CFDBD5;
      text-decoration: none;
      margin: 0 10px;
    }
    
    /* Team Section */
    .team-section {
      padding: 50px;
      text-align: center;
      background-color: #242423;
      color: #CFDBD5;
    }
    
    .team-title-container {
      background-color: #F5CB5C; /* Yellow background */
      padding: 20px 0; /* Add padding to make it look better */
      width: 100vw; /* Full viewport width */
      margin-left: calc(-50vw + 50%); /* This ensures it spans the entire width */
      position: relative;
    }
    
    .team-title {
      font-size: 36px;
      color: #242423; /* Black color for the title */
      margin: 0; /* Remove default margin */
      text-align: center;
    }
    
    .team-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Center the items */
      gap: 20px; /* Space between items */
      margin-top: 40px; /* Add space between the title and the circles */
    }
    
    .team-member {
      text-align: center;
      transition: transform 0.3s ease; /* Add smooth transition for hover */
      width: 150px; /* Fixed width for each member */
    }
    
    .team-member:hover {
      transform: scale(1.05); /* Slightly enlarge the member on hover */
    }
    
    .team-image {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      border: 5px solid #F5CB5C; /* Yellow border */
      object-fit: cover;
      transition: transform 0.3s ease; /* Smooth transition for hover effect */
    }
    
    .team-image:hover {
      transform: scale(1.1); /* Enlarge the image on hover */
    }
    
    .team-caption {
      font-size: 18px;
      color: #E8EDDF;
      margin-top: 10px;
      transition: color 0.3s ease;
    }
    
    .team-member:hover .team-caption {
      color: #F5CB5C; /* Change caption color on hover */
    }
    
    /* Adjust the layout for 3 members in the first row and 2 in the second */
    .team-container > .team-member:nth-child(-n+3) {
      flex: 1 0 30%; /* First 3 members take up 30% of the width */
    }
    
    .team-container > .team-member:nth-child(n+4) {
      flex: 1 0 40%; /* Last 2 members take up 40% of the width */
    }
    
    /* Reflection Section */
    .reflection-section {
      padding: 50px;
      background-color: #242423;
      color: #CFDBD5;
    }
    
    .reflection-title-container {
      background-color: #F5CB5C; /* Yellow background */
      padding: 20px 0; /* Add padding to make it look better */
      width: 100vw; /* Full viewport width */
      margin-left: calc(-50vw + 50%); /* This ensures it spans the entire width */
      position: relative;
    }
    
    .reflection-title {
      font-size: 36px;
      color: #242423; /* Black color for the title */
      margin: 0; /* Remove default margin */
      text-align: center;
    }
    
    .reflection-content {
      font-size: 18px;
      color: #E8EDDF;
      text-align: center;
      margin-top: 30px; /* Spacing between the title and content */
    }
    
    .reflection-content p {
      line-height: 1.6; /* Improved line spacing for readability */
    }
    
    /* Thin yellow line to separate the Reflection and Footer */
    .reflection-separator {
      border-top: 2px solid #F5CB5C; /* Thin yellow line */
      margin-top: 30px; /* Space between the reflection content and the line */
    }
    
    /* Top Image Section */
    .top-image {
      width: 100%; /* Full width */
      height: 400px; /* Fixed height */
      overflow: hidden; /* Hide any overflow */
      position: relative; /* To position the image properly */
    }
    
    .top-image-img {
      position: absolute; /* Position the image inside the section */
      top: 0px;
      left: 0;
      width: 100%; /* Stretch the image to fill the width */
      height: 100%; /* Stretch the image to fill the height */
      object-fit: cover; /* Ensures the image covers the container fully */
    }
    
      </style>
@endpush