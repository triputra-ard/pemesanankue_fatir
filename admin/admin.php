<?php
if (!empty($_GET['admin'])) {
  if ($_GET['admin'] == "you") {
    $titlePage = "Info Anda";
    $currentpage = "dashboard";
    $headertitle = "Informasi Anda";
  }
}
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
                        <h2 class="pageheader-title text-white"><?php echo $headertitle; ?></h2>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="ecommerce-widget">
              <?php if (!empty($_GET['admin'])): ?>
                <?php if ($_GET['admin'] == "you"): ?>
                  <div class="card transparent">
                    <div class="card-header">
                      <h4>Informasi Anda</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-hover text-white">
                          <tr>
                            <td>Nama Lengkap</td>
                            <td><?php echo $_SESSION["admin_name"]; ?></td>
                          </tr>
                          <tr>
                            <td>Username</td>
                            <td><?php echo $_SESSION["admin_username"]; ?></td>
                          </tr>
                          <tr>
                            <td>Password</td>
                            <td><?php echo $_SESSION["admin_password"]; ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<!-- ============================================================== -->
<!-- end wrapper  -->
<!-- ============================================================== -->
<?php include 'footer.php'; ?>
