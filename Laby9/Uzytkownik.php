<?php
class Uzytkownik {
    private $login;
    private $haslo_hash;
    private $id;

    public function __construct($login, $haslo_hash,$id)
    {
        $this->login = $login;
        $this->haslo_hash = $haslo_hash;
        $this->id = $id;
    }


    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getHaslo_hash()
    {
        return $this->haslo_hash;
    }

    public function setHaslo_hash($haslo)
    {
        $this->haslo_hash = $haslo_hash;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

}