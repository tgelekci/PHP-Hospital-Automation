<!DOCTYPE html>
<html>
<head>
<title>Muayene Randevusu Sil</title>

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
      <div class="w3-container w3-red ">
        <h1 class="w3-xxlarge w3-left">Muayene Randevusunu Silmek İstediğiniz Hastanın Numarasını Seçin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="hastanumara" type="text">
          <i class="fa fa-user-times" style="font-size:48px;color:red"></i><label class="w3-text-red"> Hasta Numarası</label></p>
        <p>
          <input type="submit" name="sil_btn" class="w3-btn w3-red w3-right w3-large w3-border" value="SİL"></p>
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
      if(isset($_POST['hastanumara'])){
          $hastanumara=$_POST['hastanumara'];
          if(isset($_POST['sil_btn'])){
            $muayenesil=mysqli_query($baglanti, "DELETE FROM muayeneler WHERE hastano='$hastanumara' AND doktor='$doktor'");

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
    <h3>Toplam Muayene Kayıtlarınız: <span class="w3-badge w3-red"><?php echo mysqli_num_rows($selectsonuc); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</div>



</body>
</html>
