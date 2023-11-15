<?php
class Uzytkownik {

    private $id, $login, $haslo, $id_rola;

    public function __construct($id, $login, $haslo, $id_rola)
    {
        $this->id = $id;
        $this->login = $login;
        $this->haslo = $haslo;
        $this->id_rola = $id_rola;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getHaslo()
    {
        return $this->haslo;
    }
    public function setHaslo($haslo)
    {
        $this->haslo = $haslo;
    }
    public function getIdRola()
    {
        return $this->id_rola;
    }
    public function setIdRola($id_rola)
    {
        $this->id_rola = $id_rola;
    }

}