<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>NO</th>
      <th>Nama Pengguna</th>
      <th>Pesanan</th>
      <th>Harga</th>
      <th>Foto transaksi</th>
      <th>Waktu transaksi</th>
      <th>Opsi</th>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $sql = "SELECT * From checkout a
      JOIN pengguna b On a.id_user = b.id_user
      JOIN checkout_detail c ON a.id_checkout = c.id_checkout
      JOIN produk d On c.id_produk = d.id_produk
      JOIN pembayaran e On a.id_checkout = e.id_checkout
      LEFT JOIN admin f On a.admin = f.id_admin
      Where a.status_checkout = 'MENUNGGU KONFIRMASI' OR a.status_checkout = 'MENUNGGU PEMBAYARAN'";
      $query = mysqli_query($db,$sql) or die (mysqli_error($db));

      while ($view = mysqli_fetch_assoc($query)) {
        $trx_time = strtotime($view['tanggal_checkout']);
        $local = date("Y-m-d H:i:s");
        $localtime = strtotime($local);
        $diff = $localtime - $trx_time;
        $hour = floor($diff/(60*60));
        $minute = $diff - $hour*(60*60);
       ?>
       <tr>
         <td><?php echo $nomor++ ;?></td>
         <td><?php echo $view['nama_pengguna']; ?></td>
         <td><?php echo $view['nama_produk']; ?>(<?php echo $view['kuantitas_checkout'] ?> Item)</td>
         <td>Rp.<?php echo number_format($view['harga_checkout'],0,',','.'); ?></td>
         <td><img class="img-thumbnail" src="<?php echo $pictLink."/".$view['foto_pembayaran']; ?>"> </td>
         <td><?php echo $hour; ?> Jam <?php echo floor($minute/60); ?> Menit yang lalu</td>
         <td>
           <?php if ($view['status_checkout'] == "MENUNGGU PEMBAYARAN"): ?>
             <?php if (!empty($view['id_admin'])): ?>
                Belum dikonfirmasi/Tidak dapat diverifikasi : <?php echo $view['nama_admin']."(Admin)"; ?>
                <?php else: ?>
                Pengguna belum memverifikasi/melakukan pembayaran
             <?php endif; ?>
             <!--<form class="" action="control/script.transaction" method="post">
               <input type="text" hidden name="admin" required value="<?php echo encrypt($_SESSION["id_admin"]); ?>">
               <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
               <input type="text" hidden name="payment" value="<?php echo encrypt($view['id_pembayaran']); ?>">
               <button type="submit" class="btn btn-rounded btn-danger" name="cancel" title="Batalkan transaksi ini"><i class="fas fa-trash"></i> Batalkan</button>
             </form>-->
             <?php else: ?>
               <form class="" action="control/script.transaction" method="post">
                 <input type="text" hidden name="admin" required value="<?php echo encrypt($_SESSION["id_admin"]); ?>">
                 <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
                 <input type="text" hidden name="payment" value="<?php echo encrypt($view['id_pembayaran']); ?>">
                 <input type="text" hidden name="product" value="<?php echo encrypt($view['id_produk']); ?>">
                 <input type="text" hidden name="quantity" value="<?php echo $view['kuantitas_checkout']; ?>">
                 <button type="submit" class="btn btn-rounded btn-success" name="accept" title="Pembayaran sah"><i class="fas fa-check"></i> Terverifikasi</button>
               </form>
               <form class="" action="control/script.transaction" method="post">
                 <input type="text" hidden name="admin" required value="<?php echo encrypt($_SESSION["id_admin"]); ?>">
                 <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
                 <input type="text" hidden name="payment" value="<?php echo encrypt($view['id_pembayaran']); ?>">
                 <input type="text" hidden name="photosremove" value="<?php echo "../../".$view['foto_pembayaran']; ?>">
                 <button type="submit" class="btn btn-rounded btn-danger" name="decline" title="Pembayaran tidak sah"><i class="fas fa-times"></i> Tidak Sah</button>
               </form>
           <?php endif; ?>
         </td>
       </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
