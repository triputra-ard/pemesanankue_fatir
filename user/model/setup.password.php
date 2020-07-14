<form action="control/script.setting" method="post">
  <input required hidden type="text" name="id" value="<?php echo encrypt($_SESSION["id"]); ?>">
  <div class="form-group row">
    <div class="col-xl-4">
      <label>Password :</label>
    </div>
    <div class="col-xl-6">
      <input class="form-control" type="text" required name="passwordtext" value="<?php echo $_SESSION["password"]; ?>" >
    </div>
  </div>
  <button type="submit" class="btn btn-rounded btn-block btn-outline-success" name="password">Perbarui password</button>
</form>
