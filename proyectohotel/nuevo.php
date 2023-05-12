<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from cliente");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5  table table-dark" >
    <div class="row justify-content-center ">
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

            <!-- fin alerta -->
            
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Registrar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos : </label>
                        <input type="text" class="form-control" name="txtApellidos" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> DNI: </label>
                        <input type="text" class="form-control" name="txtDNI" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha : </label>
                        <input type="date" class="form-control" name="txtFechaRegistro" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo:</label>
                        <select class="form-select" name="txtTipo" required>
                        <option value="">Seleccionar tipo Habitacion</option>
                        <option value="Matrimonial">Matrimonial </option>
                        <option value="Duplex">Duplex</option>
                        <option value="Simple">Simple</option>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora ingreso: </label>
                        <input type="time" class="form-control" name="txtHoraIngreso" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hora Salida: </label>
                        <input type="time" class="form-control" name="txtHoraSalida" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="text" class="form-control" name="txtcelular" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
            </div>
        </div>
</div>

<?php include 'template/footer.php' ?>






