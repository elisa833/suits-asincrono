//URL: dirreccion externa
//URI: direccion interna
const iniciar_sesion = () => {
    let email = document.getElementById('email-id').value;
    let pass = document.getElementById('pass-id').value;
    let data = new FormData();
    data.append("email",email); //añade datos al formulario
    data.append("pass",pass); //añade datos al formulario
    data.append("metodo","iniciar_sesion"); //añade datos al formulario
    fetch("app/controller/usuarios.php",{
        method:"POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`});
            window.location="index.php";
        }else {
            Swal.fire({icon: "error",title:`${respuesta[1]}`});
        }
    });
}

const registro = () => {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let email = document.getElementById('email').value;
    let pass = document.getElementById('pass').value;
    let data = new FormData();
    data.append("nombre",nombre); //añade datos al formulario
    data.append("apellido",apellido); //añade datos al formulario
    data.append("email",email); //añade datos al formulario
    data.append("pass",pass); //añade datos al formulario
    data.append("metodo","registro"); //añade datos al formulario
    fetch("app/controller/usuarios.php",{
        method:"POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`});
            window.location="login.php";
        }else {
            Swal.fire({icon: "error",title:`${respuesta[1]}`});
        }
    });
}

window.addEventListener('DOMContentLoaded',() => {
    //INICIAR SESION
    if (document.getElementById('btn-saludar')) {
        document.getElementById('btn-saludar').addEventListener('click',() => {
            iniciar_sesion();
        });                
    }
    //REGISTRO
    if (document.getElementById('btn-registrar')) {
        document.getElementById('btn-registrar').addEventListener('click',() => {
            registro();
        });        
    }
});

