<?php
session_start();
include_once("conexao.php");

$mont = filter_input(INPUT_POST, 'mont', FILTER_SANITIZE_STRING);




$result = "INSERT INTO montadoras(mont) VALUES ('$mont')";
$result_user = mysqli_query($conn, $result);

if (mysqli_insert_id ($conn)){
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Montadora adicionada ao banco de dados</p>";
	header("Location: index.php");
}else{ 
	$_SESSION['msg']= "<p style='color:red;'>Erro de cadastro de montadora </p>";
	header("Location: index.php");	
}	