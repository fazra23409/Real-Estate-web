<?php
session_start();

if (!empty($_SESSION['users'])) {
    $loggedIn = true;
} else {
    $loggedIn = false;
}

if (!empty($_GET['property_id'])) {
    $property_id = (int)$_GET['property_id'];
} else {
    $property_id = 0;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        header {
            background: #fff;
            padding: 15px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }


        .swiper-container {
            max-width: 800px;
            margin: 20px auto;
            border-radius: 10px;
            overflow: hidden;
        }

        .swiper-slide img {
            width: 100%;
            height: 80vh;
            object-fit: cover;
            border-radius: 10px;
            display: block;
        }

        .details {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        ul li {
            list-style: none;
        }

        .description, .inquiry {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        form input, form textarea, form button {
            width: 100%;
            margin: 5px 0;
            padding: 10px;
        }

        form button {
            background: green;
            color: white;
            border: none;
            cursor: pointer;
            background: #8E1616;
        }
       .inquiry-button {
            background-color: #8E1616;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .inquiry-button:hover {
            background-color: #a81f1f;
        }

    </style>
</head>
<body>
     

    <main>
        <div class="swiper-container swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/header2.jpg" alt="Villa 1"></div>
                <div class="swiper-slide"><img src="images/ruangtamu.jpg" alt="RuangTamu"></div>
                <div class="swiper-slide"><img src="images/dapur.jpeg" alt="dapur"></div>
                <div class="swiper-slide"><img src="images/kamar.jpg" alt="kamar"></div>
                <div class="swiper-slide"><img src="images/kamarmandi.jpg" alt="kamarmandi"></div>
                <div class="swiper-slide"><img src="images/ruangsantai.jpg" alt="ruangsantai"></div>
                <div class="swiper-slide"><img src="images/ruangsantai2.jpg" alt="ruangsantai2"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <section class="details">
                <h2><span style="color: red">"Motivated Seller"</span></h2>
                <h3>FEATURES:</h3>
                <ul>
                    <li><strong>Judul:</strong> Rumah Dijual</li>
                    <li><strong>Tipe:</strong> Rumah Tinggal</li>
                    <li><strong>Lantai:</strong> 2</li>
                    <li><strong>Kamar:</strong> 3</li>
                    <li><strong>Kamar Mandi:</strong> 2</li>
                    <li><strong>Dapur:</strong> Ya</li>
                    <li><strong>Garasi:</strong> 1 mobil</li>
                    <li><strong>Taman:</strong> Depan & Belakang</li>
                    <li><strong>Listrik:</strong> 2,200 watt</li>
                    <li><strong>Air:</strong> PDAM</li>
                    <li><strong>Internet:</strong> Fiber Optic tersedia</li>
                    <li><strong>Furnitur:</strong> Semi-Furnished</li>
                    <li><strong>Luas Tanah:</strong> 160 m²</li>
                    <li><strong>Luas Bangunan:</strong> 120 m²</li>
                    <li><strong>Sertifikat:</strong> SHM (Sertifikat Hak Milik)</li>
                </ul>
        </section>

        <section class="description">
            <h3>Rumah di Jakarta yang mewah tapi masih ramah di kantong</h3>
            <p>Berada di daerah Menteng Jakarta Selatan</p>
        </section>

       
    <div class="inquiry">
        <h3>Inquiry</h3>
        <?php if ($loggedIn): ?>
        <form action="inquiry_form.php" method="post">
        <input type="hidden" name="id_property" value="<?php echo $property_id; ?>">
            <button type="submit">Kirim Inquiry</button>
        </form>
        <?php else: ?>
        <form action="login.php" method="get">
             <button type="submit" class="inquiry-button">Login untuk Inquiry</button>
        </form>
        <?php endif; ?>
    </div>
     </main>
    
    
    <script>
        window.onload = function() {
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                spaceBetween: 10,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        };
    </script>
</body>
</html>