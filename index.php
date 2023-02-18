<!DOCTYPE html>
<html>
<body>

<h1>Mulch Calculator</h1>

<h2>Input</h2>

<form id="input" target="_self" method="get">
    <label for="length">Length in feet:</label><br>
    <input type="number" id="length" name="length"><br>
    <label for="width">Width in feet:</label><br>
    <input type="number" id="width" name="width"><br>
    <label for="depth">Depth in inches:</label><br>
    <input type="number" id="depth" name="depth"><br><br>
    <input type="button" value="Calculate!" onclick="calculator()">
</form>

<h2 hidden id="outputHeader">Here are your results</h2>

<p id="outputPara"></p>

<p hidden id="bookmarkPrompt">Feel free to bookmark this page! You can come back to these calculations any time!</p>

<script>

//input
var lengthFt;
var widthFt;
var depthIn;

// output
var volumeCbYd;
var numberBags;
var totalPrice;

// const vars
const covertSqFt = 27;
const bagSizeCbYd = .5;
const bagPriceUSD = 10.99;

function setInput(length, width, depth) {
    lengthFt = document.getElementById("length").value;
    widthFt = document.getElementById("width").value;
    depthIn = document.getElementById("depth").value;
}
function findVolumeSqYd(length, width, depthIn) {
    var depthFt = depthIn / 12;
    var volumeSqFt = length * width * depthFt;
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
function getText () {
    var resultsText = "Thank you for using our calculator. ";
    resultsText += "You said your space is " + lengthFt + " feet long, " + widthFt + " feet wide, and " + depthIn + " inches deep. ";
    resultsText += "The volume of that space is " + betterNumber(volumeCbYd) + " cubic yards. ";
    resultsText += "You need to buy " + numberBags + " bags, as they cover " + bagSizeCbYd + " cubic yards each. ";
    resultsText += "At $" + bagPriceUSD + " a bag, this will cost $" + betterNumber(totalPrice) + ". ";
    document.getElementById("outputHeader").hidden = false;
    document.getElementById("bookmarkPrompt").hidden = false
    return resultsText;
}
function calculator() {
    setInput();
    volumeCbYd = findVolumeSqYd(lengthFt, widthFt, depthIn);
    numberBags = findBags(volumeCbYd, bagSizeCbYd);
    totalPrice = findPrice(numberBags, bagPriceUSD)
    document.getElementById("outputPara").innerHTML = getText();
}

</script>

</body>
</html>