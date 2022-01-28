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
          window.location.replace(
            `./PaymentSuccessful.php?package_id=${packageId}`
          );
        }
      });
    }
  });
}

paypal
  .Buttons({
    createOrder: function (data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: price,
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function (details) {
        // This function shows a transaction success message to your buyer.
        console.log(details);
        const status = details.status === "COMPLETED" ? 0 : 1;
        data["status"] = status;
        sendDetails(data);
        alert("Transaction completed by " + details.payer.name.given_name);
      });
    },
    onError: function (err) {
      window.location.replace("./paymentFail.php");
    },
    onClick: function () {
      console.log("click");
    },
  })
  .render("#paypal-button-container");
