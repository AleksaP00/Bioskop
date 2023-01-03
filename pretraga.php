<?php
require "konekcija.php";
require "models/film.php";
require "models/zanr.php";

$zanr = trim($_GET['zanr']);
$sort = trim($_GET['sort']);

$podaci = Film::pretrazi($zanr, $sort, $kon);

?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Naziv</th>
            <th>Zanr</th>
            <th>Datum</th>
            <th>Tip projekcije</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($podaci as $film){
    ?>
    <tr>
        <td><?= $film->naziv ?></td>
        <td><?= $film->zanr ?></td>
        <td><?= $film->datum ?></td>
        <td><?= $film->tip?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>

