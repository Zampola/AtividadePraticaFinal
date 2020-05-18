<?php
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "aps";
	
	$mysqli = new mysqli($host, $usuario, $senha, $bd);
	if($mysqli->connect_errno){
		echo "falha na conexão";
	}