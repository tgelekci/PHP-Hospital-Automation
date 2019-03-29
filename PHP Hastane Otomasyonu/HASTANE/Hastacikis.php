<!DOCTYPE html>
<html>
<head>
<title>Hasta Çıkış</title>

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
      <div class="w3-container w3-lime ">
        <h1 class="w3-xxlarge w3-left">Çıkış Yapacak Hastanın İsmini Girin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="hastaismi" type="text">
          <i class="fa fa-bed" style="font-size:48px;color:lime"></i><label class="w3-text-lime"> Hasta İsmi</label></p>
        <p>
          <input type="submit" name="silbuton" class="w3-btn w3-lime w3-right w3-large w3-border" value="SİL"></p>
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
      if(isset($_POST['hastaismi'])){
          $hastaismi=$_POST['hastaismi'];
          if(isset($_POST['silbuton'])){
            $hastacikis=mysqli_query($baglanti, "DELETE FROM hastayatis WHERE hastaadi='$hastaismi' AND doktor='$doktor'");

          }

      }

      echo "<h1>GİRİŞ YAPMIŞ MEVCUT HASTALAR:</h1>";

      $selecth=mysqli_query($baglanti, "SELECT * FROM hastayatis WHERE doktor='$doktor'");

      echo "<table class=\"w3-table-all w3-hoverable\">";
      echo "<tr>";
      echo "<th>HASTA ADI</th>";
      echo "<th>YATIŞ TARİHİ</th>";
      echo "<th>ODA NO</th>";
      echo "<th>YATIŞ NEDENİ</th>";
      echo "<th>DOKTOR</th>";
      echo "</tr>";
      while($row = mysqli_fetch_array($selecth))
        {   
          echo "<tr>";
          echo "<td>".$row["hastaadi"]."</td>";
          echo "<td>".$row["yatistarihi"]."</td>";
          echo "<td>".$row["odano"]."</td>";
          echo "<td>".$row["yatisnedeni"]."</td>";
          echo "<td>".$row["doktor"]."</td>";
          echo "</tr>";
        }
      echo "</table>";
  ?>
  
  </div>
  <br>
  <br>
  <div class="w3-container">
  <h3>Toplam Yatan Hasta Kayıtlarınız: <span class="w3-badge w3-lime"><?php echo mysqli_num_rows($selecth); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</div>



</body>
</html>