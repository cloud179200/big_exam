const actionWhenClickBtn = (btn, action) => {
  if (btn) {
    btn.addEventListener("click", () => {
      document.querySelector("#actionForm input").value = action;
      document.getElementById("actionForm").submit();
    });
  }
};
const logoutBtn = document.getElementById("logoutBtn");
const historyBtn = document.getElementById("historyBtn");
const homeBtn = document.getElementById("homeBtn");
actionWhenClickBtn(logoutBtn, "logout");
actionWhenClickBtn(historyBtn, "directToHistory");
actionWhenClickBtn(homeBtn, "directToHome");

const mathElement = document.getElementById("math");
const historyElement = document.getElementById("history");
const biologyElement = document.getElementById("biology");
const physicElement = document.getElementById("physic");
actionWhenClickBtn(mathElement, "doMathTest");
actionWhenClickBtn(historyElement, "doHistoryTest");
actionWhenClickBtn(biologyElement, "doBiologyTest");
actionWhenClickBtn(physicElement, "doPhysicTest");

const currentEmailElem = document.querySelector(".current-email");
currentEmailElem.innerHTML = localStorage.getItem("email");