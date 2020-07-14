<form class="" action="control/script.setting" method="post">
  <input required hidden type="text" name="id" value="<?php echo encrypt($_SESSION["id"]); ?>">
  <div class="form-group row">
    <div class="col-xl-4">
      <label>Nama :</label>
    </div>
    <div class="col-xl-6">
      <input class="form-control" type="text" required name="fullname" value="<?php echo $_SESSION["name"]; ?>" onkeypress="return OnlyAlphabetic(event)">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-4">
      <label>Nomor Telepon :</label>
    </div>
    <div class="col-xl-6">
      <input class="form-control" type="number" required name="phone" value="<?php echo $_SESSION["phone"]; ?>" onkeypress="return OnlyNumber(event)">
    </div>
  </div>
  <button type="submit" class="btn btn-rounded btn-block btn-outline-success" name="info">Perbarui Informasi</button>
</form>
