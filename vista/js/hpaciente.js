$(document).ready(function () {
  var ajaxpac = document.getElementById("jso").value;
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
      url: "../ajax/historia.ajax.php",
      method: "POST",
      data: { his: ajaxpac },
      dataSrc: "",
      datatype: "json",
    },

    columns: [
      { data: "id_paciente" },
      { data: "pac_nombre" },
      { data: "pac_apellido" },
      { data: "pac_dni" },
      { data: "enc_nhistoria" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnVer'><i class='fa fa-eye'>ver</i></button></div></div>",
      },
    ],
  });
  $(document).on("click", ".btnVer", function () {
    fila = $(this).closest("tr");
    userid = fila.find("td:eq(4)").text();
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
    window.location.href = base_url + "/form2/" + crypid;
  });
  $(document).on("click", "#NuevaH", function () {
    var consulta = $.ajax({
      type: "POST",
      url: "../ajax/historia.ajax.php",
      data: {
        ajaxpac: ajaxpac,
      },
      dataType: "json",
      context: document.body,
      global: false,
      async: false,
      success: function (data) {
        return data;
      },
    }).responseText;
    comprobador = JSON.parse(consulta);

    if (comprobador["sangre"] == 0) {
      $("#myModal").modal("show");
      $(document).on("click", "#BtnGuardar", function (e) {
        e.preventDefault();
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
            url: "../ajax/historia.ajax.php",
            type: "POST",
            data: {
              id: ajaxpac,
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
              console.log(data);
              var msg = data;
              if (msg == 1) {
                Swal.fire("Exito", "Datos Actualizados", "success").then(
                  function () {
                    location.reload();
                  }
                );
              }
            },
          });
        }
      });
    } else {
      var DNIH = $.ajax({
        type: "POST",
        url: "../ajax/historia.ajax.php",
        data: {
          DNIH: ajaxpac,
        },
        dataType: "json",
        context: document.body,
        global: false,
        async: false,
        success: function (data) {
          return data;
        },
      }).responseText;
      com = JSON.parse(DNIH);
      var encabezado = $.ajax({
        type: "POST",
        url: "../ajax/historia.ajax.php",
        data: {
          Enca: ajaxpac,
        },
        dataType: "json",
        context: document.body,
        global: false,
        async: false,
        success: function (data) {
          return data;
        },
      }).responseText;
      enc = JSON.parse(encabezado);
      if (enc == false) {
        $("#elecDoc").modal("show");
        nhistoria = "CMD" + com["pac_dni"] + "-" + 1;
        $(document).on('click','#Btncrear',function () {
          med = document.getElementById("med").value;
          var f= new Date();
          fecha= f.getFullYear()+"-" + (f.getMonth() +1)+ "-" + f.getDate();
         $.ajax({
            url: "../ajax/historia.ajax.php",
            type: "POST",
            data: {
              pac: ajaxpac,
              med: med,
              nhistoria: nhistoria,
              fecha: fecha,
            },
            datatype: "json",
            success: function (data) {
              console.log(data);
              var msg = data;
              if (msg == 1) {
                Swal.fire("Exito", "Se ha creado una historia", "success").then(
                  function () {
                    location.reload();
                  }
                );
              }
            },
          });
        })
        
      } else {
        $("#elecDoc").modal("show");
       conSubstr = enc['enc_nhistoria'].substr(14, 25);
       nuevahistoria= "CMD" + com["pac_dni"] + "-" +(parseInt(conSubstr)+1);
       $(document).on('click','#Btncrear',function () {
        med = document.getElementById("med").value;
        var f= new Date();
        fecha= f.getFullYear()+"-" + (f.getMonth() +1)+ "-" + f.getDate();
       $.ajax({
          url: "../ajax/historia.ajax.php",
          type: "POST",
          data: {
            pac: ajaxpac,
            med: med,
            nhistoria: nuevahistoria,
            fecha: fecha,
          },
          datatype: "json",
          success: function (data) {
            console.log(data);
            var msg = data;
            if (msg == 1) {
              Swal.fire("Exito", "Se ha creado una historia", "success").then(
                function () {
                  location.reload();
                }
              );
            }
          },
        });
      })
      }
    }
  });
  
});
