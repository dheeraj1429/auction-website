function timeConverter(UNIX_timestamp) {
  const a = new Date(UNIX_timestamp * 1000);
  let months = [
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
  let year = a.getFullYear();
  let month = months[a.getMonth()];
  let date = a.getDate();
  let hour = a.getHours();
  let min = a.getMinutes();
  let sec = a.getSeconds();
  let time =
    date + " " + month + " " + year + " " + hour + ":" + min + ":" + sec;
  return time;
}

function convertTimeStamp(time) {
  const date = new Date(time * 1000);
  let hour = date.getHours();
  let min = date.getMinutes();
  let sec = date.getSeconds();
  return `${hour} Hours ${min} min ${sec} sec`;
}

function createBidBubble(data) {
  const bubbleElement = document.createElement("div");
  const bidBubbles = document.getElementById("bid-bubbles");
  bubbleElement.className = "row py-3";
  const time = convertTimeStamp(data["time"]);
  console.log(data);
  const bubbleElementData = `
  <div class="col-12">
  <div class="userBitting_current">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-6">
        <div class="row">
          <div class="col-4 full_width col-md-4">
            <h1>${productName}</h1>
            <p class="light_para">${data["username"]}</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-12 col-md-6 pt-3 pt-md-0">
        <div class="row">
          <div
            class="col-4 full_width col-md-5 d-flex align-items-center"
          >
            <div class="user_icons_profile">
              <img
                src="./media/img/users/${data["profile_img"]}"
                alt=""
              />
            </div>
          </div>
          <div
            class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end"
          >
            <p class="light_para">${data["bidPrice"]}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  `;
  bubbleElement.innerHTML = bubbleElementData;
  bidBubbles.prepend(bubbleElement);
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
  };

  ws.onmessage = (e) => {
    const updatedData = JSON.parse(e.data);
    console.log(updatedData);
    if (!updatedData["time_over"]) {
      if (updatedData["type"]) {
        if (updatedData["type"] === "varify") {
          document.getElementById("number-of-people").innerHTML =
            updatedData["number_of_users"];
        } else if (updatedData["type"] === "updatePrice") {
          const newPrice = document.getElementById("new-price");
          newPrice.innerHTML = updatedData["bidPrice"] + 20;
          createBidBubble(updatedData);
        } else if (updatedData["type"] === "connection") {
          document.getElementById("number-of-people").innerHTML =
            updatedData["number_of_users"];
        }
      }
    } else {
      getWinner();
    }
  };

  ws.onclose = () => {
    console.log("closed");
    const data = JSON.stringify({
      type: "disconnect",
      token: token,
    });
    ws.send(data);
  };

  submitButton.onclick = () => {
    const newPriceElement = document.getElementById("new-price");
    const newPrice = parseInt(newPriceElement.innerHTML);
    const date = new Date();
    const data = JSON.stringify({
      userId: userId,
      email: email,
      token: token,
      auctionId: auctionId,
      profile_img: profileImg,
      username: username,
      bidPrice: newPrice,
      time: date.getTime(),
      type: "updatePrice",
    });
    createBidBubble(JSON.parse(data));
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
