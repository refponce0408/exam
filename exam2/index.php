<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<center>
<h5>ALTA</h5>
<form action="alta.php" method="POST">
	<input type="hidden" name="id">
	<input type="text" name="nombre" required placeholder="Nombre">
	<input type="text" name="apellidos" required placeholder="Apellidos">
	<input type="text" name="esc" required placeholder="Esc. de procedencia">

	<input type="submit" name="Enviar">
</form>
</center>
<hr>
<center>
<h5>MOSTRAR</h5>
<form action="index.php" method="POST">
	<input type="text" name="buscar" required placeholder="Buscar">
	<input type="submit" value="Buscar">
</form>
<?php
	error_reporting(0);
	include 'conexion.php';
	$consulta = "SELECT * FROM jaja";
	$res = mysqli_query($conexion, $consulta);
?>
<?php if ($res && !$_POST['buscar']) { ?>
	<table width="1100">
			<thead>
				<th style="width: 10%; text-align: center;">ID</th>
				<th style="width: 20%; text-align: center;">NOMBRE</th>
				<th style="width: 20%; text-align: center;">APELLIDOS</th>
				<th style="width: 50%; text-align: center;">ESC. DE PROC</th>
			</thead>
	</table>
<?php } ?>
<?php
	if ($res && !$_POST['buscar']) {
		while ($filas = mysqli_fetch_assoc($res)) { ?>
		<table width="1100">
	<td style="width: 10%; text-align: center;"><?php echo $filas['id']; ?></td>
	<td style="width: 20%; text-align: center;"><?php echo $filas['nombre']; ?></td>
	<td style="width: 20%; text-align: center;"><?php echo $filas['apellidos']; ?></td>
	<td style="width: 50%; text-align: center;"><?php echo $filas['esc_proc']; ?></td>
		</table>
<?php
		}
	}else{
	$nom = $_POST['buscar'];
	include 'conexion.php';
	$consulta = "SELECT * FROM jaja WHERE nombre LIKE '%$nom%' OR apellidos LIKE '%$nom%' OR esc_proc LIKE '%$nom%' ";
	$res = mysqli_query($conexion, $consulta);
?>
	<table>
			<thead>
				<th>ID</th>
				<th>NOMBRE</th>
				<th>APELLIDOS</th>
				<th>ESC. DE PROC</th>
			</thead>
	</table>
<?php 
	if ($res) {
		while ($filas = mysqli_fetch_assoc($res)) { ?>
			<table width="1100">
				<td><?php echo $filas['id']; ?></td>
				<td><?php echo $filas['nombre']; ?></td>
				<td><?php echo $filas['apellidos']; ?></td>
				<td ><?php echo $filas['esc_proc']; ?></td>
			</table>
<?php
		}
	}
}
?>
<hr>
<h5>MODIFICAR</h5>
<form action="mod.php" method="POST">
	<input type="text" name="id" required placeholder="ID a modificar">
	<input type="text" name="nombre" required placeholder="Nombre">
	<input type="text" name="apellidos" required placeholder="Apellidos">
	<input type="text" name="esc" required placeholder="Esc. de procedencia">
	<input type="submit" value="Modificar">
</form>
<hr>
<h5>ELIMINAR</h5>
<form action="eliminar.php" method="POST">
	<input type="text" name="id" required placeholder="ID a eliminar">
	<input type="submit" value="Eliminar">
</form>
<hr>
</center>
</body>
</html>