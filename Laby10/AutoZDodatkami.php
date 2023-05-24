<?php
require_once NoweAuto.php;
class AutoZDodatkami extends NoweAuto{
    public $alarm, $radioodtwarzacz, $klimatyzacja;
    public function __construct($alarm, $radioodtwarzacz, $klimatyzacja)
    {
        $this->alarm = $alarm;
        $this->radioodtwarzacz = $radioodtwarzacz;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function getAlarm()
    {
        return $this->alarm;
    }
    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;
    }
    public function getRadioodtwarzacz()
    {
        return $this->radioodtwarzacz;
    }
    public function setRadioodtwarzacz($radioodtwarzacz)
    {
        $this->radioodtwarzacz = $radioodtwarzacz;
    }
    public function getKlimatyzacja()
    {
        return $this->klimatyzacja;
    }

    public function setKlimatyzacja($klimatyzacja)
    {
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene(){
        return ($this->getCenaEUR()+$this->klimatyzacja+$this->radioodtwarzacz+$this->alarm)*self::$aktualnyKursEUR;
    }

}