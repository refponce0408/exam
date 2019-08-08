<?php 

$alta = Alta($_POST["nombre"], $_POST["apellidos"], $_POST["esc"]);

function Alta($nombre, $apellidos, $esc){
	include 'conexion.php';
	$consulta = "INSERT INTO jaja (id, nombre, apellidos, esc_proc) VALUES (NULL, '$nombre', '$apellidos', '$esc')";
	
	$res = mysqli_query($conexion, $consulta);

	if ($res) {
		header('location:index.php');
	}
}

?>

