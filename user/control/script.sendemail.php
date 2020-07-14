<?php
$receipent = $_SESSION['email'];
$subject = "WHOOP ! || Menunggu Pembayaran";
$message = "Hai,Terima kasih sudah melakukan reservasi, Segera lakukan pembayaran ke rekening : 303030303030 (BCA : Syakir Abdul Aziz). Jika melabihi 6 jam maka reservasi anda akan dibatalkan.";
$header ="From: <whoop.pro@gmail.com> "."\r\n".
"Reply-To: noreply@whoop.id"."\r\n".
"CC: noreply@whoop.id "."\r\n".
"MIME-Version:1.0 "."\r\n".
"Content-Type:text/html;charset=UTF-8 "."\r\n";
mail($receipent, $subject, $message ,$header); //Email send ?>
