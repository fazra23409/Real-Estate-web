<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pandawa Property</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="home.css">
  <script>

document.addEventListener("DOMContentLoaded", function() {
    // document add event listener itu buat nunggu halaman selesai dimuat, baru jalan kode di dalamya
  const dropdownLinks = document.querySelectorAll('.dropdown a');
//   const dropdown bakal ngambil semua link yang ada di dropdown
  const normalLinks = document.querySelectorAll('.navbar > li > a:not([href="#"])');
//   normalLinks bakal ngambil semua link di navbar yang bukan link kosong
  const buyingInPandawa = document.querySelector('li > a[href="#rekomendasi-properti"]');
//   buyingInPandawa bakal ngambil link yang ada di rekomendasi properti
  const contactUs = document.querySelector('li > a[href="#contact"]');

  const isLoggedIn = localStorage.getItem('loggedIn') === 'true';


  dropdownLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      if (!isLoggedIn) {
        event.preventDefault();
        alert("Anda harus login untuk mengakses fitur ini.");
        window.location.href = "login.php";
      }
    });
  });
//   untuk setiap link yang ada di dropdown, pas di klik bakal dijalanin fungsi add event listener. klo blm login bakal ada alert

  normalLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      if (!isLoggedIn && this.getAttribute('href') !== "#home" && this.getAttribute('href') !== "#rekomendasi-properti" && this.getAttribute('href') !== "#contact") {
        event.preventDefault();
        alert("Anda harus login untuk mengakses fitur ini.");
        window.location.href = "login.php";
      }
    });
  });

  if (buyingInPandawa) {
    buyingInPandawa.addEventListener('click', function(event) {
      if (!isLoggedIn) {
        event.preventDefault();
        alert("Anda harus login untuk mengakses fitur ini.");
        window.location.href = "login.php";
      }
    });
  }

  if (contactUs) {
    contactUs.addEventListener('click', function(event) {
      if (!isLoggedIn) {
        event.preventDefault();
        alert("Anda harus login untuk mengakses fitur ini.");
        window.location.href = "login.php";
      }
    });
  }

  const services = document.querySelector('.navbar li:nth-child(2)');
  services.addEventListener('mouseover', function() {
    this.querySelector('.dropdown').style.display = 'flex';
  });
  services.addEventListener('mouseleave', function() {
    this.querySelector('.dropdown').style.display = 'none';
  });

  // Disable back cache
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}

  </script>

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
</head>

<body>

<header>
  <a href="#" class="logo">
    <img src="images/logo2.png" alt="Logo">
  </a>
  <i class="bi bi-list" id="menu-icon"></i>
  <ul class="navbar">
    <li><a href="#home">Home</a></li>
    <li>
      <a href="#">Our Services</a>
      <ul class="dropdown">
        <li><a href="vill.php">Villa Rental</a></li>
        <li><a href="land.php">Land for Sale</a></li>
        <li><a href="house.php">House for Sale</a></li>
      </ul>
    </li>
    <li><a href="#rekomendasi-properti">Buying In Pandawa</a></li>
    <li><a href="#contact">Contact Us</a></li>
  </ul>
</header>

 <!-- HOME -->
     <div class="home" id="home">
        <div class="home-content">
            <h1>Temukan rumah yang cocok <br> untukmu, Braga</h1>
            <h3>Bandung</h3>
            <p>2015, Jl. blok m, 12345678</p>
        </div>
     </div>

 <!-- ABOUT US -->
 <div class="about">
       <div class="container">
         <div class="about-box">
          <div class="box">
            <img src="images/header.jpg" alt="">
          </div>
          <div class="box hidden">
            <h1>About Us</h1>
            <p>
              kami hadir untuk mewujudkan kehidupan ideal Anda melalui pilihan properti eksklusif yang mengutamakan kenyamanan, keindahan, dan nilai investasi jangka panjang. Dari vila mewah di tepi pantai hingga lahan strategis yang menjanjikan, kami berkomitmen memberikan solusi properti terbaik yang disesuaikan dengan kebutuhan dan gaya hidup Anda.
              Temukan hunian impian Anda bersama Pandawa Property. 
            </p>
          </div>
        </div>
</div>
<div class="expertise-container2">
    <div class="property-card">
        <img src="images/header2.jpg" alt="Cafe">
        <div class="property-info">
        <div class="property-header">
            <span class="price">Rp 2.500.000.000</span>
            <h3>Harbor View Hideaway</h3>
        </div>
        <p>Lorem ipsum dolor sit amet</p>
        </div>
    </div>
    </div>

        <!-- PROFILE TEAM -->
        <section id="about">
  <div class="team">
    <div class="team-member">
      <img src="images/rachel.jpeg" alt="Rachel Safina">
      <h3>Rachel Safina</h3>
      <p>Back End</p>
    </div>
    <div class="team-member">
      <img src="images/fazra (2).jpeg" alt="Fatriyanti Adzra Mursyidah">
      <h3>Fatriyanti Adzra Mursyidah</h3>
      <p>Front-End</p>
    </div>
  </div>
</section>

     </div>


</body>
</html>
