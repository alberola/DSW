/*Mostrar datos para actualizar 
var valor = document.getElementById("productosActualizar");
valor.addEventListener("onclick", visualizarActualizar());
*/
function visualizarActualizar(){
    var valor = document.getElementById("productosActualizar");
    if (valor.value != "X"){
        document.getElementById("mostrarDatosActualizar").style.display = "block";
   

        var id = document.getElementById("productosActualizar").value;

        console.log(id);
        
        let direccion = "../admin/index.php";
        fetch(direccion,{
            method: 'POST',
            body: id
        })
            .then( res => res.json())
            .then( data => {
            } )
            .catch(error => console.log(error))
    }

}

