$(document).ready(function () {
    let dicer = document.getElementById('dicer')
    let diceRes = "";
    let resultString = ""
    let resultSumm = 0;
    dicer.onclick = function (event) {
        let diceId = event.target.id;
        let result = document.getElementById('result')
        let summ = document.getElementById('summ')
        let diceCount = document.getElementById('counter')
        if (diceId === "") {
            return false
        } else if (diceId === "clear") {
            resultString = ""
            resultSumm = 0
            result.innerText = "Cleared"
            summ.innerText = "Сумма: "
            diceCount.value = 1
        } else {
            if (diceId === 'dicer') {
                resultString += ""
            } else {
                if (diceCount.value < 1) {
                    diceCount.value = 1;
                }
                for (let i = 0; i < diceCount.value; i++) {
                    diceRes = rollDice(diceId);
                    resultSumm += parseInt(diceRes);
                    resultString += diceId + ": " + diceRes + " "
                }
            }

            result.innerText = resultString
            summ.innerText = "Сумма: " + resultSumm
        }
    }
})

function rollDice(id) {
    let re = /[1][d]/;
    let diceNum = id.replace(re, "");
    return getRandomIntInclusive(1, diceNum)
}

function getRandomIntInclusive(min = 1, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}