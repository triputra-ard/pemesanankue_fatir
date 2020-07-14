<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';
if (isset($_POST['add'])) {

  $id = autokode("checkout", "c-");
  $checkoutdetail = autokode("checkout_detail", "c-");
  $today = date("Y-m-d H:i:s");

  $cart = decrypt($_POST['cart']);
  $user = decrypt($_POST['user']);
  $product = decrypt($_POST['product']);
  $total = $_POST['total'];
  $quantity = $_POST['quantity'];

  $sql = "INSERT into `checkout`(id_checkout,id_user,harga_checkout,tanggal_checkout,status_checkout,admin)
  Values('$id','$user','$total','$today', DEFAULT, NULL)";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $delete = "DELETE From `keranjang` where id_keranjang = '$cart'";
    mysqli_query($db,$delete);
    $temp = "INSERT into `checkout_detail` VALUES('$checkoutdetail','$id','$product','$quantity')";
    mysqli_query($db,$temp);
    echo "<script>alert('Diproses');
    window.location.href='../shop?shop=checkout&checkout=".encrypt($id)."';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}elseif (isset($_POST['order-cod'])) {

  $paymentid = autokode("pembayaran", "p-");
  $deliveryid = autokode("pengiriman", "d-");

  $checkout = decrypt($_POST['checkout']);
  $product = decrypt($_POST['product']);
  $total = $_POST['total'];
  $quantity = $_POST['quantity'];

  $today = date("Y-m-d H:i:s");

  $description = $_POST['description'];
  $paymentmethod = $_POST['payment'];
  $address = $_POST['address'];

  $sql = "UPDATE `checkout` SET
  deskripsi_checkout = '$description',
  alamat_checkout = '$address',
  harga_checkout = '$total',
  tanggal_checkout = '$today',
  status_checkout = 'DIPROSES'
  Where id_checkout = '$checkout'
  ";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $payment = mysqli_query($db,"INSERT into `pembayaran`(id_pembayaran,id_checkout,metode_pembayaran,status_pembayaran)
     VALUES('$paymentid','$checkout','cod','LUNAS')") ; //Add new order payment

    $delivery = mysqli_query($db,"INSERT into `pengiriman`(id_pengiriman,id_checkout,status_pengiriman,tanggal_pengiriman)
     VALUES('$deliveryid','$checkout',DEFAULT,'$today')");//Add new delivery

    $newpurchase = mysqli_query($db,"UPDATE `produk` SET
    `jumlah_produk` = `jumlah_produk`-'$quantity', `produk_jual` = `produk_jual`+'1'
    WHERE id_produk = '$product'
    ");//Update information of product

    echo "<script>alert('Diproses');
    window.location.href='../information?info=success';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
} elseif (isset($_POST['order-bank'])) {

  $paymentid = autokode("pembayaran", "p-");

  $checkout = decrypt($_POST['checkout']);
  $product = decrypt($_POST['product']);
  $total = $_POST['total'];
  $quantity = $_POST['quantity'];

  $today = date("Y-m-d H:i:s");

  $description = $_POST['description'];
  $paymentmethod = $_POST['payment'];
  $address = $_POST['address'];

  $sql = "UPDATE `checkout` SET
  deskripsi_checkout = '$description',
  alamat_checkout = '$address',
  harga_checkout = '$total',
  tanggal_checkout = '$today',
  status_checkout = 'MENUNGGU PEMBAYARAN'
  Where id_checkout = '$checkout'
  ";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $payment = mysqli_query($db,"INSERT into `pembayaran`(id_pembayaran,id_checkout,metode_pembayaran,status_pembayaran)
    VALUES('$paymentid','$checkout','bank','BELUM LUNAS')") ; //Add new order payment

    echo "<script>alert('Diproses');
    window.location.href='../information?info=waiting';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}elseif (isset($_POST['delete'])) {
  $checkout = decrypt($_POST['checkout']);
  $sql = "DELETE from `checkout` Where id_checkout = '$checkout'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $deletedetails = mysqli_query($db,"DELETE from `checkout_detail` Where id_checkout='$checkout'");
    echo "<script>alert('Checkout dibatalkan');
    window.location.href='../shop?shop=checkout';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}

 ?>
