function closeAlerts() {
  const closeBtns = document.getElementsByClassName("close");
  for (let closeBtn of closeBtns) {
    closeBtn.onclick = () => {
      closeBtn.parentElement.style.display = "none";
    };
  }
}

closeAlerts();
