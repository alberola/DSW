//variables para controlar displays
var mostrarP = document.getElementById('mostrarProductos');
var anadirP = document.getElementById('anadirProductos');
var borrarP = document.getElementById('borrarProductos');
var actualizarP = document.getElementById('actualizarProductos');
var mostrarU = document.getElementById('mostrarUsuarios');
var anadirU = document.getElementById('insertarUsuarios');
var borrarU = document.getElementById('borrarUsuarios');
var actualizarU = document.getElementById('actualizarUsuarios');

//Funcion para ocultar divs cada vez que doy click
function ocultarDivs(){
    mostrarP.style.display = "none";
    anadirP.style.display = "none";
    borrarP.style.display = "none";
    actualizarP.style.display = "none";
    mostrarU.style.display = "none";
    anadirU.style.display = "none";
    borrarU.style.display = "none";
    actualizarU.style.display = "none";
}

//Funciones referidas a Productos
function mostrarProductosDiv(){
    ocultarDivs();
    mostrarP.style.display = "block";
}
function anadirProductosDiv(){
    ocultarDivs();
    anadirP.style.display = "block";
}
function borrarProductosDiv(){
    ocultarDivs();
    borrarP.style.display = "block";
}
function actualizarProductosDiv(){
    ocultarDivs();
    actualizarP.style.display = "block";
}

//Funciones referidas a Administradores

function mostrarUsuariosDiv(){
    ocultarDivs();
    mostrarU.style.display = "block";
}
function anadirUsuariosDiv(){
    ocultarDivs();
    anadirU.style.display = "block";
}
function borrarUsuariosDiv(){
    ocultarDivs();
    borrarU.style.display = "block";
}
function actualizarUsuariosDiv(){
    ocultarDivs();
    actualizarU.style.display = "block";
}