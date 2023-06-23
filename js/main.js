const container = document.querySelector('[data-element="container"]');
const track = document.querySelector('[data-element="track"]');
const item = document.querySelectorAll('[data-element="item"]');
const nextButton = document.querySelector('[data-element="next-button"]');
const prevButton = document.querySelector('[data-element="prev-button"]');
const body = document.querySelector("body");
const sum = document.querySelector("#sum-range");
const days = document.querySelector("#days-range");
const moneyInput = document.querySelector('[data-element="money-input"]');
const daysInput = document.querySelector('[data-element="days-input"]');
const realAnnualInterestRate = document.querySelector('[data-element="real-annual-interest-rate"]');
const returnWithPercent = document.querySelector(
  '[data-element="total-cost"]'
);
const annualPercentage = document.querySelector('[data-element="annual-percentage"]')
const amountsOfPaymanets = document.querySelector('[data-element="amount-of-payments"]');
const form = document.querySelector('[data-element="form-calculator"]');

const request = new XMLHttpRequest();

request.open(
  "GET",
  `${window.location.origin}//wp-json/myplugin/v1/calculator`,
  true
);

const setElementsInitialValue = () => {
  document.querySelector('[data-element="sum-max-value"]').textContent = `${getMaxLoan()}₴`;
  document.getElementById('sum-range').setAttribute('max', getMaxLoan())
  annualPercentage.textContent = `${getAnnualPercentage() * 100}%`
}
let results;

const getMaxLoan = () => {
  const {shortTermMaxLoan, middleTermMaxLoan, longTermMaxLoan} = results.maxCreditSum;
    return daysInput.value <= 7 ? shortTermMaxLoan 
    : daysInput.value >= 8 && daysInput.value <=20 ? middleTermMaxLoan 
    : longTermMaxLoan;
}

request.onload = function () {
  results = JSON.parse(this.response);
  
  for(let key in results){
    for ( let value in results[key]){
      results[key][value] = Number(results[key][value])
    }
  }

  getMaxLoan();
  setFormattedDate();
  setActualTotalSumAndRealRate();
  setElementsInitialValue();
  
}
request.send();

const getAnnualPercentage = () => {
  const {shortTermRate, middleTermRate, longTermRate} = results.annualInterestRate;
  return daysInput.value <= 7 ? shortTermRate 
    : daysInput.value >= 8 && daysInput.value <= 20 ? middleTermRate 
    : longTermRate
}

const setActualTotalSumAndRealRate = () => {
  const totalAmount = Number(moneyInput.value) * (1 + getAnnualPercentage() * daysInput.value / 365);
  realAnnualInterestRate.textContent = `${(((totalAmount / moneyInput.value) ** (365 / (Number(daysInput.value) === 1 ? daysInput.value : daysInput.value - 1)) - 1) *100).toFixed(2)}%`;
  returnWithPercent.textContent = `${totalAmount.toFixed(2)}₴`;
  amountsOfPaymanets.textContent = `${totalAmount.toFixed(2)}₴`
};

const setFormattedDate = () => {
  let countDaysDate = new Date(Date.now() + (daysInput.value - 1) * 24 * 60 * 60 * 1000);
  document.querySelector(
    '[data-element="return-date"]'
  ).textContent = (document.cookie.match(/(^| )locale=([^;]+)/)[2] === 'en_US' 
  ? ['su','mo', 'tu', 'we', 'th', 'fr', 'sa'] 
  : ["вс", "пн", "вт", "ср", "чт", "пт", "сб"])[countDaysDate.getDay()] + ',' +
  countDaysDate.toLocaleDateString("sv").split("-").reverse().join(".");
};

form.addEventListener("input", ({ target}) => {
  const validateNumbers = (val, input) => {
    input.value = val.replace(/[^.\d]+/g, "");
  }

  const {value} = target
  switch (target) {
    case sum:
      moneyInput.value = Math.round(sum.value / 100) * 100 === 0 ? 1 : Math.round(sum.value / 100) * 100;
      break;
    case days:
      daysInput.value = days.value;
      break;
    case moneyInput:
      validateNumbers(value, moneyInput);
      break;
    case daysInput:
      validateNumbers(value, daysInput)
    default:
      return;
  }
});


form.addEventListener("change", ({ target}) => {

  const changeMaxLoanValues = () => {
    setActualTotalSumAndRealRate();
    getMaxLoan();
    setElementsInitialValue();
    validateMaxAndMinValue(moneyInput.value, moneyInput, getMaxLoan(), 1);
    setSumValue(moneyInput);
    setActualTotalSumAndRealRate();
  }

  const setSumValue = (input) => {
    document.querySelector(
      '[data-element="sum"]'
    ).innerHTML = `${input.value}₴`;
  }

  
  const validateMaxAndMinValue = (val, input, maxNumber, minNumber) => {
    input.value = val >= maxNumber ? maxNumber : val <= minNumber ? minNumber : val;
  };

  const {value} = target
  switch (target) {
    case moneyInput:
      validateMaxAndMinValue(value, moneyInput, getMaxLoan(), 1);
      setSumValue(moneyInput);
      sum.value = moneyInput.value;
      setActualTotalSumAndRealRate();
      break;
    case sum:
      document.querySelector(
        '[data-element="sum"]'
      ).innerHTML = `${moneyInput.value}₴`;
      setActualTotalSumAndRealRate();
      break;
    case daysInput:
      validateMaxAndMinValue(value, daysInput, 30, 1);
      days.value = daysInput.value;
      changeMaxLoanValues();
      setFormattedDate();
      annualPercentage.textContent = `${getAnnualPercentage() * 100}%`
      break;
    case days:
      setFormattedDate();
      changeMaxLoanValues();
      break;
    default:
      return;
  }
});


let position = 0;
const breakpoints = {
  xl: 1200,
  lg: 992,
  md: 768,
  sm: 578,
};
window.addEventListener("resize", () => {
  position = 0;
  transformItem();
});
const countShownItems = () => {
  const { xl, md, sm } = breakpoints;
  return body.offsetWidth >= xl
    ? 4
    : body.offsetWidth >= md
    ? 3
    : body.offsetWidth >= sm
    ? 2
    : 1;
};

const getElementWidth = () => {
  let itemWidth;
  item.forEach((el) => {
    body.offsetWidth >= breakpoints.sm
      ? (itemWidth = el.offsetWidth + 25)
      : (itemWidth = el.offsetWidth);
  });
  return itemWidth;
};

const getTrackWidth = () => {
  return (
    item.length * getElementWidth() - getElementWidth() * countShownItems()
  );
};

const transformItem = () => {
  item.forEach((item) => {
    item.style.transform = `translateX(${position}px)`;
  });
};

prevButton.addEventListener("click", () => {
  position === 0
    ? (position = -getTrackWidth())
    : (position += getElementWidth());

  transformItem();
});

nextButton.addEventListener("click", () => {
  position === -getTrackWidth()
    ? (position = 0)
    : (position -= getElementWidth());

  transformItem();
});

//Fast Currency Exchange

const inputs = document.querySelectorAll("[data-element='color-radio']");
const imageBlockImage = document.querySelector('[data-element="automat-image"');

document
  .querySelector("[data-element='radio-buttons-block']")
  .addEventListener("click", () => {
    for (let input of inputs) {
      if (input.checked) {
        imageBlockImage.src = `${object_name.templateUrl}/assets/images/${input.value}.webp`;
      }
    }
  });
