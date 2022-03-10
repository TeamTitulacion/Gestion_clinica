let frm = document.getElementById("formulario");
let eliminar = document.getElementById("btnEliminar");
let actualizar = document.getElementById("btnActualizar");
let registrar = document.getElementById("btnAccion");
var eventsFromCalendar = document.getElementById("calendar");
document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var jqxhr = $.ajax({
    type: "POST",
    url:"./ajax/calendar.ajax.php",
    data: {
      id: "",
    },
    dataType: "json",
    context: document.body,
    global: false,
    async: false,
    success: function (data) {
      return data;
    },
  }).responseText;

  jqxhr = JSON.parse(jqxhr);
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    headerToolbar: {
      left: "prev,next today",
      center: "title",
      right: "dayGridMonth,timeGridWeek listWeek",
    },
    locale: "es",
    buttonText: {
      
      today: 'Hoy',
      month: 'Mes',
      week: 'Semana',
      day: 'Día',
      list: 'Agenda',
    },
    events: jqxhr,
    editable: true,
    dateClick: function (info) {
      document.getElementById("start").value = info.dateStr;
      registrar.classList.remove("hidden");
      eliminar.classList.add("hidden");
      actualizar.classList.add("hidden");
      document.getElementById("titulos").textContent = "Registro de Cita";
      $("#myModal").modal("show");
      $(document).on("click", "#btnAccion", function (e) {
        e.preventDefault();
        const title = document.getElementById("title").value;
        const fecha = document.getElementById("start").value;
        const color = document.getElementById("color").value;
        if (title == "" || fecha == "" || color == "") {
          Swal.fire("Aviso", "Todos los campos son requeridos", "warning");
        } else {
          $("#myModal").modal("hide");
          $.ajax({
            url: "./ajax/calendar.ajax.php",
            type: "POST",
            data: { title: title, start: fecha, color: color },
            datatype: "json",
            success: function (data) {
              var msg = data;
              if (msg == 1) {
                Swal.fire("Exito", "Su cita fue agendada", "success").then(
                  function () {
                    location.reload();
                  }
                );
              }
            },
          });
        }
      });
    },
    eventClick: function (info) {
      registrar.classList.add("hidden");
      eliminar.classList.remove("hidden");
      actualizar.classList.remove("hidden");
      document.getElementById("titulos").textContent = "Modificar elemento";
      document.getElementById("id").value = info.event.id;
      document.getElementById("title").value = info.event.title;
      document.getElementById("start").value = info.event.startStr;
      document.getElementById("color").value = info.event.backgroundColor;
      $("#myModal").modal("show");
      $(document).on("click", "#btnActualizar", function (e) {
        e.preventDefault();
        var id = document.getElementById("id").value;
        var titulo = document.getElementById("title").value;
        var fecha = document.getElementById("start").value;
        var color = document.getElementById("color").value;
        $("#myModal").modal("hide");
        $.ajax({
          type: "POST",
          url: "./ajax/calendar.ajax.php",
          data: {
            id: id,
            titulo: titulo,
            fecha: fecha,
            color: color,
          },
          dataType: "json",
          success: function (dato) {
            var msg = dato;
            if (msg == 1) {
              Swal.fire("Exito", "Su evento fue Actualizado", "success").then(
                function () {
                  location.reload();
                }
              );
            } else if (msg == 2) {
              Swal.fire("Error", "NO se modifico el evento", "warning");
            }
          },
        });
      });
      $(document).on("click", "#btnEliminar", function (e) {
        var id = document.getElementById("id").value;
        $("#myModal").modal("hide");
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
              url: "./ajax/calendar.ajax.php",
              data: {
                Eid: id,
              },
              datatype: "json",
              success: function (datos) {
                var msg = datos;
                if (msg == 1) {
                  Swal.fire(
                    "Eliminado!",
                    "El evento fue eliminado exitosamente",
                    "success"
                  ).then(function () {
                    location.reload();
                  });
                } else if (msg == 2) {
                  Swal.fire("Error", "NO se elimino el evento", "warning");
                }
              },
            });
          }
        });
      });
    },
  });

  calendar.render();
});
