
<?php
    include_once "../Model/Courses.php";
    $cursos = new Courses();
    $cursos = $cursos->listar();
    // echo "<pre>";
    // print_r($cursos); die();
?>

<style>
    .table i:hover {
        cursor: pointer;
    }
</style>



<div class="row">
    <div class="col-12 mt-4">
        <div class="">
			<button type="button" onclick="novoCurso()" class="btn btn-sm btn-success">
				Novo
			</button>
			
		</div>
    </div>

    <div class="col-2"></div>

    <div class="col-8">
        <h3 class="text-center">Cursos</h3>
        <table class="table table-sm mt-4 table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th class="text-center" scope="col">Início</th>
                    <th class="text-center" scope="col">Encerramento</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Cadastro</th>
                    <th class="text-center" scope="col">Última Alteração</th>
                    <th class="text-center" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    foreach($cursos as $curso) {
                ?>

                    <tr>
                        <td><?=$curso->getId()?></td>
                        <td><?=$curso->getNameCourse()?></td>
                        <td><?=$curso->getDescription()?></td>
                        <td class="text-center"><?=$curso->getDateStart()->format('d/m/Y')?></td>
                        <td class="text-center"><?=$curso->getDateFinish()->format('d/m/Y')?></td>
                        <td class="text-center"><?=($curso->getStatus() == 'Y' ? 'Ativo' : 'Inativo')?></td>
                        <td class="text-center"><?=$curso->getCreated_at()->format('d/m/Y H:i:s')?></td>
                        <td class="text-center"><?=$curso->getUpdated_at()->format('d/m/Y H:i:s')?></td>
                        <td class="text-center">
                        <i class="fas fa-eye text-info" onclick="viewCurso(<?=$curso->getId()?>)"></i>
                        <i class="fas fa-pen text-secondary" onclick="editCurso(<?=$curso->getId()?>)"></i>
                        <i class="fas fa-ban text-danger" onclick="deleteCurso(<?=$curso->getId()?>)"></i>
                        </td>
                    </tr>

                <?php
                    }
                ?>
                
            </tbody>
        </table>
    </div>
</div>

<script>
    function novoCurso() {
        loadAjax('./modulos/novocurso.php', 'workarea')
    }

    function viewCurso(id) {
        loadAjax(`./modulos/novocurso.php?tipo=view&id=${id}`, 'workarea')
    }

    function editCurso(id) {
        loadAjax(`./modulos/novocurso.php?tipo=edit&id=${id}`, 'workarea')
    }

    function deleteCurso(id) {
        loadAjax('./modulos/novocurso.php', 'workarea')
    }
</script>