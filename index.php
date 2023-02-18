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

function setInput(length, width, depth) {
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
function invalidateInput () {
    document.getElementById("outputHeader").hidden = true;
    document.getElementById("bookmarkPrompt").hidden = true
    document.getElementById("outputPara").innerHTML = "Please enter values greater than zero for all inputs.";
}
function getText () {
    let resultsText = "Thank you for using our calculator. ";
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
    if (lengthFt > 0 && widthFt > 0 && depthIn > 0) {
        volumeCbYd = findVolumeSqYd(lengthFt, widthFt, depthIn);
        numberBags = findBags(volumeCbYd, bagSizeCbYd);
        totalPrice = findPrice(numberBags, bagPriceUSD)
        document.getElementById("outputPara").innerHTML = getText();
    } else {
        invalidateInput();
    }
}

</script>

</body>
</html>