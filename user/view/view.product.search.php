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
                      <div class="d-flex d-row product-btn">
                          <div class="p-2">
                            <form class="" action="control/script.cart" method="post">
                              <input type="text" hidden name="id" value="<?php echo autokode("keranjang", "t-") ?>">
                              <input type="text" hidden name="user" value="<?php echo encrypt($_SESSION["id"]); ?>">
                              <input type="text" hidden name="product" value="<?php echo encrypt($product['id_produk']); ?>">
                              <input type="text" hidden name="productprices" value="<?php echo encrypt($product['harga_produk']); ?>">
                              <input type="text" hidden name="quantity" value="<?php echo $product['minimal_pembelian']; ?>">
                              <button type="submit" name="quickbuy" class="btn btn-primary"> Beli</button>
                            </form>
                          </div>
                          <div class="p-2">
                              <a href="shop?shop=detail&product=<?php echo encrypt($product['id_produk']) ?>" class="btn btn-info">Lihat detail</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        <?php } ?>
      </div>
      <?php include '../function/pagination.php'; ?>
    <?php endif; ?>
<?php endif; ?>
