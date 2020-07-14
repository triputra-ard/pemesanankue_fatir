<?php
if (!empty($_GET['shop'])) {
  if ($_GET['shop'] == 'buy') {
    $titlePage = "Beli kue";
    $currentpage = "shop";
  }elseif ($_GET['shop'] == 'cart') {
    $titlePage = "Troli";
    $currentpage = "cart";
  }elseif ($_GET['shop'] == 'checkout') {
    $titlePage = "Checkout";
    $currentpage = "checkout";
  }elseif ($_GET['shop'] == 'detail') {
    $titlePage = "Informasi Produk";
    $currentpage = "shop";
  }elseif ($_GET['shop'] == 'thankyou') {
    $titlePage = "Terimakasih !";
    $currentpage = "checkout";
  }
}
include 'navigation.user.php'; ?>
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->

            <?php if (!empty($_GET['shop'])): ?>
              <?php if ($_GET['shop'] == 'buy'): ?>
                <div class="row">
                  <!-- Start Section -->
                  <div class="col-xl-3">
                   <?php include 'model/form.search.php'; ?>
                  </div>

                  <div class="col-xl-9">
                    <div class="card transparent-white">
                      <div class="card-body">
                        <?php if (!empty($_GET['sort'])): ?>

                          <?php if ($_GET['sort'] == "search"): ?>
                            <?php include 'view/view.product.search.php'; ?>
                         <?php elseif ($_GET['sort'] == "filter"): ?>
                            <?php include 'view/view.product.filter.php'; ?>
                         <?php endif; ?>

                        <?php else: ?>
                          <?php include 'view/view.product.php'; ?>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <!--End section -->
                </div>
              <?php elseif ($_GET['shop'] == 'cart'): ?>
                <div class="card transparent-white">
                  <div class="card-header">
                    <h4 class="text-center">Troli : <?php echo $_SESSION["name"]; ?></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                        <?php include 'view/view.cart.php'; ?>
                    </div>
                  </div>
                </div>
              <?php elseif ($_GET['shop'] == 'checkout'): ?>
                <div class="card transparent-white">

                  <?php if (empty($_GET['checkout'])&&empty($_GET['transaction'])&&empty($_GET['delivery'])): ?>
                    <?php include 'view/view.checkout.php'; ?>
                  <?php elseif(!empty($_GET['checkout'])): ?>
                    <?php include 'model/form.order.php'; ?>
                  <?php elseif(!empty($_GET['transaction'])): ?>
                    <div class="card-body">
                      <?php include 'model/form.transaction.php'; ?>
                    </div>
                  <?php elseif(!empty($_GET['delivery'])): ?>
                    <div class="card-body">
                      <?php include 'view/view.delivery.php'; ?>
                    </div>
                  <?php endif; ?>

                </div>
              <?php elseif ($_GET['shop'] == 'detail'): ?>
                <?php include 'view/view.product.detail.php'; ?>

              <?php elseif ($_GET['shop'] == 'thankyou'): ?>
                <div class="col-xl-6 offset-xl-3">
                  <div class="card transparent-white">
                    <div class="card-body">
                      <h1 class="text-dark text-center">TerimaKasih !</h1><br>
                      <h3 class="text-dark text-center">Selamat menikmati, kami tunggu pesanan kamu selanjutnya <i class="fas fa-grin-wink"></i> </h3>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
                <!-- ============================================================== -->
            </div>
        </div>
<?php include 'authors.footer.php'; ?>
