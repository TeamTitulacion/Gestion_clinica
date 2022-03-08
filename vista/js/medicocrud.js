$(document).ready(function () {
    $('#frmRegistrar').submit(function (e) {
        e.preventDefault();
        const nombre =document.getElementById('nombre').value;
        const apellido =document.getElementById('apellido').value;
        const sexo =document.getElementById('sexo').value;
        const fecha =document.getElementById('fecha').value;
        const dir =document.getElementById('dir').value;
        const tele =document.getElementById('tele').value;
        const img =document.getElementById('img').value;
        const cat =document.getElementById('cat').value;
        const rol =document.getElementById('rol').value;
        const user =document.getElementById('user').value;
        const pass =document.getElementById('pass').value;
    
        if (nombre=="" || apellido=="" || sexo=="" || fecha=="" || dir=="" || tele=="" ||img=="" || cat==""|| rol=="" || user==""|| pass=="") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Todos los campos son necesarios',
               
              })
            
        } else {
            
        }
    }); 
});


    



