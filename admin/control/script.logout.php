<?php
session_start();

session_destroy();

header('location:../../page?section=admin');

 ?>
