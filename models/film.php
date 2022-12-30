<?php


class Film
{

   public $filmId;
   public $naziv;
   public $opis;
   public $datum;
   public $zanrId;
   public $tipId;


    public function __construct($filmId=null, $naziv=null, $opis=null, $datum=null, $zanrId=null, $tipId=null)
    {
        $this->filmId = $filmId;
        $this->naziv=$naziv;
        $this->opis=$opis;
        $this->datum=$datum;
        $this->zanrId=$zanrId;
        $this->tipId=$tipId;
    }

    public static function pretrazi($zanr, $sort, mysqli $konekcija)
    {
        $sql = "SELECT * FROM film f join zanr z on f.zanrID = z.zanrId join tip t on f.tipId = t.tipId";

        if($zanr != "SVE"){
            $sql .= " WHERE f.zanrID = " . $zanr;
        }


        $sql.= " ORDER BY f.datum " . $sort;

        $resultSet = $konekcija->query($sql);

        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }

        return $rezultati;
    }

    public static function sacuvaj($naziv, $opis, $datum, $zanrID, $tipId, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO film VALUES(null, '$naziv' , '$opis', '$datum' , $zanrID, $tipId)");
    }

    public static function azuriraj($filmId, $datum, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE film SET datum = '$datum' WHERE filmid = $filmId");
    }

    public static function obrisi($filmId, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM film WHERE filmid = $filmId");
    }
}