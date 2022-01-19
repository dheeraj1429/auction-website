function startAuctionCalls() {
  const ws = new WebSocket("ws://localhost:8080");
  const submitButton = document.getElementById("submit-btn");

  ws.onopen = () => {
    data = {
      type: "varify",
      userId: userId,
      email: email,
      token: token,
      auctionId: auctionId,
    };
    ws.send(JSON.stringify(data));
    console.log("Connection established!");
  };

  ws.onmessage = (e) => {
    const updatedData = JSON.parse(e.data);
    console.log(updatedData);
    if (updatedData["token"] === token) {
      if (updatedData["type"] === "updatUsers") {
        const numberOfUsers = updatedData["numberOfUsers"];
        const users = document.getElementById("users");
        users.innerHTML = numberOfUsers;
      } else if (updatedData["type"] === "updatePrice") {
        const newPrice = document.getElementById("new-price");
        newPrice.innerHTML = updatedData["bidPrice"] + 20;
      }
    }
  };

  ws.onclose = () => {
    console.log("closed");
  };

  submitButton.onclick = () => {
    const newPriceElement = document.getElementById("new-price");
    const newPrice = parseInt(newPriceElement.innerHTML);
    const data = JSON.stringify({
      userId: userId,
      email: email,
      token: token,
      auctionId: auctionId,
      bidPrice: newPrice,
      type: "updatePrice",
    });
    ws.send(data);
    newPriceElement.innerHTML = newPrice + 20;
  };
}

function startClock(time) {
  const timeElement = document.getElementById("time");
  timeElement.innerHTML = `0${time}:00`;

  const interval = setInterval(() => {
    let currTime = timeElement.innerHTML.split(":");
    let minutes = parseInt(currTime[0]);
    let seconds = parseInt(currTime[1]);

    if (seconds !== 0) {
      seconds -= 1;
    } else {
      minutes = minutes - 1;
      seconds = 59;
    }
    if (minutes === 0 && seconds === 0) {
      stop();
    }
    if (seconds < 10) {
      timeElement.innerHTML = `0${minutes}:0${seconds}`;
    } else {
      timeElement.innerHTML = `0${minutes}:${seconds}`;
    }
  }, 1000);
  const stop = () => {
    clearInterval(interval);
    setAuctionCalls();
  };
}

function setAuctionCalls() {
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
  }).then((response) => {
    response.json().then((data) => {
      if (data["confirmation"]) {
        console.log(data);
        if (!data["waiting"]) {
          startAuctionCalls();
        }
        startClock(Math.round(data["time_left"]));
      } else {
        window.location.replace("./index.php");
      }
    });
  });
}

window.onload = setAuctionCalls;
