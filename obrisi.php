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


if(isset($_POST['obrisi'])){
    $naziv = trim($_POST['film']);

    if(Film::obrisi($naziv, $kon)){
        $poruka = "Projekcija je obrisana";
    }else{
        $poruka = "Greška!";
    }

}

$filmovi = Film::pretrazi("SVE", 'asc', $kon);

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
            <h4 id="por" class="nav-item nav-link" style="text-transform: capitalize;"><?= $kor;?></h4>
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
            <div class="text-center mx-auto mb-5"style="max-width: 600px;">
            <h3 id="por"><?= $poruka; ?></h3>
            </div>
            <div class="row">
                <form method="post" action="" style="margin-top: 25px;">
                    <label for="film">Film</label>
                    <select id="film" name="film" class="form-control">
                        <?php
                        foreach ($filmovi as $film){
                            ?>
                        <option value="<?= $film->filmId ?>"><?= $film->naziv . ", datum: " . $film->datum ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <button class="BtnForm" type="submit" name="obrisi">Otkaži projekciju</button>

                </form>
            </div>
            <br/>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


</body>

</html>