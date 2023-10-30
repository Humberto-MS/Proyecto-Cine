const mostrarModal = document.querySelectorAll ( ".mostrarModal" );
const cerrarModal = document.querySelectorAll ( ".cerrar" );

const modalBoletos = document.getElementById ( "modal-boletos" );
const modalAsientos = document.getElementById ( "modal-asientos" );
const modalPago = document.getElementById ( "modal-pago" );

const continuarBoletos = document.getElementById ( "continuar-boletos" );
const continuarAsientos = document.getElementById ( "continuar-asientos" );
const finalizarPago = document.getElementById ( "finalizar-pago" );

const regresar_asientos = document.getElementById ( "regresar-asientos" );
const regresar_pago = document.getElementById ( "regresar-pago" );

const masBoletoAdulto = document.getElementById ( "boleto-adulto-mas" );
const menosBoletoAdulto = document.getElementById ( "boleto-adulto-menos" );

const masBoletoNiño = document.getElementById ( "boleto-niño-mas" );
const menosBoletoNiño = document.getElementById ( "boleto-niño-menos" );

const masBoletoTEdad = document.getElementById ( "boleto-tEdad-mas" );
const menosBoletoTEdad = document.getElementById ( "boleto-tEdad-menos" );

const total = document.getElementById ( "total" );
const total2 = document.getElementById ( "total2" );
const total3 = document.getElementById ( "total3" );

const boletosAdulto = document.getElementById ( "cantidad-boletos-adulto" );
const boletosNiño = document.getElementById ( "cantidad-boletos-niño" );
const boletosTEdad = document.getElementById ( "cantidad-boletos-tEdad" );

const boletosTotales = document.getElementById ( "cantidad-boletos" );
const boletosTotales_pago = document.getElementById ( "cantidad-boletos-pago" );

const numeros_boletos = document.getElementById ( "numeros-boletos" );

const asientos = document.querySelectorAll ( ".fila .asiento" );
let asientos_select = [];

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
        total3.innerText = precioTotal;

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
    if ( asientos_select.length != 0 && asientos_select.length == cantBoletosTotal ) {
        modalAsientos.classList.remove ( "mostrar-modal" );
        modalPago.classList.add ( "mostrar-modal" );
        asientos_select.sort();
        boletosTotales_pago.innerText = cantBoletosTotal;
        numeros_boletos.innerText = asientos_select;
        total3.innerText = precioTotal;
    }    
} );

finalizarPago.addEventListener ( "click", () => {
    modalPago.classList.remove ( "mostrar-modal" );

    precioTotal = cantBoletosAdulto = cantBoletosNiño = cantBoletosTEdad = cantBoletosTotal = 0;
    boletosAdulto.innerText = cantBoletosAdulto;
    boletosNiño.innerText = cantBoletosNiño;
    boletosTEdad.innerText = cantBoletosTEdad;
    total.innerText = precioTotal;  
} );

regresar_asientos.addEventListener ( "click", () => {
    modalAsientos.classList.remove ( "mostrar-modal" );
    modalBoletos.classList.add ( "mostrar-modal" );
} );

regresar_pago.addEventListener ( "click", () => {
    modalPago.classList.remove ( "mostrar-modal" );
    modalAsientos.classList.add ( "mostrar-modal" );
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

asientos.forEach ( asiento => {
    asiento.addEventListener ( "click", () => {
        if ( !asiento.classList.contains ( "seleccionado" ) 
                && !asiento.classList.contains ( "ocupado" ) 
                && asientos_select.length < cantBoletosTotal ) 
        {
            asiento.classList.add ( "seleccionado" );
            asientos_select.push ( asiento.innerText );
        } else {
            asiento.classList.remove ( "seleccionado" );
            let num_asiento = asientos_select.find ( elemento => elemento == asiento.innerText );
            asientos_select = asientos_select.filter ( value => value != num_asiento );
        }   
    } );
} );
