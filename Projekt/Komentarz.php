<?php

class Komentarz
{ private $tresc, $data, $login_uzytkownik, $id_post;

    public function getIdPost()
    {
        return $this->id_post;
    }
    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;
    }

    public function getTresc()
    {
        return $this->tresc;
    }

    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }
    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }
    public function getLoginUzytkownik()
    {
        return $this->login_uzytkownik;
    }

    public function setLoginUzytkownik($login_uzytkownik)
    {
        $this->login_uzytkownik = $login_uzytkownik;
    }



}