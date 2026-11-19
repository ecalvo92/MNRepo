$(document).ready(function () {
  $("#tablaPrincipal").DataTable({
    responsive: true,
    pageLength: 10,
    processing: true,
    language: {
      url: "../assets/json/datatables-es.json"
    }
  });
});

$(document).on("click", ".btn-inactivar", function () {

  const habitacionId = $(this).data("id");
  
  Swal.fire({
    text: "¿Deseas cambiar el estado de esta habitación?",
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
     
      //INACTIVAR
      $.ajax({
            url: '../../Controller/HabitacionesController.php',
            type: 'POST',
            dataType: 'json',
            data: {
              habitacionId: habitacionId,
              action: 'btnInactivarHabitacion'
            },
            success: function(response) {
               
              Swal.fire({
                text: "Habitación actualizada correctamente",
                icon: "success",
                confirmButtonText: 'Aceptar'
              }).then(() => {
                location.reload();
              });
                
            }
        });
     
    }
  });

});