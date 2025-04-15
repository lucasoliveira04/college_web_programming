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
                    echo($carro . "\n\n");
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
        $carro = $repo->findById($id);
        if ($carro) {
            echo "Qual campo deseja alterar?\n";
            echo "1 - Marca\n";
            echo "2 - Modelo\n";
            echo "3 - Cor\n";
            echo "4 - KM\n";
            echo "Escolha uma opção: ";
            $campo = trim(fgets(STDIN));

            switch ($campo) {
                case 1:
                    echo "Nova marca: ";
                    $novaMarca = trim(fgets(STDIN));
                    $carro->setMarca($novaMarca);
                    break;
                case 2:
                    echo "Novo modelo: ";
                    $novoModelo = trim(fgets(STDIN));
                    $carro->setModelo($novoModelo);
                    break;
                case 3:
                    echo "Nova cor: ";
                    $novaCor = trim(fgets(STDIN));
                    $carro->setCor($novaCor);
                    break;
                case 4:
                    echo "Novo KM: ";
                    $novoKm = trim(fgets(STDIN));
                    $carro->setKm($novoKm);
                    break;
                default:
                    echo "Opção inválida.\n";
                    return;
            }

            $repo->updateData($carro);
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
