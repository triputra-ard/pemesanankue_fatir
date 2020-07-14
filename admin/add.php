<?php
if (!empty($_GET['new'])) {
  if ($_GET['new'] == 'product') {
    $titlePage = "Tambah Produk";
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
                        <h2 class="pageheader-title text-black">Master Data <?php echo $headertitle; ?> </h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
              <?php if (!empty($_GET['new'])): ?>
                <?php if ($_GET['new'] == 'product'): ?>
                  <div class="card transparent">
                    <div class="card-header">
                      <h4>Form tambah produk baru</h4>
                    </div>
                    <div class="card-body">
                      <?php include 'model/form.product.new.php'; ?>
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
