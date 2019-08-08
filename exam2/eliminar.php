<?php

$eli = Eli($_POST["id"]);

function Eli($id){
	include 'conexion.php';
	$consulta = "DELETE FROM `jaja` WHERE `jaja`.`id` = '$id'";
	$res = mysqli_query($conexion, $consulta);

	if ($res) {
		header('location:index.php');
	}
}

?>