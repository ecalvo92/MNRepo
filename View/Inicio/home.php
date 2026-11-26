<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/HabitacionesController.php';

      $datos = ConsultarHabitacionesAdmin(1);
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
                <h1 class="page-title">Habitaciones</h1>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12">

                <?php if(isset($_POST["mensajeDatosCuenta"])) { ?>
                <div class="alert alert-secondary text-center" role="alert">
                    <?php echo $_POST["mensajeDatosCuenta"]; ?>
                </div>
                <?php } ?>

                <div class="row g-4">
                    <?php foreach($datos as $habitacion) { ?>
                    <div class="col-12 col-md-4 col-xl-3">
                        <div class="card h-100 border-light shadow-sm card-habitacion"
                            data-id="<?php echo $habitacion['Consecutivo']; ?>">

                            <img src="<?php echo $habitacion['Imagen']; ?>" class="card-img-top"
                                alt="<?php echo htmlspecialchars($habitacion['Nombre']); ?>"
                                style="height: 220px; object-fit: cover;">

                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title mb-0"><?php echo htmlspecialchars($habitacion['Nombre']); ?>
                                    </h5>
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-people"></i> <?php echo $habitacion['Capacidad']; ?> personas
                                    </span>
                                </div>

                                <div class="flex-grow-1">
                                    <?php
                                        $caracteristicas = $habitacion['Caracteristicas'];
                                        $esLargo = mb_strlen($caracteristicas) > 150;
                                    ?>
                                    <p class="card-text text-muted small">
                                        <?php echo htmlspecialchars($esLargo ? mb_substr($caracteristicas, 0, 150) . '...' : $caracteristicas); ?>
                                    </p>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <h6 class="text-end">$<?php echo number_format($habitacion['Precio'], 2); ?>
                                    </h6>
                                    <h6 class="text-end">
                                        <?php echo $habitacion['Inventario'] > 0 ? $habitacion['Inventario'] . ' disponibles' : 'Agotada'; ?>
                                    </h6>
                                </div>

                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-outline-secondary flex-fill btn-ver-mas"
                                        data-nombre="<?php echo htmlspecialchars($habitacion['Nombre']); ?>"
                                        data-descripcion="<?php echo htmlspecialchars($caracteristicas); ?>"
                                        data-imagen="<?php echo htmlspecialchars($habitacion['Imagen']); ?>">
                                        <i class="bi bi-eye"></i> Ver más
                                    </button>

                                    <button type="button" class="btn btn-primary flex-fill btn-reservar"
                                        data-id="<?php echo $habitacion['Consecutivo']; ?>"
                                        <?php echo $habitacion['Inventario'] > 0 ? '' : 'disabled'; ?>>
                                        <i class="bi bi-calendar-check"></i> Reservar
                                    </button>

                                    <button type="button" class="btn btn-outline-danger flex-fill btn-quitar d-none"
                                        data-id="<?php echo $habitacion['Consecutivo']; ?>">
                                        <i class="bi bi-cart-dash"></i> Quitar
                                    </button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </div>

        <?php MostrarFooter(); ?>

    </div>

    <div class="modal fade" id="modalHabitacion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHabitacionNombre"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <img id="modalHabitacionImagen" src="" alt="" class="img-fluid rounded w-100 mb-3"
                        style="max-height: 350px; object-fit: cover;">
                    <p id="modalHabitacionDescripcion" class="mb-0" style="white-space: pre-line;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/home.js"></script>

</body>

</html>