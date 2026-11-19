<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/HabitacionesController.php';

      ValidarVistaAdmin();

      $idHabitacion = $_GET['id'];
      $datos = ConsultarHabitacion($idHabitacion);
?>

<!DOCTYPE html>
<html lang="es">

<?php IncludeCSS(); ?>

<body>

    <?php MostrarSidebar(); ?>

    <div class="main-wrapper">

        <?php MostrarHeader(); ?>

        <div class="page-header">
            <div>
                <h1 class="page-title">Actualizar Habitación</h1>
            </div>
            <div class="d-flex justify-content-end">
                <a href="habitaciones.php" class="btn-login"> Regresar</a>
            </div>
        </div>

        <div class="row g-4">

            <!-- Column 1 -->
            <div class="col-12 col-lg-8">
                <div class="card border-light shadow-sm p-4">
                    <h5 class="card-title mb-4">Datos de la Habitación</h5>

                    <form action="" method="POST" id="ActualizarHabitacionForm" class="needs-validation">

                        <?php if(isset($_POST["mensaje"])) { ?>

                        <div class="alert alert-secondary text-center" role="alert">
                            <?php echo $_POST["mensaje"]; ?>
                        </div>

                        <?php } ?>

                        <div class="row">

                            <input type="hidden" id="txtHabitacionId" name="txtHabitacionId" value="<?php echo $datos['Consecutivo']; ?>">

                            <div class="col-12 col-md-6">
                                <div class="login-form-group">
                                    <label for="txtCapacidad" class="login-form-label">Capacidad (personas)</label>
                                    <div class="login-input-group">
                                        <i class="bi bi-people input-icon"></i>
                                        <input type="text" id="txtCapacidad" name="txtCapacidad" inputmode="numeric"
                                            class="login-input" value="<?php echo $datos['Capacidad']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="login-form-group">
                                    <label for="txtPrecio" class="login-form-label">Precio</label>
                                    <div class="login-input-group">
                                        <i class="bi bi-currency-dollar input-icon"></i>
                                        <input type="text" id="txtPrecio" name="txtPrecio" inputmode="decimal"
                                            class="login-input" value="<?php echo $datos['Precio']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="login-form-group">
                            <label for="txtCaracteristicas" class="login-form-label">Características</label>
                            <div class="login-input-group align-items-start">
                                <i class="bi bi-card-text input-icon" style="top: 0.8rem;"></i>
                                <textarea id="txtCaracteristicas" name="txtCaracteristicas" rows="6"
                                    class="login-input"><?php echo $datos['Caracteristicas']; ?></textarea>
                            </div>
                        </div>

                        <div class="login-form-group">
                            <label for="txtImagen" class="login-form-label">Imagen</label>
                            <div class="login-input-group">
                                <i class="bi bi-image input-icon"></i>
                                <input type="text" id="txtImagen" name="txtImagen" class="login-input"
                                value="<?php echo $datos['Imagen']; ?>">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" id="btnActualizarHabitacion" name="btnActualizarHabitacion"
                                class="btn-login w-25">
                                <span>Procesar</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-12 col-lg-4">
                <div class="card border-light shadow-sm p-4">
                    <h5 class="card-title mb-4">Vista Previa</h5>

                    <div class="flex-grow-1 d-flex align-items-center justify-content-center border rounded bg-light overflow-hidden"
                        style="min-height: 250px;">
                        <img id="imgVistaPrevia" src="" alt="Vista previa de la habitación" class="d-none"
                            style="width: 100%; height: 100%; max-height: 350px; object-fit: cover;">
                        <div id="sinVistaPrevia" class="text-center text-muted p-3">
                            <i class="bi bi-image fs-1 d-block mb-2"></i>
                            <small>Ingrese la URL de la imagen para visualizarla</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php MostrarFooter(); ?>

    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/actualizarHabitacion.js"></script>

</body>

</html>