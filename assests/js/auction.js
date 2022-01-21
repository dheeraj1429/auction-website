function timeConverter(UNIX_timestamp) {
  var a = new Date(UNIX_timestamp * 1000);
  var months = [
    "Jan",
    "Feb",
    "Mar",
    "Apr",
    "May",
    "Jun",
    "Jul",
    "Aug",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
  var year = a.getFullYear();
  var month = months[a.getMonth()];
  var date = a.getDate();
  var hour = a.getHours();
  var min = a.getMinutes();
  var sec = a.getSeconds();
  var time =
    date + " " + month + " " + year + " " + hour + ":" + min + ":" + sec;
  return time;
}

function getTimeDiffrences(endTime) {
  const date = new Date();
  const endTimeSlice = endTime.split(":");
  const emin = endTimeSlice[0];
  const esec = endTimeSlice[1];
  const cmin = date.getMinutes();
  const csec = date.getSeconds();

  const restTime = [emin - cmin, esec - csec];
  return restTime;
}

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
      if (!updatedData["time_over"]) {
        if (updatedData["type"] === "updateUsers") {
          const numberOfUsers = updatedData["numberOfUsers"];
          const users = document.getElementById("users");
          users.innerHTML = numberOfUsers;
        } else if (updatedData["type"] === "updatePrice") {
          const newPrice = document.getElementById("new-price");
          newPrice.innerHTML = updatedData["bidPrice"] + 20;
        }
      } else {
        getWinner();
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

function getWinner() {
  const url = `./api/winner.php?=${auctionId}`;

  fetch(url, {
    method: "GET",
    headers: {
      "content-type": "application/json;charset=UTF-8",
    },
  }).then((response) => {
    response.json().then((data) => {
      console.log(data);
    });
  });
}

function startClock(time) {
  const timeElement = document.getElementById("time");
  const currentTime = new Date().getTime();
  const min = time[0];
  const second = time[1] < 10 ? `0:${time[1]}` : time[1];

  timeElement.innerHTML = `0${min}:${second}`;

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
      if (!data["time_over"]) {
        console.log(data);
        if (data["confirmation"]) {
          if (!data["waiting"]) {
            startAuctionCalls();
            document.getElementById("number-of-people").style.display = "block";
            document.getElementById("submit-btn").style.display = "block";
            document.getElementById("waiting-time").style.display = "none";
          } else {
            document.getElementById("number-of-people").style.display = "none";
            document.getElementById("submit-btn").style.display = "none";
            document.getElementById("waiting-time").style.display = "block";
          }
          const endTime = timeConverter(data["time_left"]);
          const dt1 = new Date();
          const dt2 = new Date(endTime);
          var diff = (dt2.getTime() - dt1.getTime()) / 1000;
          diff /= 60;
          diff = `${diff}`;
          const timeList = [
            parseInt(diff.split(".")[0]),
            60 - dt1.getSeconds(),
          ];
          console.log(timeList);
          startClock(timeList);
        } else {
          window.location.replace("./index.php");
        }
      } else {
        window.location.replace(`./winningPage.php?id=${data["auction_id"]}`);
      }
    });
  });
}

window.onload = setAuctionCalls;
