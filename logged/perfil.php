<?php
include '../db/conn.php';
//session_start();
$id = $_SESSION['logged'][0];
$select = $conn->query("SELECT * FROM users WHERE id_user = '$id'");
while ($obj = $select->fetch_object())
{
?>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $obj->user_name; ?></h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <!--<h6>Upload a different photo...</h6>-->
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Vendas </strong></span> 15</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Receita Total </strong></span>R$2.000,00</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Média </strong></span>R$100</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Clientes </strong></span> 6</li>
          </ul> 
          
        </div><!--/col-3-->
    	<div class="col-sm-9">

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nome de Usuário</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" title="enter your first name if any." value="<?php echo $obj->user_name; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" value="<?php echo $obj->email; ?>" title="enter your email.">
                          </div>
                      </div>
                      <div class="row">
                          
                          <div class="col-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                          <div class="col-6">
                            <label for="password2"><h4>Confirm Password</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
<?php
}
