<?php

include "CarroDB.php";

class CarroRepository {
    private $carRepository;

    public function __construct() {
        $this->carRepository = new CarroDB();
    }

    public function save($object){
        if ($object instanceof Carro) {
            $this->carRepository->save($object);
        } else {
            echo "Erro: objeto inválido.\n";
        }
    }

    public function updateData($novoCarro){
        if ($novoCarro instanceof Carro){
            $this->carRepository->updateData($novoCarro);
        }
    }

    public function deleteById($id){
        $this->carRepository->deleteById($id);
    }

    public function findAll() {
        return $this->carRepository->findAll();
    }

    public function findById($id){
        return $this->carRepository->findById($id);
    }
}
