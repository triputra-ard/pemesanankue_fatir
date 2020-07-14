<div class="card-body">
<?php
$id= decrypt($_GET['checkout']);
$fetch = "SELECT * FROM checkout_detail a
Left Join checkout b on a.id_checkout=b.id_checkout
Join produk c on a.id_produk=c.id_produk
where a.id_checkout = '$id'";
$query = mysqli_query($db,$fetch) or die(mysqli_error($db));
while ($checkout = mysqli_fetch_assoc($query)) {
 ?>
 <div class="row justify-content-around">
   <div class="col-xl-2 mr-1 alert bg-primary text-white">
     Checkout : <b><?php echo $checkout['id_checkout']; ?></b>
   </div>
   <div class="col-xl-2 mr-1 alert bg-primary text-white">
     Pesanan : <b><?php echo $checkout['nama_produk']; ?></b>
   </div>
   <div class="col-xl-2 mr-2 alert bg-primary text-white">
     Kuantitas : <b><?php echo $checkout['kuantitas_checkout']; ?></b>
   </div>
   <div class="col-xl-3 alert bg-primary text-white">
     Total harga : <b><?php echo $checkout['harga_checkout']; ?> + <span class="text-info">8500</span> =
     <?php $total = $checkout['harga_checkout']+8500; echo $total; ?></b>
   </div>
 </div>

  <form id="form"  action="control/script.checkout" method="post">
    <input type="text" name="checkout" hidden value="<?php echo encrypt($checkout['id_checkout']); ?>">
    <input type="text" name="product" hidden value="<?php echo encrypt($checkout['id_produk']); ?>">
    <input type="text" hidden name="quantity" value="<?php echo $checkout['kuantitas_checkout']; ?>">
    <input type="text" hidden name="total" value="<?php echo $total; ?>">
    <?php if ($checkout['tipe_produk'] == "birthday"): ?>
      <div class="form-group row">
        <div class="col-xl-4">
          <h4>Tambahkan Deskripsi pesanan (<span class="text-danger"> Khusus kue dengan tipe Kue Ulang Tahun</span>)</h4>
        </div>
        <div class="col-xl-6">
          <textarea class="form-control" name="description" rows="4" placeholder="Contoh : Lilin, Nama, Kalimat, dll"></textarea>
        </div>
      </div>
      <?php else: ?>
        <input type="text" hidden name="description" value="KOSONG">
    <?php endif; ?>
    <div class="form-group row">
      <div class="col-xl-3">
        <h4>Metode Pembayaran</h4>
      </div>
      <div class="col-xl-6">
        <select class="custom-select" name="payment" id="optionpayment" onchange="return OptionPay(this.value)" required>
          <option value="">-Pilih-</option>
          <option value="bank">Transfer Bank</option>
          <option value="cod">Bayar ditempat</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xl-3">
        <h4>Pilih Alamat</h4>
      </div>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <label class="custom-control custom-radio">
                    <input id="alamat1" type="radio" class="custom-control-input" value="" required="" name="address" onclick="checkAddress()"><span class="custom-control-label">Alamat tersedia</span>
                </label>
            </div>
        </div>
        <textarea class="form-control" id="value1" rows="4" readonly><?php echo $_SESSION["address"]; ?></textarea>
      </div>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <label class="custom-control custom-radio">
                  <input id="alamat2" type="radio" class="custom-control-input" value="" required="" name="address"  onclick="checkAddress()"><span class="custom-control-label">Alamat baru</span>
                </label>
            </div>
          </div>
        <textarea class="form-control" id="value2" rows="4" onkeypress="checkAddress()"></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-rounded btn-block btn-info" name="" id="btnCheckout">Buat Checkout</button>
  </form>
<?php } ?>
</div>
