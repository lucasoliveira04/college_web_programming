<?php
  require_once 'ProductRepository.php';
  include "./ProductService.php";

  $productRepositoy = new ProductRepository();
  $productService = new ProductService($productRepositoy);

  $option;

  do {
    echo "+==============================================+\n";
    echo "|   📦 MENU - GERENCIAMENTO DE PRODUTO         |\n";
    echo "+==============================================+\n";
    echo "| 1️⃣  Criar Produto                            |\n";
    echo "| 2️⃣  ✏️ Alterar Preço do Produto              |\n";
    echo "| 3️⃣  🔍 Mostrar Dados do Produto              |\n";
    echo "| 4️⃣  📋 Mostrar Todos os Produtos             |\n";
    echo "| 5️⃣  🧹 Limpar Terminal                       |\n";
    echo "| 0️⃣  ❌ Sair                                  |\n";
    echo "+==============================================+\n";
    echo "Digite a opção desejada: ";
    $option = trim(fgets(STDIN));

    switch ($option){
      case 1:
        echo "Digite o nome do produto: ";
        $name = trim(fgets(STDIN));
        echo "Digite o preço do produto: ";
        $price = trim(fgets(STDIN));

        $product = $productService->createProduct($name, $price);
      
        break;
      case 2:
        echo "Digite o ID do produto: ";  
        $id = trim(fgets(STDIN));

        if ($productService->existById($id)){
          echo "Digite o novo preço do produto: ";
          $price = trim(fgets(STDIN));

          $product = $productService->updateProduct($id, $price);

          if ($product){
            $product->toString();
          }
        } else {
          echo "Produto não encontrado ou ID inválido.\n";
        }

        break;
      case 3:
        echo "Digite Id do produto: ";
        $id = trim(fgets(STDIN));
      
        $product = $productService->getProductById($id);
        if ($product){
          $product->toString();
        }
      
        break;
      case 4:
        $products = $productService->getAllProducts();
        foreach ($products as $product){
          echo $product->toString();
        }
        break;
      case 5:
        system("clear");
        break;
      case 0:
        echo "Saindo....\n";
        break;
      default:
        systen("clear");
        echo "Opção inválida\n";
        echo "Tente Novamente\n";
        break;
    }
    
  } while ($option != 0);
?>
