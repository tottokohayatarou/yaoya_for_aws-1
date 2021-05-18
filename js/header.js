"use strict";

setTimeout(() => {
  let flash = document.getElementById("message");
  if (flash != null) {
    flash.classList.add("none");
  }
}, 3.5 * 1000);
