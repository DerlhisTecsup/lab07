<?php
//print_r($_POST);
//insertar datos a nuestra basede datos;

if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtApellidos"]) ||  empty($_POST["txtFechaRegistro"]) || empty($_POST["txtDNI"]) || empty($_POST["txtTipo"]) || empty($_POST["txtHoraIngreso"]) || empty($_POST["txtHoraSalida"]) ) {
    header('Location: nuevo.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$ingreso = $_POST['txtFechaRegistro'].' '.$_POST['txtHoraIngreso'];
$salida = $_POST['txtFechaRegistro'].' '.$_POST['txtHoraSalida'];

$nombres = $_POST["txtNombres"];
$ap_apellidos = $_POST["txtApellidos"];
$dni = $_POST["txtDNI"];
$fecha_registro = $_POST['txtFechaRegistro'];
$tipo = $_POST["txtTipo"];
$hora_entrada = $ingreso;
$hora_salida = $salida;
$celular = $_POST["txtcelular"];

$sentencia = $bd->prepare("INSERT INTO cliente(nombres,apellidos,DNI,Tipo_habitacion,Fecha_reserva,hora_ingreso,hora_salida,celular) VALUES (?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $ap_apellidos, $dni, $tipo, $fecha_registro, $hora_entrada,$hora_salida,$celular]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: nuevo.php?mensaje=error');
    exit();
}

