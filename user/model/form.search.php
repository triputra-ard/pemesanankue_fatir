<div class="product-sidebar transparent-white">
  <div class="product-sidebar-widget">
    <h4 class="mb-0">Temukan Kue.</h4>
  </div>
  <div class="product-sidebar-widget">
    <form class="" action="" method="get">
      <div class="form-group">
        <input hidden name="shop" value="buy">
        <input class="form-control" type="text" name="search" value="<?php $result = isset($_GET['search'])  ? (string)$_GET['search'] : ''; echo $result;  ?>" placeholder="Cari disini..">
      </div>
      <div class="form-group">
        <button type="submit" name="sort" value="search" class="btn btn-info btn-rounded"><i class="fas fa-search"></i> Cari</button>
      </div>
    </form>
  </div>
  <div class="product-sidebar-widget">
    <form class="" action="" method="get">
      <div class="form-group">
        <input hidden name="shop" value="buy">
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
