$(document).ready(function () {
    // grafico pastel
  $(function () {
    var data = [
      {
        label: "Restauracion dental",
        data: 1,
      },
      {
        label: "Profilaxis dental",
        data: 1,
      },
      {
        label: "Blanqueamiento dental",
        data: 1,
      },
      {
        label: "Ortodoncia & Ortopedia",
        data: 1,
      },
      {
        label: "Protesis (Totales,removibles,fijas)",
        data: 1,
      },
      {
        label: "Endodoncia",
        data: 1,
      },
      {
        label: "Cirugia de terceros molares",
        data: 1,
      },
      {
        label: "Implantes dentales",
        data: 2,
      },
    ];

    var plotObj = $.plot($("#flot-pie-chart"), data, {
      series: {
        pie: {
          innerRadius: 0.5,
          show: true,
          radius: 1,
          label: {
            opacity: 0,
            show: true,
            radius: 2 / 3,
            threshold: 0.1,
            formatter: function (label, series) {
              return (
                '<div style="solid grey;font-size:10pt;text-align:center;padding:5px;color:#000;">' +
                label +
                " : " +
                Math.round(series.percent) +
                "%</div>"
              );
            },
          },
        },
      },

      grid: {
        hoverable: true,
      },
      tooltip: true,
      tooltipOpts: {
        content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
        shifts: {
          x: 20,
          y: 0,
        },
      },
      legend: {
        show: false,
      },
    });
  });
  //grafico visitas
  $(function () {
    let jqxhr = $.ajax({
        type: "POST",
        url:"./ajax/dashboard.ajax.php",
        data: {
          vt: "",
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
      var datos1 =[]
      for (let item of jqxhr ) {

        datos1.push([new Date(item.fecha).getTime(),item.contador]);
          
      }
    var container = $("#flot-line-chart-moving"); 
    console.log(datos1);
    var datos = [
      [new Date('2013/02/28').getTime(), 0],
        [new Date('2013/03/01').getTime(), 4],
        [new Date('2013-03-05').getTime(), 2],
    ];
  
    series = [
      {
        data: datos1,
        lines: {
          show: true,
          fill: true,
        },
        points: {
          show: true,
        },
        fillColor: "rgba(71, 172, 215,0.2)",
        color: "rgb(71, 172, 215)",
      },
    ];
  
    //

  
    var plot = $.plot(container, series, {
      grid: {
        borderWidth: 1,
        minBorderMargin: 20,
        labelMargin: 10,
        backgroundColor: {
          colors: ["#fff", "#e4f4f4"],
        },
        margin: {
          top: 8,
          bottom: 20,
          left: 20,
        },
        markings: function (axes) {
          var markings = [];
          var xaxis = axes.xaxis;
          for (
            var x = Math.floor(xaxis.min);
            x < xaxis.max;
            x += xaxis.tickSize * 2
          ) {
            markings.push({
              xaxis: {
                from: x,
                to: x + xaxis.tickSize,
              },
              color: "rgba(232, 232, 255, 0.2)",
            });
          }
          return markings;
        },
      },
  
      xaxis: {
        mode: "time",
      },
      yaxis: {},
      legend: {
        show: true,
      },
    });
  
    // Update the random dataset at 25FPS for a smoothly-animating chart
  
    setInterval(function updateRandom() {
      series[0].data = datos1;
      plot.setData(series);
      plot.draw();
    }, 960000);
  });
  
});
