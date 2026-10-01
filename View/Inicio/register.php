<?php include_once '../layoutExterno.php'; ?>

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

            <form action="index.html" method="GET" id="loginForm" class="needs-validation" novalidate>

                <div class="login-form-group">
                    <label for="txtIdentificacion" class="login-form-label">Identificación</label>
                    <div class="login-input-group">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="txtIdentificacion" class="login-input">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtNombre" class="login-form-label">Nombre Completo</label>
                    <div class="login-input-group">
                        <i class="bi bi-person-badge input-icon"></i>
                        <input type="text" id="txtNombre" class="login-input">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtCorreoElectronico" class="login-form-label">Correo Electrónico</label>
                    <div class="login-input-group">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="text" id="txtCorreoElectronico" class="login-input">
                    </div>
                </div>

                <div class="login-form-group">
                    <label for="txtContrasenna" class="login-form-label">Contraseña</label>
                    <div class="login-input-group">
                        <i class="bi bi-shield-lock input-icon"></i>
                        <input type="password" id="txtContrasenna" class="login-input login-input-password">
                        <button type="button" class="password-toggle-btn" id="toggle-password"
                            aria-label="Show password">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="btn-submit">
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

</body>

</html>