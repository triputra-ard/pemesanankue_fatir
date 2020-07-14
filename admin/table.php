<?php
if (!empty($_GET['view'])) {
  if ($_GET['view'] == 'product') {
    $titlePage = "Lihat Produk";
    $currentpage = "product";
    $headertitle = "Produk";
  }elseif ($_GET['view'] == 'neworder') {
    $titlePage = "Lihat Pemesanan Baru";
    $currentpage = "orders";
    $headertitle = "Pemesanan";
  }elseif ($_GET['view'] == 'order') {
    $titlePage = "Lihat Pemesanan";
    $currentpage = "orders";
    $headertitle = "Pemesanan";
  }elseif ($_GET['view'] == 'user_register') {
    $titlePage = "Lihat Pengguna Terdaftar";
    $currentpage = "user";
    $headertitle = "Pengguna";
  }elseif ($_GET['view'] == 'user_notregister') {
    $titlePage = "Lihat Pengguna Tidak Terdaftar";
    $currentpage = "user";
    $headertitle = "Pengguna";
  }elseif ($_GET['view'] == 'transaction') {
    $titlePage = "Lihat Transaksi";
    $currentpage = "trx";
    $headertitle = "Transaksi";
  }elseif ($_GET['view'] == 'transaction_success') {
    $titlePage = "Lihat Transaksi Sukses";
    $currentpage = "trx";
    $headertitle = "Transaksi";
  }else {
    $titlePage = "UNKNOWN";
    $currentpage = "trx";
    $headertitle = "UNKNOWN";
  }
}
/* Initial paging */
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
                          <h2 class="pageheader-title text-white">Master Data <?php echo $headertitle; ?></h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
              <?php if (!empty($_GET['view'])): ?>
                <?php if ($_GET['view'] == 'product'): ?>
                  <div class="card">
                    <div class="card-header">
                      <h4>Daftar produk</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.product.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'neworder'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Lihat Pemesanan</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.neworder.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'order'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Lihat Pemesanan</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.order.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'user_register'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Daftar pengguna dengan email</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.user.registered.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'user_notregister'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Daftar pengguna tidak terdaftar</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.user.notregistered.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'transaction'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Transaksi Baru</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.transaction.process.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['view'] == 'transaction_success'): ?>

                  <div class="card">
                    <div class="card-header">
                      <h4>Transaksi Sukses</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'view/view.transaction.success.php'; ?>
                    </div>
                  </div>
                <?php else :?>
                  <div class="card">
                    <div class="card-body">
                      <h4 class="text-center">Umm.. terjadi kesalahan periksa url</h4>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- Dynamical paging -->
              <?php endif; ?>
            </div>

            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
