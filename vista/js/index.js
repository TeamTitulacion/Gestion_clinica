$(document).ready(function () {
  $(document).on("click", ".sv1", function () {
    $("#myModal").modal("show");
    $("#myModal").submit(function (e) {
      e.preventDefault();
      var frmData = new FormData();
      frmData.append("imgUP", $("input[name=img]")[0].files[0]);
      $.ajax({
        url: "./ajax/imagen.ajax.php",
        type: "POST",
        data: frmData,
        processData: false,
        contentType: false,
        cache: false,
        success: function (data) {
          var msg = data;
          console.log(msg);
          if (msg == 1) {
            Swal.fire("Exito", "Imagen subida con exito", "success").then(
              function () {
                location.reload();
              }
            );
          }
        },
      });
    });
  });
  $(document).on("click", "#eliminar", function () {
    document.getElementById("eliminar").classList.add("hidden");
    var btn1 = document.getElementsByClassName("btn1");
    btn1[0].innerHTML =
      ' <button class="btn btn-info sv1"><span class="fa fa-cloud-upload"></span> Subir Imagen</button> <button class="btn btn-danger" id="Cancelar">Cancelar</btn>';
    
    document.querySelectorAll(".galeria").forEach((el) => {
      el.addEventListener("click", (e) => {
        const id1 = e.target.getAttribute("id");
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
            $.ajax({
              type: "POST",
              url: "./ajax/imagen.ajax.php",
              data: {
                img: id1,
              },
              datatype: "json",
              success: function (datos) {
                var msg = datos;
                if (msg == 1) {
                  Swal.fire(
                    "Eliminado!",
                    "La imagen fue eliminado exitosamente",
                    "success"
                  ).then((result)=>{
                    location.reload();
                  })
                } else if (msg == 2) {
                  Swal.fire("Error", "NO se elimino la imagen", "warning");
                }
              },
            });
          }
        });
    })
      })
   
  });
  $(document).on("click", "#Cancelar", function () {
    document.getElementById("Cancelar").classList.add("hidden");
    var btn1 = document.getElementsByClassName("btn1");
    btn1[0].innerHTML =
      '<button class="btn btn-info sv1"><span class="fa fa-cloud-upload"></span> Subir Imagen</button> <button class="btn btn-warning" id="eliminar"><span class="fa fa-close"></span> Eliminar</button>';
    
  });
  $(document).on("click", ".sv2", function () {
    $("#myModal").modal("show");
    $("#myModal").submit(function (e) {
      e.preventDefault();
    var frmData = new FormData();
    frmData.append("docUP", $("input[name=img]")[0].files[0]);
    $.ajax({
      url: "./ajax/imagen.ajax.php",
      type: "POST",
      data: frmData,
      processData: false,
      contentType: false,
      cache: false,
      success: function (data) {
        var msg = data;
        console.log(msg);
        if (msg == 1) {
          Swal.fire("Exito", "Imagen subida con exito", "success").then(
            function () {
              location.reload();
            }
          );
        }
      },
    });
  });
  });
  $(document).on("click", "#sv3", function () {
    document.getElementById("sv3").classList.add("hidden");
    var btn1 = document.getElementsByClassName("btn2");
    btn1[0].innerHTML =
      '<button class="btn btn-info sv2"><span class="fa fa-cloud-upload"></span> Subir Imagen</button> <button class="btn btn-danger" id="sv4"><span class="fa fa-close"></span>Cancelar</button>';
      document.querySelectorAll(".eli").forEach((el) => {
        el.addEventListener("click", (e) => {
          const id1 = e.target.getAttribute("id");
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
              $.ajax({
                type: "POST",
                url: "./ajax/imagen.ajax.php",
                data: {
                  med: id1,
                },
                datatype: "json",
                success: function (datos) {
                  var msg = datos;
                  if (msg == 1) {
                    Swal.fire(
                      "Eliminado!",
                      "La imagen fue eliminado exitosamente",
                      "success"
                    ).then((result)=>{
                      location.reload();
                    })
                  } else if (msg == 2) {
                    Swal.fire("Error", "NO se elimino la imagen", "warning");
                  }
                },
              });
            }
          });
      })
        })
    
  });
  $(document).on("click", "#sv4", function () {
    document.getElementById("sv4").classList.add("hidden");
    var btn1 = document.getElementsByClassName("btn2");
    btn1[0].innerHTML =
      '<button class="btn btn-info sv1"><span class="fa fa-cloud-upload"></span> Subir Imagen</button> <button class="btn btn-warning" id="sv3"><span class="fa fa-close"></span> Eliminar</button>';
    
  });
});
