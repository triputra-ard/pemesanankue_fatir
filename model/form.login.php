<form id="form" data-parsley-validate="" novalidate="" method="post" action="control/script.login">
      <div class="form-group row">
          <label  class="col-lg-4 col-form-label text-right text-dark"><i class="fas fa-envelope"></i> Email</label>
          <div class="col-xl-8">
              <input name="email"  type="email" required="" data-parsley-type="email" placeholder="Masukkan Alamat Email" class="form-control">
          </div>
      </div>
      <div class="form-group row">
          <label  class="col-xl-4 col-form-label text-right text-dark"><i class="fas fa-key"></i> Password</label>
          <div class="col-xl-8">
              <input name="password" type="password" required="" placeholder="Masukkan Password" class="form-control">
          </div>
      </div>
      <div class="form-group col-xl-4 offset-xl-6">
        <button type="submit" name="user" class="btn btn-block btn-primary btn-rounded">Masuk</button>
      </div>
</form>
