<?php

class Korisnik
{
    
    public $id;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($id=null,$korisnickoIme=null,$lozinka=null)
    {
        $this->id = $id;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
    }
    public static function login($korisnik, mysqli $kon)
    {
        $query = "SELECT * FROM korisnik WHERE korisnickoIme='$korisnik->korisnickoIme' and lozinka='$korisnik->lozinka'";
        
        return $kon->query($query);
    }
}


?>