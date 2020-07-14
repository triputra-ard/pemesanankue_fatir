<form id="form" data-parsley-validate="" novalidate="" action="control/script.login.admin" method="post">
      <div class="form-group row">
          <label  class="col-lg-4 col-form-label text-right"><i class="fas fa-id-badge"></i> Username</label>
          <div class="col-xl-8">
              <input name="user"  type="text" required=""  placeholder="Masukkan Username" class="form-control">
          </div>
      </div>
      <div class="form-group row">
          <label  class="col-xl-4 col-form-label text-right"><i class="fas fa-key"></i> Password</label>
          <div class="col-xl-8">
              <input name="password" type="password" required="" placeholder="Masukkan Password" class="form-control">
          </div>
      </div>
      <div class="form-group">
        <button type="submit" name="admin" class="btn btn-block btn-primary btn-rounded">Masuk</button>
      </div>
</form>
