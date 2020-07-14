<?php if (empty($_GET['search'])): ?>
  <h3 class="text-center">Hmm.. kuenya belum ada nih, coba lagi nanti ya...</h3>
<?php else: ?>
    <?php
    $search = isset($_GET['search'])  ? (string)$_GET['search'] : '';
    $currentpage = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $paging = 3;
    $pages = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $number = 1;
    $start = ($pages>1) ? ($pages * $paging) - $paging : 0;
    $previous = $pages - 1;
    $next = $pages + 1;
    $sqlresult = "SELECT * From produk Where nama_produk Like '%$search%'";
    $queryresult = mysqli_query($db, $sqlresult);
    $totalpage = mysqli_num_rows($queryresult);
    $pagination = ceil($totalpage/$paging);
    $sqlfetch = "SELECT * From produk Where nama_produk Like '%$search%'
    LIMIT $start,$paging";
    $query = mysqli_query($db, $sqlfetch);
    ?>
    <?php if (mysqli_num_rows($query) === 0): ?>
      <h3 class="text-center">Hmm.. kuenya belum ada nih, coba lagi nanti ya...</h3>
    <?php else: ?>
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
    <?php endif; ?>
<?php endif; ?>
