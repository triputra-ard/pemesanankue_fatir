<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>Pengiriman</th>
      <th>Pesanan</th>
      <th>Penerima</th>
      <th>Tambahan pesanan</th>
      <th>Tanggal pengiriman</th>
      <th>Status</th>
      <th>Pengirim</th>
      <th>Diverifikasi</th>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $sql = "SELECT * From pengiriman a
      JOIN checkout b On a.id_checkout = b.id_checkout
      JOIN checkout_detail c ON b.id_checkout = c.id_checkout
      JOIN produk d ON c.id_produk = d.id_produk
      JOIN pengguna e On b.id_user = e.id_user
      LEFT JOIN admin f ON a.admin = f.id_admin
      Where a.status_pengiriman = 'TERKIRIM'";
      $query = mysqli_query($db,$sql);

      while ($view = mysqli_fetch_assoc($query)) {
        $current_time = $view['tanggal_pengiriman'];
        $replace_time = strtotime($current_time);
        $timestamp = date("D, d-M-Y", $replace_time);
       ?>
       <tr>
         <td class="bg-dark text-white"><?php echo $view['id_pengiriman'] ;?></td>
         <td class="bg-info text-white"><?php echo $view['nama_produk']; ?><br>
           (<?php echo $view['kuantitas_checkout']; ?> Item)
           <br> Rp.<?php echo number_format($view['harga_checkout'],0,',','.'); ?> </td>
         <td class="bg-success text-white"><?php echo $view['nama_pengguna']; ?> ,
           <br>
           <?php echo $view['alamat_checkout']; ?>
         </td>
         <td class="bg-primary text-white"><?php echo $view['deskripsi_checkout']; ?></td>
         <td class="bg-warning text-white"><?php echo $timestamp; ?></td>
         <td><?php echo $view['status_pengiriman']; ?></td>
         <td><?php echo $view['kurir_pengiriman']; ?> (<?php echo $view['kontak_pengiriman']; ?>)</td>
         <td><?php echo $view['nama_admin']; ?></td>
       </tr>
       <?php include 'model/modal.delivery.php'; ?>
     <?php } ?>
    </tbody>
  </table>
</div>
