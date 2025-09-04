<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("connection.php");

// pakai isset biar ga eror klo ada variabel yg mungkin blm ada
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['users']['user_id'];

$query = "SELECT username FROM users WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <!-- HEADER -->
    <header>
        <a href="" class="logo">
            <img src="images/logo2.png" alt="logo">
        </a>

        <i class="bi bi-list" id="menu-icon"></i>
        <!-- navbar -->
         <ul class="navbar">
            <li><a href="#home">Home</a></li>
            <li>
                <a href="#">Our Services</a>
                <ul class="dropdown">
                    <li><a href="villa.php">Villa For Rent</a></li>
                    <li><a href="land.php">Land For Sale</a></li>
                    <li><a href="House.php">House For sale</a></li>
                </ul>
            </li>
            <li><a href="#">Buying</a></li>
            <li><a href="#contact">Contact us</a></li>
         </ul>
         <!-- profile user -->
        <a href="profile.php" class="profile-icon">
        <i class="bi bi-person-circle" style="font-size: 1.8rem; color: white;"></i>
        </a>

        <!-- login -->
    <a href="login.php" class="login-icon">
      <i class="bi bi-box-arrow-in-right" style="font-size: 1.8rem; color: white;"></i>
    </a>
    </header>

    <!-- HOME -->
     <div class="home" id="home">
        <div class="home-content">
            <h1>Temukan rumah yang cocok <br> untukmu, Braga</h1>
            <h3>Bandung</h3>
            <p>2015, Jl. blok m, 12345678</p>
        </div>
     </div>

     <!-- search -->
       <form method="GET" action="action_search.php">
      <div class="hero-form-wrapper">
      <div class="form-tab">
        <div class="form-tab-item active" data-tab="tab1">Buy</div>
      </div>
       <!-- Category -->
    <div class="input-wrapper">
      <label for="category" class="input-label">Select Categories:</label>
      <select name="category" id="category" class="dropdown-list">
        <option value="villa_rent">Villa Rental</option>
        <option value="house">House for Sale</option>
        <option value="land">Land For sale</option>
      </select>
    </div>

        <!-- Min Price -->
    <div class="input-wrapper">
      <label for="min-price" class="input-label">Min price:</label>
      <select name="min-price" id="min-price" class="dropdown-list">
        <option value="1000000">IDR 1,000,000</option>
        <option value="2000000">IDR 2,000,000</option>
        <option value="3000000">IDR 3,000,000</option>
        <option value="4000000">IDR 4,000,000</option>
        <option value="5000000">IDR 5,000,000</option>
      </select>
    </div>
          <!-- Max Price -->
    <div class="input-wrapper">
      <label for="max-price" class="input-label">Max price:</label>
      <select name="max-price" id="max-price" class="dropdown-list">
        <option value="2000000">IDR 2,000,000</option>
        <option value="3000000">IDR 3,000,000</option>
        <option value="4000000">IDR 4,000,000</option>
        <option value="5000000">IDR 5,000,000</option>
      </select>
    </div>
          <!-- Submit Button -->
    <button type="submit" class="btn-primary">Search</button>
  </div>
</form>
    </div>
    
      <div class="about">
        <div class="container">
            <div class="about-box">
                <div class="box">
                    <img src="images/pool.jpg" alt="">
                </div>
             <div class="box hidden">
                <h1>About Us</h1>
                <p> kami hadir untuk mewujudkan kehidupan ideal Anda melalui pilihan properti eksklusif yang mengutamakan kenyamanan, keindahan, dan nilai investasi jangka panjang. Dari vila mewah di tepi pantai hingga lahan strategis yang menjanjikan, kami berkomitmen memberikan solusi properti terbaik yang disesuaikan dengan kebutuhan dan gaya hidup Anda.
                Temukan hunian impian Anda bersama Pandawa Property. </p>
             </div>
            </div>
        </div>
      </div>

       <section>
        <div class="section-detail">
            <div class="section-detail-box">
                <p>Real Estate</p>
            </div>
            <div class="section-detail-box">
                <p><a href="villa.php">Villa</a></p>
            </div>
            <div class="section-detail-box">
                <p><a href="house.php">House</a></p>
            </div>
            <div class="section-detail-box">
                <p><a href="land.php">Land</a></p>
            </div>
        </div>
       </section>

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

<section class="contact" id="contact">
        <h2 class="hidden">CONTACT US</h2>
        <p>lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>

      <!-- lokasi -->
        <div class="row">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.643603848463!2d106.88091507409945!3d-6.439794162970598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eaeb5ad2e223%3A0x202422049ad3bc3b!2sSMKN%201%20Depok!5e0!3m2!1sid!2sid!4v1744391207304!5m2!1sid!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>

          <form action="contact.php" method="POST">
            <div class="input-group">
              <i class="bi bi-person-circle"></i>
              <input type="text" name="username" placeholder="Your Name" required>
            </div>

            <div class="input-group">
              <i class="bi bi-envelope"></i>
              <input type="email" name="email" placeholder="Your Email" required>
            </div>
             <div class="input-group">
            <i class="bi bi-chat-fill"></i>
              <input type="text" name="message" placeholder="Your Messages" required>
            </div>
            <button type="submit" class="btn">Kirim</button>
          </form>
        </div>
     </section>
    <footer>
    <div class="footer-container">
        <div class="footer-column">
            <h3><i class="bi bi-globe"></i> ADDRESS</h3>
            <p>Main street of Pandawa<br>Senayan - South Jakarta - Indonesia</p>
            
            <h3>HAVE ANY QUESTIONS?</h3>
            <p>info@pandawaproperty.com</p>

            <h3> CALL US & HIRE US</h3>
            <p>+62 812345678</p>
        </div>

        <!-- Kolom 2: Property Alert -->
        <div class="footer-column">
            <h3><i class="bi bi-star"></i> PROPERTY ALERT</h3>
            <p>Stay informed on the latest Jakarta and Pandawa Property happenings and be the first to hear about our new listings!</p>
            
            <div class="subscribe-form">
                <input type="email" placeholder="Email Address">
                <button>SUBSCRIBE</button>
            </div>

            <p>We respect your privacy</p>
        </div>

        <!-- Kolom 3: Layanan -->
        <div class="footer-column">
            <h3><i class="bi bi-tag"></i>  SERVICES</h3>
            <ul>
                <li>Villas For Sale</li>
                <li>Land For Sale</li>
                <li>Villa Rental Service</li>
            </ul>
        </div>
    </div>

    <!-- Copyright & Social Media -->
    <div class="footer-bottom">
        <p>Copyright © PT. Ubud Property, 2015. All rights reserved.</p>
        <div class="social-icons">
            <i class="fab fa-twitter"></i>
            <i class="fab fa-facebook"></i>
            <i class="fab fa-linkedin"></i>
            <i class="fab fa-dribbble"></i>
        </div>
    </div>
</footer>

   
<!-- js buat animasi klo di scroll -->
 <!-- bagian intersection buat nambahin animasi fadein klo di scroll -->
  <!-- add event listener itu bakal ngejalanin kode setelah selesai dimuat -->
   <!-- intersection observer elemen nya udh keliatan dilayar apa blm -->
  <script>
    document.addEventListener("DOMContentLoaded", ()=>{
      const observer = new IntersectionObserver((entries)=>{
        entries.forEach(entry=>{
          if(entry.isIntersecting){
            setTimeout(() => {
              entry.target.classList.add("visible");
              // visible itu class buat animasi fadein
            }, 200);
            observer.unobserve(entry.target);
            // observer unobserve animasi cuman dijalanin sekali
          }
        });
      }, {
        threshold: 0.3 //klo layar udh masuk 30%, maka animasinya baru kerja di tag .hidden
      });
      // queryselector buat nambahin semua selector yg ada di class hiddennnnnnnnnnnn

      document.querySelectorAll(".hidden").forEach((el)=>{
        observer.observe(el);
      });
    })
    
    const buttons = document.querySelectorAll('.section-detail-box');
    </script>
</body>
</html>