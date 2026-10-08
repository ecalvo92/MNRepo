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

            <form action="" method="POST" id="loginForm" class="needs-validation" novalidate>

                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <div class="login-input-group">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="txtIdentificacion" name="txtIdentificacion" class="login-input">
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

                <div class="login-options">
                    <a href="forgotPassword.php" class="forgot-password-link">Olvidó su contraseña?</a>
                </div>

                <button type="submit" id="btnInicioSesion" name="btnInicioSesion" class="btn-login">
                    <span>Procesar</span>
                </button>

            </form>

            <div class="login-divider"></div>

            <p class="login-footer-text">
                No tiene una cuenta? <a href="register.php" id="link-register">Regístrese ahora</a>
            </p>

        </div>
    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/login.js"></script>

</body>

</html>