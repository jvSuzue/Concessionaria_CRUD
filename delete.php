<?php
session_start();
include_once("conexao.php");


if(isset($_POST['deletar'])):

$codigo = mysqli_escape_string($conn, $_POST['codigo']);

$sql = "DELETE FROM automoveis WHERE codigo=$codigo";

if (mysqli_query ($conn,$sql)):
	$_SESSION['msg']= "<p style='color:blue; width = '100';>Deletado com sucesso</p>";
	header("Location: index.php");
else:
	$_SESSION['msg']= "<p style='color:red;'>Erro ao deletar </p>";
	header("Location: index.php");	
endif;
endif;	
