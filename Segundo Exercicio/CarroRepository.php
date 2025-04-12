<?php
include "CarroDB.php";

class CarroRepository
{
    public $carRepository;

    public function __construct() {
        $this->carRepository = new CarroDB();
    }
    
    public function save($object){
        if ($object instanceof Carro){
            echo "Salvo com sucesso";
            $this->carRepository->carros[] = $object;
        } else {
            echo "Não é um objeto";
        }
    }
    
    public function findAll(){
        return $this->carRepository->carros;
    }
    
    
}
