//variables para controlar displays
var mostrarP = document.getElementById('mostrarProductos');
var anadirP = document.getElementById('anadirProductos');
var borrarP = document.getElementById('borrarProductos');
var actualizarP = document.getElementById('actualizarProductos');

//Funcion para ocultar divs cada vez que doy click
function ocultarDivs(){
    mostrarP.style.display = "none";
    anadirP.style.display = "none";
    borrarP.style.display = "none";
    actualizarP.style.display = "none";
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