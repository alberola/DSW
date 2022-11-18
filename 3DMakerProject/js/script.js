//Mostrar datos para actualizar 
var valor = document.getElementById("productosActualizar");
valor.addEventListener("click", visualizarActualizar);
function visualizarActualizar(){
    if (valor.value != "X"){
        document.getElementById("mostrarDatosActualizar").style.display = "block";
    }
}