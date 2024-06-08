"use strict";

document.addEventListener('DOMContentLoaded', function () {
  var body = document.querySelector('body'),
      sidebar = body.querySelector('aside'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");
  document.addEventListener('click', function (eve) {
    if (!eve.target.closest('.sidebar')) sidebar.classList.add('close');
  });
  document.querySelectorAll('.side-link a').forEach(function (link) {
    var url = window.location.href;

    if (link.href === url) {
      // link.classList.add('active');
      link.parentElement.classList.add('active');
    }
  });
  toggle.addEventListener("click", function () {
    sidebar.classList.toggle("close");
  });
  /*
  searchBtn.addEventListener("click" , () =>{
  sidebar.classList.remove("close");
  })
  */

  modeSwitch.addEventListener("click", function () {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
      modeText.innerText = "Light mode";
    } else {
      modeText.innerText = "Dark mode";
    }
  });
});