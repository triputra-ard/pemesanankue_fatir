<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>Pengiriman</th>
      <th>Pesanan</th>
      <th>Penerima</th>
      <th>Tambahan pesanan</th>
      <th>Tanggal pesanan</th>
      <th>Status</th>
      <th>Opsi</th>
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
      Where a.status_pengiriman != 'TERKIRIM'";
      $query = mysqli_query($db,$sql);

      while ($view = mysqli_fetch_assoc($query)) {
        $current_time = $view['tanggal_checkout'];
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
         <td>
           <?php if ($view['status_pengiriman'] == "PENDING"): ?>
             <form class="" action="control/script.delivery" method="post">
               <input type="text" hidden required name="admin" value="<?php echo encrypt($_SESSION["id_admin"]); ?>">
               <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
               <input type="text" hidden name="delivery" value="<?php echo encrypt($view['id_pengiriman']); ?>">
               <button type="submit" class="btn btn-primary" name="packed"><i class="fas fa-box"></i> Dikemas</button>
             </form>
             <br>
             <a href="#" data-toggle="modal" data-target="#modalpacking-<?php echo $view['id_pengiriman']; ?>" class="btn btn-success"><i class="fas fa-shipping-fast"></i> Sedang dikirim</a>
           <?php elseif ($view['status_pengiriman'] == "DIPROSES"): ?>
             <?php if (!empty($view['admin'])): ?>
               Pesanan dikonfirmasi pengemasan : <?php echo $view['nama_admin']."(Admin)"; ?>
             <?php endif; ?>
             <br>
             <a href="#" data-toggle="modal" data-target="#modalpacking-<?php echo $view['id_pengiriman']; ?>" class="btn btn-success"><i class="fas fa-shipping-fast"></i> Sedang dikirim</a>
             <?php else: ?>
               Pesanan Sedang Dikirim : <?php echo $view['kurir_pengiriman']; ?> <br>
               Diverifikasi : <?php echo $view['nama_admin']; ?>
           <?php endif; ?>
           </td>
       </tr>
       <?php include 'model/modal.delivery.php'; ?>
     <?php } ?>
    </tbody>
  </table>
</div>
