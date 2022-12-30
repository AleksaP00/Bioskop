<?php

class Zanr 
{

    public $zanrId;
    public $zanr;


    public function __construct($zanrId=null,$zanr=null)
    {
        $this->zanrId = $zanrId;
        $this->zanr=$zanr;
    }

    public static function vratiZanrove(mysqli $konekcija)
    {
        $sql = "SELECT * FROM zanr";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

}

