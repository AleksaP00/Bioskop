<?php
require "models/korisnik.php";

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

if (isset($_COOKIE["korisnik"])){
    $kor="  " . $_COOKIE["korisnik"];
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
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            
                
            </div>
                <div class="col-md-4">
                    <label for="zanr">Zanr</label>
                    <select class="form-control" id="zanr">
                        <option value="SVE">Svi</option>
                        <option value="1">Drama</option>
                        <option value="2">Naučna fantastika</option>
                        <option value="3">Triler</option>
                        <option value="4">Avantura</option>
                        <option value="5">Komedija</option>
                        <option value="6">Akcija</option>
                        <option value="7">Animacija</option>
                        <option value="8">Horor</option>
                    </select>
                </div>
                <br>
                <div class="col-md-4">
                <label for="sort">Sortiraj po datumu</label>
                    <select class="form-control" id="sort">
                        <option value="asc">Prvo skorašnje projekcije</option>
                        <option value="desc">Prvo dalje projekcije</option>
                    </select>
                </div>
                <br><br>

                <div class="cols-md-12">
                    <button class="BtnFormP" onclick="pretrazi()">Prikazi repertoar</button>
                </div>
            </div>
            <br/>
            <br/>
            <div class="row g-4" id="rezultat" >

            
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>
        function pretrazi() {
            let zanr = $("#zanr").val();
            let sort = $("#sort").val();

            $.ajax({
                url: 'pretraga.php',
                data: {
                    zanr: zanr,
                    sort: sort
                },
                success: function (data) {
                    $("#rezultat").html(data);
                }
            });
        }
    </script>

</body>

</html>