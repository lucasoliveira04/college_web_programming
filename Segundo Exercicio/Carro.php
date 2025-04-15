<?php

class Carro {
    private $id;
    private $marca;
    private $modelo;
    private $cor;
    private $km;

    public function __construct($marca, $modelo, $cor, $km) {
        $this->id = random_int(1000, 9999);
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->cor = $cor;
        $this->km = $km;
    }

    public function __toString() {
        return "ID: {$this->id}\nMarca: {$this->marca}\nModelo: {$this->modelo}\nCor: {$this->cor}\nKM: {$this->km}";
    }

    public function getId() {
        return $this->id;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function setCor($cor) {
        $this->cor = $cor;
    }

    public function setKm($km) {
        $this->km = $km;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getKm() {
        return $this->km;
    }
}
