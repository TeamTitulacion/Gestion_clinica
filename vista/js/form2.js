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
  let d1 = document.getElementById("d1").src;
  let d2 = document.getElementById("d2").src;
  let d3 = document.getElementById("d3").src;
  let d4 = document.getElementById("d4").src;
  let d5 = document.getElementById("d5").src;
  let d6 = document.getElementById("d6").src;
  let d7 = document.getElementById("d7").src;
  let d8 = document.getElementById("d8").src;
  let d9 = document.getElementById("d9").src;
  let d10 = document.getElementById("d10").src;
  let d11 = document.getElementById("d11").src;
  let d12 = document.getElementById("d12").src;
  let d13 = document.getElementById("d13").src;
  let d14 = document.getElementById("d14").src;
  let d15 = document.getElementById("d15").src;
  let d16 = document.getElementById("d16").src;
  let d17 = document.getElementById("d17").src;
  let d18 = document.getElementById("d18").src;
  let d19 = document.getElementById("d19").src;
  let d20 = document.getElementById("d20").src;
  let d21 = document.getElementById("d21").src;
  let d22 = document.getElementById("d22").src;
  let d23 = document.getElementById("d23").src;
  let d24 = document.getElementById("d24").src;
  let d25 = document.getElementById("d25").src;
  let d26 = document.getElementById("d26").src;
  let d27 = document.getElementById("d27").src;
  let d28 = document.getElementById("d28").src;
  let d29 = document.getElementById("d29").src;
  let d30 = document.getElementById("d30").src;
  let d31 = document.getElementById("d31").src;
  let d32 = document.getElementById("d32").src;
  let d33 = document.getElementById("d33").src;
  let d34 = document.getElementById("d34").src;
  let d35 = document.getElementById("d35").src;
  let d36 = document.getElementById("d36").src;
  let d37 = document.getElementById("d37").src;
  let d38 = document.getElementById("d38").src;
  let d39 = document.getElementById("d39").src;
  let d40 = document.getElementById("d40").src;
  let d41 = document.getElementById("d41").src;
  let d42 = document.getElementById("d42").src;
  let d43 = document.getElementById("d43").src;
  let d44 = document.getElementById("d44").src;
  let d45 = document.getElementById("d45").src;
  let d46 = document.getElementById("d46").src;
  let d47 = document.getElementById("d47").src;
  let d48 = document.getElementById("d48").src;
  let d49 = document.getElementById("d49").src;
  let d50 = document.getElementById("d50").src;
  let d51 = document.getElementById("d51").src;
  let d52 = document.getElementById("d52").src;
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
  $.ajax({
    type: "POST",
    url: "../ajax/historia.ajax.php",
    data: {
      d1: d1,
      d2: d2,
      d3: d3,
      d4: d4,
      d5: d5,
      d6: d6,
      d7: d7,
      d8: d8,
      d9: d9,
      d10: d10,
      d11: d11,
      d12: d12,
      d13: d13,
      d14: d14,
      d15: d15,
      d16: d16,
      d17: d17,
      d18: d18,
      d19: d19,
      d20: d20,
      d21: d21,
      d22: d22,
      d23: d23,
      d24: d24,
      d25: d25,
      d26: d26,
      d27: d27,
      d28: d28,
      d29: d29,
      d30: d30,
      d31: d31,
      d32: d32,
      d33: d33,
      d34: d34,
      d35: d35,
      d36: d36,
      d37: d37,
      d38: d38,
      d39: d39,
      d40: d40,
      d41: d41,
      d42: d42,
      d43: d43,
      d44: d44,
      d45: d45,
      d46: d46,
      d47: d47,
      d48: d48,
      d49: d49,
      d50: d50,
      d51: d51,
      d52: d52,
      ObservaAntece: ObservaAntece,
      TiposAnte1: TiposAnte1,
      TiposAnte2: TiposAnte2,
      TiposAnte3: TiposAnte3,
      TiposAnte4: TiposAnte4,
      TiposAnte5: TiposAnte5,
      TiposAnte6: TiposAnte6,
      TiposAnte7: TiposAnte7,
      TiposAnte8: TiposAnte8,
      TiposAnte9: TiposAnte9,
      TiposAnte10: TiposAnte10,
      TiposAnte11: TiposAnte11,
      TiposAnte12: TiposAnte12,
      TiposAnte13: TiposAnte13,
      TiposAnte14: TiposAnte14,
      TiposAnte15: TiposAnte15,
      TiposAnte16: TiposAnte16,
      TiposAnte17: TiposAnte17,
      TiposAnte18: TiposAnte18,
      TiposAnte19: TiposAnte19,
      TiposAnte20: TiposAnte20,
      TiposAnte21: TiposAnte21,
      MoConsulta: MoConsulta,
      EnfeActuales: EnfeActuales,
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
