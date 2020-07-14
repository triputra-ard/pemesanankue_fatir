<?php
if (!empty($_GET['data'])) {
  if ($_GET['data'] == 'product') {
    $titlePage = "Hapus Produk";
    $currentpage = "product";
  }elseif ($_GET['data'] == 'user') {
    $titlePage = "Hapus Pengguna";
    $currentpage = "user";
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
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
              <?php if (!empty($_GET['data'])): ?>
                <?php if ($_GET['data'] == 'product'): ?>
                  <div class="card bg-danger">
                    <div class="card-body">
                      <h4 class="text-center text-white">Anda yakin ingin menghapus <b><?php echo $_GET['name']; ?></b>. Tindakan ini tidak dapat diurungkan. <br> Lanjutkan ? </h4>
                      <div class="row justify-content-center">
                        <div class="col-xl-6">
                          <a href="control/script.product?delete=<?php echo $_GET['id']; ?>" class="btn btn-block btn-rounded btn-success"> Ya </a>
                        </div>
                        <div class="col-xl-6">
                          <a href="#" onclick="takemeback()" class="btn btn-block btn-rounded btn-primary"> Tidak </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php elseif ($_GET['data'] == 'user'): ?>
                  <div class="card bg-danger">
                    <div class="card-body">
                      <h4 class="text-center text-white">Anda yakin ingin menghapus <b><?php echo $_GET['name']; ?></b>. Tindakan ini tidak dapat diurungkan. <br> Lanjutkan ? </h4>
                      <div class="row justify-content-center">
                        <div class="col-xl-6">
                          <a href="control/script.user?id=<?php echo $_GET['id']; ?>" class="btn btn-block btn-rounded btn-success"> Ya </a>
                        </div>
                        <div class="col-xl-6">
                          <a href="#" onclick="takemeback()" class="btn btn-block btn-rounded btn-primary"> Tidak </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <!-- Dynamical paging -->
              <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
