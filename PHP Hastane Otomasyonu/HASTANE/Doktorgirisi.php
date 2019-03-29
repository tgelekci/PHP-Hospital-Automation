<?php
error_reporting(0);
$baglanti=mysqli_connect("localhost", "root", "", "hastane");
session_start();                       
if($_SERVER["REQUEST_METHOD"]){
    $kullanici=$_POST["dkullanici"];
    $sifre=$_POST["dsifre"];
    $sonuc=mysqli_query($baglanti, "SELECT * FROM doktorlar WHERE dkullaniciadi='$kullanici' AND dsifre='$sifre'");
    $row=mysqli_fetch_array($sonuc);
    $count=mysqli_num_rows($sonuc);

    if($count==1){
        $_SESSION["giris_kullanici"]=$kullanici;
        header("location: Doktormenu.php");
    }
    else{
        $hata = "Kullanici adınız veya parolanız yanlıştır.";
        
    }
}
?>




<!DOCTYPE html>
<html>
<head>
<title>Doktor Girişi</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    <div class="w3-container w3-blue">

        <h1 class="w3-jumbo w3-center w3-animate-zoom"><i class="fa fa-h-square"></i>   DOKTOR GİRİŞ SAYFASI</h1>
        <br>
    </div>
    
    <div class="w3-container w3-blue">
        <div class="w3-container w3-blue-grey">
            <h2>Lütfen Kullanıcı Adınızı ve Şifrenizi Giriniz:</h2>
        </div>   
        <form method="post" action="" class="w3-container w3-red">
            <p>
                <i class="fa fa-user-md" style="font-size:48px;color:black"></i>
                <label>Doktor Kullanıcı Adı:</label>
                <input name="dkullanici" class="w3-input w3-border" type="text">
            </p>
            <p>     
                <i class="fa fa-lock" style="font-size:48px;color:black"></i>
                <label>Doktor Şifresi:</label>
                <input name="dsifre" class="w3-input w3-border" type="password">
            </p>
            <br>
            <p>
                <input type="submit" name="giris_btn" class="w3-btn w3-white w3-right w3-large w3-round-xlarge w3-border" value="GİRİŞ">
            </p>
            <br>
            <br>
            <br>
        </form>
        <br>
        <br>
        <br>
        
        
    </div>

    <div class="w3-container w3-blue">
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
