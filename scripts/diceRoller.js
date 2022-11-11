$(document).ready(function () {
    let dicer = document.getElementById('dicer')
    let diceRes = "";
    let resultString = ""
    let resultSumm = 0;
    dicer.onclick = function (event) {
        let diceId = event.target.id;
        let result = document.getElementById('result')
        let summ = document.getElementById('summ')
        if (diceId === "") {
            return false
        } else if (diceId === "clear") {
            resultString = ""
            resultSumm = 0
            result.innerText = "Cleared"
            summ.innerText = "Сумма: "
        } else {
            diceRes = rollDice(diceId);
            resultSumm += parseInt(diceRes);
            resultString += diceId + ": " + diceRes + " "
            /*rollDice(diceId, diceRes).forEach(element => diceRes.push(element))*/

            result.innerText = resultString
            summ.innerText = "Сумма: " + resultSumm
        }
    }
})

function rollDice(id) {
    let re = /[1][d]/;
    let diceNum = id.replace(re, "");
/*    let result = Array();
    diceRes.forEach(element => result.push(element))
    result.push(getRandomIntInclusive(1, diceNum))
    console.log(result)*/
    return getRandomIntInclusive(1, diceNum)
}

function getRandomIntInclusive(min = 1, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}