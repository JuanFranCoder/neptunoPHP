<?php
class Cliente{
    private $IdCliente;
    private $NombreCompany;
    private $NombreContacto;
    // private $CargoContacto;
    // private $Direccion;
    // private $Ciudad;
    // private $Region;
    // private $CodPostal;
    private $Pais;
    private $Telefono;
    // private $Fax;
    private $Saldo;

    /*
    function __construct($idCliente, $nombreCompany, $nombreContacto, $cargoContacto, $direccion, $ciudad, $region, $codPostal, $pais, $telefono, $fax, $saldo){
        $this->idCliente = $idCliente;
        $this->nombreCompany = $nombreCompany;
        $this->nombreContacto = $nombreContacto;
        $this->cargoContacto = $cargoContacto;
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->region = null;
        $this->codPostal = $codPostal;
        $this->pais = $pais;
        $this->telefono = $telefono;
        $this->fax = $fax;
        $this->saldo = null;
    }
*/
/*
    public function __construct($idCliente, $nombreCompany, $nombreContacto, $pais, $telefono, $saldo = null){
        $this->IdCliente = $idCliente;
        $this->NombreCompany = $nombreCompany;
        $this->NombreContacto = $nombreContacto;
        $this->Pais = $pais;
        $this->Telefono = $telefono;
        $this->Saldo = $saldo;
    }
*/
    public function __construct($idCliente, $nombreCompany){
        $this->IdCliente = $idCliente;
        $this->NombreCompany = $nombreCompany;
    }

    public function convertObjectToArray(){
        return get_object_vars($this);
    }
}
?>