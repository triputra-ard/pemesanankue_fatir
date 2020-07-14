  <div class="card-body">
    <div class="table-responsive">
      <table id="Admin_table" class="table table-bordered table-hover">
        <thead>
          <th>ID checkout</th>
          <th>Produk</th>
          <th>Kuantitas</th>
          <th>Total</th>
          <th>Metode Pembayaran</th>
          <th>Dipesan pada</th>
          <th>Status pengiriman</th>
          <th>Kurir pengiriman</th>
        </thead>
        <tbody>
          <?php
          $checkout = decrypt($_GET['delivery']);
          $sql = "SELECT * From pengiriman a
          Join checkout b on a.id_checkout=b.id_checkout
          Join checkout_detail c on a.id_checkout = c.id_checkout
          Join produk d on c.id_produk=d.id_produk
          Join pembayaran e on a.id_checkout = e.id_checkout
          where a.id_checkout  = '$checkout' and b.status_checkout !='SELESAI'
          ";
          $query = mysqli_query($db,$sql);
          while ($view = mysqli_fetch_assoc($query)) {
          ?>
          <tr class="text-dark">
            <td><?php echo $view['id_checkout']; ?></td>
            <td><img class="img-thumbnail" height="126px" width="126px" src="<?php echo $pictLink."/".$view['foto_produk']; ?>" alt="<?php echo $view['nama_produk']; ?>"><br> <?php echo $view['nama_produk']; ?></td>
            <td><?php echo $view['kuantitas_checkout']; ?></td>
            <td>Rp. <?php echo number_format($view['harga_checkout'],0,',','.'); ?><span class="text-primary"> ~sudah termasuk biaya pengiriman</span> </td>
            <td><?php echo $view['metode_pembayaran']; ?></td>
            <td><?php echo $view['tanggal_checkout']; ?></td>
            <td><?php echo $view['status_pengiriman']; ?>
              <?php if ($view['status_pengiriman'] == "DALAM PENGIRIMAN"): ?>
                <a href="#" data-toggle="modal" data-target="#finish-<?php echo $view['id_pengiriman']; ?>" class="btn btn-success btn-rounded"><i class="fas fa-check"></i> Sudah diterima</a>
              <?php endif; ?>
            </td>
            <td>
              <?php if (!empty($view['kurir_pengiriman'])): ?>
                <?php echo $view['kurir_pengiriman']; ?>
                  <br> <?php echo "(".$view['kontak_pengiriman'].")"; ?>
                  <br> <?php echo "Dikirim :".$view['tanggal_pengiriman']; ?>
              <?php else: ?>
                <p>Tunggu ya.. pesananmu lagi dibuat nih.. :)</p>
              <?php endif; ?>
            </td>
          </tr>
          <?php include 'model/modal.askfinish.php'; ?>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
