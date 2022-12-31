<?php
$host = "localhost";
$db = "bioskop";
$user = "root";
$pass = "";

$kon = new mysqli($host,$user,$pass,$db);
$kon->set_charset('utf8');


if ($kon->connect_errno){
    exit("Neuspesna konekcija: greska> ".$kon->connect_error.", err kod>".$kon->connect_errno);
}
?>