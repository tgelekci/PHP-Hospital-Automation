<?php
require "Sessions.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>Doktor İşlemleri</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container w3-center w3-blue">
  <h1 class="w3-jumbo w3-animate-opacity"><i class="fa fa-certificate w3-spin"></i>  Merhaba,  <?php echo $giris_session."!"."<br>".$alan_session."<br>"; ?>  </h1>
  <h1 class="w3-jumbo w3-animate-opacity"> <?php echo date('Y/m/d');?></h1>
  <h1 class="w3-jumbo w3-animate-opacity"> Lütfen yapmak istediğiniz işlemi seçin:</h1>
</div>

<div class="w3-bar w3-card-4 w3-border w3-dark-grey w3-xlarge">
  <a href="Muayene.php" class="w3-bar-item w3-button"><i class="fa fa-stethoscope"></i> Muayene Randevusu Ver</a>
  <a href="Muayenesil.php" class="w3-bar-item w3-button"><i class="fa fa-remove"></i> Muayene Randevusu Sil</a>
  <a href="Ameliyat.php" class="w3-bar-item w3-button"><i class="fa fa-heartbeat"></i> Ameliyat Randevusu Ver</a>
  <a href="Ameliyatsil.php" class="w3-bar-item w3-button"><i class="fa fa-remove"></i> Ameliyat Randevusu Sil</a>
  <a href="Recete.php" class="w3-bar-item w3-button"><i class="fa fa-list-alt"></i> Reçete İşlemleri</a>
  <a href="Tahlil.php" class="w3-bar-item w3-button"><i class="fa fa-list-alt"></i> Tahlil İşlemleri</a>
  <a href="Hastagiriscikis.php" class="w3-bar-item w3-button"><i class="fa fa-wheelchair"></i> Hasta Giriş-Çıkış İşlemleri</a>
  <a href="Paroladegistir.php" class="w3-bar-item w3-button"><i class="fa fa-exchange"></i> Parola Değiştir</a>
  <a href="Hakkimda.php" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> Hakkımda</a>
  <a href="Cikis.php" class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Çıkış</a>
</div>
<br>
<br>
<br>

<div class="w3-container w3-center">
<i class="fa fa-ambulance w3-left" style="font-size:240px;color:red"></i>
<i class="fa fa-hospital-o w3-center" style="font-size:240px;color:red"></i>
<i class="fa fa-medkit w3-right" style="font-size:240px;color:red"></i>

</div>

<br>
<br>

</body>
</html>