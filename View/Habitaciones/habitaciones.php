<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/PersonalController.php';

      ValidarVistaAdmin();

      $datos = ConsultarUsuario();
?>

<!DOCTYPE html>
<html lang="en">

<?php IncludeCSS(); ?>

<body>

    <?php MostrarSidebar(); ?>

    <div class="main-wrapper">

        <?php MostrarHeader(); ?>

        <div class="page-header">
            <div>
                <h1 class="page-title">Habitaciones</h1>
            </div>
        </div>

        <div class="row g-4 mb-4">

            <!-- Column 1 -->
            <div class="col-12 col-lg-12">
                <div class="card border-light shadow-sm p-4">

                    <?php if(isset($_POST["mensajeDatosCuenta"])) { ?>

                    <div class="alert alert-secondary text-center" role="alert">
                        <?php echo $_POST["mensajeDatosCuenta"]; ?>
                    </div>

                    <?php } ?>

                    <div class="login-form-group">
                        <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                        <div class="login-input-group">
                            <i class="bi bi-person input-icon"></i>
                            <input type="text" id="txtIdentificacion" name="txtIdentificacion"
                                value="<?php echo $datos['Identificacion']; ?>" class="login-input"
                                onkeyup="ConsultarNombre()">
                        </div>
                    </div>

                    <div class="login-form-group">
                        <label for="txtNombre" class="login-form-label">Nombre Completo</label>
                        <div class="login-input-group">
                            <i class="bi bi-person-badge input-icon"></i>
                            <input type="text" id="txtNombre" name="txtNombre" value="<?php echo $datos['Nombre']; ?>"
                                class="login-input">
                        </div>
                    </div>

                    <div class="login-form-group">
                        <label for="txtCorreoElectronico" class="login-form-label">Correo Electrónico</label>
                        <div class="login-input-group">
                            <i class="bi bi-envelope input-icon"></i>
                            <input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico"
                                value="<?php echo $datos['CorreoElectronico']; ?>" class="login-input">
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <?php MostrarFooter(); ?>

    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/cuenta.js"></script>

</body>

</html>