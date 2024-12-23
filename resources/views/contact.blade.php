<!-- resources/views/contact.blade.php -->
@extends('layout')

@section('title', 'Contact us')
@section('content')
  <section class="contact-container">
    <div class="contact-form">
    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif
      <h2>Leave Your Message</h2>
      <form id="ticket-form" action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="tel" name="contact_number" placeholder="Contact Number" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="description" placeholder="Description" rows="5" required></textarea>
        <input type="file" name="file" accept="image/*">
        <button type="submit">Submit</button>
      </form>
    </div>

    <div class="contact-image">
      <div class="contact-info">
        <p><strong>Address:</strong> Sarawak Cultural Village Sdn. Bhd., Pantai Damai, Santubong, P.O.Box 2632, 93752 Kuching, Sarawak, Malaysia.</p>
        <p><strong>Contact:</strong> (6082) 846 108 / (6082) 846 078 / (6082) 846 988 (Fax)</p>
        <p><strong>Email:</strong> scv4you@gmail.com</p>
      </div>
    </div>
  </section>

  <!-- Popup JavaScript -->
  <script>
    document.getElementById("ticket-form").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent form submission

      // Get the email value
      const email = document.querySelector('input[name="email"]').value;

      // Create the popup
      const popup = document.createElement('div');
      popup.classList.add('popup');
      popup.innerHTML = `
        <div class="popup-content">
          <p class="popup-message">Your ticket has been submitted!</p>
          <p class="popup-email">We will get back to you in 3-4 working days. We hope you had a pleasant time with us.</p>
          <button class="popup-close">Close</button>
        </div>
      `;

      // Append the popup to the body
      document.body.appendChild(popup);

      // Close the popup and submit the form
      document.querySelector('.popup-close').addEventListener('click', function() {
        popup.remove(); // Remove the popup
        document.getElementById("ticket-form").submit(); // Submit the form
      });
    });
  </script>
@endsection

@push('contact_styles')
<style>
    body {
        background-color: #242423;
        color: #CFDBD5;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Contact Us Page Styling */
    .contact-container {
        display: flex;
        height: 100vh;
        /* Keep flex layout for larger screens */
    }

    /* Left Section - Form */
    .contact-form {
        width: 60vw;
        background-color: rgba(245, 203, 92, 0.7); /* Semi-translucent yellow */
        padding: 30px;
        border-radius: 10px;
        margin: 2px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        height: 100%; /* Ensure full height */
    }

    .contact-form h2 {
        color: #242423;
        text-align: center;
        margin-bottom: 20px;
    }

    .contact-form input,
    .contact-form textarea,
    .contact-form select {
        color: #000000; /* Black text color for inputs */
        background-color: #E8EDDF; /* Light background for input fields */
        border: 1px solid #F5CB5C; /* Yellow border */
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        margin-bottom: 15px;
    }

    .contact-form input:focus,
    .contact-form textarea:focus,
    .contact-form select:focus {
        outline: none;
        border-color: #F5CB5C; /* Yellow border on focus */
    }

    .contact-form button {
        background-color: #F5CB5C;
        color: #242423;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        margin-right: 10px;
    }

    .contact-form button:hover {
        opacity: 0.8;
    }

    /* Left Section - Image */
    .contact-image {
        width: 40%;
        background-image: url('https://cdn-imgix.headout.com/tour/37929/TOUR-IMAGE/636e576b-e453-4914-bd35-e93de42021bc-19433-sarawak-sarawak-cultural-village-half-day-tour--07.jpg?auto=compress&w=768&h=480&fit=min');
        background-size: cover;
        background-position: center;
        height: 100%;
        position: relative;
    }

    .contact-image .contact-info {
        position: absolute;
        top: 50%;
        left: 20px;
        transform: translateY(-50%); /* Vertically center the box */
        background-color: rgba(255, 255, 255, 0.8); /* Semi-translucent white */
        padding: 15px;
        border-radius: 10px;
        width: 90%;
    }

    .contact-info p {
        color: #000000; /* Black text color for contact info */
        margin: 5px 0;
    }

    /* Yellow separator line */
    .yellow-line {
        background-color: #F5CB5C;
        height: 2px;
        margin-top: 30px;
    }

    /* Popup Styles */
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7); /* Black background with transparency */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background-color: #242423; /* Black background for popup */
        color: #F5CB5C; /* Yellow text color */
        padding: 30px;
        border-radius: 10px;
        text-align: center;
        max-width: 80%;
        width: 400px;
    }

    .popup-message {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .popup-email {
        font-size: 16px;
        margin-bottom: 20px;
    }

    .popup-close {
        background-color: #F5CB5C; /* Yellow color for the close button */
        color: #242423; /* Black color for the button text */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .popup-close:hover {
        opacity: 0.8;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .contact-container {
            flex-direction: column; /* Stack form and image vertically on smaller screens */
            height: auto; /* Allow height to be auto for better layout on mobile */
        }

        .contact-form {
            width: 90vw; /* Increase the width of the form for mobile */
            margin-top: 20px;
        }

        .contact-image {
            width: 100%; /* Full width for image section */
            height: 300px; /* Adjust the image height */
        }
    }
</style>
@endpush
