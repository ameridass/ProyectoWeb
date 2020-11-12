const d = new vista();
console.log("SI RESPONDE METODO");
const p = document.getElementById('art');

cargarEventos();

function cargarEventos(){
    p.addEventListener('click', (e)=>{d.selccionarProducto(e)});
}