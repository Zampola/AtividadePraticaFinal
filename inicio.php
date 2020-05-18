<?php include("conec.php");
$consultaNota = "SELECT * FROM nota";
$conNota 	  = $mysqli->query($consultaNota) or die($mysqli->error);
$consultaAluno = "SELECT cd_aluno, nm_aluno FROM aluno";
$conAluno 	  = $mysqli->query($consultaAluno) or die($mysqli->error);
 ?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
		
		<title>Sistema de Gerenciamento de Aluno</title>
		
	</head>
	
	<body>
		<form method = "post" action="relatorio.php">
		
			 		
		<div class="container-fluid" id="container1">	 
				 <div class="label">
					<h2> Atividade Pratica Final</h2>
				</div>
		</div>
		
		<div class="container-fluid">
			<div class="row">
				
				<div class="col-sm">
					<a href="disciplina.php" class="btn btn-primary">Cadastrar Disciplina</a>
				</div>
				<div class="col-sm">
					<a href="estudante.php" class="btn btn-primary">Cadastrar Estudante</a>
				</div>
				<div class="col-sm">
					<a href="nota.php" class="btn btn-primary">Cadastrar Notas</a>
				</div>
				<div class="col-sm">
					<a href="notaupdate.php" class="btn btn-primary">Atualizar Notas</a>
				</div>
			</div>
		</div>
		
		<div class="container" id="container2">	 
				 <div class="label" id="label2">
					<h2> Relatório de Notas</h2>
				</div>
				<div id="relatorio">
					<label>Aluno:</label>
				
					<select name="comboboxAluno" id="comboboxAluno">
					<option value=""> Selecione... </option>
					<?php while($dadoAluno = $conAluno->fetch_array()) {?>
						<option value="<?php echo $dadoAluno['cd_aluno'] ?>"> <?php echo $dadoAluno['nm_aluno'] ?></option>
					<?php } ?>		
					</select>
				</div>
				<div id="verificar">
					<input type="submit" class="btn btn-primary" value="VERIFICAR" >
				</div>
		</div>
		</form>
	</body>
</html>