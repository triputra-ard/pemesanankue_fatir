<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>NO</th>
      <th>Nama Pengguna</th>
      <th>Pesanan</th>
      <th>Harga</th>
      <th>Foto transaksi</th>
      <th>Waktu transaksi</th>
      <th>Divalidasi</th>
      <th>Tipe pembayaran</th>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $sql = "SELECT * From pembayaran a
      JOIN checkout b On a.id_checkout = b.id_checkout
      JOIN checkout_detail c On a.id_checkout = c.id_checkout
      JOIN produk d On c.id_produk = d.id_produk
      JOIN pengguna e On b.id_user = e.id_user
      LEFT JOIN admin g On b.admin = g.id_admin
      Where a.status_pembayaran = 'LUNAS' AND b.status_checkout = 'SELESAI'";
      $query = mysqli_query($db,$sql);

      while ($view = mysqli_fetch_assoc($query)) {
        $current_time = $view['tanggal_checkout'];
        $replace_time = strtotime($current_time);
        $timestamp = date("D, d-M-Y", $replace_time);
       ?>
       <tr>
         <td><?php echo $nomor++ ;?></td>
         <td><?php echo $view['nama_pengguna']; ?></td>
         <td><?php echo $view['nama_produk']; ?> (<?php echo $view['kuantitas_checkout']; ?> Item)</td>
         <td>Rp.<?php echo number_format($view['harga_checkout'],0,',','.'); ?></td>
         <td><img class="img-thumbnail" src="<?php echo $pictLink."/".$view['foto_pembayaran']; ?>" height="120px" width="120px"></td>
         <td><?php echo $timestamp; ?> </td>
         <td>
           <?php if (!empty($view['admin'])): ?>
               Pembayaran via Bank diverifikasi : <?php echo $view['nama_admin'] ?>
             <?php else: ?>
               Pembayaran ditempat diverifikasi
           <?php endif; ?>
         </td>
         <td><?php echo $view['metode_pembayaran']; ?></td>
       </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
