let vista=(event)=>{

    let leer_imagen= new FileReader();
    let id_imagen = document.getElementById('img-foto');
    let vista = document.getElementById("preview");
      vista.classList.add("show");
    leer_imagen.onload =()=>{
        if (leer_imagen.readyState ==2 ) {
            id_imagen.src = leer_imagen.result
        }
    }
    leer_imagen.readAsDataURL(event.target.files[0])
} 