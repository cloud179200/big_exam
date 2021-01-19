if (
  [
    "?subject=math",
    "?subject=history",
    "?subject=biology",
    "?subject=physic",
  ].indexOf(window.location.search) === -1
) {
  window.location.replace("../php/main.php");
}

const sendBtn = document.getElementById("sendBtn");
const cancelBtn = document.getElementById("cancelBtn");
const loading = (isLoading) => {
  if (isLoading) {
    sendBtn.classList.add("loading");
    cancelBtn.style.display = "none";
  }
  if (!isLoading) {
    sendBtn.classList.remove("loading");
    cancelBtn.style.display = "inline-block";
  }
};
sendBtn.addEventListener("click", (e) => {
  e.preventDefault();
  let questions = document.querySelectorAll(".question-content");
  let questionAndAnswer = {};
  let isFill = true;
  questions.forEach((elem) => {
    let question = document.getElementsByName(elem.id);
    question.forEach((input) => {
      if (input.checked) questionAndAnswer[elem.id] = input.value;
    });
    if (questionAndAnswer[elem.id] === undefined) {
      questionAndAnswer[elem.id] = "";
      isFill = false;
    }
  });
  console.log(questionAndAnswer);
  console.log(isFill);
  if (!isFill) {
    $(".ui.basic.modal").modal("show");
  }
  if (isFill) {
    let questions = document.querySelectorAll(".question-content");
    let questionAndAnswer = {};
    questions.forEach((elem) => {
      let question = document.getElementsByName(elem.id);
      question.forEach((input) => {
        if (input.checked) questionAndAnswer[elem.id] = input.value;
      });
      if (questionAndAnswer[elem.id] === undefined) {
        questionAndAnswer[elem.id] = "";
      }
    });
    console.log(questionAndAnswer);
    //ajax
    let myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    let urlencoded = new URLSearchParams();
    Object.entries(questionAndAnswer).forEach((item) => {
      let [key, value] = item;
      urlencoded.append(`${key}`, `${value}`);
    });
    urlencoded.append("email", localStorage.getItem("email"));
    urlencoded.append("subject", window.location.search.split("=")[1]);
    let requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: urlencoded,
      redirect: "follow",
    };
    loading(true);
    fetch("../php/database/getResult.php", requestOptions)
      .then((response) => response.json())
      .then((result) => {
        loading(false);
        console.log(result);
      })
      .catch((error) => {
        loading(false);
        console.log("error", error);
      });
  }
});
const cancelSendBtn = document.getElementById("cancelSendBtn");
const acceptSendBtn = document.getElementById("acceptSendBtn");
acceptSendBtn.addEventListener("click", (e) => {
  e.preventDefault();
  let questions = document.querySelectorAll(".question-content");
  let questionAndAnswer = {};
  questions.forEach((elem) => {
    let question = document.getElementsByName(elem.id);
    question.forEach((input) => {
      if (input.checked) questionAndAnswer[elem.id] = input.value;
    });
    if (questionAndAnswer[elem.id] === undefined) {
      questionAndAnswer[elem.id] = "";
    }
  });
  console.log(questionAndAnswer);
  //ajax
  let myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  let urlencoded = new URLSearchParams();
  Object.entries(questionAndAnswer).forEach((item) => {
    let [key, value] = item;
    urlencoded.append(`${key}`, `${value}`);
  });
  urlencoded.append("email", localStorage.getItem("email"));
  urlencoded.append("subject", window.location.search.split("=")[1]);
  let requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };
  loading(true);
  fetch("../php/database/getResult.php", requestOptions)
    .then((response) => response.json())
    .then((result) => {
      loading(false);
      console.log(result);
      window.location.replace("../php/main.php");
    })
    .catch((error) => {
      loading(false);
      console.log("error", error);
      clearInterval(timer);
      window.location.replace("../php/main.php");
    });
});
const countdownTimer = document.querySelector(".countdown-timer");
const startTime = new Date();
let min = 0;
let sec = 0;
const timer = setInterval(() => {
  let now = new Date() - startTime;
  sec = ((now - (now % 1000)) / 1000) - 60*min;
  if (sec === 60) {
    sec = 0;
    min += 1;
  }
  if (min === 15) {
    let myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    let urlencoded = new URLSearchParams();
    Object.entries(questionAndAnswer).forEach((item) => {
      let [key, value] = item;
      urlencoded.append(`${key}`, `${value}`);
    });
    urlencoded.append("email", localStorage.getItem("email"));
    urlencoded.append("subject", window.location.search.split("=")[1]);
    let requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: urlencoded,
      redirect: "follow",
    };
    loading(true);
    fetch("../php/database/getResult.php", requestOptions)
      .then((response) => response.json())
      .then((result) => {
        loading(false);
        console.log(result);
      })
      .catch((error) => {
        loading(false);
        console.log("error", error);
      });
  }
  countdownTimer.innerHTML =
    (min < 10 ? "0" + min : min) + ":" + (sec < 10 ? "0" + sec : sec);
}, 1000);
