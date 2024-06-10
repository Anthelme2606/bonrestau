"use strict";

document.addEventListener('DOMContentLoaded', function () {
  var status = document.querySelectorAll('.status');
  var lines = document.querySelectorAll('.line-transaction');
  lines.forEach(function (line, index) {
    for (i = 0; i < line.children.length; i++) {
      if (line.children[i].classList.contains("status")) {
        var _status = line.children[i].textContent.includes("Actif");

        if (_status) {
          line.classList.add("green-color");
        } else {
          line.classList.remove("green-color");
          line.classList.add("red-color");
        }
      }
    }
  });
  var selections = document.querySelectorAll('.selection');
  var select = document.querySelector('.form-up-select');
  var price = document.querySelector("#up-price");
  var date = document.querySelector("#up-date");
  var id = document.querySelector('#up-id');
  select.addEventListener('change', function (eve) {
    for (i = 0; selections.length; i++) {
      if (selections[i].selected == true && selections[i].classList.contains("selection")) {
        console.log(i);
        price.value = selections[i].dataset.price;
        date.value = selections[i].dataset.date;
        id.value = selections[i].dataset.id;
        break;
      } else {
        price.value = '';
        date.value = '';
        id.value = '';
      }
    }
  });
  var options_price = document.querySelectorAll(".option-price");
  var price_select = document.querySelector(".price-select");
  price_select.addEventListener('change', function () {
    for (i = 0; i < options_price.length; i++) {
      if (options_price[i].selected) {
        for (j = 0; j < lines.length; j++) {
          console.log(lines[j].dataset.price);

          if (options_price[i].value === lines[j].dataset.price) {
            lines[j].classList.remove('opacity_0');
            lines[j].classList.add('opacity_1');
          } else {
            lines[j].classList.remove('opacity_1');
            lines[j].classList.add('opacity_0');
          }
        }
      }
    }
  });
  var options_date = document.querySelectorAll(".option-date");
  var date_select = document.querySelector(".date-select");
  date_select.addEventListener('change', function () {
    for (i = 0; i < options_date.length; i++) {
      if (options_date[i].selected) {
        for (j = 0; j < lines.length; j++) {
          console.log(lines[j].dataset.price);

          if (options_date[i].value === lines[j].dataset.bondate) {
            lines[j].classList.remove('opacity_0');
            lines[j].classList.add('opacity_1');
          } else {
            lines[j].classList.remove('opacity_1');
            lines[j].classList.add('opacity_0');
          }
        }
      }
    }
  });
});