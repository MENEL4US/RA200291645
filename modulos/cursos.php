





<div class="row">
    <div class="col-12 mt-4">
        <div class="">
			<button type="button" onclick="novoCurso()" class="btn btn-sm btn-success">
				Novo
			</button>
			
		</div>
    </div>

    <div class="col-3"></div>

    <div class="col-6">
        <table class="table table-sm mt-4">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function novoCurso() {
        loadAjax('./modulos/novocurso.php', 'workarea')
    }
</script>