<?php
# webpage-based mulch calculator
# Chase Tramel aka Kasey Chase Littlepaws | https://github.com/ChaseLittlepaws
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div>
<h1>Mulch Calculator</h1>

<h2>Input</h2>

<form id="input" target="_self" method="get">
    <label for="length">Length in feet:</label><br>
    <input type="number" id="length" name="length"><br>
    <label for="width">Width in feet:</label><br>
    <input type="number" id="width" name="width"><br>
    <label for="depth">Depth in inches:</label><br>
    <input type="number" id="depth" name="depth"><br><br>
    <input id="button" type="button" value="Calculate!" onmouseover="validateInput()" onclick="calculator()">
</form>

<h2 hidden id="outputHeader">Here are your results</h2>

<p id="outputOne"></p>
<p id="outputTwo"></p>
<p id="outputThree"></p>
<p id="outputFour"></p>
<p id="outputFive"></p>

<p hidden id="bookmarkPrompt">Feel free to bookmark this page! You can come back to these calculations any time!</p>
</div>
<script>

//input
let lengthFt;
let widthFt;
let depthIn;

// output
let volumeCbYd;
let numberBags;
let totalPrice;

// const vars
const covertSqFt = 27;
const bagSizeCbYd = .5;
const bagPriceUSD = 10.99;

function setInput() {
    lengthFt = document.getElementById("length").value;
    widthFt = document.getElementById("width").value;
    depthIn = document.getElementById("depth").value;
}
function findVolumeSqYd(length, width, depthIn) {
    let depthFt = depthIn / 12;
    let volumeSqFt = length * width * depthFt;
    return  volumeSqFt / covertSqFt;
}
function findBags(volume, bagSize) {
   return Math.ceil(volume / bagSize);
}
function findPrice(bags, price){
    return bags * price;
}
function betterNumber(number) {
    return Math.round(number * 100) / 100;
}
function validateInput () {
    setInput();
    if (lengthFt > 0 && widthFt > 0 && depthIn > 0) {
        document.getElementById("button").value = "Calculate!";
        document.getElementById("button").style.opacity = "1";
        document.getElementById("button").style.cursor = "auto"
        console.log("Valid data." + lengthFt + widthFt + depthIn);
        return true;
    } else {
        document.getElementById("button").value = "Invald input";
        document.getElementById("button").style.opacity = "0.25";
        document.getElementById("button").style.cursor = "not-allowed"
        document.getElementById("outputHeader").hidden = true;
        document.getElementById("bookmarkPrompt").hidden = true;
        document.getElementById("outputPara").innerHTML = "Please enter values greater than zero for all inputs.";
        console.log("Invalid data" + lengthFt + widthFt + depthIn);
        return false;
    }
}
function getText () {
    document.getElementById("outputOne").innerHTML = "Thank you for using our calculator. ";
    document.getElementById("outputTwo").innerHTML = "You said your space is " + lengthFt + " feet long, " + widthFt + " feet wide, and " + depthIn + " inches deep. ";
    document.getElementById("outputThree").innerHTML = "The volume of that space is " + betterNumber(volumeCbYd) + " cubic yards. ";
    document.getElementById("outputFour").innerHTML = "You need to buy " + numberBags + " bags, as they cover " + bagSizeCbYd + " cubic yards each. ";
    document.getElementById("outputFive").innerHTML = "At $" + bagPriceUSD + " a bag, this will cost $" + betterNumber(totalPrice) + ". ";
    document.getElementById("outputHeader").hidden = false;
    document.getElementById("bookmarkPrompt").hidden = false
    return resultsText;
}
function calculator() {
    setInput();
    validateInput();
    if (validateInput()) {
        volumeCbYd = findVolumeSqYd(lengthFt, widthFt, depthIn);
        numberBags = findBags(volumeCbYd, bagSizeCbYd);
        totalPrice = findPrice(numberBags, bagPriceUSD)
        getText();
    } else {
        console.log("Invalid data.");
    }
}

</script>

</body>
</html>