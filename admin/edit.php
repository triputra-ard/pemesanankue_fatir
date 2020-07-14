<?php
if (!empty($_GET['data'])) {
  if ($_GET['data'] == 'productinfo') {
    $titlePage = "Perbarui Produk";
    $currentpage = "product";
    $headertitle = "Produk";
  }elseif ($_GET['data'] == 'productimg') {
    $titlePage = "Perbarui Produk";
    $currentpage = "product";
    $headertitle = "Produk";
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
                        <h2 class="pageheader-title text-white">Master Data <?php echo $headertitle; ?> </h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
              <?php if (!empty($_GET['data'])): ?>
                <?php if ($_GET['data'] == 'productinfo'): ?>
                  <div class="card transparent">
                    <div class="card-header">
                      <h4>Form edit informasi produk</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'model/form.product.edit1.php'; ?>
                    </div>
                  </div>
                <?php elseif ($_GET['data'] == 'productimg'): ?>
                  <div class="card transparent">
                    <div class="card-header">
                      <h4>Form edit gambar produk</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'model/form.product.edit2.php'; ?>
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
