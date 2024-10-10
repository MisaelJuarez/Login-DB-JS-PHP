const cerrar_session = () => {
    fetch("app/controller/cerrar_sesion.php")
    .then(respuesta => respuesta.json())
    .then(async (respuesta) => {
        await Swal.fire({icon: "success",title:`${respuesta[1]}`});
        window.location = "login.php";
    });
}

const obtener_informacion = () => {
    fetch("app/controller/informacion_usuario.php")
    .then(respuesta => respuesta.json())
    .then((respuesta) => {
        document.getElementById('nombre').value = respuesta['nombre'];
        document.getElementById('apellido').value = respuesta['apellido'];
        document.getElementById('email').value = respuesta['email'];
        document.getElementById('pass').value = respuesta['pass'];
    });
}

const actualizar_informacion = () => {
    let nombre = document.getElementById('nombre').value;
    let apellido = document.getElementById('apellido').value;
    let email = document.getElementById('email').value;
    let pass = document.getElementById('pass').value;

    let data = new FormData();
    data.append('nombre',nombre);
    data.append('apellido',apellido);
    data.append('email',email);
    data.append('pass',pass);

    fetch("app/controller/actualizar_info_usuario.php",{
        method:"POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`});
            window.location="index.php";
        } else if(respuesta[0] == "cerrar") {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`, text: `${respuesta[2]}`});
            cerrar_session();
        } else {
            Swal.fire({icon: "error",title:`${respuesta[1]}`});
        }
    })
}

document.addEventListener('DOMContentLoaded',() => {
    obtener_informacion();
});

document.getElementById('btn-actualizar').addEventListener('click',() => {
    actualizar_informacion();
});