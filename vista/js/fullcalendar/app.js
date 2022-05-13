let frm = document.getElementById("formulario");
let eliminar = document.getElementById("btnEliminar");
let actualizar = document.getElementById("btnActualizar");
let registrar = document.getElementById("btnAccion");
var eventsFromCalendar = document.getElementById("calendar");
document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("calendar");
  var jqxhr = $.ajax({
    type: "POST",
    url: "./ajax/calendar.ajax.php",
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
      today: "Hoy",
      month: "Mes",
      week: "Semana",
      day: "Día",
      list: "Agenda",
    },
    hiddenDays: [0],
    events: jqxhr,
    editable: true,
    dateClick: function (info) {
      document.getElementById("start").value = info.dateStr;
      registrar.classList.remove("hidden");
      eliminar.classList.add("hidden");
      actualizar.classList.add("hidden");
      document.getElementById("titulos").textContent = "Registro de Cita";
      document.getElementById("title").value = "";
      document.getElementById("hora").value = "";
      $("#Odonto").val("").trigger("change");
      $("#Pac").val("").trigger("change");
      $("#myModal").modal("show");
      $(document).on("click", "#btnAccion", function (e) {
        e.preventDefault();
        const title = document.getElementById("title").value;
        const fecha = document.getElementById("start").value;
        const hora = document.getElementById("hora").value;
        const end = document.getElementById("end").value;
        const odonto = document.getElementById("Odonto").value;
        const pac = document.getElementById("Pac").value;
        if (title == "" || fecha == "") {
          Swal.fire("Aviso", "Todos los campos son requeridos", "warning");
        }
        if (hora < "08:59:00" || hora > "16:01:00") {
          Swal.fire(
            "Aviso",
            "El horario de antencion es de 09:00 AM hasta las 17:00 PM",
            "warning"
          );
        } else {
          $("#myModal").modal("hide");

          $.ajax({
            url: "./ajax/calendar.ajax.php",
            type: "POST",
            data: {
              title: title,
              start: fecha + " " + hora,
              odonto: odonto,
              pac: pac,
              end: end,
            },
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
              if (msg == "nocita") {
                Swal.fire(
                  "Error",
                  "No puede agendar cita a esa hora",
                  "warning"
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
      resul = new Date(info.event.start).toISOString();
      horaevent = new Date(info.event.startStr);
      document.getElementById("titulos").textContent = "Modificar elemento";
      document.getElementById("id").value = info.event.id;
      document.getElementById("title").value = info.event.title;
      document.getElementById("start").value = resul.substr(0, 10);
      document.getElementById("hora").value =
        ("0" + horaevent.getHours()).slice(-2) +
        ":" +
        ("0" + horaevent.getMinutes()).slice(-2);
        document.getElementById("end").value =
        info.event.extendedProps.custom_param2.substr(11, 20);
      $("#Odonto")
        .val(info.event.extendedProps.custom_param1)
        .trigger("change");
      $("#Pac").val(info.event.extendedProps.custom_param3).trigger("change");

      $("#myModal").modal("show");
      $(document).on("click", "#btnActualizar", function (e) {
        e.preventDefault();
        var id = document.getElementById("id").value;
        var titulo = document.getElementById("title").value;
        var fecha = document.getElementById("start").value;
        var hora = document.getElementById("hora").value;
        var end = document.getElementById("end").value;
        var odonto = document.getElementById("Odonto").value;
        var pac = document.getElementById("Pac").value;
        $("#myModal").modal("hide");
        $.ajax({
          type: "POST",
          url: "./ajax/calendar.ajax.php",
          data: {
            id: id,
            titulo: titulo,
            fecha: fecha + " " + hora,
            odonto: odonto,
            pac: pac,
            end: fecha + " " + end,
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
          error:function(dato) {
            if (dato) {
              Swal.fire("Error", "No puede agendar cita a esa hora", "warning");
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

  $("#Odonto").select2({
    placeholder: "Odontologo",
    allowClear: true,
  });
  $(".js-example-basic-single").select2({
    placeholder: "Elija una opcion",
    allowClear: true,
    selectOnClose: true,
  });
  calendar.render();
});
