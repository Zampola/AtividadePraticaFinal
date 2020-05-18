<?php include("conec.php");
$consultaNota = "SELECT * FROM nota WHERE cd_aluno = '".$cd_aluno=$_POST['comboboxAluno']."'";
$conNota 	  = $mysqli->query($consultaNota) or die($mysqli->error);
$consultaAluno = "SELECT nm_aluno FROM aluno WHERE cd_aluno = '".$cd_aluno=$_POST['comboboxAluno']."'";
$conAluno 	  = $mysqli->query($consultaAluno) or die($mysqli->error);
$dadoAluno = $conAluno->fetch_array()
 ?>

<html>
	<head>
	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
		<title>Relatório de Notas</title>	
	</head>
	
	<body>			
		
		<form>
		<div class="container-fluid" id="container1">	 
				 <div class="label">
					<h2>Relatório de Notas: <?php echo $dadoAluno['nm_aluno'] ?></h2>
				</div>
		</div>
		
		<div class="container-fluid" id="container3">	
		<table class="table" id="tabela">
		
		<thead>
			<tr>
			<th scope="col">Disciplina</th>
			<th scope="col">N1</th>
			<th scope="col">N2</th>
			<th scope="col">N3</th>
			<th scope="col">Média</th>
			<th scope="col">Conceito</th>
			<th scope="col">Status</th>
			</tr>
			<?php while($dadoNota = $conNota->fetch_array()) {			
							$consultaDisc = "SELECT nm_disc FROM disciplina WHERE cd_disc = '".$dadoNota['cd_disc']."'";
							$conDisc      = $mysqli->query($consultaDisc) or die($mysqli->error);
							$dadoDisc = $conDisc->fetch_array()?>
		</thead>
			<tbody>
			<tr>
			<td><?php echo $dadoDisc['nm_disc'] ?></td>
			<td><?php echo $dadoNota['n1'] ?></td>
			<td><?php echo $dadoNota['n2'] ?></td>
			<td><?php echo $dadoNota['n3'] ?></td>
			<?php $media = ($dadoNota['n1']+$dadoNota['n2']+$dadoNota['n3'])/3; ?>
			<td><?php echo $media?></td>
			<?php
					if($media <= 10 & $media >= 8.5){
						$conceito = "A";
					}
					if($media <= 8.4 & $media >= 7){
						$conceito = "B";
					}
					if($media <= 6.9 & $media >= 6){
						$conceito = "C";
					}
					if($media <= 5.9 & $media >= 4){
						$conceito = "D";
					}
					if($media <= 4){
						$conceito = "F";
					}
			?>
			<td><?php echo $conceito?></td>
				<?php if($media < 6){?>
				<td> <?php echo "Reprovado por nota"; ?></td>
				<?php } ?>
				<?php if($media >= 6){?>
				<td> <?php echo "Aprovado"; ?></td>
				<?php } ?>	
			</tr>
			<?php } ?>
		</tbody>		
		</table>
					<a href="inicio.php" id="voltar2" class="btn btn-secondary">Voltar</a>
		</div>
		</form>
	</body>
</html>