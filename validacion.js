// Error
const error = document.createElement('p');

// Admin
const form_pelicula = document.querySelector('#form-pelicula');
const form_cliente = document.querySelector('#form-cliente');
const form_contacto = document.querySelector('#form-contacto');
const form_registro = document.querySelector('#form-registro');

function validarPelicula() {
    const titulo_espanol = document.querySelector('#titulo_espanol').value;
    const titulo_ingles = document.querySelector('#titulo_ingles').value;
    const imagen = document.querySelector('#imagen').value;
    const sinopsis = document.querySelector('#sinopsis').value;
    const clasificacion = document.querySelector('#clasificacion').value;
    const genero = document.querySelector('#genero').value;
    const director = document.querySelector('#director').value;
    const reparto = document.querySelector('#reparto').value;
    const trailer = document.querySelector('#trailer').value;
    const asientos_disponibles = document.querySelector('#asientos_disponibles').value.toString();

    // RegEx
    const regExString = /^[A-Za-záéíóúÁÉÍÓÚñÑ, ]+$/;
    const regExNotNum = /^(?![0-9]+$)[A-Za-záéíóúÁÉÍÓÚñÑ0-9, ]+$/

    if (titulo_espanol === '' || titulo_ingles === '' || imagen === '' || sinopsis === '' || clasificacion === '' || genero === ''
        || director === '' || reparto === '' || trailer === '' || asientos_disponibles === '' ) {
        error.textContent = '*Rellene todos los campos de la Película';
        error.classList.add('msg-error');
        form_pelicula.appendChild(error);

        setTimeout(() => {
            error.remove();
        }, 5000);
        return false;

    } else if (!regExNotNum.test(sinopsis)) {
        document.querySelector('#sinopsis').style.border = "red solid 3px";

        setTimeout(() => {
            document.querySelector('#sinopsis').style.border = "#d9dde0 solid 1px";
            error.remove();
        }, 2000);

        return false;

    } else if (!regExString.test(reparto)) {
        document.querySelector('#reparto').style.border = "red solid 3px";

        setTimeout(() => {
            document.querySelector('#reparto').style.border = "#d9dde0 solid 1px";
            error.remove();
        }, 2000);

        return false;
    
    } else {
        return true;;
    }
}

function validarCliente() {
    const user = document.querySelector('#user').value;
    const pass = document.querySelector('#pass').value;
    const nombre = document.querySelector('#nombre').value;
    const apellido = document.querySelector('#apellido').value;
    const correo = document.querySelector('#correo').value;
    const telefono = document.querySelector('#telefono').value;

    if (user === '' || pass === '' || nombre === '' || apellido === '' || correo === '' || telefono === '') {
        error.textContent = "*Rellene todos los campos del Cliente"
        error.classList.add('msg-error');
        form_cliente.appendChild(error);

        setTimeout(() => {
            error.remove();
        }, 5000);
        return false;

    } else {
        return true;
    }
}

function validarContacto() {
    const nombre = document.querySelector('#nombre-c').value;
    const correo = document.querySelector('#correo-c').value;
    const telefono = document.querySelector('#telefono-c').value;
    const asunto = document.querySelector('#asunto').value;
    const mensaje = document.querySelector('#mensaje').value;

    const msg = document.querySelector('#contacto-p');

    if (nombre === '' || correo === '' || telefono === '' || telefono === '' || asunto === '' || mensaje === '') {
        error.textContent = "*Rellene todos los campos"
        error.classList.add('msg-error-contacto');
        msg.appendChild(error);

        setTimeout(() => {
            error.remove();
        }, 5000);
        return false;

    } else {
        return true;
    }
}

function validarRegistro() {
    const user = document.querySelector('#user').value;
    const pass = document.querySelector('#pass').value;
    const nombre = document.querySelector('#nombre').value;
    const apellido = document.querySelector('#apellido').value;
    const correo = document.querySelector('#correo').value;
    const telefono = document.querySelector('#telefono').value;

    const msg = document.querySelector('#msg-register');

    if (user === '' || pass === '' || nombre === '' || apellido === '' || correo === '' || telefono === '') {
        error.textContent = "*Rellene todos los campos"
        error.classList.add('msg-error-registro');
        msg.appendChild(error);

        setTimeout(() => {
            error.remove();
        }, 5000);
        return false;

    } else {
        return true;
    }
}