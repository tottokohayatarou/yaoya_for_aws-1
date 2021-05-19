'use strict';

function increment() {
  var countScreen = document.getElementById('countScreen').value;
  var count = Number(countScreen);
  if (0 <= count && count < 10) {
    count += 1;
  }
  countScreen.value = count;
}


function decrement() {
  var countScreen = document.getElementById('countScreen').value;
  var count = Number(countScreen.value);
  if (1 < count && count <= 10) {
    count -= 1;
  }
  countScreen.value = count;
}