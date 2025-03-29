<?php
  class Product{
    private $id; 
    private $name;
    private $price;
    private $createdAt;
    private $updatedAt;

    public function __construct($name, $price){
      $this->id = $this->generatedId();
      $this->name = $name;
      $this->price = $price;
      $this->createdAt = new DateTime();
      $this->updatedAt = null;
    }

    public function toString(){
      echo "+==============================================+\n";
      echo "| 📦 Produto - Detalhes (ID: " . $this->id . ")  \n";
      echo "+==============================================+\n";
      echo "|  Name: " . $this->name . "\n";
      echo "|  Price: " . $this->price . "\n";
      echo "|  Created At: " . $this->createdAt->format('Y-m-d H:i:s') . "\n";

      if ($this->updatedAt){
        echo "|  Updated At: " . $this->updatedAt->format('Y-m-d H:i:s') . "\n";
      }

      echo "+==============================================+\n";
    }



    
    private function generatedId(){
      return random_int(100000, 999999);
    }
    
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getPrice() { return $this->price; }
    public function getCreatedAt() { return $this->createdAt; }
    public function getUpdatedAt() { return $this->updatedAt; }

    public function setName($name) { $this->name = $name; }
    public function setPrice($price) { $this->price = $price; }
    public function setUpdatedAt($updatedAt) { $this->updatedAt = $updatedAt; }
  }
?>