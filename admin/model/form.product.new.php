<form id="form" action="control/script.product" method="post" enctype="multipart/form-data">
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">ID</label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" readonly required="" type="text" name="id" value="<?php echo autokode("produk", "kue"."-"); ?>">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Tipe</label>
    </div>
    <div class="col-xl-4">
      <select class="custom-select" name="tipe" required>
        <option value="">-Tipe Kue-</option>
        <option value="birthday">Kue Ulang Tahun</option>
        <option value="driedcake">Kue Kering</option>
        <option value="dessert">Kue Makanan Penutup (Cth : Donat,macaron,dll)</option>
        <option value="traditionalcake">Kue Basah/Tradisional</option>
        <option value="cakes">Macam-macam Cake</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Nama Produk</label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" required="" type="text" name="nama" value="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Harga Produk</label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" required="" min="0" type="number" name="harga" value="" onkeypress="return OnlyNumber(event)">
    </div>
  </div>
  <div class="alert alert-info">
    <h4 class="text-center">Foto yang diperbolehkan dengan ekstensi : jpg, jpeg, bmp, png <br>
      Dengan maksimum ukuran 2mb
     </h4>
  </div>
  <!--Photo example -->
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Foto </label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" required="" type="file" name="file1" value="" onchange="previewImg1(event)">
      <img class="previewImage img-thumbnail" id="preview1">
    </div>
  </div>
  <!--End Photo forms -->
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Minimum Pembelian</label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" required="" type="number" min="0" name="minpembelian" value="" onkeypress="return OnlyNumber(event)">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Stok Tersedia</label>
    </div>
    <div class="col-xl-4">
      <input class="form-control" required="" type="number" min="0" name="stok" value="" onkeypress="return OnlyNumber(event)">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xl-2">
      <label class="text-white">Deskripsi Kue</label>
    </div>
    <div class="col-xl-6">
      <textarea id="summernote" name="deskripsi"></textarea>
    </div>
  </div>

  <button type="submit" name="new" class="btn btn-block btn-primary"><i class="fas fa-plus"></i> Tambahkan Produk</button>
</form>
<script type="text/javascript">
  var summernoteplaceholder = "Tambahkan Deskripsi dari produk";
</script>
