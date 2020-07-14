<form class="" action="control/script.setting" method="post">
  <input required hidden type="text" name="id" value="<?php echo encrypt($_SESSION["id"]); ?>">
  <div class="form-group row">
    <div class="col-xl-4">
      <label>Alamat :</label>
    </div>
    <div class="col-xl-4">
      <textarea name="addresstext" rows="8" cols="40"><?php echo $_SESSION["address"]; ?></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-rounded btn-block btn-outline-success" name="address">Perbarui Alamat</button>
</form>
