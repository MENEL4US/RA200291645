<?php
    session_start();
    if (empty($_SESSION["USER"])) {
        header('Location: login.php');
        die();
    }
?>

<style>
    .navbar {
        background-color: #19323C;
    }
    .navbar a {
        text-decoration: none;
        color: #F3F7F0;
    }

    .navbar a:hover, .navbar a:visited, .navbar a:active {
        font-weight: bold;
        color: #F3F7F0;
    }
</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>RA200291645</title>
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
        <a class="nav-link float-right mr-4" href="#">Sair</a>
    </nav>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid" id="workarea">
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>

    <script src="js/jquery-3.6.0.min.js"></script>

    <script>
        $('.navbar a').click(function(e) {
            e.preventDefault()
            loadAjax(this.href, 'workarea')
        })

        function loadAjax(url, local) {
            $.ajax({
                url,
                context: local,
                cache: false,
                success: function (result) {
                    $(`#${local}`).html(result)
                }
            })
        }
    </script>
</body>
</html>