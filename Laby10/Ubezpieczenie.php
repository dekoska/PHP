<?php

class Ubezpieczenie extends AutoZDodatkami{
    private $pierwszeAuto, $liczbaLat;
    public function __construct($pierwszeAuto, $liczbaLat)
    {
        $this->pierwszeAuto = $pierwszeAuto;
        $this->liczbaLat = $liczbaLat;
    }

    public function getPierwszeAuto()
    {
        return $this->pierwszeAuto;
    }

    public function setPierwszeAuto($pierwszeAuto)
    {
        $this->pierwszeAuto = $pierwszeAuto;
    }
    public function getLiczbaLat()
    {
        return $this->liczbaLat;
    }
    public function setLiczbaLat($liczbaLat)
    {
        $this->liczbaLat = $liczbaLat;
    }


    public function ObliczCene(){
        $ubezpieczenie=$this->liczbaLat*0.01*$this->getCenaEUR();
        return ($ubezpieczenie+$this->getKlimatyzacja()+$this->getRadioodtwarzacz()+$this->getAlarm()+$this->getCenaEUR())*self::$aktualnyKursEUR;
    }
}