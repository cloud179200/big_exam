const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

const urlencoded = new URLSearchParams();
urlencoded.append("email", localStorage.getItem("email"));

const requestOptions = {
  method: "POST",
  headers: myHeaders,
  body: urlencoded,
  redirect: "follow",
};

const historyContent = document.querySelector(".history-content");

fetch("../php/database/getHistory.php", requestOptions)
  .then((response) => response.json())
  .then((result) => {
    console.log(result);
    result.sort((a,b) => {
      return new Date(b) - new Date(a);
    })
    if (result.length > 0) {
        result.forEach(oneHistory => {
            let oneHistoryElem = document.createElement("div");
            oneHistoryElem.className = "history-elem";
            oneHistoryElem.innerHTML = `
            <div class="tittle">Subject: ${oneHistory[1]}</div>
            <div class="time">${new Date(oneHistory[2]).toLocaleString()} - GMT+7 VNA</div>
            <div class="grade">Scores: ${oneHistory[3]}</div>
        `
            historyContent.appendChild(oneHistoryElem);
        })
    }
    else{
        let oneHistoryElem = document.createElement("div");
            oneHistoryElem.className = "history";
            oneHistoryElem.innerHTML = `
            <div class="tittle">---</div>
            <div class="time">---</div>
            <div class="grade">---</div>
        `
            historyContent.appendChild(oneHistoryElem);
    }
  })
  .catch((error) => console.log("error", error));
