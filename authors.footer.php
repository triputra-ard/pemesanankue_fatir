<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<div class="footer-clean" style="background-color:rgba(235, 95, 233, 0.63);">
  <footer >
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-4 col-md-5 item border-dotted">
          <h3 class="text-dark"><?php echo $companyInfo; ?></h3>
          <ul class="text-dark">
            <li><i class="fas fa-map-marker-alt"></i> <?php echo $companyAddress; ?></li>
            <li><i class="fas fa-phone"> <?php echo $companyPhones; ?> </i> | <i class="fas fa-envelope"></i> <?php echo $companyEmail; ?></li>
            <li><a href="<?php echo $linkIG ?>"><i class="fab fa-instagram"></i> Kunjungi instagram kami !</a></li>
          </ul>
        </div>
        <div class="col-sm-3 offset-xl-4 col-md-3 item">
          <h3 class="text-dark"><?php echo $authorname; ?></h3>
          <ul class="text-dark">
            <li><?php echo $companyname; ?></li>
            <li>Hak cipta &copy; <?php echo $yearcopyright; ?></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>
<!-- ============================================================== -->
<!-- end footer -->
<?php
include 'footer.php';
 ?>
