$(document).ready(function () {

    $(document).on("click", "#BtnGuardar", function () {
      
        Apellido = document.getElementById("ape").value;
        Nombre = document.getElementById("nom").value;
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
})