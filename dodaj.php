<?php
require "konekcija.php";
require "models/film.php";
require "models/korisnik.php";

$poruka = "";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_COOKIE["korisnik"])){
    $kor="  " . $_COOKIE["korisnik"];
}


if(isset($_POST['dodaj'])){
    $naziv = trim($_POST['naziv']);
    $opis = trim($_POST['opis']);
    $datum = trim($_POST['datum']);
    $zanr = trim($_POST['zanr']);
    $tip = trim($_POST['tip']);


    if(Film::sacuvaj($naziv, $opis, $datum, $zanr, $tip ,$kon)){
        $poruka = "Projekcija je sačuvana";
    }else{
        $poruka = "Greška";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bioskop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <h4 id="por" class="nav-item nav-link" style="text-transform: capitalize; color: white;"><?= $kor;?></h4>
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="pocetna.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj projekciju</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmeni datum projekcije</a>
                <a href="obrisi.php" class="nav-item nav-link">Otkaži projekciju</a>
            </div>
        </div>  
    </nav>

    <div id="linija"></div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 600px; margin-top: -40px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="">
                    <label for="naziv">Naziv filma</label>
                    <input type="text" id="naziv" name="naziv" class="form-control">
                    <label for="opis">Opis</label>
                    <textarea class="form-control" name="opis" cols="40" rows="4"></textarea>
                    <label for="datum">Datum</label>
                    <input type="text" id="datum" name="datum" class="form-control">
                    <label for="zanr">Zanr</label>
                    <select id="zanr" name="zanr" class="form-control">
                    </select>
                    <label for="tip">Tip</label>
                    <select id="tip" name="tip" class="form-control">
                    </select>
                    <br>
                    <button class="BtnForm" type="submit" name="dodaj" >Dodaj projekciju</button>

                </form>
            </div>
            <br/>
            <br/>

        </div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function popuniKomboZanrova() {

            $.ajax({
                url: 'zanrovi.php',
                success: function (data) {
                   $("#zanr").html(data);
                }
            });
        }
        popuniKomboZanrova();
    

    function popuniKomboTipova() {

            $.ajax({
                url: 'tipovi.php',
                success: function (data) {
                   $("#tip").html(data);
                }
            });
        }
        popuniKomboTipova();
    </script>

</body>

</html>