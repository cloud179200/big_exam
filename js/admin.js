const currentEmailElem = document.querySelector(".current-email");
currentEmailElem.innerHTML = localStorage.getItem("email");
const actionWhenClickBtn = (btn, action) => {
  if (btn) {
    btn.addEventListener("click", () => {
      document.querySelector("#actionForm input").value = action;
      document.getElementById("actionForm").submit();
    });
  }
};
const logoutBtn = document.getElementById("logoutBtn");
actionWhenClickBtn(logoutBtn, "logout");
const actionAdd = document.getElementById("actionAdd");
actionAdd.addEventListener("click", (e) => {
  e.preventDefault();
  window.location.replace("../php/admin.php?action=add");
});
const actionUpdate = document.getElementById("actionUpdate");
actionUpdate.addEventListener("click", (e) => {
  e.preventDefault();
  window.location.replace("../php/admin.php?action=update");
});
const actionRemove = document.getElementById("actionRemove");
actionRemove.addEventListener("click", (e) => {
  e.preventDefault();
  window.location.replace("../php/admin.php?action=remove");
});

const addForm = document.getElementById("addForm");
addForm &&
  addForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    let data = {};
    data["email"] = localStorage.getItem("email");
    data["secretString"] = localStorage.getItem("secretString");
    data["content"] = document.getElementsByName("content")[0].value;
    data["subject"] = document.getElementsByName("subject")[0].value;
    data["correctAnswer"] = document.getElementsByName(
      "answerCorrect"
    )[0].value;
    data["answer1"] = document.getElementsByName("answer1")[0].value;
    data["answer2"] = document.getElementsByName("answer2")[0].value;
    data["answer3"] = document.getElementsByName("answer3")[0].value;
    data["level"] = document.getElementsByName("level")[0].value;
    loading(true, addForm);
    fetchWithURLAndObject("../php/database/addQuestion.php", data).then(
      (result) => {
        loading(false, addForm);
        console.log(result);
        result.error &&
          window.location.replace(
            "../php/admin.php?action=add&error=" + result.error
          );
        !result.error &&
          window.location.replace(
            "../php/admin.php?action=add&success=" +
              "Add success (idQuesion: " +
              result[0][0] +
              ")"
          );
      }
    );
  });
const loading = (isLoading, elem) => {
  isLoading && elem.classList.add("loading");
  !isLoading && elem.classList.remove("loading");
};
const errorMsgContainerElem = document.querySelector(".erorr-container");
const closeErrorMsgBtn = document.querySelector(".negative .close");
if (closeErrorMsgBtn) {
  closeErrorMsgBtn.addEventListener("click", () => {
    errorMsgContainerElem.style.opacity = "0";
  });
  const erorrMsgCountDown = setTimeout(() => {
    errorMsgContainerElem.style.opacity = "0";
  }, 5000);
}
const sucessMsgContainerElem = document.querySelector(".success-container");
const closeMsgSucessBtn = document.querySelector(".success .close");
if (closeMsgSucessBtn) {
  closeMsgSucessBtn.addEventListener("click", () => {
    sucessMsgContainerElem.style.opacity = "0";
  });
  const sucessMsgCountDown = setTimeout(() => {
    sucessMsgContainerElem.style.opacity = "0";
  }, 5000);
}
//remove form
const removeForm = document.getElementById("removeForm");
if(removeForm) {
  removeForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = {};
    data["idQuestion"] = document.getElementsByName("idQuestion")[0].value;
    data["email"] = localStorage.getItem("email");
    data["secretString"] = localStorage.getItem("secretString");
    console.log(data["idQuestion"]);
    loading(true, removeForm);
    fetchWithURLAndObject("../php/database/removeQuestion.php", data).then(
      (result) => {
        loading(false, removeForm);
        console.log(result);
        result.success &&
          window.location.replace(
            "../php/admin.php?action=remove&success=" + result.success
          );
        result.error &&
          window.location.replace(
            "../php/admin.php?action=remove&error=" + result.error
          );
      }
    );
  });
  let verifyData = {};
  verifyData["email"] = localStorage.getItem("email");
  verifyData["secretString"] = localStorage.getItem("secretString");
  fetchWithURLAndObject("../php/database/getQuestion.php", verifyData).then(result => {
    console.log(result);
    result.sort((a, b) => {
      return new Date(b.created) - new Date(a.created);
    });
    result.forEach(item => {
      let questionElem = document.createElement("div");
      questionElem.classList.add("question");
      questionElem.id = item.idQuestion;
      questionElem.innerHTML = `<div class="question-id">Id: ${item.idQuestion}</div>
      <div class="question-subject">Subject: ${item.subject}</div>
      <div class="question-content-p">Content: ${item.content}</div>
      <div class="question-level">Level: ${item.level}</div>
      <div class="question-created">Created: ${new Date(item.created).toLocaleString()}</div>
      `;
      questionElem.addEventListener("click", (e) => {
        e.preventDefault();
        document.getElementsByName("idQuestion")[0].value = item.idQuestion;
      })
      document.querySelector(".list-question").style.display = "block";
      document.querySelector(".list-question").appendChild(questionElem);
    })
  });
};
//update form
const updateForm = document.getElementById("updateForm");
if(updateForm) {
  updateForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = {};
    data["email"] = localStorage.getItem("email");
    data["secretString"] = localStorage.getItem("secretString");
    data["content"] = document.getElementsByName("content")[0].value;
    data["subject"] = document.getElementsByName("subject")[0].value;
    data["correctAnswer"] = document.getElementsByName(
      "answerCorrect"
    )[0].value;
    data["answer1"] = document.getElementsByName("answer1")[0].value;
    data["answer2"] = document.getElementsByName("answer2")[0].value;
    data["answer3"] = document.getElementsByName("answer3")[0].value;
    data["level"] = document.getElementsByName("level")[0].value;
    data["idQuestion"] = document.getElementsByName("idQuestion")[0].value;
    loading(true, updateForm);
    fetchWithURLAndObject("../php/database/updateQuestion.php", data).then(
      (result) => {
        loading(false, updateForm);
        console.log(result);
      }
    );
  });
  let verifyData = {};
  verifyData["email"] = localStorage.getItem("email");
  verifyData["secretString"] = localStorage.getItem("secretString");
  fetchWithURLAndObject("../php/database/getQuestion.php", verifyData).then(result => {
    console.log(result);
    result.sort((a, b) => {
      return new Date(b.created) - new Date(a.created);
    });
    result.forEach(item => {
      let questionElem = document.createElement("div");
      questionElem.classList.add("question");
      questionElem.id = item.idQuestion;
      questionElem.innerHTML = `<div class="question-id">Id: ${item.idQuestion}</div>
      <div class="question-subject">Subject: ${item.subject}</div>
      <div class="question-content-p">Content: ${item.content}</div>
      <div class="question-level">Level: ${item.level}</div>
      <div class="question-created">Created: ${new Date(item.created).toLocaleString()}</div>
      `;
      questionElem.addEventListener("click", (e) => {
        e.preventDefault();
        Object.entries(item).forEach(([key, value])=> {
          if(document.getElementsByName(key)[0]) document.getElementsByName(key)[0].value = value;
        });
      })
      document.querySelector(".list-question").style.display = "block";
      document.querySelector(".list-question").appendChild(questionElem);
    })
  });
};
