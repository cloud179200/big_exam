const emailForm = document.getElementById("emailForm");
emailForm.addEventListener("submit", e => {
    // e.preventdefault();
    document.querySelector(".home-main form div").classList.add("loading");
    document.querySelector(".home-main form div input").disabled = true;
});
