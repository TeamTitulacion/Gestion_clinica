$(document).ready(function () {
  Datatables = $("#dataTableMedico").DataTable({
    responsive: true,
    language: {
      processing: "Procesando...",
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      emptyTable: "Ningún dato disponible en esta tabla",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      info: "Mostrando pagina _PAGE_ de _PAGES_",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      search: "Buscar:",
      infoThousands: ",",
      loadingRecords: "Cargando...",
      paginate: {
        first: "Primero",
        last: "Último",
        next: "Siguiente",
        previous: "Anterior",
      },
    },
    ajax: {
      url: "./ajax/medico.ajax.php",
      method: "POST",
      data: { ver: "ver" },
      dataSrc: "",
    },

    columns: [
      { data: "id_medico" },
      { data: "med_nombre" },
      { data: "med_apellido" },
      { data: "cat_detalle" },
      { data: "per_detalle" },
      { data: "med_usuario" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fa fa-edit'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa fa-exclamation-triangle'>delete</i></button></div></div>",
      },
    ],
  });
  $(document).on("click", ".btnEditar", function () {
    fila = $(this).closest("tr");
    userid = parseInt(fila.find("td:eq(0)").text());
    var crypid = $.ajax({
      type: "POST",
      url: "./ajax/medico.ajax.php",
      data: {
        enc: userid,
      },
      dataType: "json",
      context: document.body,
      global: false,
      async: false,
      success: function (data) {
        return data;
      },
    }).responseText;

    window.location.href = "Edmedico/" + crypid;
  });
  $(document).on("click", ".btnBorrar", function () {
    Swal.fire({
      title: "Esta Seguro?!",
      text: "Este cambio es irreversible",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si, Borralooo!",
    }).then((result) => {
      if (result.isConfirmed) {
        fila = $(this).closest("tr");
        userid = parseInt(fila.find("td:eq(0)").text());
        $.ajax({
          url: "./ajax/medico.ajax.php",
          type: "POST",
          data: {
            id: userid,
            estado: "1",
          },
          datatype: "json",
          success: function (data) {
            var msg = data;
            if (msg == 1) {
              Swal.fire(
                "Eliminado!",
                "El usuario fue eliminado",
                "success"
              ).then(function () {
                Datatables.ajax.reload(null, false);
              });
            }
          },
        });
      }
    });
  });
});
