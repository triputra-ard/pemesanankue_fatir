<?php
include 'header.php';
$iduser = $_SESSION["id"];
 ?>
 <!-- navigation bar start -->
 <body class="fully-background" style="font-family:'Segoe UI';">
  <!-- navigation bar start -->
  <nav class="navbar navbar-dark navbar-expand-sm fixed-top bg-info">
    <div class="container">
      <button class="navbar-toggler toggler-default collapsed" data-toggle="collapse" data-target="#navcol-1">
        <span class="icon-bar-top top-bar"></span>
        <span class="icon-bar-middle middle-bar"></span>
        <span class="icon-bar-bottom bottom-bar"></span>
      </button>
     <h3 class="navbar-brand"><a href="#"><img src="<?php echo $logoLink; ?>" style="width:180px;height:80px;" alt="saung_logo"></a></h3>
    <div class="collapse navbar-collapse" id="navcol-1">
          <ul class="nav navbar-nav mr-auto">
            <li class="nav-item"><a href="shop?shop=buy" class="btn text-white <?php if($currentpage == "shop") echo "btn-primary active";?>"> <i class="fas fa-shopping-bag"></i> Belanja</a></li>
            <li class="nav-item"><a href="shop?shop=cart" class="btn text-white <?php if($currentpage == "cart") echo "btn-primary active";?>"> <i class="fas fa-shopping-cart"></i> Troli
              <?php
              $cartview = mysqli_query($db, "SELECT Count(*) From `keranjang` where id_user='$iduser'");
              $resultcart = mysqli_result($cartview,0);
               ?>
              <span class="badge badge-danger"><?php echo $resultcart; ?></span> </a></li>
            <li class="nav-item"><a href="shop?shop=checkout" class="btn text-white <?php if($currentpage == "checkout") echo "btn-primary active";?>"> <i class="fas fa-shopping-bag"></i> Checkout
              <?php
              $checkoutview = mysqli_query($db, "SELECT Count(*) From `checkout` where id_user='$iduser' and status_checkout != 'SELESAI'");
              $resultcheckout = mysqli_result($checkoutview,0);
               ?>
              <span class="badge badge-danger"><?php echo $resultcheckout; ?></span> </a></li>
          </ul>
          <span class="navbar-text">
            <li class="navbar-nav ml-auto navbar-top-right">
                <a class="nav-link" href="#" id="navbar-dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Info akun"><h3 class="text-white">[<?php echo $_SESSION["name"]; ?>] <i class="fas fa-angle-down"></i> </h3></a>
                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown animated slideInDown" aria-labelledby="#navbar-dropdown2">
                    <div class="nav-user-info bg-info">
                        <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION["name"]; ?> </h5>
                        <span class="ml-2 text-dark"><i class="fas fa-envelope"></i> <?php echo $_SESSION["email"]; ?></span>
                    </div>
                    <a class="dropdown-item onfocus <?php if($currentpage=="information") echo "actives"; ?>" href="information?info=aboutme"><i class="fas fa-info-circle mr-2"></i>Informasi Anda</a>
                    <a class="dropdown-item onfocus" href="" data-toggle="modal" data-target="#logout"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                </div>
            </li>
          </span>
        </div>

     </div>
  </nav>
 <br><br><br><br><br><br><br>
<?php require_once 'model/modal.logout.php'; ?>
