
<?php
    include_once "../Model/Student.php";
    include_once "../Model/Courses.php";
    $alunos = new Student();

    if (!empty($_POST["tipo"]) && $_POST["tipo"] == "delete") {
        if ($alunos->delete($_POST["id"])) {
            echo "Deletado com sucesso!";
        } else {
            http_response_code(400);
            echo "Erro ao tentar deletar"; 
        }
        die();
    }
    $alunos = $alunos->listar();
?>

<div class="row">
    <div class="col-12 mt-4">
        <div class="">
			<button type="button" onclick="novoAluno()" class="btn btn-sm btn-success">
				Novo
			</button>
			
		</div>
    </div>

    <div class="col-1"></div>

    <div class="col-10">
        <h3 class="text-center">Alunos</h3>
        <h4 class="retorno-msg"></h4>
        <table class="table table-sm mt-4 table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th class="text-center" scope="col">Telefone</th>
                    <th class="text-center" scope="col">Curso</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col">Cadastro</th>
                    <th class="text-center" scope="col">Última Alteração</th>
                    <th class="text-center" scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $curso = new Courses();
                    foreach($alunos as $aluno) {
                        $curso_nome = $curso->get($aluno->GetCourse());
                        $curso_nome = $curso_nome->getNameCourse();
                ?>

                    <tr>
                        <td><?=$aluno->getId()?></td>
                        <td><?=$aluno->getName()?></td>
                        <td><?=$aluno->getEmail()?></td>
                        <td class="text-center"><?=$aluno->getPhone()?></td>
                        <td class="text-center"><?=$curso_nome?></td>
                        <td class="text-center"><?=($aluno->getStatus() == 'Y' ? 'Ativo' : 'Inativo')?></td>
                        <td class="text-center"><?=$aluno->getCreated_at()->format('d/m/Y H:i:s')?></td>
                        <td class="text-center"><?=$aluno->getUpdated_at()->format('d/m/Y H:i:s')?></td>
                        <td class="text-center">
                        <i class="fas fa-eye text-info" onclick="viewAluno(<?=$aluno->getId()?>)"></i>
                        <i class="fas fa-pen text-secondary" onclick="editAluno(<?=$aluno->getId()?>)"></i>
                        <i class="fas fa-ban text-danger" onclick="deleteAluno(<?=$aluno->getId()?>)"></i>
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
    function novoAluno() {
        loadAjax('./modulos/novoaluno.php', 'workarea')
    }

    function viewAluno(id) {
        loadAjax(`./modulos/novoaluno.php?tipo=view&id=${id}`, 'workarea')
    }

    function editAluno(id) {
        loadAjax(`./modulos/novoaluno.php?tipo=edit&id=${id}`, 'workarea')
    }

    function deleteAluno(id) {
        $.ajax({
            method: "POST",
            url: './modulos/alunos.php',
            data: {tipo: 'delete', id}
        }).done(function(data) {
            loadAjax('./modulos/alunos.php', 'workarea')
        }).fail(function(data) {
            $('.retorno-msg').html(data.responseText).addClass('d-none')
        })
    }
</script>