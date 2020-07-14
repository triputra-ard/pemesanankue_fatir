<?php
if (!empty($_GET['section'])) {
  if ($_GET['section'] == "register") {
    $titlePage = "Daftar baru";
  }elseif ($_GET['section'] == "login") {
    $titlePage = "Login";
  }elseif ($_GET['section'] == "equal") {
    $titlePage = "Email sudah ada";
  }elseif ($_GET['section'] == "verification") {
    $titlePage = "Verifikasi";
  }elseif ($_GET['section'] == "admin") {
    $titlePage = "Login Admin";
  }
}else {
  $titlePage = "Unknown action";
}
session_start();
include 'header.php';
?>
<body class="fully-background">
<br><br><br><br>
  <div class="section-wrapper">

    <?php if (!empty($_GET['section'])): ?>
      <?php if ($_GET['section'] == "register"): ?>

        <div class="container-fluid">
          <div class="offset-xl-4 py-5 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-center"><i class="fas fa-users"></i> Daftar baru</h4>
                </div>
                <div class="card-body">
                  <?php include 'model/form.register.php'; ?>
                </div>
                <div class="card-footer">
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $pageLogin; ?>"><i class="fas fa-sign-in-alt"></i> Masuk disini</a>
                  </div>
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $home; ?>"><i class="fas fa-home"></i> Ke beranda</a>
                  </div>
                </div>
              </div>
            </div>
        </div>

      <?php elseif ($_GET['section'] == "login"): ?>

        <div class="container-fluid">
          <div class="offset-xl-4 py-5 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="text-center"><i class="fas fa-sign-in-alt"></i> Masuk</h4>
                </div>
                <div class="card-body">
                  <?php include 'model/form.login.php'; ?>
                </div>
                <div class="card-footer">
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $pageregister; ?>"><i class="fas fa-pencil-alt"></i> Daftar disini</a>
                  </div>
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $home; ?>"><i class="fas fa-home"></i> Ke beranda</a>
                  </div>
                </div>
              </div>
            </div>
        </div>

      <?php elseif ($_GET['section'] == "equal"): ?>

        <div class="container-fluid">
            <div class="col-xl-6 offset-xl-3">
              <div class="card bg-danger">
                <div class="card-body">
                  <h4 class="text-center text-white"><i class="fas fa-envelope"></i> Email sudah ada !</h4>
                  <form id="form" data-parsley-validate="" novalidate="" method="post" action="control/script.register">
                        <div class="form-group row">
                            <label class="col-xl-1 col-form-label text-right text-white"><i class="fas fa-envelope"></i></label>
                            <div class="col-xl-8">
                                <input required hidden type="text" name="id" value="<?php echo $_SESSION["id_temp"]; ?>">
                                <input name="email" type="email" required="" value="<?php echo $_SESSION["email_temp"]; ?>" data-parsley-type="email" placeholder="Masukkan alamat Email" class="form-control rounded-right">
                            </div>
                        </div>
                        <div class="form-group">
                          <button type="submit" name="equal" class="btn btn-block btn-success btn-rounded">Daftar</button>
                        </div>
                  </form>
                </div>
              </div>
            </div>
        </div>

      <?php elseif ($_GET['section'] == "verification"): ?>

        <div class="container-fluid">
          <center>
            <div class="col-xl-8">
              <div class="card bg-primary animated bounceInDown">
                <div class="card-body">
                  <h4 class="text-center text-white"><i class="fas fa-lock"></i> Masukkan kode aktivasi</h4>
                  <?php include 'model/form.activation.php'; ?>
                </div>
                <div class="card-footer">
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $pageLogin; ?>"><i class="fas fa-sign-in-alt"></i> Masuk disini</a>
                  </div>
                  <div class="card-footer-item card-footer-item-bordered">
                    <a class="footer-link" href="<?php echo $home; ?>"><i class="fas fa-home"></i> Ke beranda</a>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>

      <?php elseif ($_GET['section'] == "admin"): ?>

          <div class="container-fluid">
            <div class="offset-xl-4 py-5 col-xl-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center"><i class="fas fa-id-badge"></i> Masuk Admin</h4>
                  </div>
                  <div class="card-body">
                    <?php include 'model/form.login.admin.php'; ?>
                  </div>
                  <div class="card-footer">
                    <div class="card-footer-item card-footer-item-bordered">
                      <a class="footer-link" href="<?php echo $pageregister; ?>"><i class="fas fa-pencil-alt"></i> Daftar disini</a>
                    </div>
                    <div class="card-footer-item card-footer-item-bordered">
                      <a class="footer-link" href="<?php echo $home; ?>"><i class="fas fa-home"></i> Ke beranda</a>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      <?php endif; ?>
    <?php else: ?>
      <?php include 'model/endpoint.php'; ?>
    <?php endif; ?>

  </div>

<?php include 'footer.php'; ?>
