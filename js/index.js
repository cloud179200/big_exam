window.onload = async () => {
  if (!localStorage.getItem("email")) {
    if (window.location.pathname.indexOf("/php/index.php") === -1) {
      let errorMsg = "Please login first";
      window.location.replace(`../php/index.php?error=${errorMsg}`);
    }
  } else if (localStorage.getItem("email")) {
    if (localStorage.getItem("secretString")) {
      let myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
      let urlencoded = new URLSearchParams();
      urlencoded.append("email", localStorage.getItem("email"));
      urlencoded.append("secretString", localStorage.getItem("secretString"));

      let requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: urlencoded,
        redirect: "follow",
      };
      await fetch("../php/auth/verifyUser.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
          if (
            result.verify &&
            window.location.pathname.indexOf("/php/admin.php") === -1 &&
            result.admin
          ) {
            window.location.replace(`../php/admin.php`);
          }
          if (
            result.verify &&
            window.location.pathname.indexOf("/php/index.php") !== -1
          ) {
            window.location.replace(`../php/main.php`);
          }
          let errorMsg = "Opps! 'Secret String' not true!";
          if (!result.verify) {
            localStorage.clear();
            window.location.replace(`../php/index.php?error=${errorMsg}`);
          }
        })
        .catch((error) => console.log("error", error));
    } else if (!localStorage.getItem("secretString")) {
      if (window.location.pathname.indexOf("/php/index.php") === -1) {
        window.location.replace("../php/index.php");
      } else if (window.location.pathname.indexOf("/php/index.php") !== -1)
        window.location.search !== "?verify=1" &&
          window.location.replace("../php/index.php?verify=1");
    }
  }
};
const fetchWithURLAndObject = (url, dataObject) => {
  let myHeaders = new Headers();
  myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

  let urlencoded = new URLSearchParams();
  Object.entries(dataObject).forEach(([key, value]) => {
    urlencoded.append(`${key}`, `${value}`);
  });
  let requestOptions = {
    method: "POST",
    headers: myHeaders,
    body: urlencoded,
    redirect: "follow",
  };

  return fetch(url, requestOptions)
    .then((response) => response.json())
    .then((result) => result)
    .catch((error) => ({"error": error}) );
};
