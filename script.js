const mostrarModal = document.querySelectorAll ( ".mostrarModal" );
const cerrarModal = document.querySelectorAll ( ".cerrar" );

const modalBoletos = document.getElementById ( "modal-boletos" );
const modalAsientos = document.getElementById ( "modal-asientos" );
const modalPago = document.getElementById ( "modal-pago" );

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
const total2 = document.getElementById ( "total2" );

const boletosAdulto = document.getElementById ( "cantidad-boletos-adulto" );
const boletosNiño = document.getElementById ( "cantidad-boletos-niño" );
const boletosTEdad = document.getElementById ( "cantidad-boletos-tEdad" );
const boletosTotales = document.getElementById ( "cantidad-boletos" );

// const contenedor = document.querySelector ( ".contenedor-asientos" );
const asientos = document.querySelectorAll ( ".asiento" );

let precioTotal = 0;
let cantBoletosAdulto = 0;
let cantBoletosNiño = 0;
let cantBoletosTEdad = 0;
let cantBoletosTotal = 0;

mostrarModal.forEach ( function ( boton ) {
    boton.addEventListener ( "click", () => {
        modalBoletos.classList.add ( "mostrar-modal" );
    } );
} );

cerrarModal.forEach ( function ( boton ) {
    boton.addEventListener ( "click", () => {
        precioTotal = cantBoletosAdulto = cantBoletosNiño = cantBoletosTEdad = cantBoletosTotal = 0;
        boletosAdulto.innerText = cantBoletosAdulto;
        boletosNiño.innerText = cantBoletosNiño;
        boletosTEdad.innerText = cantBoletosTEdad;
        total.innerText = precioTotal;
        total2.innerText = precioTotal;

        if ( modalBoletos.classList.contains ("mostrar-modal") ) {
            modalBoletos.classList.remove ( "mostrar-modal" );
        }
    
        if ( modalAsientos.classList.contains ("mostrar-modal") ) {
            modalAsientos.classList.remove ( "mostrar-modal" );
        }
    
        if ( modalPago.classList.contains ("mostrar-modal") ) {
            modalPago.classList.remove ( "mostrar-modal" );
        }
    } );
} );

continuarBoletos.addEventListener ( "click", () => {
    if ( cantBoletosTotal != 0 ) {
        modalBoletos.classList.remove ( "mostrar-modal" );
        modalAsientos.classList.add ( "mostrar-modal" );
        boletosTotales.innerText = cantBoletosTotal;
        total2.innerText = precioTotal;
    }    
} );

continuarAsientos.addEventListener ( "click", () => {
    modalAsientos.classList.remove ( "mostrar-modal" );
    modalPago.classList.add ( "mostrar-modal" );
} );

finalizarPago.addEventListener ( "click", () => {
    modalPago.classList.remove ( "mostrar-modal" );

    precioTotal = cantBoletosAdulto = cantBoletosNiño = cantBoletosTEdad = cantBoletosTotal = 0;
    boletosAdulto.innerText = cantBoletosAdulto;
    boletosNiño.innerText = cantBoletosNiño;
    boletosTEdad.innerText = cantBoletosTEdad;
    total.innerText = precioTotal;  
} );

masBoletoAdulto.addEventListener ( "click", () => {
    precioTotal += 75;    
    total.innerText = precioTotal;

    cantBoletosAdulto++;
    cantBoletosTotal++;
    boletosAdulto.innerText = cantBoletosAdulto;
} );

menosBoletoAdulto.addEventListener ( "click", () => {
    if ( cantBoletosTotal != 0 ) {
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
    if ( cantBoletosTotal != 0 ) {
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
    if ( cantBoletosTotal != 0 ) {
        precioTotal -= 60;
        total.innerText = precioTotal;

        cantBoletosTEdad--;
        cantBoletosTotal--;
        boletosTEdad.innerText = cantBoletosTEdad;
    }  
} );

asientos.forEach ( function ( asiento ) {
    asiento.addEventListener ( "click", () => {
        if ( !asiento.classList.contains ( "seleccionado" ) && !asiento.classList.contains ( "ocupado" ) ) {
            asiento.classList.add ( "seleccionado" );
        }

        if ( asiento.classList.contains ( "seleccionado" ) ) {
            asiento.classList.remove ( "seleccionado" );
        }
    } )
} );

// contenedor.addEventListener ( "click", ( event ) => {
//     if ( event.target.classList.contains ( "asiento" ) && !event.target.classList.contains ( "ocupado" ) ) {
//         event.target.classList.toggle ( "seleccionado" );        
//     }

//     if ( event.target.classList.contains ( "asiento" ) && event.target.classList.contains ( "seleccionado" ) ) {
//         event.target.classList.remove ( "seleccionado" );
//     }    
// } );
