function appendToDisplay(value) {
    document.getElementById("display").value += value;
}

function clearDisplay() {
    document.getElementById("display").value = '';
}

function calculateExpression(expression) {
    var result = eval(expression);
    var resultDisplay = document.getElementById("resultDisplay");
    
    if (result === undefined) {
        resultDisplay.innerText = "Erro de expressão";
    } else {
        resultDisplay.innerText = "Resultado: " + result;
    }

    return result;
}

function calculate() {
    var expression = document.getElementById("display").value;
    calculateExpression(expression);
}
