<?php

require "konekcija.php";
require "models/korisnik.php";

$poruka = "";

session_start();
if(isset($_POST['ki']) && isset($_POST['lo'])){
    $korisnickoIme = $_POST['ki'];
    $lozinka = $_POST['lo'];

    $korisnik = new Korisnik(1, $korisnickoIme, $lozinka);
    $odgovor = Korisnik::login($korisnik, $kon);

    if($odgovor->num_rows==1){
      
        $_SESSION['user_id'] = $korisnik->id;
        setcookie("korisnik", $korisnickoIme, time() + 3600);
        header('Location: pocetna.php');
        exit();
    }else{
        $poruka="Pogrešni podaci!";
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
    <div id="header"></div>
    <div id="linija"></div>

    <br><br><br><br><br>
    <div class="login-form">
        <div class="main-div">
            <form method="post" action="">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h3 id="por"><?= $poruka; ?></h3>
            </div>
                <div class="container">
                    <label class="ki">Korisničko ime</label>
                    <input type="text" name="ki" class="form-control" required>
                    <br>
                    <label for="lo">Lozinka</label>
                    <input type="password" name="lo" class="form-control" required>
                    <br>
                    <button type="submit" class="BtnForm" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>