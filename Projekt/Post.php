<?php

class Post
{   private $id, $tytul,$tresc, $data, $id_uzytkownik,$lokalizacja_zdjecia;
    public function getLokalizacjaZdjecia()
    {
        return $this->lokalizacja_zdjecia;
    }

    public function setLokalizacjaZdjecia($lokalizacja_zdjecia)
    {
        $this->lokalizacja_zdjecia = $lokalizacja_zdjecia;
    }

    public function getIdUzytkownik()
    {
        return $this->id_uzytkownik;
    }

    public function setIdUzytkownik($id_uzytkownik)
    {
        $this->id_uzytkownik = $id_uzytkownik;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTresc()
    {
        return $this->tresc;
    }

    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }

    public function getTytul()
    {
        return $this->tytul;
    }

    public function setTytul($tytul)
    {
        $this->tytul = $tytul;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }



}