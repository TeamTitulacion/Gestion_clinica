$(document).ready(function () {
  Datatables = $("#dataTablePaciente").DataTable({
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
      url: "./ajax/paciente.ajax.php",
      method: "POST",
      data: { ver: "ver" },
      dataSrc: "",
    },

    columns: [
      { data: "id_paciente" },
      { data: "pac_nombre" },
      { data: "pac_apellido" },
      { data: "pac_dni" },
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
      url: "./ajax/paciente.ajax.php",
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
    window.location.href = "hpaciente/" + crypid;
  });
  $(document).on("click", ".registrar", function () {
    
    $("#myModal").modal("show");
    $(document).on("click", "#BtnGuardar", function () {
      
      Apellido = document.getElementById("Apellido").value;
      Nombre = document.getElementById("Nombre").value;
      Sexo = document.getElementById("Sexo").value;
      FechaNa = document.getElementById("FechaNa").value;
      CI = document.getElementById("CI").value;
      Sangre = document.getElementById("Sangre").value;
      Estado = document.getElementById("Estado").value;
      Dirr = document.getElementById("Dirr").value;
      Corre = document.getElementById("Corre").value;
      Tele = document.getElementById("Tele").value;
      
      if (
        Tele == "" ||
        Corre == "" ||
        Dirr == "" ||
        Estado == "" ||
        Sangre == "" ||
        CI == "" ||
        FechaNa == "" ||
        Sexo == "" ||
        Nombre == "" ||
        Apellido == ""
      ) {
        Swal.fire("Aviso", "Todos los campos son requeridos", "warning");
      } else {
        $("#myModal").modal("hide");
        $.ajax({
          url: "./ajax/historia.ajax.php",
          type: "POST",
          data: {
            Apellido: Apellido,
            Nombre: Nombre,
            Sexo: Sexo,
            FechaNa: FechaNa,
            CI: CI,
            Sangre: Sangre,
            Estado: Estado,
            Dirr: Dirr,
            Corre: Corre,
            Tele: Tele,
          },
          datatype: "json",
          success: function (data) {
            var msg = data;
            if (msg == 1) {
              Swal.fire("Exito", "Paciente Creado", "success").then(
                function () {
                  location.reload();
                }
              );
            }
            if (msg == 'existe') {
              Swal.fire("ERROR", "Paciente ya existe", "warning");
            }
          },
        });
      }
    })
  });
 
});
