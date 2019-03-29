<!DOCTYPE html>
<html>
<head>
<title>Tahlil Sil</title>

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
      <div class="w3-container w3-blue-gray ">
        <h1 class="w3-xxlarge w3-left">Hastadan Sileceğiniz Tahlil Bilgilerini Girin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="hastaismi" type="text">
          <i class="fa fa-user" style="font-size:48px;color:gray"></i><label class="w3-text-blue-gray"> Hasta Adı</label></p>
          <p>
          <input class="w3-input w3-border" name="tahlilismi" type="text">
          <i class="fa fa-flask" style="font-size:48px;color:gray"></i><label class="w3-text-blue-gray"> Tahlil</label></p>
        <p>
          <input type="submit" name="silbuton" class="w3-btn w3-blue-gray w3-right w3-large w3-border" value="SİL"></p>
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
      if(isset($_POST['hastaismi'])&&isset($_POST['tahlilismi'])){
          $hastaismi=$_POST['hastaismi'];
          $tahlilismi=$_POST['tahlilismi'];
          if(isset($_POST['silbuton'])){
            $tahlilsil=mysqli_query($baglanti, "DELETE FROM tahliller WHERE hastaadi='$hastaismi' AND tahlil='$tahlilismi'");

          }

      }


        echo "<h1>MEVCUT TAHLİL KAYITLARINIZ:</h1>";

        $selectta=mysqli_query($baglanti, "SELECT * FROM tahliller WHERE doktor='$dkt'");

        echo "<table class=\"w3-table w3-striped w3-bordered\">";
        echo "<tr>";
        echo "<th>HASTA ADI</th>";
        echo "<th>TAHLİL GİRİŞ TARİHİ</th>";
        echo "<th>TAHLİL</th>";
        echo "<th>DOKTOR</th>";
        echo "</tr>";
        while($rw = mysqli_fetch_array($selectta))
          {   
            echo "<tr>";
            echo "<td>".$rw["hastaadi"]."</td>";
            echo "<td>".$rw["tarih"]."</td>";
            echo "<td>".$rw["tahlil"]."</td>";
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
    <h3>Toplam Tahlil Kayıtlarınız: <span class="w3-badge w3-amber"><?php echo mysqli_num_rows($selectta); ?></span></h3>
  </div>


</body>
</html>
