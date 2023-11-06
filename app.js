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
      //console.log('Capture result', orderData,JSON.stringify(orderData,null,2));
      const transaction = orderData.purchase_units[0].payments.captures[0];
      //alert(`Transaction ${transaction}.status}: ${transaction.id}`);
      document.getElementById('form-compra').submit();
      boton_paypal.style.display = "none";
      boton_recibo.style.display = "block";
      finalizarPago.style.display = "block";    
    });
  }
}).render('#paypal-button-container');