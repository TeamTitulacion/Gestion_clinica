$(document).ready(function () {
  $(document).on("click", "#2", function () {
    document.getElementById("opciones").innerHTML = "";
	document.getElementById("opciones1").innerHTML = "";
    var opciones =
      '<a><img class="btn btn-default diente" id="2-1" src="' +
      base_url +
      '/assets/dientes/2-1.png" alt=""></a><a><img class="btn btn-default diente" id="2-2" src="' +
      base_url +
      '/assets/dientes/2-2.png" alt=""></a><a><img class="btn btn-default diente" id="2-3" src="' +
      base_url +
      '/assets/dientes/2-3.png" alt=""></a><a><img class="btn btn-default diente" id="2-4" src="' +
      base_url +
      '/assets/dientes/2-4.png" alt=""></a>';
    $("#opciones").append(opciones);
	$("#opciones1").append(opciones);
	let diente = document.querySelectorAll(".diente").forEach((el) => {
		el.addEventListener("click", (e) => {
		  const id1 = e.target.getAttribute("id");
		  let src
		  const nuevaid = parseInt(id);
		  switch (id1) {
			case "1":
			  src = base_url + "/assets/dientes/1.png";
			  break;
			case "2-1":
			  src = base_url + "/assets/dientes/2-1.png";
			  break;
			case "2-2":
			  src = base_url + "/assets/dientes/2-2.png";
			  break;
			case "2-3":
			  src = base_url + "/assets/dientes/2-3.png";
			  break;
			case "2-4":
			  src = base_url + "/assets/dientes/2-4.png";
			  break;
			case "3-1":
			  src = base_url + "/assets/dientes/3-1.png";
			  break;
			case "3-2":
			  src = base_url + "/assets/dientes/3-2.png";
			  break;
			case "3-3":
			  src = base_url + "/assets/dientes/3-3.png";
			  break;
			case "3-4":
			  src = base_url + "/assets/dientes/3-4.png";
			  break;
			  case "4":
			  src = base_url + "/assets/dientes/4.png";
			  break;
			case "5":
			  src = base_url + "/assets/dientes/5.png";
			  break;
			case "6":
			  src = base_url + "/assets/dientes/6.png";
			  break;
			case "7":
			  src = base_url + "/assets/dientes/7.png";
			  break;
			case "8":
			  src = base_url + "/assets/dientes/8.png";
			  break;
			case "9":
			  src = base_url + "/assets/dientes/9.png";
			  break;
			case "10":
			  src = base_url + "/assets/dientes/10.png";
			  break;
			case "11":
			  src = base_url + "/assets/dientes/11.png";
			  break;
			case "12":
			  src = base_url + "/assets/dientes/12.png";
			  break;
			case "13":
			  src = base_url + "/assets/dientes/13.png";
			  break;
		  }
		  console.log(src+" XD "+id1);
		  let a = document.querySelectorAll(".odonto").forEach((el) => {
			el.addEventListener("click", (e) => {
			  const id = e.target.getAttribute("id");
			  document.getElementById(id).src = src;
			});
		  });
		});
	  });
  });
  $(document).on("click", "#3", function () {
    document.getElementById("opciones").innerHTML = "";
	document.getElementById("opciones1").innerHTML = "";
    var opciones =
      '<a><img class="btn btn-default diente" id="3-1" src="' +
      base_url +
      '/assets/dientes/3-1.png" alt=""></a><a><img class="btn btn-default diente" id="3-2" src="' +
      base_url +
      '/assets/dientes/3-2.png" alt=""></a><a><img class="btn btn-default diente" id="3-3" src="' +
      base_url +
      '/assets/dientes/3-3.png" alt=""></a><a><img class="btn btn-default diente" id="3-4" src="' +
      base_url +
      '/assets/dientes/3-4.png" alt=""></a>';
    $("#opciones").append(opciones);
	$("#opciones1").append(opciones);
	let diente = document.querySelectorAll(".diente").forEach((el) => {
		el.addEventListener("click", (e) => {
		  const id1 = e.target.getAttribute("id");
		  let src
		  const nuevaid = parseInt(id);
		  switch (id1) {
			case "1":
			  src = base_url + "/assets/dientes/1.png";
			  break;
			case "2-1":
			  src = base_url + "/assets/dientes/2-1.png";
			  break;
			case "2-2":
			  src = base_url + "/assets/dientes/2-2.png";
			  break;
			case "2-3":
			  src = base_url + "/assets/dientes/2-3.png";
			  break;
			case "2-4":
			  src = base_url + "/assets/dientes/2-4.png";
			  break;
			case "3-1":
			  src = base_url + "/assets/dientes/3-1.png";
			  break;
			case "3-2":
			  src = base_url + "/assets/dientes/3-2.png";
			  break;
			case "3-3":
			  src = base_url + "/assets/dientes/3-3.png";
			  break;
			case "3-4":
			  src = base_url + "/assets/dientes/3-4.png";
			  break;
			  case "4":
			  src = base_url + "/assets/dientes/4.png";
			  break;
			case "5":
			  src = base_url + "/assets/dientes/5.png";
			  break;
			case "6":
			  src = base_url + "/assets/dientes/6.png";
			  break;
			case "7":
			  src = base_url + "/assets/dientes/7.png";
			  break;
			case "8":
			  src = base_url + "/assets/dientes/8.png";
			  break;
			case "9":
			  src = base_url + "/assets/dientes/9.png";
			  break;
			case "10":
			  src = base_url + "/assets/dientes/10.png";
			  break;
			case "11":
			  src = base_url + "/assets/dientes/11.png";
			  break;
			case "12":
			  src = base_url + "/assets/dientes/12.png";
			  break;
			case "13":
			  src = base_url + "/assets/dientes/13.png";
			  break;
		  }
		  console.log(src+" XD "+id1);
		  let a = document.querySelectorAll(".odonto").forEach((el) => {
			el.addEventListener("click", (e) => {
			  const id = e.target.getAttribute("id");
			  document.getElementById(id).src = src;
			});
		  });
		});
	  });
  });
 
  let diente = document.querySelectorAll(".diente").forEach((el) => {
    el.addEventListener("click", (e) => {
      const id1 = e.target.getAttribute("id");
	  let src
      const nuevaid = parseInt(id);
      switch (id1) {
        case "1":
          src = base_url + "/assets/dientes/1.png";
          break;
        case "2-1":
          src = base_url + "/assets/dientes/2-1.png";
          break;
        case "2-2":
          src = base_url + "/assets/dientes/2-2.png";
          break;
        case "2-3":
          src = base_url + "/assets/dientes/2-3.png";
          break;
        case "2-4":
          src = base_url + "/assets/dientes/2-4.png";
          break;
        case "3-1":
          src = base_url + "/assets/dientes/3-1.png";
          break;
        case "3-2":
          src = base_url + "/assets/dientes/3-2.png";
          break;
        case "3-3":
          src = base_url + "/assets/dientes/3-3.png";
          break;
        case "3-4":
          src = base_url + "/assets/dientes/3-4.png";
          break;
		  case "4":
          src = base_url + "/assets/dientes/4.png";
          break;
        case "5":
          src = base_url + "/assets/dientes/5.png";
          break;
        case "6":
          src = base_url + "/assets/dientes/6.png";
          break;
        case "7":
          src = base_url + "/assets/dientes/7.png";
          break;
        case "8":
          src = base_url + "/assets/dientes/8.png";
          break;
        case "9":
          src = base_url + "/assets/dientes/9.png";
          break;
        case "10":
          src = base_url + "/assets/dientes/10.png";
          break;
        case "11":
          src = base_url + "/assets/dientes/11.png";
          break;
        case "12":
          src = base_url + "/assets/dientes/12.png";
          break;
        case "13":
          src = base_url + "/assets/dientes/13.png";
          break;
      }
	  console.log(src+" XD "+id1);
      let a = document.querySelectorAll(".odonto").forEach((el) => {
        el.addEventListener("click", (e) => {
          const id = e.target.getAttribute("id");
          document.getElementById(id).src = src;
        });
      });
    });
  });
});
