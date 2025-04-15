<?php

class CarroDB {
    private $carros = [];

    public function save(Carro $carro) {
        $this->carros[] = $carro;
        echo("Carro salvo com sucesso!\n");
    }

    public function findAll() {
        return $this->carros;
    }

    public function findById($id){
        foreach($this->carros as $carro){
            if ($carro->getId() == $id){
                return $carro;
            }
        }

        return null;
    }

    public function updateData($novoCarro){
        foreach ($this->carros as $i => $carro){
            if ($carro->getId() === $novoCarro->getId()){
                $this->carros[$i] = $novoCarro;
                echo("Carro atualizado com sucesso.\n");
                return;
            }
        }
        echo("Carro não encontrado\n");
    }

    public function deleteById($id){
        foreach ($this->carros as $key => $carro) {
            if ($carro->getId() == $id) {
                unset($this->carros[$key]);
                echo("Carro excluído com sucesso.\n");
                return true;
            }
        }
        echo("Carro não encontrado para exclusão.\n");
        return false;
    }
}
