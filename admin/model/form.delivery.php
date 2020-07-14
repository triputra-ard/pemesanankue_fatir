<form id="form" action="control/script.delivery" method="post">
  <div class="form-group row">
    <input type="text" hidden required name="admin" value="<?php echo encrypt($_SESSION["id_admin"]); ?>">
    <input type="text" hidden name="checkout" value="<?php echo encrypt($view['id_checkout']); ?>">
    <input type="text" hidden name="delivery" value="<?php echo encrypt($view['id_pengiriman']); ?>">
    <div class="col-xl-3">
      <label>Nama Kurir :</label>
    </div>
    <div class="col-xl-6">
      <input class="form-control" required type="text" name="courier" value="" placeholder="Masukkan nama kurir/pengirim">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-3">
      <label>Info Kontak Kurir :</label>
    </div>
    <div class="col-xl-6">
      <input class="form-control" required type="number" name="contact" value="" onkeypress="return OnlyNumber(event)" placeholder="Masukkan nomor telepon kurir">
    </div>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-block btn-primary" name="inshipping">Perbarui</button>
  </div>
</form>
