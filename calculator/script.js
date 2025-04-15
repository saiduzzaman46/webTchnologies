const display = document.getElementById("display");
const buttons = document.querySelectorAll(".buttons button");
const claculateValue = document.getElementById("claculate_value");

buttons.forEach((button) => {
  button.addEventListener("click", function () {
    const value = button.value;

    if (button.classList.contains("number")) {
      addValue(value);
    } else if (button.classList.contains("operator")) {
      addOperator(value);
    } else if (button.classList.contains("clear")) {
      clearAll();
    } else if (button.classList.contains("deleteLast")) {
      deleteLast();
    } else if (button.classList.contains("equal")) {
      claculateValue.value = display.value + " = ";
      calculateResult();
    }
  });
});

function addValue(value) {
  if (display.value === "0" || display.value === "Error") {
    display.value = value;
  } else {
    display.value += value;
  }
}

function addOperator(operator) {
  if (operator === "%") {
    const expression = display.value;
    const lastNumberMatch = expression.match(/[\d.]+$/);

    if (lastNumberMatch) {
      const lastNumber = parseFloat(lastNumberMatch[0]);
      const result = lastNumber / 100;
      display.value = expression.replace(/[\d.]+$/, result);
    }
  } else if (operator === "!") {
    display.value = factorial(parseInt(display.value));
  } else if (operator === "x2") {
    display.value = Math.pow(parseFloat(display.value), 2);
  } else if (operator === "√") {
    display.value = Math.sqrt(parseFloat(display.value));
  } else {
    display.value += operator;
  }
}

function factorial(n) {
  if (n < 0) return "Error";
  if (n === 0 || n === 1) return 1;
  let result = 1;
  for (let i = 2; i <= n; i++) {
    result *= i;
    if (result === Infinity) return "Overflow";
  }
  return result;
}

function clearAll() {
  display.value = "0";
  claculateValue.value = "";
}

function deleteLast() {
  if (display.value.length > 1) {
    display.value = display.value.slice(0, -1);
  } else {
    display.value = "0";
  }
}

function calculateResult() {
  try {
    display.value = eval(display.value.replace("×", "*").replace("÷", "/"));
  } catch {
    display.value = "Error";
  }
}
