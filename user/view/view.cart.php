<table class="table table-hover table-bordered">
  <?php
  $id = $_SESSION["id"];
  $sql = "SELECT * from keranjang a join
  produk b on a.id_produk = b.id_produk
  WHERE a.id_user = '$id'
  ";
  $query = mysqli_query($db,$sql);
   ?>
  <?php if (mysqli_num_rows($query) === 0): ?>
    <h4>Oh.. kosong, ketuk belanja untuk menambahkan</h4>
    <?php else: ?>
      <?php
        while($cart = mysqli_fetch_assoc($query)) {?>
        <tr class="text-dark">
          <td><img src="<?php echo $pictLink."/".$cart['foto_produk']; ?>" class="img-thumbnail img-responsive" alt="<?php echo $cart['nama_produk']; ?>"> </td>
          <td>
            <?php echo $cart['nama_produk']; ?>
          </td>
          <td><?php echo $cart['kuantitas']; ?> Item</td>
          <td>IDR Rp. <?php echo number_format($cart['harga_keranjang'],0,'.',','); ?></td>
          <td>
            <form class="" action="control/script.cart" method="post">
              <input type="text" hidden name="cart" value="<?php echo encrypt($cart['id_keranjang']); ?>">
              <button type="submit" title="Hapus item" name="delete" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
            </form>
          </td>
          <td>
            <form class="" action="control/script.checkout" method="post">
              <input type="text" hidden name="cart" value="<?php echo encrypt($cart['id_keranjang']); ?>">
              <input type="text" hidden name="user" value="<?php echo encrypt($id); ?>">
              <input type="text" hidden name="product" value="<?php echo encrypt($cart['id_produk']); ?>">
              <input type="text" hidden name="total" value="<?php echo $cart['harga_keranjang']; ?>">
              <input type="text" hidden name="quantity" value="<?php echo $cart['kuantitas']; ?>">
              <button type="submit" name="add" class="btn btn-primary" title="Checkout item ini" <?php if($cart['jumlah_produk']<$cart['kuantitas']) echo "disabled"; ?>>
                <i class="fas fa-check-square"></i> Checkout ini <?php if($cart['jumlah_produk']<$cart['kuantitas']) echo "[Stok habis atau kuantitas melebihi stok]"; ?></button>
            </form>
          </td>
        </tr>
        <?php }?>
  <?php endif; ?>
</table>
