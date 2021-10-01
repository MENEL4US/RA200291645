<?php
    define("USER", "Luiz");
    define("PASSWORD", '$2y$10$L3up6IPrANO7XqGtj3vexONbSq/G4FsLZE2d0ZzKMbl0hgMZEycJC');

    if (!empty($_POST["user"])) {

        if (ucfirst($_POST["user"]) !== USER) {
            http_response_code(401);
            echo "Usuário incorreto!"; 
            die();
        }

        if (!password_verify(strtolower($_POST["password"]), PASSWORD)) {
            http_response_code(401);
            echo "Senha incorreta!"; 
            die();
        }

        session_start();
        $_SESSION["USER"] = $_POST["user"];

        echo "Sucesso!"; 
        die();
    }
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
        <div class="col-12 text-center">
            <div id="loginResponse">
            </div>
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
        $('#loginForm').submit(function(e) {
            e.preventDefault()

            $.ajax({
                method: "POST",
                url: 'login.php',
                data: $('#loginForm').serialize()
            }).done(function(data) {
                $('#loginResponse').html(`<h4 class="text-info">${data}</h4>`)
                setTimeout(() => {
                    window.location = "index.php";
                }, 1000);
            }).fail(function(data) {
                $('#loginResponse').html(`<h4 class="text-danger">${data.responseText}</h4>`)
            })
        })
    </script>
</body>
</html>