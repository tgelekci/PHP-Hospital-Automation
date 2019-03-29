<?php
$baglanti=mysqli_connect("localhost", "root", "", "hastane");
session_start();

$kullanici_kontrol=$_SESSION["giris_kullanici"];
$sonuc_sql=mysqli_query($baglanti, "SELECT dkullaniciadi FROM doktorlar WHERE dkullaniciadi='$kullanici_kontrol'");

$row=mysqli_fetch_array($sonuc_sql);
$giris_session=$row["dkullaniciadi"];

if(!isset($_SESSION["giris_kullanici"])){
    header("location: Doktorgirisi.php");
}

$alan_sql=mysqli_query($baglanti, "SELECT dalan FROM doktorlar WHERE dkullaniciadi='$kullanici_kontrol'");
$row2=mysqli_fetch_array($alan_sql);
$alan_session=$row2["dalan"];

?>