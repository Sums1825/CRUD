
function onclickdate() {
  document.getElementById('date').innerHTML = Date();
}

function keypress(){
  alert("You press a key");
}

function keydown(){
  alert("You press a key");
}

function keyblur() {
  alert("Input field lost focus.");
}



function mouseOver() {
  document.getElementById("mouseover").style.color = "red";
}

function mouseOut() {
  document.getElementById("mouseover").style.color = "blue";
}

function confirmbutton() {
  confirm("Press a button to Confirm!");
}
function parseint(){
document.getElementById("parseint").innerHTML =
parseInt("5") + "<br>" +
parseInt("Loki is 3 years old ") + "<br>" +
parseInt("2022 ");
}

function substr(){
  let text = "Hello world!";
  let result = text.substring(5);
  document.getElementById("substr").innerHTML = result;
}

function upcase(){
let text = "Hello world";
let result = text.toUpperCase();
document.getElementById("upcase").innerHTML = result;
}



function mathround(){
document.getElementById("rnd").innerHTML = Math.round(3.5);
}