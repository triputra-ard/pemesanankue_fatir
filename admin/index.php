<?php
$titlePage = "Dasbor";
$currentpage = "dashboard";
include 'navigation.admin.php'; ?>
<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title text-white">Dasbor Administrator :  <small><?php echo $_SESSION["admin_name"]; ?></small> </h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <a href="add?new=product">
                          <div class="card py-4">
                              <div class="card-body">
                                  <div class="metric-value d-inline-block">
                                      <h3 class="mb-1">Tambah kue baru</h3>
                                  </div>
                                  <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                      <span class="badge badge-success"><i class="fas fa-plus"></i></span>
                                  </div>
                              </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                      <a href="table?view=neworder">
                        <div class="card py-1">
                            <div class="card-body">
                                <h5 class="text-muted">Pemesanan Baru</h5>
                                <div class="metric-value d-inline-block">

                                    <h3 class="mb-1"><?php echo $orderview; ?></h3>
                                </div>
                                <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                    <span class="badge badge-info"><i class="fa fa-fw fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <a href="table?view=transaction">
                          <div class="card py-1">
                              <div class="card-body">
                                  <h5 class="text-muted">Transaksi baru</h5>
                                  <div class="metric-value d-inline-block">

                                      <h3 class="mb-1"><?php echo $trxview; ?></h3>
                                  </div>
                                  <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                      <span class="badge badge-info"><i class="fa fa-fw fa-money-bill-wave"></i></span>
                                  </div>
                              </div>
                          </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                        <a href="table?view=transaction_success">
                          <div class="card py-1">
                              <div class="card-body">
                                  <h5 class="text-muted">Transaksi sukses</h5>
                                  <div class="metric-value d-inline-block">
                                      <?php
                                      $sumtrx = mysqli_query($db,
                                      "SELECT SUM(harga_checkout) as total From `checkout` a
                                      JOIN `pembayaran` b On a.id_checkout=b.id_checkout
                                      Where b.status_pembayaran = 'LUNAS' AND status_checkout='SELESAI'");
                                      $resultsum = mysqli_fetch_assoc($sumtrx);
                                       ?>
                                      <h2 class="mb-1">Rp. <?php echo number_format($resultsum['total'],0,'.',','); ?></h2>
                                  </div>
                              </div>
                          </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
