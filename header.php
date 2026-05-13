<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        .navbar {
            background-color: white !important;
            padding: 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .navbar-brand {
            font-weight: 700;
            color: #e67e22 !important; /* Warna oranye brand */
            font-size: 1.5rem;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 10px;
        }
        .nav-link:hover {
            color: #e67e22 !important;
        }
        .btn-pesan-header {
            background-color: #e67e22;
            color: white !important;
            border-radius: 50px;
            padding: 8px 25px !important;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }
        .btn-pesan-header:hover {
            background-color: #d35400;
            box-shadow: 0 4px 15px rgba(230,126,34,0.3);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php">SURPRISE TOFU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="produk.php">Produk</a></li>
                <li class="nav-item"><a class="nav-link" href="timkami.php">Tim Kami</a></li>
                <li class="nav-item ms-lg-3">
                    <a class="nav-link btn-pesan-header" href="https://wa.me/628123456789">Pesan Sekarang</a>
                </li>
            </ul>
        </div>
    </div>
</nav>