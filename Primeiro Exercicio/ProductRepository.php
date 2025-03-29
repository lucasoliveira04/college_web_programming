<?php
  class ProductRepository {
    private $product = [];

    public function save(Product $product){
      return $this->product[] = $product;
    }

    public function findAll(){
      return $this->product;
    }

    public function findById($id){
      foreach($this->product as $product){
        if ($product->getId() == $id){
          return $product;
        }
      }

      return null;
    }
    
  }
  
?>