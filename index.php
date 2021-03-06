<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="trongate.css">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Timepicker Example</h2>
		<form action="x">
			<label>First Name</label>
			<input type="text">
			<label>Last Name</label>
			<input type="text">
			<label>Arrive Date</label>
			<input type="text" name="arrive" class="timepicker">
			<label>Email Address</label>
			<input type="text">
			<label>Description</label>
			<textarea name="whatever" id="" cols="30" rows="10"></textarea>
			<button>Submit</button>
		</form>
	</div>

<style>
body {
	margin: 0;
	background-color: SteelBlue;
}

.container {
	width: 90%;
	max-width: 700px;
	margin: 0 auto;
	padding: 34px;
	background-color: white;
	height: 5000px;
}

#timepicker th, #timepicker td {
	padding: 8px 4px;
	font-size: 15px;
}

#timepicker td:nth-child(1) {
    border-right: 0;
}

#timepicker td:nth-child(2) {;
    border-left: 0;
}

input[type=range] {
  -webkit-appearance: none;
  width: 100%;
}

input[type=range]:focus {
  outline: none;
}

input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: SteelBlue;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}

input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 18px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -4px;
}

input[type=range]:focus::-webkit-slider-runnable-track {
  background: #649ac6;
}

input[type=range]::-moz-range-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: SteelBlue;
  border-radius: 1.3px;
  border: 0.2px solid #010101;
}

input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 18px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}

input[type=range]::-ms-track {
  width: 100%;
  height: 8.4px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  border-width: 16px 0;
  color: transparent;
}

input[type=range]::-ms-fill-lower {
  background: #2a6495;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}

input[type=range]::-ms-fill-upper {
  background: #3071a9;
  border: 0.2px solid #010101;
  border-radius: 2.6px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}

input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 18px;
  width: 16px;
  border-radius: 3px;
  background: #ffffff;
  cursor: pointer;
}

input[type=range]:focus::-ms-fill-lower {
  background: #3071a9;
}

input[type=range]:focus::-ms-fill-upper {
  background: #649ac6;
}

#timepicker {
	width: 250px;
	position: absolute;
	z-index: 99;
	background-color: white;
}

.timepicker-btns .alt {
	margin: 0;
}
</style>

<script>
var today = new Date();
var time = today.getHours() + ":" + today.getMinutes();
var currentTime = time;
var currentHour = today.getHours();
var currentMinute = today.getMinutes();

var targetEl;

currentHour = addZeroBefore(currentHour);
currentMinute = addZeroBefore(currentMinute);

function addZeroBefore(n) {
  return (n < 10 ? '0' : '') + n;
}

function updateTimepicker() {
	var timeValue = currentHour + ':' + currentMinute;
	document.getElementById("time-guide").innerHTML = timeValue;
	targetEl.value = timeValue;
}

function updateHour(newHour) {
	currentHour = addZeroBefore(newHour);
	updateTimepicker();
}

function updateMinute(newMinute) {
	currentMinute = addZeroBefore(newMinute);
	updateTimepicker();
}

function updateTimepickerSliders(hourSlider, minuteSlider) {
	hourSlider.value = currentHour;
	minuteSlider.value = currentMinute;
}






























































function initTimepicker(clickedEl) {
	//destroy other timepickers
	var currentOpenTimepicker = document.getElementById("timepicker");


    //If it isn't "undefined" and it isn't "null", then it exists.
    if(typeof(currentOpenTimepicker) != 'undefined' && currentOpenTimepicker != null){
        closeTimepicker();
    }

	targetEl = clickedEl;

	var timepicker = document.createElement("div");
    timepicker.setAttribute("id", "timepicker");

    //build the timepicker table
    var timepickerTbl = document.createElement("table");
    var timepickerTblTopTr = document.createElement("tr");
    timepickerTbl.appendChild(timepickerTblTopTr);
    var timepickerTblTopTh = document.createElement("th");
    timepickerTblTopTh.setAttribute("colspan", "2");
    var tblHeadline = document.createTextNode('Choose Time');
    timepickerTblTopTh.appendChild(tblHeadline);
    timepickerTblTopTr.appendChild(timepickerTblTopTh);
    timepickerTbl.appendChild(timepickerTblTopTr);
	
	//first row
	var tblRow = document.createElement("tr");
	var tblCell = document.createElement("td");
	var tblCellTxt = document.createTextNode('Time');
	tblCell.appendChild(tblCellTxt);
	tblRow.appendChild(tblCell);

	tblCell = document.createElement("td");
	tblCell.setAttribute("id", "time-guide");
	tblCellTxt = document.createTextNode(currentTime);
	tblCell.appendChild(tblCellTxt);
	tblRow.appendChild(tblCell);

	timepickerTbl.appendChild(tblRow);

	//second row
	tblRow = document.createElement("tr");
	tblCell = document.createElement("td");
	tblCellTxt = document.createTextNode('Hour');
	tblCell.appendChild(tblCellTxt);
	tblRow.appendChild(tblCell);

	tblCell = document.createElement("td");
	var formInput = document.createElement("input");
	formInput.setAttribute("type", "range");
	formInput.setAttribute("id", "hours");
	formInput.setAttribute("min", "0");
	formInput.setAttribute("max", "23");
	formInput.setAttribute("oninput", "updateHour(this.value)");
	formInput.setAttribute("onchange", "updateHour(this.value)");
	formInput.setAttribute("value", currentHour);

	tblCell.appendChild(formInput);
	tblRow.appendChild(tblCell);
	timepickerTbl.appendChild(tblRow);

	//third row
	tblRow = document.createElement("tr");
	tblCell = document.createElement("td");
	tblCellTxt = document.createTextNode('Minute');
	tblCell.appendChild(tblCellTxt);
	tblRow.appendChild(tblCell);

	tblCell = document.createElement("td");
	formInput = document.createElement("input");
	formInput.setAttribute("type", "range");
	formInput.setAttribute("id", "minutes");
	formInput.setAttribute("min", "0");
	formInput.setAttribute("max", "59");
	formInput.setAttribute("oninput", "updateMinute(this.value)");
	formInput.setAttribute("onchange", "updateMinute(this.value)");
	formInput.setAttribute("value", currentMinute);
	tblCell.appendChild(formInput);
	tblRow.appendChild(tblCell);
	timepickerTbl.appendChild(tblRow);

	//timepicker buttons row
	tblRow = document.createElement("tr");
	tblRow.setAttribute("class", "timepicker-btns");
	tblCell = document.createElement("td");
	var timepickerBtn1 = document.createElement("button");
	timepickerBtn1.setAttribute("class", "alt");
	timepickerBtn1.setAttribute("type", "button");
	var btn1Txt = document.createTextNode("Now");
	timepickerBtn1.setAttribute("onclick", "setToNow()")

	timepickerBtn1.appendChild(btn1Txt);
	tblCell.appendChild(timepickerBtn1);
	tblRow.appendChild(tblCell);

	tblCell = document.createElement("td");
	var timepickerBtn2 = document.createElement("button");
	timepickerBtn2.setAttribute("class", "alt");
	timepickerBtn2.setAttribute("type", "button");
	timepickerBtn2.setAttribute("onclick", "closeTimepicker()")
	var btn2Txt = document.createTextNode("Done");
	timepickerBtn2.appendChild(btn2Txt);
	tblCell.appendChild(timepickerBtn2);
	tblCell.setAttribute("style", "text-align: right;");
	tblRow.appendChild(tblCell);

	timepickerTbl.appendChild(tblRow);
	timepicker.appendChild(timepickerTbl);
    clickedEl.parentNode.insertBefore(timepicker, clickedEl.nextSibling);
}

function closeTimepicker() {
	var timepicker = document.getElementById("timepicker");
	timepicker.remove();
}

function setToNow() {

 	currentTime = time;
	currentHour = today.getHours();
	currentMinute = today.getMinutes();
	currentHour = addZeroBefore(currentHour);
	currentMinute = addZeroBefore(currentMinute);

	var hourSlider = document.getElementById("hours");
	var minuteSlider = document.getElementById("minutes");
	updateTimepickerSliders(hourSlider, minuteSlider);
	updateTimepicker();

}



var timepickers = document.getElementsByClassName("timepicker");
for (var i = 0; i < timepickers.length; i++) {
	timepickers[i].addEventListener("click", (ev) => {
		initTimepicker(ev.target);
	});
}
</script>
</body>
</html>