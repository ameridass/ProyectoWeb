
const d = new carro();
console.log("SI RESPONDE METODO");

const p = document.getElementById('camisa');
cargarEventos();

function cargarEventos(){
    p.addEventListener('click', (e)=>{d.selccionarProducto(e)});
}

