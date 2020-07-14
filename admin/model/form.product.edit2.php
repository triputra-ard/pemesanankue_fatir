<?php
$id = decrypt($_GET['id']);
$sql = "SELECT * from produk Where id_produk = '$id'";
$query = mysqli_query($db,$sql);
while ($photos = mysqli_fetch_assoc($query)) {
 ?>
<form id="form" action="control/script.product" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <div class="col-xl-4">
      <input class="form-control" hidden required="" type="text" name="id" value="<?php echo $id; ?>">
    </div>
  </div>
  <!--Photo example -->
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Unggah Foto Baru</label>
    </div>
    <div class="col-xl-3">
      <img class="img-responsive img-fluid" src="<?php echo $pictLink."/".$photos['foto_produk']; ?>" alt="<?php echo $id; ?>">
    </div>
    <div class="col-xl-2 alert alert-info">
      <h4 class="text-center">Foto yang diperbolehkan dengan ekstensi : jpg, jpeg, bmp, png <br>
        Dengan maksimum ukuran 2mb
       </h4>
    </div>
    <div class="col-xl-4">
      <input type="text" hidden name="imgunlink1" value="<?php echo "../../".$photos['foto_produk']; ?>">
      <input class="form-control" required="" type="file" name="file1" value="" onchange="previewImg1(event)">
      <img class="previewImage img-thumbnail" id="preview1">
    </div>
  </div>
  </div>
  <!--End Photo forms -->

  <button type="submit" name="editphotos" class="btn btn-block btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui Paket</button>
</form>
<?php } ?>
