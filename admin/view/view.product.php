<div class="table-responsive">
  <table id="Admin_table" class="table table-bordered">
    <thead>
      <th>NO</th>
      <th>Foto</th>
      <th>Nama Produk</th>
      <th>Deskripsi</th>
      <th>Minimal Pembelian</th>
      <th>Jumlah Stok</th>
      <th>Harga</th>
      <th>Status Penjualan</th>
      <th>Ditambahkan pada</th>
      <th>Opsi</th>
    </thead>
    <tbody>
      <?php
      $nomor = 1;
      $sql = "SELECT * From `produk`";
      $query = mysqli_query($db,$sql);

      while ($view = mysqli_fetch_assoc($query)) {
       ?>
       <tr>
         <td><?php echo $nomor++ ;?></td>
         <td><img src="<?php echo $pictLink."/".$view['foto_produk']; ?>" class="img-thumbnail" alt="<?php echo $view['id_produk'];?>"> </td>
         <td><?php echo $view['nama_produk']; ?> (<?php
         if ($view['tipe_produk'] == "birthday") {
           echo "Kue Ulang Tahun";
         }elseif ($view['tipe_produk'] == "driedcake") {
           echo "Kue Kering";
         }elseif ($view['tipe_produk'] == "dessert") {
           echo "Kue Makanan Penutup";
         }elseif ($view['tipe_produk'] == "traditionalcake") {
           echo "Kue Basah/Tradisional";
         }elseif ($view['tipe_produk'] == "cakes") {
           echo "Macam-macam Cake";
         }?>)</td>
         <td><?php echo $view['deskripsi_produk']; ?></td>
         <td><?php echo $view['minimal_pembelian']; ?></td>
         <td><?php echo $view['jumlah_produk']; ?></td>
         <td>Rp.<?php echo number_format($view['harga_produk'],0,',','.'); ?></td>
         <td><?php echo $view['produk_jual'] ?></td>
         <td><?php echo $view['produk_tanggal'] ?></td>
         <td>
           <a href="edit?data=productinfo&id=<?php echo encrypt($view['id_produk']); ?>" title="Edit produk" class="btn btn-rounded btn-success"><i class="fas fa-edit"></i> </a>
           &nbsp;
           <a href="edit?data=productimg&id=<?php echo encrypt($view['id_produk']); ?>" title="Edit gambar" class="btn btn-rounded btn-info"><i class="fas fa-image"></i> </a>
           &nbsp;
           <a href="delete?data=product&id=<?php echo encrypt($view['id_produk']); ?>&name=<?php echo $view['nama_produk']; ?>" title="Hapus" class="btn btn-rounded btn-danger"><i class="fas fa-trash-alt"></i> </a>
         </td>
       </tr>
     <?php } ?>
    </tbody>
  </table>
</div>
