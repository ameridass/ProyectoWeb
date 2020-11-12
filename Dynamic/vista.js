
class vista{

metodo(){

    console.log("Si responde Metodo");
}

    selccionarProducto(e){
        e.preventDefault();
        console.log("LocalStore1");
                const producto = e.target.parentElement.parentElement;
                console.log(producto);
               
                this.mostrarDatosLocalStore(producto);
    
    
    
    }

    mostrarDatosLocalStore(producto){
        console.log("LocalStore2");
        const infoProducto ={
            imagen: producto.querySelector('img').src
        }
        console.log("LocalStore");
        localStorage.setItem("Vistap", infoProducto.imagen);
        localStorage.setItem("user", "JNORIEGA");
  
        window.location ="product_detail.html";

    }



}