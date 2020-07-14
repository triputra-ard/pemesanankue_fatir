<?php
include 'header.php';
 ?>
<body class="fully-background" style="font-family:'Segoe UI';">
 <!-- navigation bar start -->
 <nav class="navbar navbar-dark navbar-expand-sm fixed-top navbar-transparent-noborder">
   <div class="container">
     <button class="navbar-toggler toggler-default collapsed" data-toggle="collapse" data-target="#navcol-1">
       <span class="icon-bar-top top-bar"></span>
       <span class="icon-bar-middle middle-bar"></span>
       <span class="icon-bar-bottom bottom-bar"></span>
     </button>
    <h3 class="navbar-brand"><a href="<?php echo $home; ?>"><img src="<?php echo $logoLink; ?>" style="width:180px;height:80px;" alt="saung_logo"></a></h3>
   <div class="collapse navbar-collapse" id="navcol-1">
         <ul class="nav navbar-nav mr-auto">
         </ul>
         <span class="navbar-text">
         <a href="<?php echo $pageLogin; ?>" class="btn btn-rounded btn-outline-success"><strong><i class="fas fa-sign-in-alt"></i> Masuk</strong></a>
         &nbsp;
         <a class="btn btn-outline-info btn-rounded" role="button" href="<?php echo $pageregister; ?>"><strong><i class="fas fa-users"></i> Daftar</strong></a>
         </span>
       </div>

    </div>
 </nav>
<br><br><br><br><br><br><br>
<?php include 'model/modal.asklogin.php'; ?>
