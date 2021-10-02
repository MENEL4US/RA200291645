<?php

    include_once "../Model/Student.php";
    include_once "../Model/Courses.php";

    if (!empty($_GET["tipo"])) {
        $aluno = new Student();
        $aluno = $aluno->get($_GET["id"]);
    }

    if (!empty($_POST["tipo"])) {

        switch ($_POST["tipo"]) {
            case 'novo':
                
                if (empty($_POST["name"])) {
                    http_response_code(400);
                    echo "Informe o nome do aluno!"; 
                    die();
                }

                if (empty($_POST["email"])) {
                    http_response_code(400);
                    echo "Informe o email do aluno!"; 
                    die();
                }

                if (empty($_POST["password"])) {
                    http_response_code(400);
                    echo "Informe a senha do aluno!"; 
                    die();
                }

                if (empty($_POST["phone"])) {
                    http_response_code(400);
                    echo "Informe o telefone do aluno!"; 
                    die();
                }

                if (empty($_POST["idCourse"])) {
                    http_response_code(400);
                    echo "Informe o curso do aluno!"; 
                    die();
                }

                $aluno = new Student();
                $aluno->setName($_POST["name"]);
                $aluno->setEmail($_POST["email"]);
                $aluno->setPassword(password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 11]));
                $aluno->setPhone($_POST["phone"]);
                $aluno->setCourse($_POST["idCourse"]);

                if ($aluno->inserir()) {
                    echo "Inserido com sucesso!";
                    die();
                } else {
                    http_response_code(400);
                    echo "Erro ao tentar inserir"; 
                    die();
                }
                break;

            case 'edit':
            
                if (empty($_POST["name"])) {
                    http_response_code(400);
                    echo "Informe o nome do aluno!"; 
                    die();
                }

                if (empty($_POST["email"])) {
                    http_response_code(400);
                    echo "Informe o email do aluno!"; 
                    die();
                }

                if (empty($_POST["password"])) {
                    http_response_code(400);
                    echo "Informe a senha do aluno!"; 
                    die();
                }

                if (empty($_POST["phone"])) {
                    http_response_code(400);
                    echo "Informe o telefone do aluno!"; 
                    die();
                }

                if (empty($_POST["idCourse"])) {
                    http_response_code(400);
                    echo "Informe o curso do aluno!"; 
                    die();
                }

                if (empty($_POST["status"])) {
                    http_response_code(400);
                    echo "Informe o status do aluno!"; 
                    die();
                }

                $aluno = new Student();
                $aluno->setName($_POST["name"]);
                $aluno->setEmail($_POST["email"]);
                $aluno->setPassword(password_hash($_POST["password"], PASSWORD_BCRYPT, ['cost' => 11]));
                $aluno->setPhone($_POST["phone"]);
                $aluno->setCourse($_POST["idCourse"]);
                $aluno->setStatus($_POST["status"]);
                $aluno->setId($_POST["id"]);

                if ($aluno->update()) {
                    echo "Alterado com sucesso!";
                    die();
                } else {
                    http_response_code(400);
                    echo "Erro ao tentar atualizar"; 
                    die();
                }
                break;
        }
    }
?>

<style>
    #formAluno .form-group {
        margin-top: 10px;
    }
</style>
<div class="row">
    <div class="col-12 titulo text-center mt-4">
        <h3><?=(empty($_GET["tipo"]) ? 'Novo Aluno' : 'Aluno')?></h3>
    </div>
    <div class="col-3"></div>
    <div class="col-6 mt-3">
        <form id="formAluno">
            
            <input type="hidden" name="tipo" id="tipo" value="<?=(!empty($_GET["tipo"]) ? $_GET["tipo"] : 'novo');?>">
            
            <div class="row">
                <div class="form-group col-12 msg-retorno">
                </div>

                <div class="form-group col-2 view-row">
                    <label for="id">ID</label>
                    <input type="text" readonly value="<?=(!empty($aluno) ? $aluno->getId() : '')?>" class="form-control" id="id" name="id">
                </div>

                <div class="form-group col-4 view-row">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Y" <?=(!empty($aluno) ? ($aluno->getStatus() == "Y" ? "selected" : "") : '')?>>Ativo</option>
                        <option value="N" <?=(!empty($aluno) ? ($aluno->getStatus() == "N" ? "selected" : "") : '')?>>Inativo</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="name">Nome</label>
                    <input type="text" value="<?=(!empty($aluno) ? $aluno->getName() : '')?>" class="form-control" id="name" name="name" placeholder="Nome">
                </div>

                <div class="form-group col-12">
                    <label for="email">E-mail</label>
                    <input type="email" value="<?=(!empty($aluno) ? $aluno->getEmail() : '')?>" class="form-control" id="email" name="email" placeholder="email@email.com">
                </div>

                <div class="form-group col-6">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
                </div>

                <div class="form-group col-6">
                    <label for="phone">Telefone</label>
                    <input type="text" value="<?=(!empty($aluno) ? $aluno->getPhone() : '')?>" class="form-control" id="phone" name="phone" placeholder="Telefone">
                </div>

                <?php
                    $cursos = new Courses();
                    $cursos = $cursos->listar();
                ?>

                <div class="form-group col-12">
                    <label for="idCourse">Curso</label>
                    <select name="idCourse" id="idCourse" class="form-control">

                        <?php 
                            foreach($cursos as $curso) {
                                if ($curso->getStatus() == "Y") {
                                    ?>
                                        <option value="<?=$curso->getId()?>" <?=(!empty($aluno) ? ($aluno->getCourse() == $curso->getId() ? "selected" : "") : '')?>><?=$curso->getNameCourse()?></option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group col-6 view-row">
                    <label for="created_at">Data de Cadastro</label>
                    <input type="text" readonly value="<?=(!empty($aluno) ? $aluno->getCreated_at()->format('d/m/Y H:i:s') : '')?>" class="form-control" id="created_at" name="created_at">
                </div>

                <div class="form-group col-6 view-row">
                    <label for="updated_at">Última Alteração</label>
                    <input type="text" readonly value="<?=(!empty($aluno) ? $aluno->getUpdated_at()->format('d/m/Y H:i:s') : '')?>" class="form-control" id="updated_at" name="updated_at">
                </div>

                <div class="form-group col-12 text-center">
                    <button type="button" class="btn btn-secondary" onclick="loadAjax('./modulos/cursos.php', 'workarea')">
                        Voltar
                    </button>

                    <button type="submit" class="btn btn-success btn-salvar">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        <?php
            if (!empty($_GET["tipo"])) {
                if ($_GET["tipo"] == "view") {
                    ?> 
                        $('.btn-salvar').addClass('d-none')
                    <?php
                }
            } else {
                ?>
                    $('.view-row').addClass('d-none')
                <?php
            }
        ?>
    })

    $('#formAluno').submit(function(e) {
        e.preventDefault()

        $.ajax({
            method: "POST",
            url: './modulos/novoaluno.php',
            data: $('#formAluno').serialize()
        }).done(function(data) {
            loadAjax('./modulos/alunos.php', 'workarea')
        }).fail(function(data) {
            $('#formAluno .msg-retorno').html(`<h3 class="text-danger text-center">${data.responseText}</h3>`)
        })
    })
</script>