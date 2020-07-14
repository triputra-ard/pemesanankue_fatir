<div class="card-body">
  <div class="table-responsive">
    <table id="Admin_table" class="table table-bordered table-hover">
      <thead>
        <th>Nomor</th>
        <th>Produk</th>
        <th>Kuantitas</th>
        <th>Total</th>
        <th>Metode Pembayaran</th>
        <th>Dipesan pada</th>
        <th>Status pengiriman</th>
      </thead>
      <tbody>
        <?php
        $id = $_SESSION["id"];
        $nomor = 1;
        $sql = "SELECT * From pengiriman a
        Join checkout b on a.id_checkout=b.id_checkout
        Join checkout_detail c on a.id_checkout = c.id_checkout
        Join produk d on c.id_produk=d.id_produk
        Join pembayaran e on a.id_checkout = e.id_checkout
        where b.id_user  = '$id' and b.status_checkout ='SELESAI'
        ";
        $query = mysqli_query($db,$sql);
        while ($view = mysqli_fetch_assoc($query)) {
        ?>
        <tr class="text-dark">
          <td><?php echo $nomor++; ?></td>
          <td><img class="img-thumbnail" height="126px" width="126px" src="<?php echo $pictLink."/".$view['foto_produk']; ?>" alt="<?php echo $view['nama_produk']; ?>"><br> <?php echo $view['nama_produk']; ?></td>
          <td><?php echo $view['kuantitas_checkout']; ?></td>
          <td>Rp. <?php echo number_format($view['harga_checkout'],0,',','.'); ?><span class="text-primary"> ~sudah termasuk biaya pengiriman</span> </td>
          <td><?php echo $view['metode_pembayaran']; ?></td>
          <td><?php echo $view['tanggal_checkout']; ?></td>
          <td><?php echo $view['status_pengiriman']; ?>
            <br> <?php echo "Dikirim oleh : ".$view['kurir_pengiriman']; ?>
          </td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>
