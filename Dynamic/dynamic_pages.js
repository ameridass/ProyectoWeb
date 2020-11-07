var almacen = "";

function mostrarDatos(articulo) {
  const infoProducto = { imagen: articulo.querySelector("img").src };
  almacen = infoProducto.imagen;
}

addEventListener("click", function (e) {
  e.preventDefault();
  let articulo = e.target.parentElement.parentElement;
  mostrarDatos(articulo);
  sessionStorage.setItem("URL", almacen);
  let nuevoArticulo = sessionStorage.getItem("URL")
  console.log(nuevoArticulo)
  console.log(sessionStorage.getItem("URL"));
  var insersionArt = document.getElementById("articulo").onload
/*  insersionArt.innerHTML = "<a href=\"themes/images/ladies/1.jpg\" class=\"thumbnail\" data-fancybox-group=\"group1\" title=\"Description 1\"><img alt=\"\" src="+sessionStorage.getItem("URL")+"></a>"*/
});




insersionArt.innerHTML = "<a href=\"themes/images/ladies/1.jpg\" class=\"thumbnail\" data-fancybox-group=\"group1\" title=\"Description 1\"><img alt=\"\" src="+sessionStorage.getItem("URL")+"></a>"