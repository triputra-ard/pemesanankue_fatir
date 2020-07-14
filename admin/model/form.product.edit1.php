<?php
$id = decrypt($_GET['id']);
$sql = "SELECT * from produk Where id_produk = '$id'";
$query = mysqli_query($db,$sql);
while ($info = mysqli_fetch_assoc($query)) {
 ?>
 <form id="form" action="control/script.product" method="post" enctype="multipart/form-data">
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">ID</label>
     </div>
     <div class="col-xl-4">
       <input class="form-control" readonly required="" type="text" name="id" value="<?php echo $info['id_produk']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Tipe</label>
     </div>
     <div class="col-xl-4">
       <?php $tipe = $info['tipe_produk']; ?>
       <select class="custom-select" name="tipe" required>
         <option value="">-Tipe Kue-</option>
         <option value="birthday"  <?php if($tipe == "birthday") echo "selected"; ?> >Kue Ulang Tahun</option>
         <option value="driedcake" <?php if($tipe == "driedcake") echo "selected"; ?> >Kue Kering</option>
         <option value="dessert" <?php if($tipe == "dessert") echo "selected"; ?> >Kue Makanan Penutup (Cth : Donat,macaron,dll)</option>
         <option value="traditionalcake" <?php if($tipe == "traditionalcake") echo "selected"; ?> >Kue Basah/Tradisional</option>
         <option value="cakes" <?php if($tipe == "cakes") echo "selected"; ?> >Macam-macam Cake</option>
       </select>
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Nama Produk</label>
     </div>
     <div class="col-xl-4">
       <input class="form-control" required="" type="text" name="nama" value="<?php echo $info['nama_produk']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Harga Produk</label>
     </div>
     <div class="col-xl-4">
       <input class="form-control" required="" min="0" type="number" name="harga" value="<?php echo $info['harga_produk']; ?>" onkeypress="return OnlyNumber(event)">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Minimum Pembelian</label>
     </div>
     <div class="col-xl-4">
       <input class="form-control" required="" type="number" min="0" name="minpembelian" value="<?php echo $info['minimal_pembelian']; ?>" onkeypress="return OnlyNumber(event)">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Stok Tersedia</label>
     </div>
     <div class="col-xl-4">
       <input class="form-control" required="" type="number" min="0" name="stok" value="<?php echo $info['jumlah_produk']; ?>" onkeypress="return OnlyNumber(event)">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-xl-2">
       <label class="text-white">Deskripsi Kue</label>
     </div>
     <div class="col-xl-6">
       <textarea id="summernote" name="deskripsi"><?php echo $info['deskripsi_produk']; ?></textarea>
     </div>
   </div>

   <button type="submit" name="editinfo" class="btn btn-block btn-primary"><i class="fas fa-edit"></i>Perbarui Produk</button>
 </form>
<?php } ?>
<script type="text/javascript">
  var summernoteplaceholder = "Tambahkan Deskripsi dari produk";
</script>
