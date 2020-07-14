  <div class="card-body">
    <div class="table-responsive">
      <table id="Admin_table" class="table table-bordered table-hover">
        <thead>
          <th>ID checkout</th>
          <th>Produk</th>
          <th>Kuantitas</th>
          <th>Total</th>
          <th>Status</th>
          <th>Opsi</th>
        </thead>
        <tbody>
          <?php
          $id = $_SESSION["id"];
          $sql = "SELECT * From checkout_detail a
          Left Join checkout b on a.id_checkout=b.id_checkout
          Join produk c on a.id_produk=c.id_produk
          Left Join admin d On b.admin = d.id_admin
          where b.id_user = '$id' AND b.status_checkout != 'SELESAI'
          ";
          $query = mysqli_query($db,$sql) or die(mysqli_error($db));
          while ($view = mysqli_fetch_assoc($query)) {
          ?>
          <tr class="text-dark">
            <td><?php echo $view['id_checkout']; ?></td>
            <td><img class="img-thumbnail" height="126px" width="126px" src="<?php echo $pictLink."/".$view['foto_produk']; ?>" alt="<?php echo $view['nama_produk']; ?>"><br> <?php echo $view['nama_produk']; ?></td>
            <td><?php echo $view['kuantitas_checkout']; ?></td>
            <td>Rp. <?php echo number_format($view['harga_checkout'],0,',','.'); ?></td>
            <td><?php echo $view['status_checkout']; ?></td>
            <td>
              <?php if ($view['status_checkout'] == "PENDING"): ?>
                <!--<?php if (!empty($view['admin'])): ?>
                  Checkout anda dibatalkan, mohon melakukan pembayaran tidak melebihi 8 jam
                <?php endif; ?> -->
                <a href="#" data-target="#askdelete-<?php echo $view['id_checkout'];?>" data-toggle="modal" class="btn btn-danger" title="Hapus Checkout"><i class="fas fa-times"></i> </a>&nbsp;
                <a href="shop?shop=checkout&checkout=<?php echo encrypt($view['id_checkout']); ?>" class="btn btn-primary <?php if($view['jumlah_produk']<$view['kuantitas_checkout']) echo "disabled"; ?>">
                  Lanjutkan Checkout <i class="fas fa-angle-double-right"></i><?php if($view['jumlah_produk']<$view['kuantitas_checkout']) echo "[Checkout ini tidak dapat diproses]"; ?></a>

              <?php elseif ($view['status_checkout'] == "MENUNGGU PEMBAYARAN"): ?>
                  <a href="shop?shop=checkout&transaction=<?php echo encrypt($view['id_checkout']); ?>" class="btn btn-success">Kirim bukti pembayaran <i class="fas fa-angle-double-right"></i> </a>
                  <?php if (!empty($view['id_admin'])): ?>
                    <h3>(Transaksi gagal diverifikasi : <?php echo $view['nama_admin']; ?>)</h3>
                  <?php endif; ?>
                <?php elseif ($view['status_checkout'] == "MENUNGGU KONFIRMASI"): ?>
                  <h5>Kami sedang memverifikasi pembayaran kamu. Mohon tunggu ya.. engga bakal lama kok <i class="fas fa-grin-wink"></i> </h5>
              <?php else: ?>
                    <a href="shop?shop=checkout&delivery=<?php echo encrypt($view['id_checkout']); ?>" class="btn btn-info">Lihat informasi pengiriman <i class="fas fa-angle-double-right"></i> </a>
              <?php endif; ?>
            </td>
          </tr>
          <?php include 'model/modal.askdelete.php'; ?>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
