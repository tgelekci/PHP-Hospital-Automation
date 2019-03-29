<!DOCTYPE html>
<html>
<head>
<title>Parola Değiştir</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="w3-container w3-teal ">
        <h1 class="w3-left">Giriş Parolanızı Değiştirin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="eskiparola" type="password">
          <i class="fa fa-lock" style="font-size:48px;color:teal"></i><label class="w3-text-teal"> Eski Parola</label></p>
        <p>     
          <input class="w3-input w3-border" name="yeniparola" type="password">
          <i class="fa fa-unlock" style="font-size:48px;color:teal"></i><label class="w3-text-teal"> Yeni Parola</label></p>
        <p>
          <input type="submit" name="degistir_btn" class="w3-btn w3-teal w3-right w3-large w3-border" value="DEĞİŞTİR">
        </p>
      </form>
    <br>
    <br>
  </div>
  <br>
  <br>
  <div class="w3-container">
    <?php
      error_reporting(0);
      $baglanti=mysqli_connect("localhost", "root", "", "hastane");
      if(isset($_POST['eskiparola'])&&isset($_POST['yeniparola'])){
        $eski_parola=$_POST['eskiparola'];
        $yeni_parola=$_POST['yeniparola'];
        if(isset($_POST['degistir_btn'])){
          $parola_update=mysqli_query($baglanti, "UPDATE doktorlar SET dsifre='$yeni_parola' WHERE dsifre='$eski_parola'");
        
        }
      }
      
  ?>
  
  </div>
  <br>
  <br>
  <br>
</div>