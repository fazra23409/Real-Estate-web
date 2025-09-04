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
    </style>
</head>
<body>
     

    <main>
        <div class="swiper-container swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/land1.jpg" alt="Tanah1"></div>
                <div class="swiper-slide"><img src="images/land2.jpg" alt="Tanah2"></div>
                <div class="swiper-slide"><img src="images/land3.jpg" alt="Tanah3"></div>
                <div class="swiper-slide"><img src="images/land4.jpeg" alt="Tanah4"></div>
                <div class="swiper-slide"><img src="images/land5.jpg" alt="Tanah5"></div>
                <div class="swiper-slide"><img src="images/land6.jpg" alt="Tanah6"></div>
                <div class="swiper-slide"><img src="images/land7.jpg" alt="Tanah7"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <section class="details">
           <h2><span style="color: red">"Motivated Seller"</span></h2>
            <h3>FEATURES:</h3>
            <ul>
                <li><strong>Judul:</strong> Land for Sale</li>
                <li><strong>Tipe:</strong> Tanah Kosong</li>
                <li><strong>Luas lahan:</strong> 1600 m²</li>
                <li><strong>Sertifikat:</strong> Hak Milik (SHM)</li>
                <li><strong>Akses Jalan:</strong> Jalan Aspal</li>
                <li><strong>Listrik:</strong> Tersedia di sekitar lokasi</li>
                <li><strong>Air:</strong> Tersedia (PDAM/Sumur Bor)</li>
                <li><strong>Internet:</strong> Tersedia jaringan Fiber Optic di area</li>
                <li><strong>Lingkungan:</strong> Tenang dan Strategis</li>
                <li><strong>Topografi:</strong> Datar dan Siap Bangun</li>
                <li><strong>Peruntukan:</strong> Perumahan / Villa / Investasi</li>
            </ul>
        </section>

        <section class="description">
            <h3>Tanah di Srengseng Sawah Jakarta Selatan</h3>
            <p>Berada di daerah Srengseng Jakarta Selatan</p>
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
            <button type="submit">Login untuk Inquiry</button>
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