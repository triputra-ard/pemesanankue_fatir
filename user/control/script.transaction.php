<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';

if (isset($_POST['transaction'])) {
  $trx_id = decrypt($_POST['id']);

  $moveditem = '../../transaction/'.$trx_id.'/';
  $directory = 'transaction/'.$trx_id;

  $allow_ext = array('png','jpg','bmp','jpeg');

  $filename1 = $trx_id.'-1-'.basename($_FILES['trxfile']['name']);

  $file_temp1 = $_FILES['trxfile']['tmp_name'];
  $file_size1 = $_FILES['trxfile']['size'];

  $x1 = explode('.', $filename1);
  // code...
  $extension1 = strtolower(end($x1));

  if (in_array($extension1 , $allow_ext) === true) {
    if ($file_size1 < 3500640) {
      if (!is_dir($moveditem)) {
        mkdir($moveditem);
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {

          $sql = "UPDATE pembayaran SET foto_pembayaran = '$directory/$filename1'
          Where id_checkout = '$trx_id'";

          $query = mysqli_query($db,$sql);
          if ($query) {
            $updateinfo = mysqli_query($db,"UPDATE `checkout` SET status_checkout = 'MENUNGGU KONFIRMASI' where id_checkout = '$trx_id'");

            echo "<script>alert('Diproses');
            window.location.href='../shop?shop=checkout';</script>";
          }else {
            echo "<script>alert('Error');
            window.history.back();</script>";
          }
        }
      }else {
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {

          $sql = "UPDATE pembayaran SET foto_pembayaran = '$directory/$filename1'
          Where id_checkout = '$trx_id'";

          $query = mysqli_query($db,$sql);
          if ($query) {
            $updateinfo = mysqli_query($db,"UPDATE `checkout` SET status_checkout = 'MENUNGGU KONFIRMASI' where id_checkout = '$trx_id'");
            echo "<script>alert('Diproses');
            window.location.href='../shop?shop=checkout';</script>";
          }else {
            echo "<script>alert('Error');
            window.history.back();</script>";
          }
        }
      }
    }else {
      echo "<script>alert('Melebihi ukuran');
      window.history.back();</script>";
    }
  }else {
    echo "<script>alert('Ekstensi tidak didukung');
    window.history.back();</script>";
  }
}elseif (isset($_POST['done'])) {
  // code...
  $delivery = decrypt($_POST['delivery']);
  $checkoutid = decrypt($_POST['checkout']);

  $sql = "UPDATE `checkout` SET status_checkout = 'SELESAI' Where id_checkout='$checkoutid'";
  $query = mysqli_query($db,$sql);
  if ($query) {
    $delivery = mysqli_query($db,"UPDATE `pengiriman` SET status_pengiriman = 'TERKIRIM' where id_pengiriman = '$delivery'");

    echo "<script>alert('Diproses');
    window.location.href='../shop?shop=thankyou';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }
}
 ?>
