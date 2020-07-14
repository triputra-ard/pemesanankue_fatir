<?php
if (!empty($_GET['status'])) {
  if ($_GET['status'] == "sendmail") {
    $titlePage = "[Email dikirim]";
  }elseif ($_GET['status'] == "activated") {
    $titlePage = "[Aktif]";
  }elseif ($_GET['status'] == "notactive") {
    $titlePage = "[Tidak Aktif]";
  }elseif ($_GET['status'] == "blocked") {
    $titlePage = "[Diblokir]";
  }
}else {
  $titlePage = "Unknown action";
}
include 'navigation.common.php';
 ?>
 <div class="page-wrapper">

   <?php if (!empty($_GET['status'])): ?>
     <?php if ($_GET['status'] == "sendmail"): ?>

       <div class="col-xl-8 offset-xl-2">
         <div class="card bg-info animated bounceInDown">
           <div class="card-body">
             <h4 class="text-center text-white"><i class="fas fa-envelope"></i> Email sudah dikirim</h4>
             <p class="text-white text-white text-center">Hai, email kode aktivasi sudah dikirim. cek email kamu sekarang</p>
             <br>
             <div class="row justify-content-center">
               <div class="col-lg-4">
                 <a class="btn btn-secondary btn-rounded" href="control/script.register?resendmail&u=<?php echo $_GET['u']; ?>">Belum menerima email ?</a>
               </div>
               <div class="col-lg-4">
                 <a class="btn btn-secondary btn-rounded" href="<?php echo $pageverification; ?>">Masukkan kode aktivasi</a>
               </div>
             </div>
           </div>
         </div>
       </div>

    <?php elseif ($_GET['status'] == "activated"): ?>

      <div class="container-fluid">
        <center>
          <div class="col-xl-8">
            <div class="card bg-success animated bounceInDown">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-3 py-5">
                    <h1 class="text-center text-white"><i class="fas fa-check"></i> </h1>
                  </div>
                  <div class="col-lg-6 col-md-4 py-5">
                    <h4 class="text-center text-white">Hai pengguna ! Selamat. <br> <small>Akun kamu sekarang sudah aktif</small> </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </center>
      </div>

    <?php elseif ($_GET['status'] == "notactive"): ?>

      <div class="container-fluid">
          <div class="col-xl-8 offset-xl-2">
            <div class="card bg-danger animated bounceInDown">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-3 py-5">
                    <h1 class="text-center text-white"><i class="fas fa-times"></i> </h1>
                  </div>
                  <div class="col-lg-6 col-md-4 py-5">
                    <h4 class="text-center text-white">Hai pengguna ! Oh kamu belum terima email ? <br> <small>Cek email kamu sekarang dan aktivasi <a class="btn btn-dark" href="<?php echo $pageverification; ?>">disini</a> </small> </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

    <?php elseif ($_GET['status'] == "blocked"): ?>

      <div class="container-fluid">
          <div class="col-xl-8 offset-xl-2">
            <div class="card bg-warning animated bounceInDown">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-md-3 py-5">
                    <h1 class="text-center text-white"><i class="fas fa-user-slash"></i> </h1>
                  </div>
                  <div class="col-lg-6 col-md-4 py-5">
                    <h4 class="text-center text-white">Hai pengguna ! Akun kamu diblokir untuk sementara hubungi <b>@mail.com</b> untuk mengaktivasi akun kamu kembali</h4>
                  </div>
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
<?php include 'authors.footer.php'; ?>
