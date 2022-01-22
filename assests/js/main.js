"use strict";

function setUpTabs() {
  const tabs = document.getElementsByClassName("tab_div");
  const tabView = document.getElementsByClassName("tab-view");

  for (let tab of tabs) {
    tab.onclick = () => {
      const tabIndex = Array.from(tabs).indexOf(tab);
      const activeTab = document.getElementById("active-tab");
      const lastActiveTab = Array.from(tabs).indexOf(activeTab);
      tabView[lastActiveTab].style.display = "none";
      const activeTabText = document.getElementById("active-tab-text");
      activeTab.classList.remove("active_tab_div");
      activeTabText.classList.remove("active_tab");
      activeTab.removeAttribute("id");
      activeTabText.removeAttribute("id");

      tab.classList.add("active_tab_div");
      tab.id = "active-tab";
      const tabText = tab.getElementsByTagName("p")[0];
      tabText.classList.add("active_tab");
      tabText.classList.add("tab");
      tabText.id = "active-tab-text";

      tabView[tabIndex].style.display = "block";
    };
  }
}

setUpTabs();
