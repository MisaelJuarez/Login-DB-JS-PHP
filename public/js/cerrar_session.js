const cerrar_session = () => {
    fetch("app/controller/cerrar_sesion.php")
    .then(respuesta => respuesta.json())
    .then(async (respuesta) => {
        await Swal.fire({icon: "success",title:`${respuesta[1]}`});
        window.location = "login.php";
    });
}

document.getElementById('btn-cerrrar').addEventListener('click',() => {
    cerrar_session();
});
