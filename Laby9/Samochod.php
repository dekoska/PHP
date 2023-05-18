<?php

class Samochod{
    private $marka;
    private $model;
    private $cena;
    private $rok;
    private $opis;

    public function __construct($marka, $model, $cena, $rok, $opis)
    {
        $this->marka = $marka;
        $this->model = $model;
        $this->cena = $cena;
        $this->rok = $rok;
        $this->opis = $opis;
    }
    public function getMarka()
    {
        return $this->marka;
    }
    public function setMarka($marka)
    {
        $this->marka = $marka;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function getCena()
    {
        return $this->cena;
    }
    public function setCena($cena)
    {
        $this->cena = $cena;
    }
    public function getRok()
    {
        return $this->rok;
    }
    public function setRok($rok)
    {
        $this->rok = $rok;
    }
    public function getOpis()
    {
        return $this->opis;
    }
    public function setOpis($opis)
    {
        $this->opis = $opis;
    }

}