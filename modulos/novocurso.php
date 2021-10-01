<?php

?>

<div class="row">
    <div class="col-12 titulo text-center mt-4">
        <h3>Novo Curso</h3>
    </div>
    <div class="col-3"></div>
    <div class="col-6 mt-3">
        <form id="formCurso">
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="nameCourse">Nome do Curso</label>
                    <input type="text" class="form-control" id="nameCourse" name="nameCourse" placeholder="Nome do Curso">
                </div>

                <div class="form-group col-12">
                    <label for="description">Descrição</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição">
                </div>

                <div class="form-group col-6">
                    <label for="dateStart">Data de Início</label>
                    <input type="date" class="form-control" id="dateStart" name="dateStart" placeholder="Data de Início">
                </div>

                <div class="form-group col-6">
                    <label for="dateFinish">Data de Encerramento</label>
                    <input type="date" class="form-control" id="dateFinish" name="dateFinish" placeholder="Data de Encerramento">
                </div>
            </div>
        </form>
    </div>
</div>