<?php include("conec.php");
$consultaDisc = "SELECT cd_disc, nm_disc FROM disciplina";
$conDisc      = $mysqli->query($consultaDisc) or die($mysqli->error);
$consultaAluno = "SELECT cd_aluno, nm_aluno FROM aluno";
$conAluno 	  = $mysqli->query($consultaAluno) or die($mysqli->error);
error_reporting(0);
 ?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<title>Atualizar Notas</title>	
	</head>
	<body>
	
			<?php
			$n1=$_POST['n1'];
			$n2=$_POST['n2'];
			$n3=$_POST['n3'];
			$cd_disc=$_POST['comboboxDisc'];
			$cd_aluno=$_POST['comboboxAluno'];
			
				
			if($n1 != '' & $n2 != '' & $n3 != '' & $cd_aluno != '' &$cd_disc != ''){
				$sql = "UPDATE nota
				SET n1 = '".$n1."', n2 = '".$n2."', n3 = '".$n3."'
				WHERE cd_aluno = '".$cd_aluno."' AND cd_disc = '".$cd_disc."'";
				if (mysqli_query($mysqli, $sql)) {?>
					<div class="alert alert-success" role="alert">Notas atualizadas com sucesso!</div>
					<?php
					} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
			}
			
			?>
			
		<form method = "post" action="notaupdate.php">
		
		<div class="container-fluid" id="container1">	 
				 <div class="label">
					<h2>Atualizar Notas</h2>
				</div>
		</div>
		
		<div class="container-fluid">

		</div>
		<div class="container" id="container2">	
				<div class="label" id="label2">
					<h2>Cadastre</h2>
				</div>
				<table>
				<div id="relatorio">				
				<tr><td>Aluno:</td> <td><select name="comboboxAluno" id="comboboxAluno">
										<option value=""> Selecione... </option>				
									<?php while($dadoAluno = $conAluno->fetch_array()) {?>
										<option value="<?php echo $dadoAluno['cd_aluno'] ?>"> <?php echo $dadoAluno['nm_aluno'] ?></option>
									<?php } ?>		
				</select></tr>
				</div>
	
				<div id="relatorio">
				<tr><td>Disciplina:</td> <td><select name="comboboxDisc" id="comboboxDisc">
										<option value = ""> Selecione... </option>
									<?php while($dadoDisc = $conDisc->fetch_array()) {?>
										<option value="<?php echo $dadoDisc['cd_disc'] ?>"> <?php echo $dadoDisc['nm_disc'] ?></option>
									<?php } ?>
				</select></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	N1:</td> <td> <input type="text" name="n1" id="n1" size="30"></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	N2:</td> <td> <input type="text" name="n2" id="n2" size="30"></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	N3:</td> <td> <input type="text" name="n3" id="n3" size="30"></td></tr>
				</div>
				
				</table>
				

					 <a href="inicio.php" id="voltar2" class="btn btn-secondary">Voltar</a>
					<input type="submit" id="verificar2" class="btn btn-primary" value="ATUALIZAR" >

		</div>

		</form>
	</body>
</html>