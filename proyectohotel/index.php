<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from cliente");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
            <!-- fin alerta -->

            <!-- Botton agregar -->
            <a href="nuevo.php">
                <button type="button" class="btn btn-primary" style="background-color: blue;">Agregar nuevo Cliente</button>
            </a>
            
            <div class="card-body">
            <p>¡Bienvenido al Hotel Cielo! Disfruta de nuestras instalaciones y servicios de primera clase.</p>
            </div>    
                <div class="p-4">
                 <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID </th>
                                <th scope="col">Nombres </th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Tipo_Habitacion</th>
                                <th scope="col">Fecha_Reserva</th>
                                <th scope="col">HoraIngreso</th> 
                                <th scope="col">HoraSalida</th>
                                <th scope="col">Celular</th>

                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($persona as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombres; ?></td>
                                <td><?php echo $dato->apellidos; ?></td>
                                <td><?php echo $dato->DNI; ?></td>
                                <td><?php echo $dato->Tipo_habitacion; ?></td>
                                <td><?php echo $dato->Fecha_reserva; ?></td>
                                <td><?php echo $dato->hora_ingreso; ?></td>
                                <td><?php echo $dato->hora_salida; ?></td>
                                <td><?php echo $dato->celular; ?></td>
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a class="text-success" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cart3"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>