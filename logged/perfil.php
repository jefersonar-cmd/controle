<?php
include '../db/conn.php';
//session_start();
$id = $_SESSION['logged'][0];
$select = $conn->query("SELECT * FROM users WHERE id_user = '$id'") or die($conn->error());
$user = $select->fetch_assoc();
$row = $select->num_rows;
if ($row > 0) {
  ?>
<div class="container">
  <div class="mb-3 row">
    <div class="col">
      <h1><?php echo $user['user_name'];?></h1>
    </div>
  </div>
  <div class="mb-3 row">
    <div class="col-sm-4">
      <div class="mb-3 row">
        <div class="col-6">
          <?php
            if (isset($user['user_image'])){
              ?>
                <img src="cad_perfil/images/<?php echo $user['user_image'];?>" class="img-thumbnail" id="preview">
              <?php
            }else{
              ?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-thumbnail" id="preview" alt="avatar" />
              <?php
            }
          ?>
        </div>
      </div>
      <div class="mb-3 row">
        <div class="col-6">
          <ul class="list-group">
            <li class="list-group-item text-muted">
              Resumo
              <i class="fa fa-dashboard fa-1x"></i>
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Vendas: </strong>
              </span><br>
              10
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Receita: </strong>
              </span><br>
              R$8500,00
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Media (Mês): </strong>
              </span><br>
              R$354,16
            </li>
            <li class="list-group-item text-right">
              <span class="pull-left">
                <strong>Clientes (Mês): </strong>
              </span><br>
              4
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="row">
        <form action="cad_perfil/edit.php" method="post" class="form-control" enctype="multipart/form-data">
          <div class="mb-3 row">
            <div class="col">
              <label for="userName">User Name</label>
              <input type="text" class="form-control" name="user" id="userName" value="<?php echo $user['user_name'];?>">
            </div>
            <div class="col">
              <label for="userName">E-Mail</label>
              <input type="text" class="form-control" name="email" id="userName" value="<?php echo $user['email'];?>">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label for="img">Profile Photo (jpg)</label>
              <input type="file" class="form-control" name="userImg" id="img" onchange="getImagePreview(event)">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label for="pass1">Password <span style="color: red;">*</span> </label>
              <input type="password" name="pass1" id="pass1" class="form-control"  required>
            </div>
            <div class="col">
              <label for="pass2">Confirm Password</label>
              <input type="password" name="pass2" id="pass2" class="form-control">
            </div>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <button class="btn btn-primary material-icons" type="submit">save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <?php
}
?>
<script>
  function getImagePreview(event) {
    var image = URL.createObjectURL(event.target.files[0]);
    var imageDiv = document.getElementById('preview');
    //var newImage = document.createElement('img');
    imageDiv.src = image;
    //newImage.classList.add('img-thumbnail');
    //imageDiv.appendChild(newImage);
  }
</script>