<?php
require "konekcija.php";
require "models/tip.php";

$podaci = Tip::vratiTipove($kon);

foreach ($podaci as $tip){

    ?>
    <option value="<?= $tip->tipId ?>"><?= $tip->tip ?> </option>

<?php
}
?>