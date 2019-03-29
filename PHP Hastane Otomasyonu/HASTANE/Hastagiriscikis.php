<?php
 require "Sessions.php";

 $doktor=$giris_session;

?>

<!DOCTYPE html>
<html>
<head>
<title>Hasta Giriş-Çıkış</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>
    <div class="w3-container w3-center w3-teal">
        <h1 class="w3-xxlarge w3-left"><?php echo $doktor ?>, lütfen yapmak istediğiniz hasta giriş-çıkış işlemini seçiniz:</h1>
    </div>

    <div class="w3-container w3-center w3-lime ">
        <h1 class="w3-xxxlarge w3-left">
            <?php  
           
            
                echo "<ul class=\"w3-ul w3-card-4 w3-yellow w3-jumbo w3-hoverable\">";
                    echo "<a href='Hastagiris.php?kullaniciadi=".$doktor."'><li>Hasta Girişi</li></a>";
                    echo "<a href='Hastacikis.php?kullaniciadi=".$doktor."'><li>Hasta Çıkışı</li></a>";
                 echo "</ul>"; ?> </h1>
        <br>
</div>
<div class="w3-container w3-center w3-dark-grey">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
</body>
</html>
