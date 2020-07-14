<?php
if (!empty($_GET['shop'])) {
  if ($_GET['shop'] == "detail") {
    $titlePage = "Informasi produk";
    $currentpage = "home";
  }elseif ($_GET['shop'] == "buy"){
    $titlePage = "Beranda";
    $currentpage = "home";
  }
}
include 'navigation.common.php'; ?>
    <div class="page-wrapper">
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
            <?php if (!empty($_GET['shop'])): ?>
              <?php if ($_GET['shop'] == "detail"): ?>
                <?php include 'view/view.product.detail.php'; ?>
              <?php elseif ($_GET['shop'] == "buy"): ?>
                <div class="row">
                  <!-- Start Section -->
                  <div class="col-xl-3">
                    <div class="product-sidebar transparent-white">
                      <div class="product-sidebar-widget">
                        <h4 class="mb-0">Temukan Kue.</h4>
                      </div>
                      <div class="product-sidebar-widget">
                        <form class="" action="shop" method="get">
                          <div class="form-group">
                            <input type="text" hidden name="shop" value="buy">
                            <input class="form-control" type="text" name="search" value="<?php $result = isset($_GET['search'])  ? (string)$_GET['search'] : ''; echo $result;  ?>" placeholder="Cari disini..">
                          </div>
                          <div class="form-group">
                            <button type="submit" name="sort" value="search" class="btn btn-info btn-rounded"><i class="fas fa-search"></i> Cari</button>
                          </div>
                        </form>
                      </div>
                      <div class="product-sidebar-widget">
                        <form class="" action="shop" method="get">
                          <div class="form-group">
                            <input type="text" hidden name="shop" value="buy">
                            <select class="custom-select" name="filter">
                              <option value="">-Filter Pencarian-</option>
                              <option value="birthday">Kue Ulang Tahun</option>
                              <option value="driedcake">Kue Kering</option>
                              <option value="dessert">Kue Makanan Penutup (Cth : Donat,macaron,dll)</option>
                              <option value="traditionalcake">Kue Basah/Tradisional</option>
                              <option value="cakes">Macam-macam Cake</option>
                            </select>
                          </div>
                          <button type="submit" name="sort" value="filter" class="btn btn-rounded btn-primary"><i class="fas fa-filter"></i> Filter</button>
                        </form>
                      </div>
                    </div>
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
              <?php endif; ?>
            <?php endif; ?>

                <!-- ============================================================== -->
            </div>
        </div>
<?php include 'authors.footer.php'; ?>
