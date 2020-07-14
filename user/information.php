<?php
if (!empty($_GET['info'])) {
  if ($_GET['info'] == "aboutme") {
    $titlePage = "Informasi Pengguna";
    $currentpage = "information";
  }elseif ($_GET['info'] == "setting") {
    $titlePage = "Pengaturan Pengguna";
    $currentpage = "information";
  }elseif ($_GET['info'] == "history") {
    $titlePage = "Riwayat Pembelian";
    $currentpage = "information";
  }elseif ($_GET['info'] == "success") {
    $titlePage = "SUKSES";
  }elseif ($_GET['info'] == "waiting") {
    $titlePage = "Menunggu Pembayaran";
  }

}
include 'navigation.user.php'; ?>
<div class="page-wrapper">
  <div class="container-fluid">

    <?php if (!empty($_GET['info'])): ?>
      <?php if ($_GET['info'] == "aboutme"): ?>
        <!--===============Start Section============-->
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="text-left">Informasi pengguna</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <td>Nama</td>
                    <td><?php echo $_SESSION["name"]; ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION["email"]; ?></td>
                  </tr>
                  <tr>
                    <td>Nomor Telepon</td>
                    <td><?php echo $_SESSION["phone"]; ?></td>
                  </tr>
                  <tr>
                    <td>Password</td>
                    <td>
                      <?php $pass = encrypt($_SESSION["password"]); ?>
                      <button type="button" class="btn btn-lg btn-primary" data-toggle="popover" title=""
                      data-content="<?php $decyrpt = decrypt($pass); echo $decyrpt; ?>"
                      data-original-title="Password Anda" ><?php echo $pass; ?></button></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?php echo $_SESSION['address']; ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Pembelian</td>
                    <?php
                    $id = $_SESSION["id"];
                    $history = mysqli_query($db,"SELECT Count(*) from `checkout` Where id_user = '$id' And status_checkout = 'SELESAI'");
                    $historycount = mysqli_result($history,0);
                     ?>
                    <td> <?php echo $historycount; ?> <a href="?info=history" class="text-primary">Lihat Riwayat Pembelian >></a> </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="card-footer-item card-footer-item-bordered bg-primary">
              <a class="footer-link text-white" href="?info=setting">Perbarui informasi <i class="fas fa-chevron-right"></i> </a>
            </div>
          </div>
        </div>
        <!--===============End Section============-->
      <?php elseif ($_GET['info'] == "setting"): ?>
        <!--===============Start Section============-->
        <div class="offset-xl-3 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
          <div class="section-block">
              <h5 class="section-title text-white">Pengaturan Pengguna</h5>
          </div>
          <div class="pills-vertical">
              <div class="row">
                  <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="fas fa-id-badge"></i> Pengaturan Informasi</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                           <i class="fas fa-key"></i> Pengaturan Password</a>
                          <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                           <i class="fas fa-map-marked-alt"></i> Pengaturan Alamat  </a>
                      </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 ">
                      <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <?php include 'model/setup.information.php'; ?>
                          </div>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <?php include 'model/setup.password.php'; ?>
                          </div>
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <?php include 'model/setup.address.php'; ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
          <!--===============End Section============-->
        <?php elseif ($_GET['info'] == "success"): ?>
          <div class="col-xl-6 offset-xl-3">
            <div class="card bg-success animated bounceInDown">
              <div class="card-body">
                <h3 class="text-white text-center">SUKSES <i class="fas fa-fw fa-check"></i> </h3><br>
                <h5 class="text-white text-center">Pesanan anda diproses cek informasi pengiriman di <span class="text-dark"> Menu Checkout</span> </h5>
              </div>
            </div>
          </div>

        <?php elseif ($_GET['info'] == "history"): ?>
        <div class="col-xl-12">
          <div class="card transparent-white">
            <div class="card-header">
              <h3 class="text-center">Riwayat Pembelian : <?php echo $_SESSION["name"]; ?> </h3>
            </div>
            <div class="card-body">
              <?php include 'view/view.history.php'; ?>
            </div>
          </div>
        </div>

        <?php elseif ($_GET['info'] == "waiting"): ?>
          <div class="col-xl-6 offset-xl-3">
            <div class="card bg-warning animated bounceInDown">
              <div class="card-body">
                <div class="alert bg-primary">
                  <h4 class="text-white">Lakukan pembayaran via <?php echo $bank; ?></h4>
                </div>

                <h3 class="text-white text-center">Menunggu Pembayaran <i class="fas fa-fw fa-history"></i> </h3><br>
                <h5 class="text-white text-center">Pesanan anda diproses, kirim foto pembayaran di <span class="text-dark"> Menu Checkout</span> </h5>
              </div>
            </div>
          </div>
      <?php endif; ?>
    <?php endif; ?>




    <!-- bottom page -->
  </div>
</div>
<?php include 'authors.footer.php'; ?>
