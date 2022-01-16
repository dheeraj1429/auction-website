function setupAuctionCalls() {
  fetch("./api/registerUsers.php", {
    method: "POST",
    headers: {
      "content-type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify({
      email: email,
      userId: userId,
      auction_id: auctionId,
      token: token,
    }),
  }).then((res) => {
    res.json().then((data) => {
      console.log(data);
      if (data["comfirmation"]) {
        setInterval(() => {
          const url = `./api/auction.php?token=${token}&email=${email}&auction_id=${auctionId}&user_id=${userId}`;
          const xhr = new XMLHttpRequest();
          xhr.open("GET", url, true);

          xhr.onload = () => {
            if (xhr.status === 200) {
              const updatedData = JSON.parse(xhr.responseText);
              const users = document.getElementById("users");
              users.innerHTML = updatedData["users"];
              if (!updatedData["null"]) {
                const newPrice = document.getElementById("new-price");
                newPrice.innerHTML = updatedData["amount"] + 20;
              }
              console.log(updatedData);
            }
          };
          xhr.send();
        }, 1000);
      }
    });
  });
}

function registerBid(data) {
  const url = `./api/auction.php`;
  fetch(url, {
    method: "POST",
    headers: {
      "content-type": "application/json;charset=UTF-8",
    },
    body: JSON.stringify(data),
  });
}

window.onload = setupAuctionCalls;

document.getElementById("submit-btn").onclick = () => {
  const amount = parseInt(document.getElementById("new-price").innerHTML);
  const data = {
    token: token,
    id: userId,
    amount: amount,
    email: email,
    auction_id: auctionId,
  };
  registerBid(data);
};
