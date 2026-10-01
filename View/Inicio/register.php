<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/View/layoutExterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/InicioController.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php IncludeCSS(); ?>

<body>

    <div class="login-wrapper">
        <div class="login-bg-shape login-bg-shape-1"></div>
        <div class="login-bg-shape login-bg-shape-2"></div>

        <div class="login-card">

            <a href="login.php" class="login-brand text-decoration-none">
                <i class="bi bi-asterisk"></i>
                <span>Proyecto MN</span>
            </a>

            <form action="" method="POST" id="registerForm" class="needs-validation" novalidate>

                <?php if(isset($_POST["mensaje"])) { ?>

                    <div class="alert alert-secondary d-flex justify-content-center" role="alert">
                        <?php echo $_POST["mensaje"]; ?>
                    </div>

                <?php } ?>

                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <div class="login-input-group">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input" 
                        onkeyup="ConsultarNombre()">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtNombre" class="login-form-label">Nombre Completo</label>
                    <div class="login-input-group">
                        <i class="bi bi-person-badge input-icon"></i>
                        <input type="text" id="txtNombre" name="txtNombre" class="login-input">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtCorreoElectronico" class="login-form-label">Correo Electrónico</label>
                    <div class="login-input-group">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="text" id="txtCorreoElectronico" name="txtCorreoElectronico" class="login-input">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <div class="login-input-group">
                        <i class="bi bi-shield-lock input-icon"></i>
                        <input type="password" id="txtContrasenna" name="txtContrasenna" class="login-input login-input-password">
                        <button type="button" class="password-toggle-btn" id="toggle-password"
                            aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" id="btnRegistro" name="btnRegistro" class="btn-login">
                    <span>Procesar</span>
                </button>

            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                Ya tiene una cuenta? <a href="login.php" id="link-register">Inicie sesión ahora</a>
            </p>

        </div>
    </div>

    <?php IncludeJS(); ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
    <script src="../assets/js/register.js"></script>

</body>

</html>