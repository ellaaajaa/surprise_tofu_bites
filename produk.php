<?php
$whatsapp = "6281371279437"; // Ganti dengan nomor WA kamu
$menus = [
    ["nama" => "tahu toping", "harga" => "15.000", "tag" => "original", "img" => "uploads/toping.jpeg"],
    ["nama" => "tahu mentai", "harga" => "10.000", "tag" => "mentai", "img" => "uploads/mentai.jpeg"],
];

$toppings = ["Jamur Kuping", "Crab Stick", "Daun Bawang", "Cabe Setan 🌶️", "Keju 🧀", "Sosis", "Telur Puyuh", "Bawang Goreng"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu Favorit</title>
<?php include 'header.php'; ?>
</head>
<body>

<div class="container my-5 pt-4 text-center">
    <h1 class="fw-bold">Daftar Menu Favorit</h1>
    <p class="text-muted mb-5">Pilih varian favoritmu dan pesan langsung ke WhatsApp kami!</p>

    <div class="row g-4">
        <?php foreach($menus as $m): ?>
        <div class="col-md-3">
            <div class="card product-card shadow-sm h-100 position-relative">
                <div class="tag-badge"><?php echo $m['tag']; ?></div>
                <img src="<?php echo $m['img']; ?>" class="card-img-top" style="height: 250px; object-fit: cover;">
                <div class="card-body p-4">
                    <h5 class="fw-bold"><?php echo $m['nama']; ?></h5>
                    <p class="price">Rp <?php echo $m['harga']; ?></p>

                    <?php if($m['nama'] == "tahu toping"): ?>
                    <!-- Form Pilih Topping untuk Tahu Toping -->
                    <form id="form-<?php echo $m['tag']; ?>">
                        <div class="row g-2 mb-3">
                            <?php foreach($toppings as $i => $toping): ?>
                            <div class="col-6 text-start">
                                <div class="form-check">
                                    <input class="form-check-input topping-checkbox" type="checkbox" id="toping<?php echo $i; ?>" value="<?php echo $toping; ?>">
                                    <label class="form-check-label" for="toping<?php echo $i; ?>"><?php echo $toping; ?></label>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="btn btn-order w-100" onclick="orderTopping('<?php echo $m['nama']; ?>')">ORDER VIA WA</button>
                    </form>
                    <?php else: ?>
                    <?php 
                        $pesan = urlencode("Halo Surprise Tofu, saya mau pesan " . $m['nama'] . ". Apakah tersedia?");
                    ?>
                    <a href="https://wa.me/<?php echo $whatsapp; ?>?text=<?php echo $pesan; ?>" class="btn-order">ORDER VIA WA</a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
const maxSelect = 4;
document.querySelectorAll('.topping-checkbox').forEach(cb => {
    cb.addEventListener('change', function(){
        const checked = document.querySelectorAll('.topping-checkbox:checked');
        if(checked.length > maxSelect){
            this.checked = false;
            alert('Maksimal memilih 4 topping!');
        }
    });
});

function orderTopping(namaProduk){
    const selected = [];
    document.querySelectorAll('.topping-checkbox:checked').forEach(cb => selected.push(cb.value));
    if(selected.length == 0){
        alert('Silakan pilih minimal 1 topping!');
        return;
    }
    const message = `Halo Surprise Tofu, saya mau pesan ${namaProduk} dengan topping: ${selected.join(', ')}`;
    const waUrl = `https://wa.me/<?php echo $whatsapp; ?>?text=${encodeURIComponent(message)}`;
    window.open(waUrl, '_blank');
}
</script>

<?php include 'footer.php'; ?>
</body>
</html>