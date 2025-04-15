<?php

include "Carro.php";
include "CarroRepository.php";

$repo = new CarroRepository();

do {
    echo("TOTAL DE CARROS: ". count($repo->findAll()) . "\n");
    echo("******* MENU PRINCIPAL *******\n");
    echo("1 - CADASTRAR CARRO\n");
    echo("2 - MOSTRAR TODOS OS CARROS\n");
    echo("3 - MOSTRAR CARRO DESEJADO\n");
    echo("4 - ALTERAR DADOS DESEJADOS\n");
    echo("5 - EXCLUIR CARRO\n");
    echo("6 - SAIR DO SISTEMA\n");
    echo("*******************************\n");
    echo('Escolha a opção desejada: ');

    $ops = trim(fgets(STDIN)); 
    echo "\n";

    settOptionPainel($ops, $repo);

    echo("\nPressione ENTER para continuar...");
    fgets(STDIN); 

    system('clear');

} while ($ops != 6);

function settOptionPainel($option, $repo) {
    switch ($option) {
        case 1:
            echo("Marca: ");
            $marca = trim(fgets(STDIN)); 

            echo("Modelo: ");
            $modelo = trim(fgets(STDIN));

            echo("Cor: ");
            $cor = trim(fgets(STDIN));

            echo("KM: ");
            $km = trim(fgets(STDIN));

            $carro = new Carro($marca, $modelo, $cor, $km);
            $repo->save($carro);
            break;

        case 2:
            $carros = $repo->findAll();
            if (empty($carros)) {
                echo "Nenhum carro cadastrado.\n";
            } else {
                foreach ($carros as $carro) {
                    echo($carro . "\n");
                }
            }
            break;

        case 3:
            echo("ID do carro: ");
            $id = trim(fgets(STDIN));
            $carro = $repo->findById($id);
            if ($carro) {
                echo $carro;
            } else {
                echo "Carro não encontrado.\n";
            }
            break;

        case 4:
            echo("ID do carro que deseja alterar: ");
            $id = trim(fgets(STDIN));
            $carroAntigo = $repo->findById($id);
            if ($carroAntigo) {
                echo("Nova marca: ");
                $marca = trim(fgets(STDIN));
                echo("Novo modelo: ");
                $modelo = trim(fgets(STDIN));
                echo("Nova cor: ");
                $cor = trim(fgets(STDIN));
                echo("Novo KM: ");
                $km = trim(fgets(STDIN));
                $novoCarro = new Carro($marca, $modelo, $cor, $km, $id);
                $repo->updateData($novoCarro);
            } else {
                echo "Carro não encontrado.\n";
            }
            break;

        case 5:
            echo("ID do carro que deseja excluir: ");
            $id = trim(fgets(STDIN));
            $repo->deleteById($id);
            break;

        case 6:
            echo("Saindo do sistema...\n");
            break;

        default:
            echo("Opção inválida.\n");
    }
}
