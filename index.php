<?php
// Data Konfgurasi


$nama_bisnis = "Surprise Tofu Bites";
$whatsapp = "628123456789"; // Ganti dengan nomor WA asli
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim Kami - <?php echo $nama_bisnis; ?></title>
    <?php include 'header.php'; ?>

    <style>
        body {
            background-color: #fdfbf7;
            font-family: 'Poppins', sans-serif;
        }
        .section-tim {
            padding: 60px 0;
        }
        .owner-card {
            border: none;
            background: #fff;
            border-radius: 25px;
            padding: 40px 20px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .owner-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(230, 126, 34, 0.15);
        }
        .owner-img {
            width: 140px;
            height: 140px;
            object-fit: cover;
            border-radius: 50%;
            border: 6px solid #fff5e6;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .owner-name {
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .owner-role {
            color: #e67e22;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .intro-text {
            max-width: 700px;
            margin: 0 auto 50px auto;
            color: #6c757d;
        }
  


        /* Hero Section (Sesuai Gambar 2) */
        .hero {
            position: relative;
            height: 100vh;
            width: 100%;
            /* Ganti 'hero-tofu.jpg' dengan foto produkmu yang paling bagus */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('uploads/toping.jpeg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .hero-content h1 span {
            color: #e67e22; /* Warna highlight oranye */
        }
        .hero-content p {
            font-size: 1.5rem;
            font-weight: 300;
            max-width: 800px;
            margin: 0 auto 30px auto;
        }
        .btn-lihat-menu {
            background-color: transparent;
            color: white;
            border: 2px solid white;
            padding: 12px 40px;
            font-size: 1.2rem;
            font-weight: 600;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn-lihat-menu:hover {
            background-color: white;
            color: black;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .hero-content h1 { font-size: 2.5rem; }
            .hero-content p { font-size: 1.1rem; }
        }
    </style>
</head>
<body>


    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Nikmati Tahu Bakso<br><span>Topping Istimewa!</span></h1>
                <p>Cemilan premium yang lezat dan bikin nagih, cocok untuk segala acara Anda.</p>
                <a href="produk.php" class="btn-lihat-menu">Lihat Menu Terbaik</a>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center bg-light">
        <p class="mb-0">&copy; <?php echo date("Y"); ?> <?php echo $nama_bisnis; ?>. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>