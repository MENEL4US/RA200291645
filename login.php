<?php

    if (!empty($_POST["user"])) {

        $_POST["password"] = password_hash(strtolower($_POST["password"]), PASSWORD_BCRYPT);

        // if (!empty($variables["senha"])) $variables["senha"] = 

        echo "<pre>"; 
        
        print_r($_POST); 
        
        echo "</pre>"; 
        
        
        die();

    }


    // die();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>RA200291645</title>
</head>
<body>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <h3>Entre com usuário e senha do ambiente</h3>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-12">
            <div id="login-response"></div>
        </div>
        <div class="col-4"></div>
        <div class="col-4">
            <form id="loginForm">
                <div class="mb-3">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="user" name="user">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    <script src="js/jquery-3.6.0.min.js"></script>

    <script>
        $('#loginForm').submit(function(e){
            e.preventDefault();

            $.ajax({
                method: "POST",
                url: 'login.php',
                data: $('#loginForm').serialize()
            }).done(function(data) {
                    console.log(data)
                
            }).fail(function(data){
                console.log(data)
            });
        });
    </script>
</body>
</html>