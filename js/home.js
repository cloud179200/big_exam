const emailForm = document.getElementById("emailForm");
emailForm &&
  emailForm.addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector(".home-main form div").classList.add("loading");
    const inputEmailElement = document.querySelector(
      ".home-main form div input"
    );
    inputEmailElement.readonly = true;
    const email = inputEmailElement.value;
    if (email) {
      let myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

      let urlencoded = new URLSearchParams();
      urlencoded.append("email", email);

      let requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: urlencoded,
        redirect: "follow",
      };

      fetch("../php/database/getUser.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
          localStorage.setItem("email", result[0][0]);
          window.location.replace(`../php/index.php`);
        })
        .catch((error) => console.log("error", error));
    } else {
      let errorMsg = "Please enter your email";
      window.location.replace(`../php/index.php?error=${errorMsg}`);
    }
  });
const secretStringForm = document.getElementById("secretStringForm");
secretStringForm &&
  secretStringForm.addEventListener("submit", (e) => {
    e.preventDefault();
    document.querySelector(".home-main form div").classList.add("loading");
    const inputSecretStringElement = document.querySelector(
      ".home-main form div input"
    );
    inputSecretStringElement.readonly = true;
    const secretString = inputSecretStringElement.value;
    if (secretString) {
      localStorage.setItem("secretString", secretString);
      window.location.replace(`../php/index.php`);
    } else {
      localStorage.clear();
      let errorMsg = "Opps. 'secretString' not true!";
      window.location.replace(`../php/index.php?error=${errorMsg}`);
    }
  });
const errorMsgContainerElem = document.querySelector(".erorr-container");
const closeMsgBtn = document.querySelector(".message .close");
if (closeMsgBtn) {
  closeMsgBtn.addEventListener("click", () => {
    errorMsgContainerElem.style.opacity = "0";
  });
  const erorrMsgCountDown = setTimeout(() => {
    errorMsgContainerElem.style.opacity = "0";
  }, 5000);
}
