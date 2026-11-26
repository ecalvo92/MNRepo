const CLAVE_CARRITO = "carritoHabitaciones";

function obtenerCarrito() {
  return JSON.parse(localStorage.getItem(CLAVE_CARRITO) || "[]");
}

function guardarCarrito(carrito) {
  localStorage.setItem(CLAVE_CARRITO, JSON.stringify(carrito));
}

function refrescarVista() {
  const carrito = obtenerCarrito();

  $("#contadorCarrito").text(carrito.length);

  $(".card-habitacion").each(function () {
    const enCarrito = carrito.includes(String($(this).data("id")));
    $(this).toggleClass("border-primary", enCarrito);
    $(this).find(".btn-reservar").toggleClass("d-none", enCarrito);
    $(this).find(".btn-quitar").toggleClass("d-none", !enCarrito);
  });
}

$(document).ready(refrescarVista);

$(document).on("click", ".btn-ver-mas", function () {
  const boton = $(this);

  $("#modalHabitacionNombre").text(boton.data("nombre"));
  $("#modalHabitacionDescripcion").text(boton.data("descripcion"));
  $("#modalHabitacionImagen")
    .attr("src", boton.data("imagen"))
    .attr("alt", boton.data("nombre"));

  bootstrap.Modal.getOrCreateInstance("#modalHabitacion").show();
});

$(document).on("click", ".btn-quitar", function () {
  const id = String($(this).data("id"));
  guardarCarrito(obtenerCarrito().filter((x) => x !== id));
  refrescarVista();
});

// Manejo del click en el botón "Reservar"
$(document).on("click", ".btn-reservar", function () {
  const id = String($(this).data("id"));

  $.ajax({
    url: "../../Controller/CarritoController.php",
    type: "POST",
    dataType: "json",
    data: {
      habitacionId: id,
      action: "btnAgregarHabitacionCarrito",
    },
    success: function (response) {
      Swal.fire({
        text: "Habitación agregada al carrito correctamente",
        icon: "success",
        confirmButtonText: "Aceptar",
      }).then(() => {
        location.reload();
      });
    },
  });
  
});
