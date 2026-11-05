<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/PersonalController.php';
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
                <h1 class="page-title">Datos de la Cuenta</h1>
            </div>
        </div>

        <div class="row g-4 mb-4">

            <!-- Column 1 -->
            <div class="col-12 col-lg-6">
                <div class="card border-light shadow-sm p-4 h-100">
                    <h5 class="card-title mb-4">Datos Personales</h5>

                    <!-- Text input -->
                    <div class="mb-3">
                        <label for="basicText" class="form-label-custom">Username</label>
                        <input type="text" class="form-control-custom" id="basicText" placeholder="Enter username">
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="basicEmail" class="form-label-custom">Email Address</label>
                        <input type="email" class="form-control-custom" id="basicEmail" placeholder="name@example.com">
                        <span class="text-muted">We'll never share your email with anyone else.</span>
                    </div>

                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="basicPassword" class="form-label-custom">Password</label>
                        <input type="password" class="form-control-custom" id="basicPassword"
                            placeholder="Enter your secure password">
                    </div>

                    <!-- Disabled State -->
                    <div class="mb-3">
                        <label for="basicDisabled" class="form-label-custom">Disabled Input</label>
                        <input type="text" class="form-control-custom" id="basicDisabled"
                            value="This input field is disabled" disabled="">
                    </div>

                    <!-- Readonly State -->
                    <div class="mb-0">
                        <label for="basicReadonly" class="form-label-custom">Read-only Input</label>
                        <input type="text" class="form-control-custom" id="basicReadonly"
                            value="This field is read-only" readonly="">
                    </div>
                </div>
            </div>



            <!-- Column 2 -->
            <div class="col-12 col-lg-6">
                <div class="card border-light shadow-sm p-4">
                    <h5 class="card-title mb-4">Datos de Seguridad</h5>

                    <form action="" method="POST" id="PasswordForm" class="needs-validation" novalidate>

                        <?php if(isset($_POST["mensajePassword"])) { ?>

                        <div class="alert alert-secondary text-center" role="alert">
                            <?php echo $_POST["mensajePassword"]; ?>
                        </div>

                        <?php } ?>

                        <div class="mb-3">
                            <label for="txtContrasenaActual" class="form-label-custom">Contraseña Actual</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtContrasenaActual" name="txtContrasenaActual"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="txtContrasenaNueva" class="form-label-custom">Contraseña Nueva</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtContrasenaNueva" name="txtContrasenaNueva"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="txtConfirmarContrasena" class="form-label-custom">Confirmar Contraseña</label>
                            <div class="login-input-group">
                                <i class="bi bi-shield-lock input-icon"></i>
                                <input type="password" id="txtConfirmarContrasena" name="txtConfirmarContrasena"
                                    class="login-input login-input-password">
                                <button type="button" class="password-toggle-btn" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" id="btnCambiarContrasenna" name="btnCambiarContrasenna"
                                class="btn-login w-25">
                                <span>Procesar</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <?php MostrarFooter(); ?>

    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/cuenta.js"></script>

</body>

</html>