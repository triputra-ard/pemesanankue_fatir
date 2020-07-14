<!DOCTYPE html>
<?php
require_once '../function/pagelink.php';
require_once '../function/function-by-tri.php';
include '../function/authors.php';
include '../database/connection.php';
session_start();
if (empty(@$_SESSION["admin_username"])) {
  echo "<script>alert('Anda harus masuk dahulu')
  window.location.replace('$pageLoginAdmin');</script>";
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tri">
    <title>Zona Admin [<?php echo $titlePage; ?>]</title>
    <!-- Bootstrap CORE -->
    <link rel="stylesheet" href="<?php echo $interface; ?>bootstrap/css/bootstrap.min.css">

    <!-- Addtional plugin -->
    <link rel="stylesheet" href="<?php echo $interface; ?>font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $interface; ?>animate/animate.min.css">
    <link href="<?php echo $interface; ?>fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $interface; ?>css/footer-clean.css">
    <link rel="stylesheet" href="<?php echo $interface; ?>datatables/datatables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $interface; ?>summernote/css/summernote-bs4.css">
    <!-- Style Plugin -->
    <link rel="stylesheet" href="<?php echo $interface; ?>libs/css/style.css">
    <link rel="stylesheet" href="<?php echo $interface; ?>style-by-tri.css">


  </head>
  <body class="fully-background">
