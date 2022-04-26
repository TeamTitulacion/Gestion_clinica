$(document).on("click", "#guardar", function () {
  let NumHist = document.getElementById("NumHist").value;
  let Motivo = document.getElementById("Motivo").value;
  let FechaMo = document.getElementById("FechaMo").value;
  let NomAcompa = document.getElementById("NomAcompa").value;
  let TeleAcompa = document.getElementById("TeleAcompa").value;
  let Vih = document.getElementById("Vih").value;
  let DiagVIH = document.getElementById("DiagVIH").value;
  let FechaVIH = document.getElementById("FechaVIH").value;
  let Estatura = document.getElementById("Estatura").value;
  let Temp = document.getElementById("Temp").value;
  let Pulso = document.getElementById("Pulso").value;
  let Peso = document.getElementById("Peso").value;
  let TenArte = document.getElementById("TenArte").value;
  let FrecuRespi = document.getElementById("FrecuRespi").value;
  let MoConsulta = document.getElementById("MoConsulta").value;
  let EnfeActuales = document.getElementById("EnfeActuales").value;
  let TiposAnte1 = document.getElementById("TiposAnte1").value;
  let TiposAnte2 = document.getElementById("TiposAnte2").value;
  let TiposAnte3 = document.getElementById("TiposAnte3").value;
  let TiposAnte4 = document.getElementById("TiposAnte4").value;
  let TiposAnte5 = document.getElementById("TiposAnte5").value;
  let TiposAnte6 = document.getElementById("TiposAnte6").value;
  let TiposAnte7 = document.getElementById("TiposAnte7").value;
  let TiposAnte8 = document.getElementById("TiposAnte8").value;
  let TiposAnte9 = document.getElementById("TiposAnte9").value;
  let TiposAnte10 = document.getElementById("TiposAnte10").value;
  let TiposAnte11 = document.getElementById("TiposAnte11").value;
  let TiposAnte12 = document.getElementById("TiposAnte12").value;
  let TiposAnte13 = document.getElementById("TiposAnte13").value;
  let TiposAnte14 = document.getElementById("TiposAnte14").value;
  let TiposAnte15 = document.getElementById("TiposAnte15").value;
  let TiposAnte16 = document.getElementById("TiposAnte16").value;
  let TiposAnte17 = document.getElementById("TiposAnte17").value;
  let TiposAnte18 = document.getElementById("TiposAnte18").value;
  let TiposAnte19 = document.getElementById("TiposAnte19").value;
  let TiposAnte20 = document.getElementById("TiposAnte20").value;
  let TiposAnte21 = document.getElementById("TiposAnte21").value;
  let ObservaAntece = document.getElementById("ObservaAntece").value;
  let TejidosN1 = document.getElementById("TejidosN1").value;
  let TejidosA1 = document.getElementById("TejidosA1").value;
  let TejidosN2 = document.getElementById("TejidosN2").value;
  let TejidosA2 = document.getElementById("TejidosA2").value;
  let TejidosN3 = document.getElementById("TejidosN3").value;
  let TejidosA3 = document.getElementById("TejidosA3").value;
  let TejidosN4 = document.getElementById("TejidosN4").value;
  let TejidosA4 = document.getElementById("TejidosA4").value;
  let TejidosN5 = document.getElementById("TejidosN5").value;
  let TejidosA5 = document.getElementById("TejidosA5").value;
  let TejidosN6 = document.getElementById("TejidosN6").value;
  let TejidosA6 = document.getElementById("TejidosA6").value;
  let TejidosN7 = document.getElementById("TejidosN7").value;
  let TejidosA7 = document.getElementById("TejidosA7").value;
  let TejidosN8 = document.getElementById("TejidosN8").value;
  let TejidosA8 = document.getElementById("TejidosA8").value;
  let TejidosN9 = document.getElementById("TejidosN9").value;
  let TejidosA9 = document.getElementById("TejidosA9").value;
  let TejidosN10 = document.getElementById("TejidosN10").value;
  let TejidosA10 = document.getElementById("TejidosA10").value;
  let TejidosN11 = document.getElementById("TejidosN11").value;
  let TejidosA11 = document.getElementById("TejidosA11").value;
  let TejidosN12 = document.getElementById("TejidosN12").value;
  let TejidosA12 = document.getElementById("TejidosA12").value;
  let TejidosN13 = document.getElementById("TejidosN13").value;
  let TejidosA13 = document.getElementById("TejidosA13").value;
  let AtmN1 = document.getElementById("AtmN1").value;
  let AtmA1 = document.getElementById("AtmA1").value;
  let AtmN2 = document.getElementById("AtmN2").value;
  let AtmA2 = document.getElementById("AtmA2").value;
  let AtmN3 = document.getElementById("AtmN3").value;
  let AtmA3 = document.getElementById("AtmA3").value;
  let AtmN4 = document.getElementById("AtmN4").value;
  let AtmA4 = document.getElementById("AtmA4").value;
  let AtmN5 = document.getElementById("AtmN5").value;
  let AtmA5 = document.getElementById("AtmA5").value;
  let AtmN6 = document.getElementById("AtmN6").value;
  let AtmA6 = document.getElementById("AtmA6").value;
  let AtmN7 = document.getElementById("AtmN7").value;
  let AtmA7 = document.getElementById("AtmA7").value;
  //let Tratamiento = document.getElementById("Tratamiento").value;
  let AccioPreveSI1 = document.getElementById("AccioPreveSI1").value;
  let AccioPreveFre1 = document.getElementById("AccioPreveFre1").value;
  let AccioPreveSI2 = document.getElementById("AccioPreveSI2").value;
  let AccioPreveFre2 = document.getElementById("AccioPreveFre2").value;
  let AccioPreveSI3 = document.getElementById("AccioPreveSI3").value;
  let AccioPreveFre3 = document.getElementById("AccioPreveFre3").value;
  let AccioPreveSI4 = document.getElementById("AccioPreveSI4").value;
  let AccioPreveFre4 = document.getElementById("AccioPreveFre4").value;
  let AccioPreveSI5 = document.getElementById("AccioPreveSI5").value;
  let AccioPreveFre5 = document.getElementById("AccioPreveFre5").value;
  let AccioPreveSI6 = document.getElementById("AccioPreveSI6").value;
  let AccioPreveFre6 = document.getElementById("AccioPreveFre6").value;
  let RadioExtraO1 = document.getElementById("RadioExtraO1").value;
  let RadioExtraO2 = document.getElementById("RadioExtraO2").value;
  let RadioExtraO3 = document.getElementById("RadioExtraO3").value;
  let RadioExtraO4 = document.getElementById("RadioExtraO4").value;
  let RadioExtraO5 = document.getElementById("RadioExtraO5").value;
  let RadioExtraO6 = document.getElementById("RadioExtraO6").value;
  let RadioExtraO7 = document.getElementById("RadioExtraO7").value;
  let RadioExtraO8 = document.getElementById("RadioExtraO8").value;
  let ExamenesComple = document.getElementById("ExamenesComple").value;
  let Diag1 = document.getElementById("Diag1").value;
  let Prono1 = document.getElementById("Prono1").value;
  let Diag2 = document.getElementById("Diag2").value;
  let Prono2 = document.getElementById("Prono2").value;
  let Diag3 = document.getElementById("Diag3").value;
  let Prono3 = document.getElementById("Prono3").value;
  let Diag4 = document.getElementById("Diag4").value;
  let Prono4 = document.getElementById("Prono4").value;
  let Diag5 = document.getElementById("Diag5").value;
  let Diag6 = document.getElementById("Diag6").value;
  let Prono6 = document.getElementById("Prono6").value;
  let Diag7 = document.getElementById("Diag7").value;
  let Prono7 = document.getElementById("Prono7").value;
  let PlanTra1 = document.getElementById("PlanTra1").value;
  let PlanTra2 = document.getElementById("PlanTra2").value;
  let PlanTra3 = document.getElementById("PlanTra3").value;
  let PlanTra4 = document.getElementById("PlanTra4").value;
  let PlanTra5 = document.getElementById("PlanTra5").value;
  let PlanTra6 = document.getElementById("PlanTra6").value;
  let PlanTra7 = document.getElementById("PlanTra7").value;
  console.log(Motivo+FechaMo+NomAcompa+TeleAcompa+Vih+DiagVIH+FechaVIH);
  $.ajax({
    type: "POST",
    url: "../ajax/historia.ajax.php",
    data: {
      Motivo: Motivo,
      FechaMo: FechaMo,
      NomAcompa: NomAcompa,
      TeleAcompa: TeleAcompa,
      Vih: Vih,
      DiagVIH: DiagVIH,
      FechaVIH: FechaVIH,
      NumHist: NumHist,
      Estatura: Estatura,
      Temp: Temp,
      Pulso: Pulso,
      Peso: Peso,
      TenArte: TenArte,
      FrecuRespi: FrecuRespi,
    },
    dataType: "json",
    success: function (data) {
      var msg = data;
      console.log(msg);
      if (msg == 1) {
        Swal.fire("Exito", "Historia Actualizada", "success").then(function () {
          location.reload();
        });
      } else {
        Swal.fire("Advertencia!", "No se realizo ningun cambio", "warning");
      }
    },
    error: function (data) {
      var msg = data;
      console.log(msg);
    },
  });
});
