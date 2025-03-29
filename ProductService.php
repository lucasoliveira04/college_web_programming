<?php
  require_once 'ProductRepository.php';
  include "./Product.php";
  
  class ProductService{
    private $productRepository;

    public function __construct(ProductRepository $productRepository){
      $this->productRepository = $productRepository;
    }

    public function createProduct($name, $price){
      $product = new Product($name, $price);
      $this->productRepository->save($product);
      echo $product->toString();
      return $product;
    }

    public function getAllProducts(){
      return $this->productRepository->findAll();
    }

    public function getProductById($id){
      if ($product = $this->productRepository->findById($id)){
        echo "Produto encontrado\n";
        return $product;
      } 
    }

    public function updateProduct($id, $price){
      $product = $this->getProductById($id);
      if ($product){
        $product->setPrice($price);
        $product->setUpdatedAt(new DateTime());
        echo "Preço do produto atualizado com sucesso.\n";
        return $product;;
      }

      echo "Produto não encontrado ou ID inválido.\n";
      return null;
    }

    public function existById($id){
      if ($this->productRepository->findById($id)){
        return true;
      } 

      return false;
    }
  }  
  
?>