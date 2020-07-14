<?php
include '../../database/connection.php';
include '../../function/function-by-tri.php';

if (isset($_POST['new'])) {

  $id = $_POST['id'];
  $tipe = $_POST['tipe'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $minimal = $_POST['minpembelian'];
  $stok = $_POST['stok'];
  $deskripsi = $_POST['deskripsi'];
  $currentdate = date("Y-m-d H:i:s");

  $moveditem = '../../products/';
  $directory = 'products';

  $allow_ext = array('png','jpg','bmp','jpeg');

  $filename1 = date("Ymd").'-'.$id.'-1-'.basename($_FILES['file1']['name']);

  $file_temp1 = $_FILES['file1']['tmp_name'];
  $file_size1 = $_FILES['file1']['size'];

  $x1 = explode('.', $filename1);
  // code...
  $extension1 = strtolower(end($x1));

  if (in_array($extension1 , $allow_ext) === true) {
    if ($file_size1 < 2000640) {
      if (!is_dir($moveditem)) {
        mkdir($moveditem);
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {

          $sql = "INSERT Into `produk`
          VALUES ('$id','$directory/$filename1',
          '$nama','$tipe','$deskripsi',
          '$stok','$minimal','$harga',
          DEFAULT,'$currentdate')";

          $query = mysqli_query($db,$sql);
          if ($query) {
            echo "<script>alert('Ditambahkan');
            window.location.href='../table?view=product';</script>";
          }else {
            echo "<script>alert('Error');
            window.history.back();</script>";
          }
        }
      }else {
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {

          $sql = "INSERT Into `produk`
          VALUES ('$id','$directory/$filename1',
          '$nama','$tipe','$deskripsi',
          '$stok','$minimal','$harga',
          DEFAULT,'$currentdate')";

          $query = mysqli_query($db,$sql);
          if ($query) {
            echo "<script>alert('Ditambahkan');
            window.location.href='../table?view=product';</script>";
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
}elseif (isset($_POST['editinfo'])) {
  $id = $_POST['id'];
  $tipe = $_POST['tipe'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $minimal = $_POST['minpembelian'];
  $stok = $_POST['stok'];
  $deskripsi = $_POST['deskripsi'];

  $sql = "UPDATE produk SET
  tipe_produk = '$tipe',
  nama_produk = '$nama',
  harga_produk = '$harga',
  deskripsi_produk = '$deskripsi',
  minimal_pembelian = '$minimal',
  jumlah_produk = '$stok'
  WHERE id_produk = '$id' ";
  $query=mysqli_query($db,$sql);
  if ($query) {
    echo "<script>alert('Diperbarui');
    window.location.href='../table?view=product';</script>";
  }else {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }

}elseif (isset($_POST['editphotos'])) {
  $id = $_POST['id'];
  $moveditem = '../../products/';
  $directory = 'products';

  $allow_ext = array('png','jpg','bmp','jpeg');

  $filename1 = date("Ymd").'-'.$id.'-1-'.basename($_FILES['file1']['name']);

  $file_temp1 = $_FILES['file1']['tmp_name'];
  $file_size1 = $_FILES['file1']['size'];

  $x1 = explode('.', $filename1);
  // code...
  $extension1 = strtolower(end($x1));

  $unlink1 = $_POST['imgunlink1'];

  if (in_array($extension1 , $allow_ext) === true) {
    if ($file_size1 < 2000640) {
      if (!is_dir($moveditem)) {
        mkdir($moveditem);
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {
          unlink($unlink1);

          $sql = "UPDATE produk
          SET
          foto_produk = '$directory/$filename1'
          WHERE id_produk = '$id'";

          $query = mysqli_query($db,$sql);
          if ($query) {
            echo "<script>alert('Diperbarui');
            window.location.href='../table?view=product';</script>";
          }else {
            echo "<script>alert('Error');
            window.history.back();</script>";
          }
        }
      }else {
        if (move_uploaded_file($file_temp1, $moveditem.$filename1)) {
          unlink($unlink1);

          $sql = "UPDATE produk
          SET
          foto_produk = '$directory/$filename1'
          WHERE id_produk = '$id'";

          $query = mysqli_query($db,$sql);
          if ($query) {
            echo "<script>alert('Diperbarui');
            window.location.href='../table?view=product';</script>";
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
}elseif (isset($_GET['delete'])) {
  $id = decrypt($_GET['delete']);
  $detect = "SELECT foto_produk from `produk` WHERE id_produk='$id'";
  $querydetect = mysqli_query($db,$detect);
  if (mysqli_num_rows($querydetect) === 0) {
    echo "<script>alert('Error');
    window.history.back();</script>";
  }else {
    $unlink = mysqli_fetch_assoc($querydetect);
    $files = "../../".$unlink['foto_produk'];
    unlink($files);

    $sql = "DELETE from `produk` Where id_produk='$id'";
    $query = mysqli_query($db,$sql);
    if ($query) {
      echo "<script>alert('Dihapus');
      window.location.href='../table?view=product';</script>";
    }else {
      echo "<script>alert('Error');
      window.history.back();</script>";
    }
  }
}
 ?>
