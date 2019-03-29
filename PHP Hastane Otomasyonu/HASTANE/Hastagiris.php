<!DOCTYPE html>
<html>
<head>
<title>Hasta Giriş</title>

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
      <div class="w3-container w3-khaki ">
        <h1 class="w3-xxlarge w3-left">Yatacak Hastanın Bilgilerini Ekleyin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <input class="w3-input w3-border" name="yatanhasta" type="text">
          <i class="fa fa-bed" style="font-size:48px;color:lightgreen"></i><label class="w3-text-khaki"> Yatacak Hastanın Adı</label></p>
          <p>
          <input class="w3-input w3-border" name="yatistarih" type="date">
          <i class="fa fa-calendar" style="font-size:48px;color:lightgreen"></i><label class="w3-text-khaki"> Yatış Tarihi</label></p>
        <p>     
          <input class="w3-input w3-border" name="odano" type="text">
          <i class="fa fa-sort-numeric-asc" style="font-size:48px;color:lightgreen"></i><label class="w3-text-khaki"> Oda Numarası</label></p>
        <p>
          <input class="w3-input w3-border" name="yatisneden" type="text">
          <i class="fa fa-question-circle" style="font-size:48px;color:lightgreen"></i><label class="w3-text-khaki"> Yatış Nedeni </label></p>
        <p>
          <input type="submit" name="eklebuton" class="w3-btn w3-khaki w3-right w3-large w3-border" value="EKLE">
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

        if(isset($_POST['yatanhasta'])&&isset($_POST['yatistarih'])&&isset($_POST['odano'])&&isset($_POST['yatisneden'])){
            $yatanhasta=$_POST['yatanhasta'];
            $yatistarih=$_POST['yatistarih'];
            $odano=$_POST['odano'];
            $yatisneden=$_POST['yatisneden'];

            if(isset($_POST['eklebuton'])){
              $hastayatisekle=mysqli_query($baglanti, "INSERT INTO hastayatis (hastaadi, yatistarihi, odano, yatisnedeni, doktor) VALUES ('".$yatanhasta."', '".$yatistarih."', '".$odano."', '".$yatisneden."', '".$dt."')");

            }
        

        }
        echo "<h1>GİRİŞ YAPMIŞ MEVCUT HASTALAR:</h1>";

        $selecth=mysqli_query($baglanti, "SELECT * FROM hastayatis WHERE doktor='$dt'");

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
  <br>
</div>
<div class="w3-container">
    <h3>Toplam Yatan Hasta Kayıtlarınız: <span class="w3-badge w3-khaki"><?php echo mysqli_num_rows($selecth); ?></span></h3>
  </div>
  <br>
  <br>
  <br>
</body>
</html>
