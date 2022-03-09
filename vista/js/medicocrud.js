$(document).ready(function () {
  $("#frmRegistrar").submit(function (e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre").value;
    const apellido = document.getElementById("apellido").value;
    const sexo = document.getElementById("sexo").value;
    const fecha = document.getElementById("fecha").value;
    const dir = document.getElementById("dir").value;
    const tele = document.getElementById("tele").value;
    const img = document.getElementById("img").value;
    const cat = document.getElementById("cat").value;
    const rol = document.getElementById("rol").value;
    const user = document.getElementById("user").value;
    const pass = document.getElementById("pass").value;
    /* $('#img').change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
            $("img").fadeIn("fast").attr('src',URL.createObjectURL(event.target.files[0]));
            console.log(tmppath);
        });
        console.log(tmppath);*/
    if (
      nombre == "" ||
      apellido == "" ||
      sexo == "" ||
      fecha == "" ||
      dir == "" ||
      tele == "" ||
      img == "" ||
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
        url: "./ajax/medico.ajax.php",
        type: "POST",
        data: {
          nombre: nombre,
          apellido: apellido,
          sexo: sexo,
          fecha: fecha,
          dir: dir,
          tele: tele,
          img: img,
          cat: cat,
          rol: rol,
          user: user,
          pass: pass,
        },
        datatype: "json",
        success: function (data) {
          var msg = data;
          if (msg == 1) {
            Swal.fire("Exito", "Medico registrado", "success").then(
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
