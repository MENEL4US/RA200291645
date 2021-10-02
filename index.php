<?php
    session_start();
    if (empty($_SESSION["USER"])) {
        header('Location: login.php');
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
        <link rel="stylesheet" href="css/styles.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./modulos/alunos.php">Alunos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./modulos/cursos.php">Cursos</a>
                    </li>
                </ul>
            </div>
            <a class="nav-link float-right mr-4" href="#" onclick="sair()">Sair</a>
        </nav>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid" id="workarea">

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/scripts.js"></script>

        <script>
            $('.navbar a').click(function(e) {
                e.preventDefault()
                loadAjax(this.href, 'workarea')
            })
        </script>
    </body>
</html>