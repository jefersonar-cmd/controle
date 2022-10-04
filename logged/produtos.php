<?php
include '../db/conn.php';
?>
<div class="container-fluid">
    <div class="col">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th colspan="5">Produtos</th>
                    <th><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#addprod">add_circle</a></th>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Detalhes</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
              <?php
                $select = $conn->query("SELECT * FROM produtos");
                while($obj = $select->fetch_object()){
                  $preco = str_replace('.', ',', $obj->preco_prod);
                  ?>
                  <th><?php echo $obj->id_prod; ?></th>
                  <th><?php echo $obj->nome_prod; ?></th>
                  <td><?php echo $obj->qtd_prod; ?></td>
                  <td><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#visibility<?php echo $obj->id_prod;?>">visibility</a></td>
                  <td><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#edit<?php echo $obj->id_prod;?>">edit</a></td>
                  <td><a href="" class="material-icons">delete</a></td>
<!-- Modal Visualização -->
<div class="modal fade" id="visibility<?php echo $obj->id_prod;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="visiprodLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="visiprodLabel">Detalhes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cad_prod/cad.php" method="post">
          <div class="row">
            <div class="col">
              <label for="nome_prod">Nome do Produto</label>
              <input type="text" id="nome_prod" name="nome_prod" class="form-control" value="<?php echo $obj->nome_prod; ?>" disabled>
            </div>
            <div class="col">
              <label for="qtd">Quantidade em Estoque</label>
              <input type="number" name="qtd" id="qtd" class="form-control" value="<?php echo $obj->qtd_prod; ?>" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="valor">Preço</label>
              <div class="input-group mb-3">
                <span class="input-group-text">R$</span>
                <input type="text" name="preco" class="form-control" id="valor" aria-label="Amount (to the nearest dollar)" value="<?php echo $preco; ?>" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="obs">Observação</label>
              <textarea name="obs" id="obs" class="form-control" rows="3" disabled><?php echo $obj->obs_prod; ?></textarea>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Editar -->
<div class="modal fade" id="edit<?php echo $obj->id_prod;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editprodLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editprodLabel">Detalhes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cad_prod/edit.php" method="post">
          <div class="row">
            <div class="col">
              <label for="nome_prod">Nome do Produto</label>
              <input type="text" id="nome_prod" name="nome_prod" class="form-control" value="<?php echo $obj->nome_prod; ?>">
            </div>
            <div class="col">
              <label for="qtd">Quantidade em Estoque</label>
              <input type="number" name="qtd" id="qtd" class="form-control" value="<?php echo $obj->qtd_prod; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="valor">Preço</label>
              <div class="input-group mb-3">
                <span class="input-group-text">R$</span>
                <input type="text" name="preco" class="form-control" id="valor" aria-label="Amount (to the nearest dollar)" value="<?php echo $preco; ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="obs">Observação</label>
              <textarea name="obs" id="obs" class="form-control" rows="3"><?php echo $obj->obs_prod; ?></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">Limpar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
                  <?php
                }
              ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Cadastro -->
<div class="modal fade" id="addprod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addprodLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addprodLabel">Adicionar Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cad_prod/cad.php" method="post">
          <div class="row">
            <div class="col">
              <label for="nome_prod">Nome do Produto</label>
              <input type="text" id="nome_prod" name="nome_prod" class="form-control" placeholder="Nome do Produto" >
            </div>
            <div class="col">
              <label for="qtd">Quantidade em Estoque</label>
              <input type="number" name="qtd" id="qtd" class="form-control" placeholder="Quantidade em Estoque">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="valor">Preço</label>
              <div class="input-group mb-3">
                <span class="input-group-text">R$</span>
                <input type="text" name="preco" class="form-control" id="valor" aria-label="Amount (to the nearest dollar)">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="obs">Observação</label>
              <textarea name="obs" id="obs" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">Limpar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>