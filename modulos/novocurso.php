<?php

    include_once "../Model/Courses.php";

    if (!empty($_GET["tipo"])) {
        $curso = new Courses();
        $curso = $curso->get($_GET["id"]);
    }

    if (!empty($_POST["tipo"])) {

        switch ($_POST["tipo"]) {
            case 'novo':
                
                if (empty($_POST["nameCourse"])) {
                    http_response_code(400);
                    echo "Informe o nome do curso!"; 
                    die();
                }

                if (empty($_POST["description"])) {
                    http_response_code(400);
                    echo "Informe a descrição do curso!"; 
                    die();
                }

                if (empty($_POST["dateStart"])) {
                    http_response_code(400);
                    echo "Informe a data de início do curso!"; 
                    die();
                }

                if (empty($_POST["dateFinish"])) {
                    http_response_code(400);
                    echo "Informe a data de encerramento do curso!"; 
                    die();
                }

                $curso = new Courses();
                $curso->setNameCourse($_POST["nameCourse"]);
                $curso->setDescription($_POST["description"]);
                $curso->setDateStart($_POST["dateStart"]);
                $curso->setDateFinish($_POST["dateFinish"]);
                
                if ($curso->inserir()) {
                    echo "Inserido com sucesso!";
                    die();
                } else {
                    http_response_code(400);
                    echo "Erro ao tentar inserir"; 
                    die();
                }
                break;

            case 'edit':
            
                if (empty($_POST["nameCourse"])) {
                    http_response_code(400);
                    echo "Informe o nome do curso!"; 
                    die();
                }

                if (empty($_POST["description"])) {
                    http_response_code(400);
                    echo "Informe a descrição do curso!"; 
                    die();
                }

                if (empty($_POST["dateStart"])) {
                    http_response_code(400);
                    echo "Informe a data de início do curso!"; 
                    die();
                }

                if (empty($_POST["dateFinish"])) {
                    http_response_code(400);
                    echo "Informe a data de encerramento do curso!"; 
                    die();
                }

                if (empty($_POST["status"])) {
                    http_response_code(400);
                    echo "Informe o status do curso!"; 
                    die();
                }

                $curso = new Courses();
                $curso->setNameCourse($_POST["nameCourse"]);
                $curso->setDescription($_POST["description"]);
                $curso->setDateStart($_POST["dateStart"]);
                $curso->setDateFinish($_POST["dateFinish"]);
                $curso->setStatus($_POST["status"]);
                $curso->setId($_POST["id"]);

                if ($curso->update()) {
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
    #formCurso .form-group {
        margin-top: 10px;
    }
</style>
<div class="row">
    <div class="col-12 titulo text-center mt-4">
        <h3><?=(empty($_GET["tipo"]) ? 'Novo Curso' : 'Curso')?></h3>
    </div>
    <div class="col-3"></div>
    <div class="col-6 mt-3">
        <form id="formCurso">
            
            <input type="hidden" name="tipo" id="tipo" value="<?=(!empty($_GET["tipo"]) ? $_GET["tipo"] : 'novo');?>">
            
            <div class="row">
                <div class="form-group col-12 msg-retorno">
                </div>

                <div class="form-group col-2 view-row">
                    <label for="id">ID</label>
                    <input type="text" readonly value="<?=(!empty($curso) ? $curso->getId() : '')?>" class="form-control" id="id" name="id">
                </div>

                <div class="form-group col-4 view-row">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="Y" <?=(!empty($curso) ? ($curso->getStatus() == "Y" ? "selected" : "") : '')?>>Ativo</option>
                        <option value="N" <?=(!empty($curso) ? ($curso->getStatus() == "N" ? "selected" : "") : '')?>>Inativo</option>
                    </select>
                </div>

                <div class="form-group col-12">
                    <label for="nameCourse">Nome do Curso</label>
                    <input type="text" value="<?=(!empty($curso) ? $curso->getNameCourse() : '')?>" class="form-control" id="nameCourse" name="nameCourse" placeholder="Nome do Curso">
                </div>

                <div class="form-group col-12">
                    <label for="description">Descrição</label>
                    <input type="text" value="<?=(!empty($curso) ? $curso->getDescription() : '')?>" class="form-control" id="description" name="description" placeholder="Descrição">
                </div>

                <div class="form-group col-6">
                    <label for="dateStart">Data de Início</label>
                    <input type="date" value="<?=(!empty($curso) ? $curso->getDateStart() : '')?>" class="form-control" id="dateStart" name="dateStart" placeholder="Data de Início">
                </div>

                <div class="form-group col-6">
                    <label for="dateFinish">Data de Encerramento</label>
                    <input type="date" value="<?=(!empty($curso) ? $curso->getDateFinish() : '')?>" class="form-control" id="dateFinish" name="dateFinish" placeholder="Data de Encerramento">
                </div>

                <div class="form-group col-6 view-row">
                    <label for="created_at">Data de Cadastro</label>
                    <input type="text" readonly value="<?=(!empty($curso) ? $curso->getCreated_at()->format('d/m/Y H:i:s') : '')?>" class="form-control" id="created_at" name="created_at">
                </div>

                <div class="form-group col-6 view-row">
                    <label for="updated_at">Última Alteração</label>
                    <input type="text" readonly value="<?=(!empty($curso) ? $curso->getUpdated_at()->format('d/m/Y H:i:s') : '')?>" class="form-control" id="updated_at" name="updated_at">
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

    $('#formCurso').submit(function(e) {
        e.preventDefault()

        $.ajax({
            method: "POST",
            url: './modulos/novocurso.php',
            data: $('#formCurso').serialize()
        }).done(function(data) {
            loadAjax('./modulos/cursos.php', 'workarea')
        }).fail(function(data) {
            $('#formCurso .msg-retorno').html(`<h3 class="text-danger text-center">${data.responseText}</h3>`)
        })
    })
</script>