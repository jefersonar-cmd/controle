<?php

namespace App\Model;

class Produto {
     private $id, $name, $description, $qtd, $price;

     // public function __construct($id, $name, $description, $qtd, $price) {
     //      $this->setId($id);
     //      $this->setName($name);
     //      $this->setDescription($description);
     //      $this->setPrice($price);
     //      $this->setQtd($qtd);
     // }

     public function setId ($id) {
          $this->id = $id;
     }

     public function getId () {
          return $this->id;
     }

     public function setName ($name) {
          $this->name = $name;
     }

     public function getName () {
          return $this->name;
     }

     public function setDescription ($description) {
          $this->description = $description;
     }

     public function getDescription () {
          return $this->description;
     }

     public function setQtd ($qtd) {
          $this->qtd = $qtd;
     }

     public function getQtd () {
          return $this->qtd;
     }

     public function setPrice ($price) {
          $this->price = $price;
     }

     public function getPrice () {
          return $this->price;
     }
}