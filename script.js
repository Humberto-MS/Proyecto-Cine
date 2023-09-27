const mostrarModal = document.getElementById ( "mostrarModal" );

const modalBoletos = document.getElementById ( "modal-boletos" );
const modalAsientos = document.getElementById ( "modal-asientos" );
const modalPago = document.getElementById ( "modal-pago" );

const cerrarModal = document.getElementById ( "cerrarModal" );

const continuar = document.getElementById ( "continuar" );
// const continuarBoletos = document.getElementById ( "continuar-boletos" );
// const continuarAsientos = document.getElementById ( "continuar-asientos" );
// const finalizarPago = document.getElementById ( "finalizar-pago" );

const masBoletoAdulto = document.getElementById ( "boleto-adulto-mas" );
const menosBoletoAdulto = document.getElementById ( "boleto-adulto-menos" );

const masBoletoNiño = document.getElementById ( "boleto-niño-mas" );
const menosBoletoNiño = document.getElementById ( "boleto-niño-menos" );

const masBoletoTEdad = document.getElementById ( "boleto-tEdad-mas" );
const menosBoletoTEdad = document.getElementById ( "boleto-tEdad-menos" );

const total = document.getElementById ( "total" );
const boletos = document.getElementById ( "cantidad-boletos" );

const contenedor = document.querySelector ( ".contenedor-asientos" );

let precioTotal = 0;
let cantBoletos = 0;

mostrarModal.addEventListener ( "click", () => {
    modalBoletos.style.display = "block";
} );

continuar.addEventListener ( "click", ( event ) => {
    if ( event.target === modalBoletos ) {
        modalBoletos.style.display = "none";
        modalAsientos.style.display = "block";
    }

    if ( event.target === modalAsientos ) {
        modalAsientos.style.display = "none";
        modalPago.style.display = "block";
    }

    if ( event.target === modalPago ) modalPago.style.display = "none";
} );

cerrarModal.addEventListener ( "click", ( event ) => {
    if ( event.target === modalBoletos ) modalBoletos.style.display = "none";
    if ( event.target === modalAsientos ) modalAsientos.style.display = "none";
    if ( event.target === modalPago ) modalPago.style.display = "none";
} );

window.addEventListener ( "click", ( event ) => {
    if ( event.target === modalBoletos ) modalBoletos.style.display = "none";
    if ( event.target === modalAsientos ) modalAsientos.style.display = "none";
    if ( event.target === modalPago ) modalPago.style.display = "none";
} );

masBoletoAdulto.addEventListener ( "click", () => {
    precioTotal += 75;
    cantBoletos++;
    total.innerText = precioTotal;
} );

menosBoletoAdulto.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 75;
        cantBoletos--;
        total.innerText = precioTotal;
    }    
} );

masBoletoNiño.addEventListener ( "click", () => {
    precioTotal += 60;
    cantBoletos++;
    total.innerText = precioTotal;
} );

menosBoletoNiño.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 60;
        cantBoletos--;
        total.innerText = precioTotal;
    }  
} );

masBoletoTEdad.addEventListener ( "click", () => {
    precioTotal += 60;
    cantBoletos++;
    total.innerText = precioTotal;
} );

menosBoletoTEdad.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 60;
        cantBoletos--;
        total.innerText = precioTotal;
    }  
} );

contenedor.addEventListener ( "click", ( event ) => {
    if ( event.target.classList.contains ( "asiento" ) && !event.target.classList.contains ( "ocupado" ) ) {
        event.target.classList.toggle ( "seleccionado" );        
    }

    if ( event.target.classList.contains ( "asiento" ) && event.target.classList.contains ( "seleccionado" ) ) {
        event.target.classList.remove ( "seleccionado" );
    }    
} );

total.innerText = precioTotal;
boletos.innerText = cantBoletos;