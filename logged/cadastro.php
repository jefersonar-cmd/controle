<?php
include '../db/conn.php';
?>
<div class="container-fluid">
    <div class="col">
        <table class="table table-dark table-striped table-hover">
            <thead>
                <th>
                    <th colspan="4" class="justify-content-center">Lista de Usuários</th>
                    <th><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#add">add_circle</a></th>
                </th>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Nível</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $table = $conn->query('SELECT * FROM users');
                    if($table->num_rows > 0){
                        $id = $_SESSION['logged'][0];
                        while($obj = $table->fetch_object()){
                            if($id != $obj->id_user){
                                ?>
                                    <tr>
                                        <th scope="col"><?php echo $obj->id_user; ?></th>
                                        <th><?php echo $obj->user_name; ?></th>
                                        <th><?php echo $obj->email; ?></th>
                                        <th>
                                            <?php 
                                                switch ($obj->acess){
                                                    case 1:
                                                        echo 'Administrador';
                                                        break;
                                                    case 2:
                                                        echo 'Logista';
                                                        break;
                                                    case 9:
                                                        echo 'Desativado';
                                                        break;
                                                    default:
                                                        echo '';
                                                        break;
                                                }
                                            ?>
                                        </th>
                                        <th><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#edit<?php echo $obj->id_user; ?>">edit</a></th>
                                        <th><a href="" class="material-icons" data-bs-toggle="modal" data-bs-target="#delete<?php echo $obj->id_user; ?>">delete</a></th>
                                    </tr>
<!-- Modal Editar Usuário -->
<div class="modal fade" id="edit<?php echo $obj->id_user; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Editar usuário: <?php echo $obj->user_name; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="cad_user/edit.php" method="post">
                <input type="text" name="id" value="<?php echo $obj->id_user; ?>" hidden>
                <div class="mb-3 row">
                    <label for="userName" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <input type="text" name="user" id="userName" class="form-control" value="<?php echo $obj->user_name; ?>" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="staticEmail" value="<?php echo $obj->email; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="selectAcess" class="col-sm-2 col-form-label">Acesso</label>
                    <div class="col-sm-10">
                        <select name="acess" class="form-select" aria-label="datalistOptions">
                            <?php
                            switch ($obj->acess) {
                                case 1:
                                    ?>
                                    <option>Seleciona</option>
                                    <option value="1" selected>ADM</option>
                                    <option value="2">Logista</option>
                                    <option value="9">Desativado</option>
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <option>Seleciona</option>
                                    <option value="1">ADM</option>
                                    <option value="2" selected>Logista</option>
                                    <option value="9">Desativado</option>
                                    <?php
                                    break;
                                case 9:
                                    ?>
                                    <option>Seleciona</option>
                                    <option value="1">ADM</option>
                                    <option value="2">Logista</option>
                                    <option value="9" selected>Desativado</option>
                                    <?php
                                    break;
                                default:
                                    ?>
                                    <option selected>Seleciona</option>
                                    <option value="1">ADM</option>
                                    <option value="2">Logista</option>
                                    <option value="9">Desativado</option>
                                    <?php
                                    break;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary">Subimit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- Modal Excluir Usuário -->
<div class="modal fade" id="delete<?php echo $obj->id_user; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Usuário</h5>
      </div>
      <div class="modal-body">
        <h1>Deseja realmente excluir esse pobre coitado chamado <?php echo $obj->user_name; ?>?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success material-icons" data-bs-dismiss="modal">close</button>
        <a href="cad_user/delete.php?id=<?php echo $obj->id_user; ?>" class="btn btn-danger material-icons">done</a>
      </div>
    </div>
  </div>
</div>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- modal add form -->
<div class="modal fade" id="add" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Cadastro de Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <form action="cad_user/cad.php" method="post">
                <div class="mb-3 row">
                    <label for="userName" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <input type="text" name="user" id="userName" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control" id="staticEmail" placeholder="email@controle.com">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="pass" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="selectAcess" class="col-sm-2 col-form-label">Acesso</label>
                    <div class="col-sm-10">
                        <select name="acess" class="form-select" aria-label="datalistOptions">
                            <option selected>Seleciona</option>
                            <option value="1">ADM</option>
                            <option value="2">Logista</option>
                            <option value="9">Desativado</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <button type="submit" class="btn btn-primary">Subimit</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>