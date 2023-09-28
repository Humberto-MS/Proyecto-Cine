const mostrarModal = document.getElementById ( "mostrarModal" );

const modalBoletos = document.getElementById ( "modal-boletos" );
const modalAsientos = document.getElementById ( "modal-asientos" );
const modalPago = document.getElementById ( "modal-pago" );

const cerrarModal = document.getElementById ( "cerrarModal" );

// const continuar = document.getElementById ( "continuar" );
const continuarBoletos = document.getElementById ( "continuar-boletos" );
const continuarAsientos = document.getElementById ( "continuar-asientos" );
const finalizarPago = document.getElementById ( "finalizar-pago" );

const masBoletoAdulto = document.getElementById ( "boleto-adulto-mas" );
const menosBoletoAdulto = document.getElementById ( "boleto-adulto-menos" );

const masBoletoNiño = document.getElementById ( "boleto-niño-mas" );
const menosBoletoNiño = document.getElementById ( "boleto-niño-menos" );

const masBoletoTEdad = document.getElementById ( "boleto-tEdad-mas" );
const menosBoletoTEdad = document.getElementById ( "boleto-tEdad-menos" );

const total = document.getElementById ( "total" );

const boletosAdulto = document.getElementById ( "cantidad-boletos-adulto" );
const boletosNiño = document.getElementById ( "cantidad-boletos-niño" );
const boletosTEdad = document.getElementById ( "cantidad-boletos-tEdad" );
const boletosTotales = document.getElementById ( "cantidad-boletos" );

const contenedor = document.querySelector ( ".contenedor-asientos" );

let precioTotal = 0;
let cantBoletosAdulto = 0;
let cantBoletosNiño = 0;
let cantBoletosTEdad = 0;
let cantBoletosTotal = 0;

mostrarModal.addEventListener ( "click", () => {
    modalBoletos.style.display = "block";
} );

continuarBoletos.addEventListener ( "click", () => {
    modalBoletos.style.display = "none";
    modalAsientos.style.display = "block";
    boletosTotales.innerText = cantBoletosTotal;
} );

continuarAsientos.addEventListener ( "click", () => {
    modalAsientos.style.display = "none";
    modalPago.style.display = "block";
} );

finalizarPago.addEventListener ( "click", () => {
    modalPago.style.display = "none";
} );

// continuar.addEventListener ( "click", ( event ) => {
//     if ( event.target === modalBoletos ) {
//         modalBoletos.style.display = "none";
//         modalAsientos.style.display = "block";
//         boletosTotales.innerText = cantBoletosTotal;
//     }

//     if ( event.target === modalAsientos ) {
//         modalAsientos.style.display = "none";
//         modalPago.style.display = "block";
//     }

//     if ( event.target === modalPago ) modalPago.style.display = "none";
// } );

cerrarModal.addEventListener ( "click", () => {
    modalBoletos.style.display = "none";
    modalAsientos.style.display = "none";
    modalPago.style.display = "none";
} );

window.addEventListener ( "click", () => {
    modalBoletos.style.display = "none";
    modalAsientos.style.display = "none";
    modalPago.style.display = "none";
} );

masBoletoAdulto.addEventListener ( "click", () => {
    precioTotal += 75;    
    total.innerText = precioTotal;

    cantBoletosAdulto++;
    cantBoletosTotal++;
    boletosAdulto.innerText = cantBoletosAdulto;
} );

menosBoletoAdulto.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 75;        
        total.innerText = precioTotal;

        cantBoletosAdulto--;
        cantBoletosTotal--;
        boletosAdulto.innerText = cantBoletosAdulto;
    }    
} );

masBoletoNiño.addEventListener ( "click", () => {
    precioTotal += 60;
    total.innerText = precioTotal;

    cantBoletosNiño++;
    cantBoletosTotal++;
    boletosNiño.innerText = cantBoletosNiño;
} );

menosBoletoNiño.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 60;
        total.innerText = precioTotal;

        cantBoletosNiño--;
        cantBoletosTotal--;
        boletosNiño.innerText = cantBoletosNiño;
    }  
} );

masBoletoTEdad.addEventListener ( "click", () => {
    precioTotal += 60;
    total.innerText = precioTotal;

    cantBoletosTEdad++;
    cantBoletosTotal++;
    boletosTEdad.innerText = cantBoletosTEdad;
} );

menosBoletoTEdad.addEventListener ( "click", () => {
    if ( cantBoletos != 0 ) {
        precioTotal -= 60;
        total.innerText = precioTotal;

        cantBoletosTEdad--;
        cantBoletosTotal--;
        boletosTEdad.innerText = cantBoletosTEdad;
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