function validarCampos() {
  // Agrega tus condiciones de validación aquí
  const nombre = document.querySelector('#nombre').value;
  const apellido = document.querySelector('#apellido').value;
  const correo = document.querySelector('#correo').value;
  const telefono = document.querySelector('#telefono').value;

  if (nombre === '' || apellido === '' || correo === '' || telefono === '') {
    return false;
  } else {
    return true;
  }
}

const mensajeErrorDiv = document.querySelector('#mensaje-error');

function mostrarError(mensaje) {
  // Muestra el mensaje de error en el div correspondiente
  mensajeErrorDiv.textContent = mensaje;
}

var precioTotal = localStorage.getItem('precioTotal');
var totalUSD = parseFloat(precioTotal);
var totalMXM = totalUSD / 20;

paypal.Buttons ({
  createOrder: (data,actions) => {
    if (!validarCampos()) {
      // Si la validación falla, rechaza la creación de la orden y evita que se abra la ventana de pago
      mostrarError('*Rellene todos los campos antes de realizar el pago');
      return actions.reject();
    }

    mostrarError('');

    return actions.order.create({
      purchase_units: [{
        amount: {
          value: totalMXM
        }
      }]
    });
  },
  onApprove: (data,actions) => {
    return actions.order.capture().then(function(orderData) { 
      document.getElementById('form-compra').submit(); 
    });
  }
}).render('#paypal-button-container');