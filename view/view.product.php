<?php
$currentpage = "shop?shop=buy";
$paging = 3;
$pages = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$number = 1;
$start = ($pages>1) ? ($pages * $paging) - $paging : 0;
$previous = $pages - 1;
$next = $pages + 1;
$sqlresult = "SELECT * From produk";
$queryresult = mysqli_query($db, $sqlresult);
$totalpage = mysqli_num_rows($queryresult);
$pagination = ceil($totalpage/$paging);
$sqlfetch = "SELECT * FROM produk
LIMIT $start,$paging";
$query = mysqli_query($db, $sqlfetch);?>
<div class="row">
  <?php while ($product = mysqli_fetch_assoc($query)) { ?>
    <div class="col-xl-4 col-sm-12 col-12">
        <div class="product-thumbnail transparent">
            <div class="product-img-head">
                <div class="product-img">
                    <img src="<?php echo $pictLink."/".$product['foto_produk']; ?>" alt="" class="img-responsive img-fluid"></div>
            </div>
            <div class="product-content">
                <div class="product-content-head">
                    <h3 class="product-title text-white"><?php echo $product['nama_produk']; ?></h3>
                    <div class="product-price text-white">Rp. <?php echo number_format($product['harga_produk'],0,',','.'); ?></div>
                </div>
                <div class="product-btn">
                    <a href="#"  data-toggle="modal" data-target="#asklogin" class="btn btn-primary">Beli</a>
                    <a href="shop?shop=detail&product=<?php echo encrypt($product['id_produk']) ?>" class="btn btn-info">Lihat detail</a>
                </div>
            </div>
        </div>
    </div>
  <?php } ?>
</div>
<?php include 'function/pagination.php'; ?>
