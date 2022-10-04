<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle 2.0</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <div class="img"></div>
            <div class="form">
                <form action="valid.php" method="post">
                    <input type="text" name="email" required  placeholder="E-Mail">
                    <input type="password" name="pass" required placeholder="Senha">
                    <button type="submit">Entrar</button>
                </form>
            </div>
            <span class="mensagem">
                <?php
                    if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                ?>
            </span>
        </div>
    </div>
</body>
</html>