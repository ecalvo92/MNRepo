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
