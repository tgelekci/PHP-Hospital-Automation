<!DOCTYPE html>
<html>
<head>
<title>Muayene Randevusu</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
<div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="w3-container w3-light-blue ">
        <h1 class="w3-xxlarge w3-left">Muayene Randevusu Vereceğiniz Hastanın Bilgilerini Ekleyin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="hastaad" type="text">
          <i class="fa fa-user-plus" style="font-size:48px;color:blue"></i><label class="w3-text-light-blue"> Hasta Adı</label></p>
        <p>     
          <input class="w3-input w3-border" name="randevutarih" type="datetime-local">
          <i class="fa fa-calendar" style="font-size:48px;color:blue"></i><label class="w3-text-light-blue"> Randevu Tarihi</label></p>
        <p>
          <input class="w3-input w3-border" name="kisasikayetler" type="text">
          <i class="fa fa-file-text" style="font-size:48px;color:blue"></i><label class="w3-text-light-blue"> Kısaca Şikayetler</label></p>
        <p>
          <input type="submit" name="ekle_btn" class="w3-btn w3-light-blue w3-right w3-large w3-border" value="EKLE">
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
        require "Sessions.php";
        $doktor=$giris_session;
        $baglanti=mysqli_connect("localhost", "root", "", "hastane");
        if(isset($_POST['hastaad'])&&isset($_POST['randevutarih'])&&isset($_POST['kisasikayetler'])){
            $hastaad=$_POST['hastaad'];
            $randevutarih=$_POST['randevutarih'];
            $kisasikayetler=$_POST['kisasikayetler'];
            if(isset($_POST['ekle_btn'])){
              $muayeneekle=mysqli_query($baglanti, "INSERT INTO muayeneler (hastaadi, tarih, kisasikayet, doktor) VALUES ('".$hastaad."', '".$randevutarih."', '".$kisasikayetler."', '".$doktor."')");
            }
        }

        echo "<h1>MEVCUT MUAYENE RANDEVULARINIZ:</h1>";

        $selectsonuc=mysqli_query($baglanti, "SELECT * FROM muayeneler WHERE doktor='$doktor'");

        echo "<table class=\"w3-table w3-striped w3-bordered\">";
        echo "<tr>";
        echo "<th>HASTA NUMARASI</th>";
        echo "<th>HASTA ADI</th>";
        echo "<th>MUAYENE RANDEVU TARİHİ</th>";
        echo "<th>KISACA ŞİKAYETLER</th>";
        echo "<th>DOKTOR</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($selectsonuc))
          {   
            echo "<tr>";
            echo "<td>".$row["hastano"]."</td>";
            echo "<td>".$row["hastaadi"]."</td>";
            echo "<td>".$row["tarih"]."</td>";
            echo "<td>".$row["kisasikayet"]."</td>";
            echo "<td>".$row["doktor"]."</td>";
            echo "</tr>";
          }
        echo "</table>";



    ?>
  
  </div>
  <br>
  <br>
  <div class="w3-container">
    <h3>Toplam Muayene Kayıtlarınız: <span class="w3-badge w3-light-blue"><?php echo mysqli_num_rows($selectsonuc); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</div>

</body>
</html>
