<form class="" action="control/script.transaction" method="post" enctype="multipart/form-data">
  <input hidden type="text" name="id" value="<?php echo $_GET['transaction']; ?>">
  <div class="alert bg-primary">
    <h4 class="text-white">Lakukan pembayaran via <?php echo $bank; ?></h4>
  </div>
  <div class="alert alert-info">
    <h4>File foto bukti pembayaran harus berekstensi : JPG/JPEG/BMP/PNG <br> Dengan maksimal ukuran file : 3mb <br>
      Kami akan melakukan Verifikasi pembayaran anda paling lambat 8 jam dari transaksi, cek konfirmasi dari kami di <b class="text-success">Menu Checkout</b>
     </h4>
  </div>
  <div class="form-group row">
    <div class="col-xl-4">
      <label>Pilih file bukti transaksi</label>
    </div>
    <div class="col-xl-8">
      <input type="file" class="form-control" name="trxfile" onchange="previewImg1(event)">
      <img class="previewImage img-thumbnail" id="preview1">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-success btn-rounded btn-block" name="transaction"><i class="fas fa-check"></i> Verifikasi pembayaran</button>
  </div>
</form>
