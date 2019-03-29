<!DOCTYPE html>
<html>
<head>
<title>E-Reçete Ekleme</title>

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
      <div class="w3-container w3-brown ">
        <h1 class="w3-xxlarge w3-left">E-Reçete Bilgilerini Ekleyin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="recetekod" type="text">
          <i class="fa fa-barcode" style="font-size:48px;color:brown"></i><label class="w3-text-brown"> E-Reçete Kodu</label></p>
          <p>
          <input class="w3-input w3-border" name="hastaad" type="text">
          <i class="fa fa-user" style="font-size:48px;color:brown"></i><label class="w3-text-brown"> Hasta Adı</label></p>
        <p>     
          <input class="w3-input w3-border" name="recetetarih" type="date">
          <i class="fa fa-calendar" style="font-size:48px;color:brown"></i><label class="w3-text-brown"> E-Reçete Veriliş Tarihi</label></p>
        <p>
          <input class="w3-input w3-border" name="ilaclar" type="text">
          <i class="fa fa-flask" style="font-size:48px;color:brown"></i><label class="w3-text-brown"> Yazılan İlaçlar</label></p>
        <p>
          <input type="submit" name="btn_ekle" class="w3-btn w3-brown w3-right w3-large w3-border" value="EKLE">
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
        $dt=$giris_session;
        $baglanti=mysqli_connect("localhost", "root", "", "hastane");

        if(isset($_POST['recetekod'])&&isset($_POST['hastaad'])&&isset($_POST['recetetarih'])&&isset($_POST['ilaclar'])){
            $recetekod=$_POST['recetekod'];
            $hastaad=$_POST['hastaad'];
            $recetetarih=$_POST['recetetarih'];
            $ilaclar=$_POST['ilaclar'];

            if(isset($_POST['btn_ekle'])){
              $receteekle=mysqli_query($baglanti, "INSERT INTO receteler (recetekodu, hasta, tarih, ilaclar, doktor) VALUES ('".$recetekod."', '".$hastaad."', '".$recetetarih."', '".$ilaclar."', '".$dt."')");

            }
        

        }
        echo "<h1>YAZDIĞINIZ MEVCUT E-REÇETELER:</h1>";

        $selectr=mysqli_query($baglanti, "SELECT * FROM receteler WHERE doktor='$dt'");

        echo "<table class=\"w3-table-all w3-hoverable\">";
        echo "<tr>";
        echo "<th>E-REÇETE NUMARASI</th>";
        echo "<th>HASTA ADI</th>";
        echo "<th>E-REÇETE VERİLİŞ TARİHİ</th>";
        echo "<th>YAZILAN İLAÇLAR</th>";
        echo "<th>DOKTOR</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($selectr))
          {   
            echo "<tr>";
            echo "<td>".$row["recetekodu"]."</td>";
            echo "<td>".$row["hasta"]."</td>";
            echo "<td>".$row["tarih"]."</td>";
            echo "<td>".$row["ilaclar"]."</td>";
            echo "<td>".$row["doktor"]."</td>";
            echo "</tr>";
          }
        echo "</table>";

    ?>
  
  </div>
  <br>
  <br>
  <br>
</div>
<div class="w3-container">
    <h3>Toplam E-Reçete Kayıtlarınız: <span class="w3-badge w3-brown"><?php echo mysqli_num_rows($selectr); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</body>
</html>
