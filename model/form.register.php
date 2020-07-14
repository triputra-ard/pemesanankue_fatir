<form id="form" data-parsley-validate="" novalidate="" method="post" action="control/script.register.php">
      <div class="form-group row">
          <label class="col-lg-2 col-form-label text-right"><i class="fas fa-id-card"></i></label>
          <div class="col-xl-10">
              <input required hidden type="text" name="id" value="<?php echo autokode("pengguna","u-"); ?>">
              <input name="fullname" type="text" required="" placeholder="Masukkan nama lengkap" class="form-control" onkeypress="return OnlyAlphabetic(event)">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-2 col-form-label text-right"><i class="fas fa-phone"></i></label>
          <div class="col-xl-10">
              <input name="phones" type="text" required="" placeholder="Masukkan nomor telepon" class="form-control" onkeypress="return OnlyNumber(event)">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-2 col-form-label text-right"><i class="fas fa-map"></i></label>
          <div class="col-xl-10">
              <textarea class="form-control" name="address" required="" rows="8" cols="80" placeholder="Masukkan alamat"></textarea>
          </div>
      </div>
      <div class="form-group row">
          <label class="col-lg-2 col-form-label text-right"><i class="fas fa-envelope"></i></label>
          <div class="col-xl-10">
              <input name="email" type="email" required="" data-parsley-type="email" placeholder="Masukkan alamat Email" class="form-control">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-xl-2 col-form-label text-right"><i class="fas fa-lock"></i></label>
          <div class="col-xl-10">
              <input name="password" id="inputPassword" type="password" required="" placeholder="Masukkan password" class="form-control">
          </div>
      </div>
      <div class="form-group row">
          <label class="col-xl-2 col-form-label text-right"><i class="fas fa-key"></i></label>
          <div class="col-xl-10">
              <input name="repeat_password" type="password" required="" placeholder="Ulangi password" data-parsley-equalto="#inputPassword" class="form-control">
          </div>
      </div>
      <div class="form-group">
        <button type="submit" name="register" class="btn btn-block btn-success btn-rounded">Daftar</button>
      </div>
</form>
