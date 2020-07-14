<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';
if (isset($_POST['add'])) {
  $id = $_POST['id'];
  $user = decrypt($_POST['user']);
  $product = decrypt($_POST['product']);
  $prices = decrypt($_POST['productprices']);
  $quantity = $_POST['quantity'];
  $totalcart = $quantity*$prices;

  $sql = "INSERT into `keranjang` Values('$id','$user','$product'
    ,'$quantity','$totalcart')";
  $query = mysqli_query($db,$sql);
  if ($query) {
    echo "<script>alert('Ditambahkan ke troli');
    window.location.href='../shop?shop=buy';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}elseif (isset($_POST['quickbuy'])) {
  $id = $_POST['id'];
  $user = decrypt($_POST['user']);
  $product = decrypt($_POST['product']);
  $prices = decrypt($_POST['productprices']);
  $quantity = $_POST['quantity'];
  $totalcart = $quantity*$prices;

  $sql = "INSERT into `keranjang` Values('$id','$user','$product'
    ,'$quantity','$totalcart')";
  $query = mysqli_query($db,$sql);
  if ($query) {
    echo "<script>alert('Ditambahkan ke troli');
    window.location.href='../shop?shop=buy';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
} elseif (isset($_POST['delete'])) {
  $cart = decrypt($_POST['cart']);
  $sql = "DELETE from `keranjang` Where id_keranjang = '$cart'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    echo "<script>alert('Item dihapus');
    window.location.href='../shop?shop=cart';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}

 ?>
