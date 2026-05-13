<?php 
// Konfigurasi Data Tim (Bisa kamu tambah sesuai kebutuhan)
$nama_bisnis = "Surprise Tofu Bites";
$tim_owner = [
    ["nama" => "Ella Anggraini", "jabatan" => "Founder & Lead Chef", "img" => "img/owner1.jpg"],
    ["nama" => "Yohana Juniati", "jabatan" => "Co-Founder & Operations", "img" => "img/owner2.jpg"],
    ["nama" => "Wisnaini", "jabatan" => "Head of Marketing", "img" => "img/owner3.jpg"],
    ["nama" => "Esia", "jabatan" => "Quality Control", "img" => "img/owner4.jpg"],
];
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
    </style>
</head>
<body>

<section class="section-tim">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bold mb-3" style="font-size: 3rem;">Wajah di Balik <span style="color: #e67e22;">Kelezatan</span></h1>
            <p class="intro-text fs-5">
                Surprise Tofu Bites dikelola oleh tim kreatif yang berdedikasi tinggi untuk memastikan kualitas camilan terbaik sampai ke tangan Anda.
            </p>
        </div>

        <div class="row g-5 justify-content-center text-center">
            <?php foreach($tim_owner as $anggota): ?>
            <div class="col-6 col-md-3">
                <div class="owner-card h-100">
                    <img src="<?php echo $anggota['img']; ?>" 
                         class="owner-img" 
                         alt="<?php echo $anggota['nama']; ?>" 
                         onerror="this.src='https://via.placeholder.com/150x150?text=User'">
                    <h5 class="owner-name"><?php echo $anggota['nama']; ?></h5>
                    <p class="owner-role mb-0"><?php echo $anggota['jabatan']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

</body>
</html>