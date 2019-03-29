<!DOCTYPE html>
<html>
<head>
<title>E-Reçete Silme</title>

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
        <h1 class="w3-xxlarge w3-left">Silmek İstediğiniz E-Reçete Kodunu Girin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="recetekod" type="text">
          <i class="fa fa-barcode" style="font-size:48px;color:brown"></i><label class="w3-text-brown"> E-Reçete Kodu</label></p>
        <p>
          <input type="submit" name="btn_sil" class="w3-btn w3-brown w3-right w3-large w3-border" value="SİL"></p>
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
      if(isset($_POST['recetekod'])){
          $recetekod=$_POST['recetekod'];
          if(isset($_POST['btn_sil'])){
            $recetesil=mysqli_query($baglanti, "DELETE FROM receteler WHERE recetekodu='$recetekod' AND doktor='$doktor'");

          }

      }

      echo "<h1>YAZDIĞINIZ MEVCUT E-REÇETELER:</h1>";

      $selectr=mysqli_query($baglanti, "SELECT * FROM receteler WHERE doktor='$doktor'");

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
  <div class="w3-container">
  <h3>Toplam E-Reçete Kayıtlarınız: <span class="w3-badge w3-brown"><?php echo mysqli_num_rows($selectr); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</div>



</body>
</html>
