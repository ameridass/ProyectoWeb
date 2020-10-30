var almacen = "";

function mostrarDatos(articulo) {
  const infoProducto = { imagen: articulo.querySelector("img").src };
  almacen = infoProducto.imagen;
}

addEventListener("click", function (e) {
  //e.preventDefault();
  let articulo = e.target.parentElement.parentElement;
  mostrarDatos(articulo);
  sessionStorage.setItem("URL", almacen);
  let nuevoArticulo = sessionStorage.getItem("URL")
  console.log(nuevoArticulo)
  document.getElementById("articulo").src = sessionStorage.getItem("URL");
});

/* var aux = document.getElementById("articulo");
console.log("hola")
console.log(aux) */
