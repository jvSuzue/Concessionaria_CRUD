<?php
session_start();
include_once("conexao.php");


if(isset($_POST['editar'])):
	$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);
	$chassi = filter_input(INPUT_POST, 'chassi', FILTER_SANITIZE_STRING);
	$montadora = filter_input(INPUT_POST, 'montadora', FILTER_SANITIZE_STRING);
	

$codigo = mysqli_escape_string($conn, $_POST['codigo']);

$sql = "UPDATE automoveis SET nome='$name', placa='$placa', chassi='$chassi', montadora='$montadora' WHERE codigo='$codigo'";

if (mysqli_query ($conn,$sql)):
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Atualizado com sucesso</p>";
	header("Location: index.php");
else:
	$_SESSION['msg']= "<p style='color:red;'>Erro de edição </p>";
	header("Location: index.php");	
endif;
endif;	
