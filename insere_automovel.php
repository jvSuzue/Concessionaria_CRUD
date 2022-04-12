<?php
session_start();
include_once("conexao.php");

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_STRING);
$chassi = filter_input(INPUT_POST, 'chassi', FILTER_SANITIZE_STRING);
$montadora = filter_input(INPUT_POST, 'montadora', FILTER_SANITIZE_STRING);


$resulting = "INSERT INTO automoveis(nome, placa, chassi, montadora) VALUES ('$name','$placa','$chassi','$montadora')";
$result_user = mysqli_query($conn, $resulting);

if (mysqli_insert_id ($conn)){
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Automóvel cadastrado com sucesso</p>";
	header("Location: index.php");
}else{ 
	$_SESSION['msg']= "<p style='color:red;'>Erro de cadastro </p>";
	header("Location: index.php");	
}	

