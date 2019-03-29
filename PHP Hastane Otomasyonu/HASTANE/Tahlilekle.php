<!DOCTYPE html>
<html>
<head>
<title>Tahlil Ekle</title>

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
        <h1 class="w3-xxlarge w3-left">Hastaya Vereceğiniz Tahlil Bilgilerini Ekleyin:</h1>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
        <h2>Kan Tahlilleri:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Hematoloji">
        <label>Hematoloji</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Hormon">
        <label>Hormon</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Rutin Biyokimya">
        <label>Rutin Biyokimya</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="ELISA">
        <label>ELISA</label></p>

        <p>
        <h2>İdrar Tahlilleri:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Tam Idrar Tahlili">
        <label>Tam İdrar Tahlili</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Idrar Kulturu">
        <label>İdrar Kültürü</label></p>

        <p>
        <h2>Mikroskopi Tahlilleri:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Gaita">
        <label>Gaita</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Sperm">
        <label>Sperm</label></p>

        <p>
        <h2>Radyolojik Tahliller:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Ultrason">
        <label>Ultrason</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="MR">
        <label>MR</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Bilgisayarli Tomografi">
        <label>Bilgisayarli Tomografi</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="PET">
        <label>PET</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Direk Grafiler">
        <label>Direk Grafiler</label></p>

        <p>
        <h2>Patoloji Tahlilleri:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Smear Testi">
        <label>Smear Testi</label></p>

        <p>
        <h2>Kardiyolojik Tahliller:</h2>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="EKO">
        <label>EKO</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="EKG">
        <label>EKG</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Eforlu EKG">
        <label>Eforlu EKG</label>
        <input class="w3-check" type="checkbox" name="tahliller[]" value="Anjiografi">
        <label>Anjiografi</label></p>

        <p>     
          <input class="w3-input w3-border" name="hasta" type="text">
          <i class="fa fa-user" style="font-size:48px;color:gray"></i><label class="w3-text-blue-gray"> Hasta İsmi</label></p>
        <p>
          <input class="w3-input w3-border" name="tahliltarihi" type="date">
          <i class="fa fa-calendar" style="font-size:48px;color:gray"></i><label class="w3-text-blue-gray"> Tahlil Veriliş Tarihi</label></p>
        <p>
          <input type="submit" name="butonekle" class="w3-btn w3-blue-gray w3-right w3-large w3-border" value="EKLE">
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
        if(isset($_POST['hasta'])&&isset($_POST['tahliltarihi'])&&isset($_POST['tahliller'])){
            $hasta=$_POST['hasta'];
            $tahliltarihi=$_POST['tahliltarihi'];
            $butuntahliller=$_POST['tahliller'];
            if(isset($_POST['butonekle'])){
                
                    foreach($butuntahliller as $tahlil) {
                      $muayeneekle=mysqli_query($baglanti, "INSERT INTO tahliller (hastaadi, tarih, tahlil, doktor) VALUES ('".$hasta."', '".$tahliltarihi."', '".$tahlil."', '".$dt."')");


                } 
            }

        }
    


            
        

        echo "<h1>MEVCUT TAHLİL KAYITLARINIZ:</h1>";

        $selectta=mysqli_query($baglanti, "SELECT * FROM tahliller WHERE doktor='$dt'");

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
    <h3>Toplam Tahlil Kayıtlarınız: <span class="w3-badge w3-blue-gray"><?php echo mysqli_num_rows($selectta); ?></span></h3>
  </div>

</body>
</html>