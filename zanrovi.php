<?php
require "konekcija.php";
require "models/zanr.php";

$podaci = Zanr::vratiZanrove($kon);

foreach ($podaci as $zanr){

    ?>
    <option value="<?= $zanr->zanrId ?>"><?= $zanr->zanr ?> </option>

<?php
}
?>