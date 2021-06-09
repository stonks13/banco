<?php

class Cuenta
{
    private $cuenta;
    private $creacion;
    private $saldo;

    public function __construct($cuenta, $creacion, $saldo)
    {
        $this->cuenta = $cuenta;
        $this->creacion = $creacion;
        $this->saldo = $saldo;
    }

    public function getCuenta()
    {
        return $this->cuenta;
    }

    public function setCuenta($cuenta)
    {
        $this->cuenta = $cuenta;
    }

    public function getCreacion()
    {
        return $this->creacion;
    }

    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }


}
?>