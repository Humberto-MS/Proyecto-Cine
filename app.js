var precioTotal = localStorage.getItem('precioTotal');
var totalUSD = parseFloat(precioTotal);
var totalMXM = totalUSD / 20;

paypal.Buttons ({
  createOrder: (data,actions) => {
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