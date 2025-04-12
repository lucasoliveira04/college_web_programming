<?php
include "Carro.php";
include "CarroRepository.php";

$repo = new CarroRepository();

$carro1 = new Carro("Toyota", "Corolla", "Preto", 25000);
$carro2 = new Carro("Honda", "Civic", "Prata", 30000);

$quantityCar = 0;

do {
    echo "Quantidade de carros: " . count($repo->findAll()) . "\n";  
    
    echo "[1] - Salva | [2] - Lista todos os produtos | [0] - Sair: ";
    $ops = fgets(STDIN);
    
    switch ($ops) {
        case 1:
            $repo->save($carro1);
            $repo->save($carro2);
            break;
        case 2:
            foreach ($repo->findAll() as $car) {
                echo $car . "\n";
            }
            break;
        case 0:
            echo "Saindo...\n";
            break;
        default:
            echo "Opção inválida\n";
            break;
    } 
} while ($ops != 0);
