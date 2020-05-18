<?php include("conec.php");
error_reporting(0);
 ?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<title>Cadastrar Disciplina</title>	
	</head>
	<body>
	
			<?php
			$disciplina=$_POST['disciplina'];
			if($disciplina!= ''){
				$sql = "INSERT INTO disciplina (nm_disc) VALUES ('".$disciplina."')";
				if (mysqli_query($mysqli, $sql)) { ?>
					<div class="alert alert-success" role="alert">Disciplina cadastrada com sucesso!</div>
					<?php
					} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
			}
			?>
			
		<form method = "post" action="disciplina.php">	
		
		<div class="container-fluid" id="container1">	 
				 <div class="label">
					<h2> Cadastre uma Disciplina</h2>
				</div>
		</div>
		
		<div class="container-fluid">
			
		</div>
		
		
		
		<div class="container" id="container2">	
				<div class="label" id="label2">
					<h2> Disciplina</h2>
				</div>
				<div id="relatorio">				
					<input type="text" name="disciplina" id="disciplina" size="30"></td></tr>
				</div>
				
				<div >
					<a href="inicio.php" id="voltar" class="btn btn-secondary">Voltar</a>
					<input type="submit" id="verificar" class="btn btn-primary" value="SALVAR" >
				</div>
		</div>
		
		</form>
	</body>
</html>