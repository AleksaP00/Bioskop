<?php

class Tip
{

    public $tipId;
    public $tip;


    public function __construct($tipId=null,$tip=null)
    {
        $this->tipId = $tipId;
        $this->tip=$tip;
    }

    public static function vratiTipove(mysqli $konekcija)
    {
        $sql = "SELECT * FROM tip";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

}
