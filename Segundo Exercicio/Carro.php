<?php
class Carro{
    private $marca;
    private $modelo;
    private $cor;
    private $km;
    
    public function __construct($marca, $modelo, $cor, $km) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->km = $km;
    }
    
    public function __toString() {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Cor: {$this->cor}, KM: {$this->km}";
    }
}