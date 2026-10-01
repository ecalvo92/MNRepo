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