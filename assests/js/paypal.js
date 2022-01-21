function sendDetails(data) {
  const url = "./payment.php";
  data["user_id"] = userId;
  data["package_id"] = packageId;

  fetch(url, {
    method: "POST",
    headers: {
      "content-type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify(data),
  }).then((res) => {
    if (res.ok) {
      res.json().then((data) => {
        if (data.isComplete) {
          window.location.replace("./Buy_token.php");
        }
      });
    }
  });
}

// paypal
//   .Buttons({
//     createOrder: function (data, actions) {
//       // This function sets up the details of the transaction, including the amount and line item details.
//       return actions.order.create({
//         purchase_units: [
//           {
//             amount: {
//               value: price,
//             },
//           },
//         ],
//       });
//     },
//     onApprove: function (data, actions) {
//       // This function captures the funds from the transaction.
//       return actions.order.capture().then(function (details) {
//         // This function shows a transaction success message to your buyer.
//         console.log(details);
//         const status = details.status === "COMPLETED" ? 0 : 1;
//         data["status"] = status;
//         sendDetails(data);
//         alert("Transaction completed by " + details.payer.name.given_name);
//       });
//     },
//     onError: function (err) {
//       console.log(err);
//       // For example, redirect to a specific error page
//       // window.location.href = "/your-error-page-here";
//     },
//     onClick: function () {
//       console.log("click");
//     },
//   })
//   .render("#paypal-button-container");

paypal.Button.render(
  {
    style: {
      shape: "rect",
      size: "large",
    },

    env: "sandbox", // Or 'production'
    // Set up the payment:
    // 1. Add a payment callback
    payment: function (data, actions) {
      // 2. Make a request to your server
      return actions.request
        .post(`./api/payment.php?price=${price}&package_id=${packageId}`)
        .then(function (res) {
          // 3. Return res.id from the response
          console.log(res);
          return res.id;
        });
    },
    // Execute the payment:
    // 1. Add an onAuthorize callback
    onAuthorize: function (data, actions) {
      // 2. Make a request to your server
      return actions.request
        .post("/my-api/execute-payment/", {
          paymentID: data.paymentID,
          payerID: data.payerID,
        })
        .then(function (res) {
          // 3. Show the buyer a confirmation message.
        });
    },
  },
  "#paypal-button"
);
