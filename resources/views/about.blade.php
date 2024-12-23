@extends('layout')

@section('title', 'About us')
@section('content')

<!-- Image Section -->
<section class="image-section">
    <img src="https://cphtravel.com.my/wp-content/uploads/2018/09/SCV_1.jpg" alt="Sarawak Cultural Village" class="imagesss">
</section>
  
<!-- About Us Section -->
<section class="about-section">
    <h1 style="text-align: center">About The Village</h1>
    <p>
        Sarawak Cultural Village is an award-winning Living Museum that spans across 17-acres of land just across from Damai Beach Resort and Hotels. Experience Sarawak in Half-a-day at Sarawak Cultural Village and learn about the local culture and lifestyles of the various ethnic groups in Sarawak.<br><br>
        At Sarawak Cultural Village, there are replica buildings representing every major ethnic group in Sarawak mainly the Bidayuh, Iban, Orang Ulu, Penan, Melanau, Malay & Chinese. All buildings are staﬀed with members of the ethnic groups in traditional costume and carrying out traditional activities. The staﬀs act as storytellers who describe and interpret our way of life. They will happily pose with you for photos too!<br><br>
        Sarawak Cultural Village also has an award-winning dance troupe that will entertain you with our multi-cultural dance performance in our Village Theatre twice a day. Our cultural show runs twice a day at 11.30 am and 4 pm.<br><br>
    </p>
</section>
  
<!-- Vision and Mission Section -->
<section class="vision-mission">
    <div class="vision-mission-image">
        <img src="https://scv.com.my/wp-content/uploads/2018/09/20160805041549.jpg" alt="Sarawak Vision and Mission" class="imagesss">
        <div class="vision-mission-text">
            <h2 style="color: #F5CB5C">Vision and Mission</h2>
            <p><strong style="color: #F5CB5C">Vision</strong><br>A Premier Cultural Tourist Attraction</p>
            <p><strong style="color: #F5CB5C">Mission</strong><br>To showcase Sarawak’s multi-ethnics cultures and traditions through innovative products and top-class services.<br>To give all visitors a memorable experience of Sarawak’s rich cultural heritage.<br>To promote the appreciation of Sarawak’s culture amongst the younger generation.</p>
        </div>
    </div>
</section>
  
<!-- Our History Section -->
<section class="history-section">
    <h1>Our History</h1>
    <p>
        To see Sarawak in one day, this is the basic concept of Sarawak Cultural Village, where the 48,000 square miles of Malaysia’s most majestic state are condensed into just 17 acres. One leisurely stroll opens seven homes to the visitor, seven cultures, including the famous longhouses of Borneo.<br><br>
        Ever since tourism industry took its first commercial step into Sarawak in the 1960s, the intrepid ‘adventurers’ who veered off the beaten track found Borneo’s unique house-form an irresistible attraction. Of course, they wanted to see the landscape of breathtaking splendour and the world’s richest ecosystem, but the fascinating array of peoples and cultures was the real magnet. Unfortunately, Sarawak is huge, much of it covered by rugged mountains and jungle. How can a visitor hope to sample it all in less than three weeks of arduous travel?<br><br>
        A few far-sighted planners suggested that we build a ‘model’ village or longhouse within easy reach of Kuching. In the 1970s, cultural performances in a “langkau” in the Museum Gardens scored a spectacular success. This reactivated the idea; the Reservoir Park was suggested as a possible site, so was Sungai Cina in Matang. The Sarawak Museum contributed ethnographic and cultural input… but nothing came of it. There were other development priorities.<br><br>
        But build it they did, SCV took shape with a Bidayuh, Iban, Orang Ulu and Melanau longhouse, a Penan hut and a Malay village house, and a Chinese farm house. By mid-1989 a solemn house-warming ceremony with offerings and sacrifice put life into the empty wooden structures. The dream had become reality.
    </p>
</section>

<!--Sponsor-->
<div id="sponsors" style="background-color: #F5CB5C;">
  <div id="sponsorsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <!-- Carousel Inner -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="d-flex justify-content-center">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Bandaraya-Kuching-Utara-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 1">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Padawan-Municipal-Council-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 2">
          <img src="https://scv.com.my/wp-content/uploads/2018/09/Tourism-Malaysia-350x350.png" class="d-block mx-2 sponsor-img" alt="Sponsor 3">
        </div>
      </div>
      <div class="carousel-item">
        <div class="d-flex justify-content-center">
          <img src="https://whatthelogo.com/storage/logos/sarawak-convention-bureau-77000.png" class="d-block mx-2 sponsor-img" alt="Sponsor 4">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection

@push('about_styles')
<style>
    body {
        background-color: #242423;
        color: #CFDBD5;
        font-family: Arial, sans-serif;
    }

    .image-section {
        margin-bottom: 5px;
    }

    .image-section img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .about-section {
        padding: 50px;
        text-align: justify;
    }

    .about-section h1 {
        font-size: 36px;
        color: #F5CB5C;
        margin-bottom: 20px;
    }

    .about-section p {
        font-size: 16px;
        line-height: 1.8;
        color: #E8EDDF;
        max-width: 800px;
        margin: 0 auto;
    }

    .vision-mission {
        position: relative;
        width: 100%;
        height: 520px;
    }

    .vision-mission-image {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .vision-mission-image img {
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

    .vision-mission-text {
        position: absolute;
        top: 50%;
        left: 5%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.6);
        color: white;
        padding: 20px;
        border-radius: 20px;
        max-width: 45%;
        text-align: justify;
    }

    .history-section {
        padding: 50px;
        text-align: center;
        background-color: #242423;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .history-section h1 {
        font-size: 36px;
        color: #F5CB5C;
    }

    .history-section p {
        font-size: 16px;
        line-height: 1.8;
        color: #E8EDDF;
        max-width: 800px;
        margin: 0 auto;
    }

    .carousel-inner {
        text-align: center;
        padding: 0 40px;
    }

    .carousel-inner img {
        width: 180px;
        height: 180px;
        object-fit: contain;
        margin: 20px;
    }

    @media (max-width: 768px) {
        .vision-mission-text {
            max-width: 90%;
            left: 5%;
        }

        .carousel-inner img {
            width: 120px;
            height: 120px;
        }
    }
</style>
@endpush
