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
  let TiposAnte1 = document.querySelector("#TiposAnte1").checked;
  let TiposAnte2 = document.querySelector("#TiposAnte2").checked;
  let TiposAnte3 = document.querySelector("#TiposAnte3").checked;
  let TiposAnte4 = document.querySelector("#TiposAnte4").checked;
  let TiposAnte5 = document.querySelector("#TiposAnte5").checked;
  let TiposAnte6 = document.querySelector("#TiposAnte6").checked;
  let TiposAnte7 = document.querySelector("#TiposAnte7").checked;
  let TiposAnte8 = document.querySelector("#TiposAnte8").checked;
  let TiposAnte9 = document.querySelector("#TiposAnte9").checked;
  let TiposAnte10 = document.querySelector("#TiposAnte10").checked;
  let TiposAnte11 = document.querySelector("#TiposAnte11").checked;
  let TiposAnte12 = document.querySelector("#TiposAnte12").checked;
  let TiposAnte13 = document.querySelector("#TiposAnte13").checked;
  let TiposAnte14 = document.querySelector("#TiposAnte14").checked;
  let TiposAnte15 = document.querySelector("#TiposAnte15").checked;
  let TiposAnte16 = document.querySelector("#TiposAnte16").checked;
  let TiposAnte17 = document.querySelector("#TiposAnte17").checked;
  let TiposAnte18 = document.querySelector("#TiposAnte18").checked;
  let TiposAnte19 = document.querySelector("#TiposAnte19").checked;
  let TiposAnte20 = document.querySelector("#TiposAnte20").checked;
  let TiposAnte21 = document.querySelector("#TiposAnte21").checked;
  let ObservaAntece = document.getElementById("ObservaAntece").value;
  let en1 = document.querySelector("#en1").checked;
  let en2 = document.querySelector("#en2").checked;
  let en3 = document.querySelector("#en3").checked;
  let en4 = document.querySelector("#en4").checked;
  let en5 = document.querySelector("#en5").checked;
  let en6 = document.querySelector("#en6").checked;
  let en7 = document.querySelector("#en7").checked;
  let en8 = document.querySelector("#en8").checked;
  let en9 = document.querySelector("#en9").checked;
  let en10 = document.querySelector("#en10").checked;
  let en11 = document.querySelector("#en11").checked;
  let en12 = document.querySelector("#en12").checked;
  let en_obs = document.getElementById("en_obs").value;
  let TejidosN1 = document.querySelector("#TejidosN1").checked; //document.getElementById("TejidosN1").is(":checked");
  let TejidosA1 = document.querySelector("#TejidosA1").checked; //document.getElementById("TejidosA1").is(":checked");
  let TejidosN2 = document.querySelector("#TejidosN2").checked;
  let TejidosA2 = document.querySelector("#TejidosA2").checked;
  let TejidosN3 = document.querySelector("#TejidosN3").checked;
  let TejidosA3 = document.querySelector("#TejidosA3").checked;
  let TejidosN4 = document.querySelector("#TejidosN4").checked;
  let TejidosA4 = document.querySelector("#TejidosA4").checked;
  let TejidosN5 = document.querySelector("#TejidosN5").checked;
  let TejidosA5 = document.querySelector("#TejidosA5").checked;
  let TejidosN6 = document.querySelector("#TejidosN6").checked;
  let TejidosA6 = document.querySelector("#TejidosA6").checked;
  let TejidosN7 = document.querySelector("#TejidosN7").checked;
  let TejidosA7 = document.querySelector("#TejidosA7").checked;
  let TejidosN8 = document.querySelector("#TejidosN8").checked;
  let TejidosA8 = document.querySelector("#TejidosA8").checked;
  let TejidosN9 = document.querySelector("#TejidosN9").checked;
  let TejidosA9 = document.querySelector("#TejidosA9").checked;
  let TejidosN10 = document.querySelector("#TejidosN10").checked;
  let TejidosA10 = document.querySelector("#TejidosA10").checked;
  let TejidosN11 = document.querySelector("#TejidosN11").checked;
  let TejidosA11 = document.querySelector("#TejidosA11").checked;
  let TejidosN12 = document.querySelector("#TejidosN12").checked;
  let TejidosA12 = document.querySelector("#TejidosA12").checked;
  let TejidosN13 = document.querySelector("#TejidosN13").checked;
  let TejidosA13 = document.querySelector("#TejidosA13").checked;
  let AtmN1 = document.querySelector("#AtmN1").checked;
  let AtmA1 = document.querySelector("#AtmA1").checked;
  let AtmN2 = document.querySelector("#AtmN2").checked;
  let AtmA2 = document.querySelector("#AtmA2").checked;
  let AtmN3 = document.querySelector("#AtmN3").checked;
  let AtmA3 = document.querySelector("#AtmA3").checked;
  let AtmN4 = document.querySelector("#AtmN4").checked;
  let AtmA4 = document.querySelector("#AtmA4").checked;
  let AtmN5 = document.querySelector("#AtmN5").checked;
  let AtmA5 = document.querySelector("#AtmA5").checked;
  let AtmN6 = document.querySelector("#AtmN6").checked;
  let AtmA6 = document.querySelector("#AtmA6").checked;
  let AtmN7 = document.querySelector("#AtmN7").checked;
  let AtmA7 = document.querySelector("#AtmA7").checked;
  let exa_obs = document.getElementById("exa_obs").value;
  let d1 = document.getElementById("d1").src.substr(48);
  let d2 = document.getElementById("d2").src.substr(48);
  let d3 = document.getElementById("d3").src.substr(48);
  let d4 = document.getElementById("d4").src.substr(48);
  let d5 = document.getElementById("d5").src.substr(48);
  let d6 = document.getElementById("d6").src.substr(48);
  let d7 = document.getElementById("d7").src.substr(48);
  let d8 = document.getElementById("d8").src.substr(48);
  let d9 = document.getElementById("d9").src.substr(48);
  let d10 = document.getElementById("d10").src.substr(48);
  let d11 = document.getElementById("d11").src.substr(48);
  let d12 = document.getElementById("d12").src.substr(48);
  let d13 = document.getElementById("d13").src.substr(48);
  let d14 = document.getElementById("d14").src.substr(48);
  let d15 = document.getElementById("d15").src.substr(48);
  let d16 = document.getElementById("d16").src.substr(48);
  let d17 = document.getElementById("d17").src.substr(48);
  let d18 = document.getElementById("d18").src.substr(48);
  let d19 = document.getElementById("d19").src.substr(48);
  let d20 = document.getElementById("d20").src.substr(48);
  let d21 = document.getElementById("d21").src.substr(48);
  let d22 = document.getElementById("d22").src.substr(48);
  let d23 = document.getElementById("d23").src.substr(48);
  let d24 = document.getElementById("d24").src.substr(48);
  let d25 = document.getElementById("d25").src.substr(48);
  let d26 = document.getElementById("d26").src.substr(48);
  let d27 = document.getElementById("d27").src.substr(48);
  let d28 = document.getElementById("d28").src.substr(48);
  let d29 = document.getElementById("d29").src.substr(48);
  let d30 = document.getElementById("d30").src.substr(48);
  let d31 = document.getElementById("d31").src.substr(48);
  let d32 = document.getElementById("d32").src.substr(48);
  let d33 = document.getElementById("d33").src.substr(48);
  let d34 = document.getElementById("d34").src.substr(48);
  let d35 = document.getElementById("d35").src.substr(48);
  let d36 = document.getElementById("d36").src.substr(48);
  let d37 = document.getElementById("d37").src.substr(48);
  let d38 = document.getElementById("d38").src.substr(48);
  let d39 = document.getElementById("d39").src.substr(48);
  let d40 = document.getElementById("d40").src.substr(48);
  let d41 = document.getElementById("d41").src.substr(48);
  let d42 = document.getElementById("d42").src.substr(48);
  let d43 = document.getElementById("d43").src.substr(48);
  let d44 = document.getElementById("d44").src.substr(48);
  let d45 = document.getElementById("d45").src.substr(48);
  let d46 = document.getElementById("d46").src.substr(48);
  let d47 = document.getElementById("d47").src.substr(48);
  let d48 = document.getElementById("d48").src.substr(48);
  let d49 = document.getElementById("d49").src.substr(48);
  let d50 = document.getElementById("d50").src.substr(48);
  let d51 = document.getElementById("d51").src.substr(48);
  let d52 = document.getElementById("d52").src.substr(48);
  let dd1 = document.getElementById("dd1").src.substr(48);
  let dd2 = document.getElementById("dd2").src.substr(48);
  let dd3 = document.getElementById("dd3").src.substr(48);
  let dd4 = document.getElementById("dd4").src.substr(48);
  let dd5 = document.getElementById("dd5").src.substr(48);
  let dd6 = document.getElementById("dd6").src.substr(48);
  let dd7 = document.getElementById("dd7").src.substr(48);
  let dd8 = document.getElementById("dd8").src.substr(48);
  let dd9 = document.getElementById("dd9").src.substr(48);
  let dd10 = document.getElementById("dd10").src.substr(48);
  let dd11 = document.getElementById("dd11").src.substr(48);
  let dd12 = document.getElementById("dd12").src.substr(48);
  let dd13 = document.getElementById("dd13").src.substr(48);
  let dd14 = document.getElementById("dd14").src.substr(48);
  let dd15 = document.getElementById("dd15").src.substr(48);
  let dd16 = document.getElementById("dd16").src.substr(48);
  let dd17 = document.getElementById("dd17").src.substr(48);
  let dd18 = document.getElementById("dd18").src.substr(48);
  let dd19 = document.getElementById("dd19").src.substr(48);
  let dd20 = document.getElementById("dd20").src.substr(48);
  let dd21 = document.getElementById("dd21").src.substr(48);
  let dd22 = document.getElementById("dd22").src.substr(48);
  let dd23 = document.getElementById("dd23").src.substr(48);
  let dd24 = document.getElementById("dd24").src.substr(48);
  let dd25 = document.getElementById("dd25").src.substr(48);
  let dd26 = document.getElementById("dd26").src.substr(48);
  let dd27 = document.getElementById("dd27").src.substr(48);
  let dd28 = document.getElementById("dd28").src.substr(48);
  let dd29 = document.getElementById("dd29").src.substr(48);
  let dd30 = document.getElementById("dd30").src.substr(48);
  let dd31 = document.getElementById("dd31").src.substr(48);
  let dd32 = document.getElementById("dd32").src.substr(48);
  let dd33 = document.getElementById("dd33").src.substr(48);
  let dd34 = document.getElementById("dd34").src.substr(48);
  let dd35 = document.getElementById("dd35").src.substr(48);
  let dd36 = document.getElementById("dd36").src.substr(48);
  let dd37 = document.getElementById("dd37").src.substr(48);
  let dd38 = document.getElementById("dd38").src.substr(48);
  let dd39 = document.getElementById("dd39").src.substr(48);
  let dd40 = document.getElementById("dd40").src.substr(48);
  let dd41 = document.getElementById("dd41").src.substr(48);
  let dd42 = document.getElementById("dd42").src.substr(48);
  let dd43 = document.getElementById("dd43").src.substr(48);
  let dd44 = document.getElementById("dd44").src.substr(48);
  let dd45 = document.getElementById("dd45").src.substr(48);
  let dd46 = document.getElementById("dd46").src.substr(48);
  let dd47 = document.getElementById("dd47").src.substr(48);
  let dd48 = document.getElementById("dd48").src.substr(48);
  let dd49 = document.getElementById("dd49").src.substr(48);
  let dd50 = document.getElementById("dd50").src.substr(48);
  let dd51 = document.getElementById("dd51").src.substr(48);
  let dd52 = document.getElementById("dd52").src.substr(48);
  //let Tratamiento = document.getElementById("Tratamiento").value;
  let AccioPreveSI1 = document.querySelector("#AccioPreveSI1").checked;
  let AccioPreveFre1 = document.getElementById("AccioPreveFre1").value;
  let AccioPreveSI2 = document.querySelector("#AccioPreveSI2").checked;
  let AccioPreveFre2 = document.getElementById("AccioPreveFre2").value;
  let AccioPreveSI3 = document.querySelector("#AccioPreveSI3").checked;
  let AccioPreveFre3 = document.getElementById("AccioPreveFre3").value;
  let AccioPreveSI4 = document.querySelector("#AccioPreveSI4").checked;
  let AccioPreveFre4 = document.getElementById("AccioPreveFre4").value;
  let AccioPreveSI5 = document.querySelector("#AccioPreveSI5").checked;
  let AccioPreveFre5 = document.getElementById("AccioPreveFre5").value;
  let AccioPreveSI6 = document.querySelector("#AccioPreveSI6").checked;
  let AccioPreveFre6 = document.getElementById("AccioPreveFre6").value;
  let exam2 = document.getElementById("intrad").value;
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
  let Prono5 = document.getElementById("Prono5").value;
  let Diag6 = document.getElementById("Diag6").value;
  let Prono6 = document.getElementById("Prono6").value;
  let Diag7 = document.getElementById("Diag7").value;
  let Prono7 = document.getElementById("Prono7").value;
  let dia_obs = document.getElementById("dia_obs").value;
  let PlanTra1 = document.getElementById("PlanTra1").value;
  let PlanTra2 = document.getElementById("PlanTra2").value;
  let PlanTra3 = document.getElementById("PlanTra3").value;
  let PlanTra4 = document.getElementById("PlanTra4").value;
  let PlanTra5 = document.getElementById("PlanTra5").value;
  let PlanTra6 = document.getElementById("PlanTra6").value;
  let PlanTra7 = document.getElementById("PlanTra7").value;
  var frmDatas = new FormData();
  frmDatas.append("exa1", $("input[name=intra]")[0].files[0]);
  frmDatas.append("exa2", exam2);
  frmDatas.append("exa3", RadioExtraO1);
  frmDatas.append("exa4", RadioExtraO2);
  frmDatas.append("exa5", RadioExtraO3);
  frmDatas.append("exa6", RadioExtraO4);
  frmDatas.append("exa7", RadioExtraO5);
  frmDatas.append("exa8", RadioExtraO6);
  frmDatas.append("exa9", RadioExtraO7);
  frmDatas.append("exa10", RadioExtraO8);
  frmDatas.append("exa11", ExamenesComple);
  frmDatas.append("ptr1", PlanTra1);
  frmDatas.append("ptr2", PlanTra2);
  frmDatas.append("ptr3", PlanTra3);
  frmDatas.append("ptr4", PlanTra4);
  frmDatas.append("ptr5", PlanTra5);
  frmDatas.append("ptr6", PlanTra6);
  frmDatas.append("ptr7", PlanTra7);
  frmDatas.append("da1", Diag1);
  frmDatas.append("da2", Diag2);
  frmDatas.append("da3", Diag3);
  frmDatas.append("da4", Diag4);
  frmDatas.append("da5", Diag5);
  frmDatas.append("da6", Diag6);
  frmDatas.append("da7", Diag7);
  frmDatas.append("da8", Prono1);
  frmDatas.append("da9", Prono2);
  frmDatas.append("da10", Prono3);
  frmDatas.append("da11", Prono4);
  frmDatas.append("da12", Prono5);
  frmDatas.append("da13", Prono6);
  frmDatas.append("da14", Prono7);
  frmDatas.append("da15", dia_obs);
  frmDatas.append("ha1", AccioPreveSI1);
  frmDatas.append("ha2", AccioPreveSI2);
  frmDatas.append("ha3", AccioPreveSI3);
  frmDatas.append("ha4", AccioPreveSI4);
  frmDatas.append("ha5", AccioPreveSI5);
  frmDatas.append("ha6", AccioPreveSI6);
  frmDatas.append("ha7", AccioPreveFre1);
  frmDatas.append("ha8", AccioPreveFre2);
  frmDatas.append("ha9", AccioPreveFre3);
  frmDatas.append("ha10", AccioPreveFre4);
  frmDatas.append("ha11", AccioPreveFre5);
  frmDatas.append("ha12", AccioPreveFre6);
  frmDatas.append("tn1", TejidosN1);
  frmDatas.append("tn2", TejidosN2);
  frmDatas.append("tn3", TejidosN3);
  frmDatas.append("tn4", TejidosN4);
  frmDatas.append("tn5", TejidosN5);
  frmDatas.append("tn6", TejidosN6);
  frmDatas.append("tn7", TejidosN7);
  frmDatas.append("tn8", TejidosN8);
  frmDatas.append("tn9", TejidosN9);
  frmDatas.append("tn10", TejidosN10);
  frmDatas.append("tn11", TejidosN11);
  frmDatas.append("tn12", TejidosN12);
  frmDatas.append("tn13", TejidosN13);
  frmDatas.append("t1a", TejidosA1);
  frmDatas.append("t2a", TejidosA2);
  frmDatas.append("t3a", TejidosA3);
  frmDatas.append("t4a", TejidosA4);
  frmDatas.append("t5a", TejidosA5);
  frmDatas.append("t6a", TejidosA6);
  frmDatas.append("t7a", TejidosA7);
  frmDatas.append("t8a", TejidosA8);
  frmDatas.append("t9a", TejidosA9);
  frmDatas.append("t10a", TejidosA10);
  frmDatas.append("t11a", TejidosA11);
  frmDatas.append("t12a", TejidosA12);
  frmDatas.append("t13a", TejidosA13);
  frmDatas.append("at1", AtmN1);
  frmDatas.append("at2", AtmN2);
  frmDatas.append("at3", AtmN3);
  frmDatas.append("at4", AtmN4);
  frmDatas.append("at5", AtmN5);
  frmDatas.append("at6", AtmN6);
  frmDatas.append("at7", AtmN7);
  frmDatas.append("at1a", AtmA1);
  frmDatas.append("at2a", AtmA2);
  frmDatas.append("at3a", AtmA3);
  frmDatas.append("at4a", AtmA4);
  frmDatas.append("at5a", AtmA5);
  frmDatas.append("at6a", AtmA6);
  frmDatas.append("at7a", AtmA7);
  frmDatas.append("exa_obs", exa_obs);
  frmDatas.append("en1", en1);
  frmDatas.append("en2", en2);
  frmDatas.append("en3", en3);
  frmDatas.append("en4", en4);
  frmDatas.append("en5", en5);
  frmDatas.append("en6", en6);
  frmDatas.append("en7", en7);
  frmDatas.append("en8", en8);
  frmDatas.append("en9", en9);
  frmDatas.append("en10", en10);
  frmDatas.append("en11", en11);
  frmDatas.append("en12", en12);
  frmDatas.append("en_obs", en_obs);
  frmDatas.append("d1", d1);
  frmDatas.append("d2", d2);
  frmDatas.append("d3", d3);
  frmDatas.append("d4", d4);
  frmDatas.append("d5", d5);
  frmDatas.append("d6", d6);
  frmDatas.append("d7", d7);
  frmDatas.append("d8", d8);
  frmDatas.append("d9", d9);
  frmDatas.append("d10", d10);
  frmDatas.append("d11", d11);
  frmDatas.append("d12", d12);
  frmDatas.append("d13", d13);
  frmDatas.append("d14", d14);
  frmDatas.append("d15", d15);
  frmDatas.append("d16", d16);
  frmDatas.append("d17", d17);
  frmDatas.append("d18", d18);
  frmDatas.append("d19", d19);
  frmDatas.append("d20", d20);
  frmDatas.append("d21", d21);
  frmDatas.append("d22", d22);
  frmDatas.append("d23", d23);
  frmDatas.append("d24", d24);
  frmDatas.append("d25", d25);
  frmDatas.append("d26", d26);
  frmDatas.append("d27", d27);
  frmDatas.append("d28", d28);
  frmDatas.append("d29", d29);
  frmDatas.append("d30", d30);
  frmDatas.append("d31", d31);
  frmDatas.append("d32", d32);
  frmDatas.append("d33", d33);
  frmDatas.append("d34", d34);
  frmDatas.append("d35", d35);
  frmDatas.append("d36", d36);
  frmDatas.append("d37", d37);
  frmDatas.append("d38", d38);
  frmDatas.append("d39", d39);
  frmDatas.append("d40", d40);
  frmDatas.append("d41", d41);
  frmDatas.append("d42", d42);
  frmDatas.append("d43", d43);
  frmDatas.append("d44", d44);
  frmDatas.append("d45", d45);
  frmDatas.append("d46", d46);
  frmDatas.append("d47", d47);
  frmDatas.append("d48", d48);
  frmDatas.append("d49", d49);
  frmDatas.append("d50", d50);
  frmDatas.append("d51", d51);
  frmDatas.append("d52", d52);
  frmDatas.append("dd1", dd1);
  frmDatas.append("dd2", dd2);
  frmDatas.append("dd3", dd3);
  frmDatas.append("dd4", dd4);
  frmDatas.append("dd5", dd5);
  frmDatas.append("dd6", dd6);
  frmDatas.append("dd7", dd7);
  frmDatas.append("dd8", dd8);
  frmDatas.append("dd9", dd9);
  frmDatas.append("dd10", dd10);
  frmDatas.append("dd11", dd11);
  frmDatas.append("dd12", dd12);
  frmDatas.append("dd13", dd13);
  frmDatas.append("dd14", dd14);
  frmDatas.append("dd15", dd15);
  frmDatas.append("dd16", dd16);
  frmDatas.append("dd17", dd17);
  frmDatas.append("dd18", dd18);
  frmDatas.append("dd19", dd19);
  frmDatas.append("dd20", dd20);
  frmDatas.append("dd21", dd21);
  frmDatas.append("dd22", dd22);
  frmDatas.append("dd23", dd23);
  frmDatas.append("dd24", dd24);
  frmDatas.append("dd25", dd25);
  frmDatas.append("dd26", dd26);
  frmDatas.append("dd27", dd27);
  frmDatas.append("dd28", dd28);
  frmDatas.append("dd29", dd29);
  frmDatas.append("dd30", dd30);
  frmDatas.append("dd31", dd31);
  frmDatas.append("dd32", dd32);
  frmDatas.append("dd33", dd33);
  frmDatas.append("dd34", dd34);
  frmDatas.append("dd35", dd35);
  frmDatas.append("dd36", dd36);
  frmDatas.append("dd37", dd37);
  frmDatas.append("dd38", dd38);
  frmDatas.append("dd39", dd39);
  frmDatas.append("dd40", dd40);
  frmDatas.append("dd41", dd41);
  frmDatas.append("dd42", dd42);
  frmDatas.append("dd43", dd43);
  frmDatas.append("dd44", dd44);
  frmDatas.append("dd45", dd45);
  frmDatas.append("dd46", dd46);
  frmDatas.append("dd47", dd47);
  frmDatas.append("dd48", dd48);
  frmDatas.append("dd49", dd49);
  frmDatas.append("dd50", dd50);
  frmDatas.append("dd51", dd51);
  frmDatas.append("dd52", dd52);
  frmDatas.append("ObservaAntece", ObservaAntece);
  frmDatas.append("TiposAnte1", TiposAnte1);
  frmDatas.append("TiposAnte2", TiposAnte2);
  frmDatas.append("TiposAnte3", TiposAnte3);
  frmDatas.append("TiposAnte4", TiposAnte4);
  frmDatas.append("TiposAnte5", TiposAnte5);
  frmDatas.append("TiposAnte6", TiposAnte6);
  frmDatas.append("TiposAnte7", TiposAnte7);
  frmDatas.append("TiposAnte8", TiposAnte8);
  frmDatas.append("TiposAnte9", TiposAnte9);
  frmDatas.append("TiposAnte10", TiposAnte10);
  frmDatas.append("TiposAnte11", TiposAnte11);
  frmDatas.append("TiposAnte12", TiposAnte12);
  frmDatas.append("TiposAnte13", TiposAnte13);
  frmDatas.append("TiposAnte14", TiposAnte14);
  frmDatas.append("TiposAnte15", TiposAnte15);
  frmDatas.append("TiposAnte16", TiposAnte16);
  frmDatas.append("TiposAnte17", TiposAnte17);
  frmDatas.append("TiposAnte18", TiposAnte18);
  frmDatas.append("TiposAnte19", TiposAnte19);
  frmDatas.append("TiposAnte20", TiposAnte20);
  frmDatas.append("TiposAnte21", TiposAnte21);
  frmDatas.append("MoConsulta", MoConsulta);
  frmDatas.append("EnfeActuales", EnfeActuales);
  frmDatas.append("Motivo", Motivo);
  frmDatas.append("FechaMo", FechaMo);
  frmDatas.append("NomAcompa", NomAcompa);
  frmDatas.append("TeleAcompa", TeleAcompa);
  frmDatas.append("Vih", Vih);
  frmDatas.append("DiagVIH", DiagVIH);
  frmDatas.append("FechaVIH", FechaVIH);
  frmDatas.append("NumHist", NumHist);
  frmDatas.append("Estatura", Estatura);
  frmDatas.append("Temp", Temp);
  frmDatas.append("Pulso", Pulso);
  frmDatas.append("Peso", Peso);
  frmDatas.append("TenArte", TenArte);
  frmDatas.append("FrecuRespi", FrecuRespi);

  /* $.ajax({
    type: "POST",
    url: "../ajax/historia.ajax.php",
    data: {
      ptr1: PlanTra1,
      ptr2: PlanTra2,
      ptr3: PlanTra3,
      ptr4: PlanTra4,
      ptr5: PlanTra5,
      ptr6: PlanTra6,
      ptr7: PlanTra7,
      da1: Diag1,
      da2: Diag2,
      da3: Diag3,
      da4: Diag4,
      da5: Diag5,
      da6: Diag6,
      da7: Diag7,
      da8: Prono1,
      da9: Prono2,
      da10: Prono3,
      da11: Prono4,
      da12: Prono5,
      da13: Prono6,
      da14: Prono7,
      da15: dia_obs,
      ha1: AccioPreveSI1,
      ha2: AccioPreveSI2,
      ha3: AccioPreveSI3,
      ha4: AccioPreveSI4,
      ha5: AccioPreveSI5,
      ha6: AccioPreveSI6,
      ha7: AccioPreveFre1,
      ha8: AccioPreveFre2,
      ha9: AccioPreveFre3,
      ha10: AccioPreveFre4,
      ha11: AccioPreveFre5,
      ha12: AccioPreveFre6,
      tn1: TejidosN1,
      tn2: TejidosN2,
      tn3: TejidosN3,
      tn4: TejidosN4,
      tn5: TejidosN5,
      tn6: TejidosN6,
      tn7: TejidosN7,
      tn8: TejidosN8,
      tn9: TejidosN9,
      tn10: TejidosN10,
      tn11: TejidosN11,
      tn12: TejidosN12,
      tn13: TejidosN13,
      t1a: TejidosA1,
      t2a: TejidosA2,
      t3a: TejidosA3,
      t4a: TejidosA4,
      t5a: TejidosA5,
      t6a: TejidosA6,
      t7a: TejidosA7,
      t8a: TejidosA8,
      t9a: TejidosA9,
      t10a: TejidosA10,
      t11a: TejidosA11,
      t12a: TejidosA12,
      t13a: TejidosA13,
      at1: AtmN1,
      at2: AtmN2,
      at3: AtmN3,
      at4: AtmN4,
      at5: AtmN5,
      at6: AtmN6,
      at7: AtmN7,
      at1a: AtmA1,
      at2a: AtmA2,
      at3a: AtmA3,
      at4a: AtmA4,
      at5a: AtmA5,
      at6a: AtmA6,
      at7a: AtmA7,
      exa_obs: exa_obs,
      en1: en1,
      en2: en2,
      en3: en3,
      en4: en4,
      en5: en5,
      en6: en6,
      en7: en7,
      en8: en8,
      en9: en9,
      en10: en10,
      en11: en11,
      en12: en12,
      en_obs: en_obs,
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
      dd1: dd1,
      dd2: dd2,
      dd3: dd3,
      dd4: dd4,
      dd5: dd5,
      dd6: dd6,
      dd7: dd7,
      dd8: dd8,
      dd9: dd9,
      dd10: dd10,
      dd11: dd11,
      dd12: dd12,
      dd13: dd13,
      dd14: dd14,
      dd15: dd15,
      dd16: dd16,
      dd17: dd17,
      dd18: dd18,
      dd19: dd19,
      dd20: dd20,
      dd21: dd21,
      dd22: dd22,
      dd23: dd23,
      dd24: dd24,
      dd25: dd25,
      dd26: dd26,
      dd27: dd27,
      dd28: dd28,
      dd29: dd29,
      dd30: dd30,
      dd31: dd31,
      dd32: dd32,
      dd33: dd33,
      dd34: dd34,
      dd35: dd35,
      dd36: dd36,
      dd37: dd37,
      dd38: dd38,
      dd39: dd39,
      dd40: dd40,
      dd41: dd41,
      dd42: dd42,
      dd43: dd43,
      dd44: dd44,
      dd45: dd45,
      dd46: dd46,
      dd47: dd47,
      dd48: dd48,
      dd49: dd49,
      dd50: dd50,
      dd51: dd51,
      dd52: dd52,
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
  */
  $.ajax({
    url: "../ajax/historia.ajax.php",
    type: "POST",
    data: frmDatas,
    processData: false,
    contentType: false,
    cache: false,
    success: function (data) {
      var msg = data;
      if (msg == 1) {
        Swal.fire("Exito", "Historia Actualizada", "success").then(function () {
          location.reload();
        });
      } else {
        Swal.fire("Advertencia!", "No se realizo ningun cambio", "warning");
      }
    },
  });
});
