/* ---------------------------------------------- */
/* ---------- Sub Menu - Click Control ---------- */
/* ---------------------------------------------- */
(function() {
  let header = document.querySelector(".site-header");
  let button = document.querySelector("#burger");
  let menuClicked = false;

  button.addEventListener("click", function() {
    if (menuClicked == false) {
      header.style.maxHeight = "50vh";
      menuClicked = true;
    } else {
      header.style.maxHeight = "8vh";
      menuClicked = false;
    }
  });
})();
