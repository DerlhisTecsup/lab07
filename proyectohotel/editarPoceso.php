<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $apellidos = $_POST['txtApellidos'];
    $dni = $_POST['txtDNI'];
    $fecha = $_POST['txtFecha'];
    $tipo = $_POST['txtTipo'];
    $hora_ingreso = $_POST['txthoraIngreso'];
    $hora_salida = $_POST['txthoraSalida'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE persona SET nombres = ?, apellidos= ?, Tipo_habitacion = ?,Fecha_reserva  = ?,hora_ingreso = ?,hora_salida = ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $tipo,$fecha,$hora_ingreso,$hora_salida ,$celula,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
