'use strict';

function increment() {
  var countScreen = document.getElementById('countScreen');
  var count = Number(countScreen.value);
  if (0 <= count && count < 10) {
    count += 1;
  }
  // countScreen.value = count;
  return count;
}


function decrement() {
  var countScreen = document.getElementById('countScreen');
  var count = Number(countScreen.value);
  if (1 < count && count <= 10) {
    count -= 1;
  }
  // countScreen.value = count;
  return count;
}