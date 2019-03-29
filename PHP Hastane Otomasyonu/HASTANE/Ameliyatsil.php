<!DOCTYPE html>
<html>
<head>
<title>Ameliyat Randevusu Sil</title>

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
      <div class="w3-container w3-amber ">
        <h1 class="w3-xxlarge w3-left">Ameliyat Randevusunu Silmek İstediğiniz Hastanın Numarasını Seçin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="hastano" type="text">
          <i class="fa fa-user-times" style="font-size:48px;color:orange"></i><label class="w3-text-amber"> Hasta Numarası</label></p>
        <p>
          <input type="submit" name="silbtn" class="w3-btn w3-amber w3-right w3-large w3-border" value="SİL"></p>
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
      $dkt=$giris_session;
      $baglanti=mysqli_connect("localhost", "root", "", "hastane");
      if(isset($_POST['hastano'])){
          $hastanumarasi=$_POST['hastano'];
          if(isset($_POST['silbtn'])){
            $ameliyatsil=mysqli_query($baglanti, "DELETE FROM ameliyatlar WHERE hastanu='$hastanumarasi' AND doktor='$dkt'");

          }

      }

      echo "<h1>MEVCUT AMELİYAT RANDEVULARINIZ:</h1>";

        $selectat=mysqli_query($baglanti, "SELECT * FROM ameliyatlar WHERE doktor='$dkt'");

        echo "<table class=\"w3-table w3-striped w3-bordered\">";
        echo "<tr>";
        echo "<th>HASTA NUMARASI</th>";
        echo "<th>HASTA ADI</th>";
        echo "<th>AMELİYAT RANDEVU TARİHİ</th>";
        echo "<th>AMELİYAT TİPİ</th>";
        echo "<th>AMELİYATHANE NUMARASI</th>";
        echo "<th>DOKTOR</th>";
        echo "</tr>";
        while($rw = mysqli_fetch_array($selectat))
          {   
            echo "<tr>";
            echo "<td>".$rw["hastanu"]."</td>";
            echo "<td>".$rw["hastaad"]."</td>";
            echo "<td>".$rw["tarih"]."</td>";
            echo "<td>".$rw["ameliyat"]."</td>";
            echo "<td>".$rw["ameliyathane"]."</td>";
            echo "<td>".$rw["doktor"]."</td>";
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
    <h3>Toplam Ameliyat Kayıtlarınız: <span class="w3-badge w3-amber"><?php echo mysqli_num_rows($selectat); ?></span></h3>
  </div>


</body>
</html>
