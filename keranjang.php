<?php 
include "inc/config.php";
include "layout/header.php";

// Inisialisasi cart
if(empty($_SESSION['cart'])){
    $_SESSION['cart'] = '';
}

// Menangani aksi beli, update, dan delete
if(!empty($_GET['produk_id']) && $_GET['act']== 'beli'){
    $cart = unserialize($_SESSION['cart']);
    if($cart == '') $cart = [];
    $pid = $_GET['produk_id'];
    $qty = 1;

    if(isset($_GET['update_cart'])){
        if(isset($cart[$pid])){
            if($_GET['qty'] >= 1 && $_GET['qty'] <= 200){
                $cart[$pid] = $_GET['qty'];
            } elseif($_GET['qty'] >= 201){
                alert('Maximum Quantity adalah 200'); redir('keranjang.php');
            } else {
                alert('Minimal Quantity adalah 1'); redir('keranjang.php');
            }
        }
    } elseif(isset($_GET['delete_cart'])){
        if(isset($cart[$pid])) unset($cart[$pid]);
    } else {
        if(isset($cart[$pid])) $cart[$pid] += $qty;
        else $cart[$pid] = $qty;
    }

    $_SESSION['cart'] = serialize($cart);
    redir($url.'keranjang.php');
}
?>

<div id="wrapper" style="margin-right:auto; margin-left:auto; width:900px;">
    <div class="container" style="margin-top:10px;">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <h2>Keranjang anda :</h2>
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr style="background:#c3ebf8;font-weight:bold;">
                                <td style="width:15%">Produk</td>
                                <td style="width:40%">Details</td>
                                <td style="width:10%">QTY</td>
                                <td style="width:15%">Total</td>
                                <td style="width:5%" class="delete">&nbsp;</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $total = 0;
                        $cart = unserialize($_SESSION['cart']);
                        if($cart == '') $cart = [];

                        $wa_message = "Halo, saya ingin memesan:\n";

                        foreach($cart as $id => $qty){
                            $product = mysql_fetch_array(mysql_query("SELECT * FROM produk WHERE id='$id'"));
                            if(!empty($product)){
                                $subtotal = $qty * $product['harga'];
                                $total += $subtotal;

                                // Tambahkan ke pesan WA
                                $wa_message .= "- ".$product['nama']." x ".$qty." = Rp ".number_format($subtotal,0,',','.')."\n";
                        ?>
                        <tr class="barang-shop">
                            <td class="CartProductThumb">
                                <div> 
                                    <a href="<?= $url ?>produk.php?id=<?= $product['id'] ?>">
                                        <img src="<?= $url.'uploads/'.$product['gambar']; ?>" alt="img" width="120px">
                                    </a> 
                                </div>
                            </td>
                            <td>
                                <div class="CartDescription">
                                    <h4><a href="<?= $url ?>produk.php?id=<?= $product['id'] ?>"><?= $product['nama'] ?></a></h4>
                                    <div class="price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></div>
                                </div>
                            </td>                   
                            <td>
                                <form action="<?= $url ?>keranjang.php" method="GET"> 
                                    <input type="hidden" name="update_cart" value="update">
                                    <input type="hidden" name="act" value="beli">
                                    <input type="hidden" name="produk_id" value="<?= $id ?>">
                                    <input class="form-control" type="number" name="qty" value="<?= $qty ?>" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td class="price">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= $url ?>keranjang.php?delete_cart=yes&act=beli&produk_id=<?= $id ?>" title="Delete">
                                    <i class="glyphicon glyphicon-trash fa-2x"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } } ?>
                        <tr style="background:#c3ebf8;font-weight:bold;">
                            <td colspan="3">TOTAL</td>
                            <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div style="float:right;" class="col-sm-6 col-md-6">
                    <h4><b>Total Keranjang Belanja</b></h4>
                    <table class="table table-bordered">
                        <tr>
                            <td style="background:#fafafa;"><b>Total</b></td>
                            <td><b>Rp <?= number_format($total,0,',','.') ?></b></td>
                        </tr>
                    </table>

                    <?php 
                    // Encode pesan WA
                    $wa_message .= "Total: Rp ".number_format($total,0,',','.');
                    $wa_url = "https://wa.me/6281371279437?text=".urlencode($wa_message);
                    ?>

                    <a href="<?= $wa_url ?>" target="_blank">
                        <button type="button" class="btn btn-primary" <?= ($total==0)?'disabled':'' ?>>Lanjutkan &raquo;</button>
                    </a>
                </div>
            </div> 
        </div>     
    </div>
</div>

<?php include "layout/footer.php"; ?>