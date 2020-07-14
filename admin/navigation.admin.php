<?php include 'header.php'; ?>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-primary fixed-top">
            <a class="navbar-brand text-white" href="index">Zona Admin </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-angle-down text-white"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-fw fa-user-circle text-white"></i> </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION["admin_username"]; ?> </h5>
                                <span class="badge badge-success">On</span><span class="ml-2">Tersedia</span>
                            </div>
                            <a class="dropdown-item" href="admin?admin=you"><i class="fas fa-user mr-2"></i>Info Anda</a>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logout"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <br><br>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-light transparent-white">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
                <a class="d-xl-none d-lg-none text-dark" href="#"><i class="fas fa-laptop"></i> Dasbor</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link text-primary <?php if($currentpage == "dashboard") echo "text-success"; ?>" href="index">
                              <i class="fa fa-fw fa-laptop"></i>Dasbor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php if($currentpage == "orders") echo "text-success"; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#menu4" aria-controls="menu4">

                              <i class="fa fa-fw fa-shipping-fast"></i> Pemesanan &nbsp;
                              <?php
                              $orders = mysqli_query($db, "SELECT Count(*) from `pengiriman` Where status_pengiriman !='TERKIRIM'");
                              $orderview = mysqli_result($orders,0);
                               ?>
                              <span class="badge badge-primary">
                                <?php if ($orderview > 0): ?>
                                  Baru
                                <?php else: ?>
                                  0
                                <?php endif; ?>
                              </span></a>
                            <div id="menu4" class="collapse submenu" style="">
                              <ul class="nav flex-column">
                                  <li class="nav-item">
                                      <a class="nav-link text-white" href="table?view=neworder"><i class="fas fa-calendar-check"></i> Pemesanan Baru <span class="badge badge-primary"> <?php echo $orderview ?></span></a>
                                  </li>
                              </ul>
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=order"><i class="fas fa-calendar-check"></i> Lihat Pemesanan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php if($currentpage == "user") echo "text-success"; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#menu1" aria-controls="menu1">
                              <i class="fa fa-fw fa-users"></i>Master Data Pengguna</a>
                            <div id="menu1" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=user_register"><i class="fas fa-users"></i> Lihat Pengguna dengan Email</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=user_notregister"><i class="fas fa-user-times"></i> Lihat Pengguna tanpa Email</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php if($currentpage == "product") echo "text-success"; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#menu2" aria-controls="menu2">
                              <i class="fa fa-fw fa-plus-circle"></i>Master Data Produk</a>
                            <div id="menu2" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="add?new=product"><i class="fas fa-plus"></i> Tambah Kue</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=product"><i class="fas fa-birthday-cake"></i> Lihat Kue</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary <?php if($currentpage == "trx") echo "text-success"; ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#menu3" aria-controls="menu3">
                              <i class="fa fa-fw fa-money-check"></i>Master Data Transaksi
                              <?php
                              $transaction = mysqli_query($db, "SELECT Count(*) from `checkout` Where status_checkout = 'MENUNGGU KONFIRMASI' OR status_checkout = 'MENUNGGU PEMBAYARAN'");
                              $trxview = mysqli_result($transaction,0);
                               ?>
                              <span class="badge badge-primary">
                              <?php if ($trxview > 0): ?>
                                Baru
                                <?php else: ?>
                                  0
                              <?php endif; ?>
                              </span> &nbsp;
                            </a>
                            <div id="menu3" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=transaction"><i class="fas fa-money-bill-alt"></i> Lihat Transaksi
                                          <span class="badge badge-info"><?php echo $trxview; ?></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="table?view=transaction_success"><i class="fas fa-check"></i> Lihat Transaksi Sukses</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                          <a class="nav-link text-danger" href="" data-toggle="modal" data-target="#logout"><i class="fas fa-power-off mr-2"></i>Keluar</a>
                        </li>

                        <li class="nav-divider">
                          <small class="text-dark">CONCEPT Admin @ colorlib</small>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
<?php include 'model/modal.logout.php' ?>
