<?php include_once '../layoutInterno.php'; 
      include_once $_SERVER['DOCUMENT_ROOT'] . '/MNRepo/Controller/HabitacionesController.php';

      ValidarVistaAdmin();

      $datos = ConsultarHabitacionesAdmin();
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

        <div class="row g-4 mb-4">

            <!-- Column 1 -->
            <div class="col-12 col-lg-12">
                <div class="card border-light shadow-sm p-4">

                    <?php if(isset($_POST["mensajeDatosCuenta"])) { ?>

                    <div class="alert alert-secondary text-center" role="alert">
                        <?php echo $_POST["mensajeDatosCuenta"]; ?>
                    </div>

                    <?php } ?>

                    <div class="table-responsive" >
                        <table id="tablaPrincipal" class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 10%;">Imagen</th>
                                    <th>Características</th>
                                    <th class="text-center">Capacidad</th>
                                    <th class="text-end">Precio</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($datos as $habitacion) { ?>
                                    <tr>
                                        <td><strong><?php echo $habitacion['Consecutivo']; ?></strong></td>
                                        <td>
                                            <img src="<?php echo $habitacion['Imagen']; ?>" 
                                                 alt="Habitación <?php echo $habitacion['Consecutivo']; ?>" 
                                                 style="max-width: 180px; height: 120px; object-fit: cover; border-radius: 4px;">
                                        </td>
                                        <td class="text-justify">
                                            <small><?php echo $habitacion['Caracteristicas']; ?></small>
                                        </td>
                                        <td class="text-center">
                                            <strong><?php echo $habitacion['Capacidad']; ?> personas</strong>
                                        </td>
                                        <td class="text-end">
                                            <strong>$<?php echo number_format($habitacion['Precio'], 2); ?></strong>
                                        </td>
                                        <td class="text-center">
                                            <?php 
                                                $disponible = $habitacion['Disponible'];
                                                if($disponible) { 
                                                    echo '<span class="badge bg-success">✓ Disponible</span>';
                                                } else { 
                                                    echo '<span class="badge bg-danger">✗ No disponible</span>';
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center" class="text-nowrap">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="#" class="btn btn-sm btn-warning" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Eliminar">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

        <?php MostrarFooter(); ?>

    </div>

    <?php IncludeJS(); ?>
    <script src="../assets/js/habitaciones.js"></script>

</body>

</html>