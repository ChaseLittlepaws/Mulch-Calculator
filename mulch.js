// the arithmetic of a mulch calculator
// Chase Tramel aka Kasey Chase Littlepaws | https://github.com/ChaseLittlepaws

// user input
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

function exampleInput() {
    lengthFt = 15;
    widthFt = 20;
    depthIn = 5;
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

exampleInput();
volumeCbYd = findVolumeSqYd(lengthFt, widthFt, depthIn);
numberBags = findBags(volumeCbYd, bagSizeCbYd);
totalPrice = findPrice(numberBags, bagPriceUSD)

console.log("You said your space is " + lengthFt + " feet long, " + widthFt + " feet wide, and " + depthIn + " inches deep.");
console.log("The volume of that space is " + betterNumber(volumeCbYd) + " cubic yards.");
console.log("You need to buy " + numberBags + " bags, as they cover " + bagSizeCbYd + " cubic yards each.");
console.log("At $" + bagPriceUSD + " USD a bag, this will cost $" + totalPrice + ".");