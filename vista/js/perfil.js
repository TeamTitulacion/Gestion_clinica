$(document).ready(function () {
  $(document).on("click", "#pefil", function () {
    const id = document.getElementById("id").value;
    var crypid = $.ajax({
      type: "POST",
      url: "./ajax/medico.ajax.php",
      data: {
        enc: id,
      },
      dataType: "json",
      context: document.body,
      global: false,
      async: false,
      success: function (data) {
        return data;
      },
    }).responseText;

    window.location.href = "perfil/" + crypid;
  });

  $("#frmPerfil").submit(function (e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const sexo = document.getElementById("sexo").value;
    const fecha = document.getElementById("fecha").value;
    const dir = document.getElementById("dir").value;
    const tele = document.getElementById("tele").value;
    const cat = document.getElementById("cat").value;
    const rol = document.getElementById("rol").value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;
    const id = document.getElementById("id").value;
    
    var frmData = new FormData();
    frmData.append("imgUP", $("input[name=img]")[0].files[0]);
    frmData.append("nombreUP", nombre);
    frmData.append("apellidoUP", apellido);
    frmData.append("sexoUP", sexo);
    frmData.append("fechaUP", fecha);
    frmData.append("dirUP", dir);
    frmData.append("teleUP", tele);
    frmData.append("catUP", cat);
    frmData.append("rolUP", rol);
    frmData.append("userUP", user);
    frmData.append("passUP", pass);
    frmData.append("id", id);
    if (
      nombre == "" ||
      apellido == "" ||
      sexo == "" ||
      fecha == "" ||
      dir == "" ||
      tele == "" ||
      cat == "" ||
      rol == "" ||
      user == "" ||
      pass == ""
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Todos los campos son necesarios", //todos los camposestupido !!!
      });
      let error = document.getElementById("claseError");
      error.classList.add("has-error");
    } else {
      $.ajax({
        url: "../ajax/medico.ajax.php",
        type: "POST",
        data: frmData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
          var msg = data;
          console.log(msg);
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
});
