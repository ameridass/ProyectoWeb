
class carro{

    selccionarProducto(e){
        e.preventDefault();

                const producto = e.target.parentElement.parentElement;
                console.log(producto);
                this.mostrarDatos(producto);
    
    
    
    }

    mostrarDatos(producto){
console.log("MOSTRAR DATOS");
        const infoProducto ={
            imagen : producto.querySelector('img').src,
            precio : producto.querySelector('p').textContent
        }

        this.insertarCarrito(infoProducto);
        
        /*localStorage.setItem("imagenProducto", infoProducto.titulo);
            console.log(infoProducto.titulo);*/
        
        
        }

        insertarCarrito(articulo){
            console.log("MOSTRAR DATOS");
         

            localStorage.setItem("Articulo", JSON.stringify(articulo));
           
           

                /*const row = document.createElement('tr');
                row.innerHTML = `
                <td> <img src = "${articulo.imagen}"width =100 >
                </td>
                
                `;*/
                

        }




}