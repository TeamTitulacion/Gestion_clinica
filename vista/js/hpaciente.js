$(document).ready(function () {
    var ajaxpac = document.getElementById('jso').value;
  Datatables = $("#dataTablePacienteH").DataTable({
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
      url: "../ajax/paciente.ajax.php",
      method: "POST",
      data: { Pac: ajaxpac },
      dataSrc: "",
      datatype:"json",
    },

    columns: [
      { data: "id_paciente" },
      { data: "pac_nombre" },
      { data: "pac_apellido" },
      { data: "pac_num_documento" },
      { data: "pac_telefono" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnVer'><i class='fa fa-eye'>ver</i></button></div></div>",
      },
    ],
  });
  $(document).on("click", ".btnVer", function () {
    fila = $(this).closest("tr");
    userid = parseInt(fila.find("td:eq(0)").text());
    var crypid = $.ajax({
      type: "POST",
      url: "../ajax/paciente.ajax.php",
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
    window.location.href = base_url+"/form2/" + crypid;
  });
});
