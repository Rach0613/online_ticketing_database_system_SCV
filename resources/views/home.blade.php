<!-- resources/views/home.blade.php -->
@extends('layout')

@section('content')
<!-- Operating Hours Section -->
<div class="operating-hours">
  <div class="scroll-container">
    <span class="scroll-text">Operating Hours: 9.00am - 5.00pm Daily</span>
  </div>
</div>

  <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3"></button>
    </div>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../images/IMG_7719-1080x662.jpg" alt="Image 1" class="d-block">
        <div class="carousel-caption">
            <h3>Welcome to Sarawak Cultural Village</h3>
            <p>Discover the beauty of our culture and traditions.</p>
        </div>
    </div>
    
    <div class="carousel-item">
        <img src="https://scv.com.my/wp-content/uploads/2018/09/performances-art-banner-min-1-copy.jpg" alt="Image 2" class="d-block">
        <div class="carousel-caption">
            <h3>Experience the Heritage</h3>
            <p>Learn about Sarawak's diverse ethnic groups.</p>
        </div>
    </div>
    
    <div class="carousel-item">
        <img src="https://media.tacdn.com/media/attractions-splice-spp-674x446/0a/d1/43/a1.jpg" alt="Image 3" class="d-block">
        <div class="carousel-caption">
            <h3>Explore Our Village</h3>
            <p>A perfect blend of history and culture.</p>
        </div>
    </div>
    
    <div class="carousel-item">
        <img src="https://3.bp.blogspot.com/-DXxIM-hqT70/Te8ACIS5XoI/AAAAAAAAA9k/4TmcMZ36uTk/s1600/SCV.jpg" alt="Image 4" class="d-block">
        <div class="carousel-caption">    
          <h3>Join Us Today</h3>
            <p>Uncover the magic of Sarawak.</p>
        </div>
    </div>
  </div>

      <!-- Controls -->
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

<!-- Highlights Section -->
<div id="highlights">
  <h2>HIGHLIGHTS</h2>
  <div class="content">
    <div class="video-box">
      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/ZpuZs90xR2I?autoplay=1" title="Sarawak Cultural Village Highlights" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="text">
      <p>Sarawak Cultural Village is an award-winning Living Museum that spans across 17-acres of land just across from Damai Beach Resort and Hotels. Experience Sarawak in Half-a-day at Sarawak Cultural Village and learn about the local culture and lifestyles of the various ethnic groups in Sarawak.</p>
      <a href="{{route('account.login')}}">
        <button class="book-button">Book with us now</button>
    </a>
    
    </div>
  </div>
</div>

<!-- Explore Our Map Section -->
<div id="explore-map"style="margin-left: 3vh; margin-right:3vh">
  <h2>EXPLORE OUR MAP</h2>
  <div style="max-width: 100%; overflow: hidden;">
    <img src="https://scv.com.my/wp-content/uploads/2018/08/SCV-Maps.jpg" alt="Sarawak Cultural Village Map" style="width: 100%; height: auto; border-radius: 10px; object-fit: cover;">
  </div>
</div>

<!-- Awards Section -->
<div id="awards">
  <h2>AWARDS</h2>
  <div class="awards-container">
    <!-- Top Row (3 Awards) -->
    <div class="award top-row">
      <img src="https://png.pngtree.com/png-clipart/20221011/ourmid/pngtree-red-award-ribbon-certificate-vector-clipart-png-image_6299268.png" alt="Award 1" class="award-medal">
      <p>2007 – The Best Malaysia Award – Best Native Experience</p>
    </div>
    <div class="award top-row">
      <img src="https://png.pngtree.com/png-clipart/20221011/ourmid/pngtree-red-award-ribbon-certificate-vector-clipart-png-image_6299268.png" alt="Award 2" class="award-medal">
      <p>2008 – Expatriate Lifestyle (The Best of Malaysia Award)</p>
    </div>
    <div class="award top-row">
      <img src="https://png.pngtree.com/png-clipart/20221011/ourmid/pngtree-red-award-ribbon-certificate-vector-clipart-png-image_6299268.png" alt="Award 3" class="award-medal">
      <p>2009 – World Championship of Performing Arts</p>
    </div>
    
    <!-- Bottom Row (2 Awards) -->
    <div class="award bottom-row">
      <img src="https://png.pngtree.com/png-clipart/20221011/ourmid/pngtree-red-award-ribbon-certificate-vector-clipart-png-image_6299268.png" alt="Award 4" class="award-medal">
      <p>2014/2015 – Best Tourist Attraction Award</p>
    </div>
    <div class="award bottom-row">
      <img src="https://png.pngtree.com/png-clipart/20221011/ourmid/pngtree-red-award-ribbon-certificate-vector-clipart-png-image_6299268.png" alt="Award 5" class="award-medal">
      <p>2022 – Gold Award "Cultural Showcase & Experience (East Malaysia)"</p>
    </div>
  </div>
</div>

<!--Sponsor-->
<div id="sponsors" style="background-color: #F5CB5C;">
  <div id="sponsorsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <!-- Carousel Inner -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="d-flex justify-content-center">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Bandaraya-Kuching-Utara-350x350.png" class="d-block mx-2 sponsor-img"  alt="Sponsor 1">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Padawan-Municipal-Council-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 2">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Tourism-Malaysia-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 3">
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex justify-content-center">
          <img src="https://whatthelogo.com/storage/logos/sarawak-convention-bureau-77000.png" class="d-block mx-2 sponsor-img" style="object-fit: contain" alt="Sponsor 4">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Ministry-of-Tourism-Sarawak-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 5">
          <img src="https://b2b.sarawaktourism.com/assets/img/sarawak-tourism-logo.png" class="d-block mx-2 sponsor-img" alt="Sponsor 6">
        </div>
      </div>
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#sponsorsCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#sponsorsCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
@endsection

@push('home_styles')
<style>
/* Reset and Base Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #242423;
    color: #CFDBD5;
    font-family: Arial, sans-serif;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
}

h1, h2, h3, p {
    margin-bottom: 15px;
}

/* Operating Hours Section */
.operating-hours {
    background-color: #4CAF50;
    color: white;
    padding: 10px 0;
}

.scroll-container {
    width: 100%;
    overflow: hidden;
}

.scroll-text {
    display: inline-block;
    white-space: nowrap;
    animation: scrolling 10s linear infinite;
}

@keyframes scrolling {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}


h2 {
  text-align: center;
  margin-bottom: 10px;
  font-size: 36px;
  font-weight: bold;
  color: #F5CB5C;
}

.content {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
  padding: 30px;
}
/* Adjust Highlights Section for smaller screens */
@media screen and (max-width: 768px) {
  .content {
    flex-direction: column; /* Stack the video box and text vertically */
    align-items: center;    /* Center them horizontally */
  }

  .video-box {
    width: 90%;   /* Make the video box take up most of the screen width */
    height: 250px; /* Adjust the height of the video box */
    margin-bottom: 20px;  /* Add some space below the video box */
  }

  .text {
    width: 90%;   /* Ensure the text container also takes up most of the screen width */
    text-align: center; /* Center the text */
  }

  .book-button {
    width: 100%;  /* Make the button take up the full width on smaller screens */
  }
}


.carousel-caption{
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 50px;
}

.d-block{
  width: 100%; 
  height: 70vh; 
  object-fit: fill;
}

/* Responsive Carousel */
@media screen and (max-width: 768px) {
  .carousel-caption h3 {
        font-size: 16px;
    }
    
    .carousel-caption p {
        font-size: 12px;
    }
  .d-block{
  width: 100%; 
  height: 30vh; 
  object-fit: fill;
}
}


.video-box {
  flex: 1;
  max-width: 600px;
  height: 300px;
  margin: 10px;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

.text {
  flex: 1;
  max-width: 600px;
  margin: 10px;
}

.text p {
  font-size: 16px;
  line-height: 1.5;
  color: #E8EDDF;
}

.book-button {
  background-color: #F5CB5C;
  color: #242423;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  font-size: 16px;
  font-weight: bold;
  border-radius: 5px;
  margin-top: 20px;
}

.book-button:hover {
  opacity: 0.8;
}

/* Awards Section */
#awards {
  text-align: center;
  padding: 30px 0;
  background-color: #242423;
}

#awards h2 {
  color: #F5CB5C;
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 30px;
}

.awards-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
}

.award {
  text-align: center;
  margin: 10px;
}

.top-row {
  flex: 1 1 30%;
}

.bottom-row {
  flex: 1 1 45%;
}

.award-medal {
  width: 120px;
  height: 120px;
  margin-bottom: 10px;
  object-fit: contain;
}

.award p {
  color: #E8EDDF;
  font-size: 16px;
  font-weight: bold;
  margin-top: 10px;
}

/* Operating hours fixes */
.operating-hours {
    background-color: #F5CB5C;
    color: #242423;
    padding: 10px 0;
    position: relative;
    z-index: 1;
    width: 100%;
}

.carousel-item img{

  object-fit: cover;

}

/* Fix section spacing */
#highlights, #explore-map, #awards {
    padding: 40px 0;
}

.sponsor-img {
  width: 200px;   /* Set the desired width */
  height: 200px;  /* Set the desired height */
  object-fit: contain;  /* Optional: Ensures the image scales properly without distortion */
}

@media screen and (max-width: 768px) {
  .sponsor-img {
    width: 30%;

}
}

</style>
@endpush


