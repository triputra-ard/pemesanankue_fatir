<?php if (empty($_GET['product'])): ?>
  <div class="alert alert-danger">
    <h4>Umm.. sesuatu bermasalah, harap coba lagi nanti</h4>
  </div>
<?php else: ?>
  <div class="row">
      <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="row">
            <?php
            $getid = decrypt($_GET['product']);
            $sql = "SELECT * FROM produk WHERE id_produk = '$getid'";
            $query = mysqli_query($db,$sql);
            while ($product = mysqli_fetch_assoc($query)) {
            ?>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30 bg-dark">
                  <div class="product-slider bg-dark">
                      <img class="img-thumbnail img-responsive" src="<?php echo $pictLink."/".$product['foto_produk'] ?>" alt="<?php echo $product['nama_produk'] ?>">
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                  <div class="product-details">
                      <div class="border-bottom pb-3 mb-3">
                          <h2 class="mb-3"><?php echo $product['nama_produk']; ?></h2>
                          <h3 class="mb-0 text-primary">IDR <?php echo number_format($product['harga_produk'],0,',','.'); ?></h3>
                      </div>
                      <div class="border-bottom pb-3 mb-3">
                          <h3 class="mb-3 text-secondary text-center"><?php if ($product['tipe_produk'] == "birthday") {
                            echo "Kue Ulang Tahun";
                          }elseif ($product['tipe_produk'] == "driedcake") {
                            echo "Kue Kering";
                          }elseif ($product['tipe_produk'] == "dessert") {
                            echo "Kue Makanan Penutup";
                          }elseif ($product['tipe_produk'] == "traditionalcake") {
                            echo "Kue Basah/Tradisional";
                          }elseif ($product['tipe_produk'] == "cakes") {
                            echo "Macam-macam Cake";
                          } ?></h3>
                      </div>
                      <div class="product-description pb-3 mb-3">
                          <div class="d-flex flex-row mb-3 justify-content-center">
                            <div class="p-3">
                              <p><b>Minimal Pembelian </b> : <?php echo $product['minimal_pembelian']; ?></p>
                            </div>
                            <div class="p-3">
                              <p><b>Jumlah tersedia </b> : <?php echo $product['jumlah_produk']; ?></p>
                            </div>
                          </div>
                          <h5 class="mb-1">Deskripsi produk</h5>
                          <p><?php echo $product['deskripsi_produk']; ?></p>

                          <form class="" action="control/script.cart" method="post">
                            <div class="d-flex flex-row justify-content-center">
                              <div class="p-2">
                                <input type="text" hidden name="id" value="<?php echo autokode("keranjang","t-") ?>">
                                <input type="text" hidden name="user" value="<?php echo encrypt($_SESSION["id"]); ?>">
                                <input type="text" hidden name="product" value="<?php echo encrypt($product['id_produk']); ?>">
                                <input type="text" hidden name="productprices" value="<?php echo encrypt($product['harga_produk']); ?>">
                                <input required class="form-control mr-5" type="number" name="quantity" value="" onkeypress="return OnlyNumber(event)" placeholder="Pilih kuantitas" min="<?php echo $product['minimal_pembelian']; ?>"
                                max="<?php echo $product['jumlah_produk']; ?>">
                              </div>
                              <div class="p-2">
                                <button type="submit" class="btn btn-block btn-primary" name="add"><i class="fas fa-shopping-cart"></i> Tambah troli</button>
                              </div>
                            </div>
                          </form>

                      </div>
                  </div>
              </div>
              <?php } ?>
          </div>
        </div>
      </div>
<?php endif; ?>
