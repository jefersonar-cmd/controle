<?php

namespace App\Model;

class ProdutoDao {
     public function ReadValue (Produto $p) {
          if ($p->getName() != ''):
               $sql = "SELECT * FROM produtos WHERE nome_prod LIKE CONCAT(?, '%')";
          
               $stmt = Conexao::getConn()->prepare($sql);
               $stmt->bindValue(1, $p->getName());

               $stmt->execute();

               if ($stmt->rowCount() > 0):
                    $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                    return $result;
               else:
                    return 'Produto não encontrado';
               endif;
          endif;
     }
     public function ReadDefault() {
          $sql = "SELECT * FROM produtos";
          
          $stmt = Conexao::getConn()->prepare($sql);

          $stmt->execute();

          if ($stmt->rowCount() > 0):
               $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
               return $result;
          endif;
     }
}