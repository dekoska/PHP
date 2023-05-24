<?php

class NoweAuto{
    private $model, $cenaEUR;
    public static $aktualnyKursEUR=4.54;

    public function __construct($model, $cenaEUR)
    {
        $this->model = $model;
        $this->cenaEUR = $cenaEUR;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function setModel($model)
    {
        $this->model = $model;
    }
    public function getCenaEUR()
    {
        return $this->cenaEUR;
    }
    public function setCenaEUR($cenaEUR)
    {
        $this->cenaEUR = $cenaEUR;
    }

    public function ObliczCene(){
        return $this->cenaEUR*self::$aktualnyKursEUR;
    }

}