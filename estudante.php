<?php include("conec.php");
$consultaDisc = "SELECT cd_disc, nm_disc FROM disciplina";
$conDisc      = $mysqli->query($consultaDisc) or die($mysqli->error);
 ?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/estilo.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

		<title>Cadastrar Estudante</title>	
	</head>
	<body>
	
			<?php
			$nome=@$_POST['nomeAluno'];
			$cep=@$_POST['cepAluno'];
			$numero=@$_POST['numAluno'];
			$email=@$_POST['emailAluno'];
			$telefone=@$_POST['telefoneAluno'];
			$coddisc=@$_POST['comboboxDisc'];
			
			$rua 	= '';
			$bairro	= '';
			$cidade = '';
			$uf		= '';
			
			if($cep != ''){
				$arq = file_get_contents('https://viacep.com.br/ws/'.$cep.'/json/');
				$json = json_decode($arq);
			
				$rua = $json->logradouro;
				$bairro		= $json->bairro;
				$cidade = $json->localidade;
				$uf			= $json->uf;
			}
			if($nome != '' & $cep != '' & $numero != '' & $email != '' & $telefone != '' & $coddisc != ''){
				$sql = "INSERT INTO aluno (nm_aluno, cep_aluno, rua_aluno, numero_aluno,
				bairro_aluno, cidade_aluno, estado_aluno, email_aluno, tel_aluno, cd_disc) 
				VALUES ('".$nome."','".$cep."','".$rua."','".$numero."','".$bairro."','".$cidade."','".$uf."','".$email."','".$telefone."', '".$coddisc."')";				
				if (mysqli_query($mysqli, $sql)) {
					echo "Aluno cadastrado com sucesso";
					} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
					}
			}
			
			?>
			
		<form method = "post" action="estudante.php">
		
		<div class="container-fluid" id="container1">	 
				 <div class="label">
					<h2>Cadastre um Aluno</h2>
				</div>
		</div>
		<div class="container-fluid">

		</div>
		<div class="container" id="container2">	
				<div class="label" id="label2">
					<h2>Informações</h2>
				</div>
				<table>
				<div id="relatorio">				
				<tr><td>Nome:</td> <td><input type="text" name="nomeAluno" id="nomeAluno" size="30"></td></tr>
				</div>
	
				<div id="relatorio">
				<tr><td>Cep:</td> <td><input type="text" name="cepAluno" id="cepAluno" size="30"></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	Numero:</td> <td> <input type="text" name="numAluno" id="numAluno" size="30"></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	Email:</td> <td> <input type="text" name="emailAluno" id="emailAluno" size="30"></td></tr>
				</div>
				
				<div id="relatorio">
				<tr><td>	Telefone:</td> <td> <input type="text" name="telefoneAluno" id="telefoneAluno" size="30"></td></tr>
				</div>
				</table>
				<div id="relatorio">
					Disciplina:
					<select name="comboboxDisc" id="comboboxDisc">
						<option value = ""> Selecione... </option>
			
						<?php while($dadoDisc = $conDisc->fetch_array()) {?>
						<option value="<?php echo $dadoDisc['cd_disc'] ?>"> <?php echo $dadoDisc['nm_disc'] ?></option>
						<?php } ?>		
					</select>
				</div>
				

					 <a href="inicio.php" id="voltar2" class="btn btn-secondary">Voltar</a>
					<input type="submit" id="verificar2" class="btn btn-primary" value="SALVAR" >

		</div>

		</form>
	</body>
</html>