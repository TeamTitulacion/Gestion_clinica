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
  $(document).on("click", ".sv2", function () {
    $("#myModal").modal("show");
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
