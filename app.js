paypal.Buttons ({
  createOrder: (data,actions) => {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: localStorage
        }
      }]
    });
  },
  onApprove: (data,actions) => {
    return actions.order.capture().then(function(orderData) {
      console.log('Capture result', orderData,JSON.stringify(orderData,null,2));
      const transaction = orderData.purchase_units[0].payments.captures[0];
      alert(`Transaction ${transaction}.status}: ${transaction.id}`);
    });
  }
}).render('#paypal-button-container');