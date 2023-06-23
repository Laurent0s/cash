const currencyInput = document.querySelector('[data-element="currency-input"]');
const resultInput = document.querySelector('[data-element="result-input"]');
const currencySwitchBlock = document.querySelector(
  '[data-element="currency-switch-block"]'
);
const currencyElements = document.querySelectorAll('[data-element="currency"]');
const currencyList = document.querySelector('[data-element="currency-list"]');

let currentCurrency = "USD";
let presetCurrencies = [];
currencyElements.forEach((el) => presetCurrencies.push(el.dataset.currency));
let presetCurrenciesObj = {};

//Back

const requestData = () => {
  let request = new XMLHttpRequest();

  request.open(
    "GET",
    "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json",
    true
  );
  request.onload = function () {
    if (request.status == 200) {
      JSON.parse(this.response).filter((res) => {
        presetCurrencies.includes(res.cc);
        presetCurrenciesObj[res.cc] = res.rate;
      });
    }
  };
  request.send();
};

//Front

// const validation = (key) => {
//   return /\D/.test(key);
// };
// const exchangeSum = (rate, sum) => {
//   resultInput.value = (sum * rate).toFixed(2);
// };

// currencyInput.addEventListener("input", (e) => {
//   e.target.value = e.target.value.replace(/[^.\d]+/g, "");
// });

// currencyInput.addEventListener("keyup", (e) => {
//   if (!currencyInput.value) return;
//   exchangeSum(presetCurrenciesObj[`${currentCurrency}`], currencyInput.value);
// });

// currencySwitchBlock.addEventListener("click", () => {
//   currencyList.classList.toggle("hidden");
// });

// currencyList.addEventListener("click", (e) => {
//   let element;
//   if (e.target.dataset.element === "currency-list") return;
//   e.target.dataset.element !== "currency"
//     ? (element = e.target.closest('[data-element="currency"]'))
//     : (element = e.target);

//   currencySwitchBlock.className = `${element.dataset.currency.toLowerCase()}-image calculator-select__block`;

//   currencySwitchBlock.querySelector('[data-element="select-head"]').innerHTML =
//     element.querySelector('[data-element="select-head"]').innerHTML;

//   currentCurrency = element.dataset.currency;
//   if (!currencyInput.value) return;
//   exchangeSum(presetCurrenciesObj[`${currentCurrency}`], currencyInput.value);
// });
// requestData();

//Dropdown

let questionsList = document.querySelectorAll(".docs__item");

questionsList.forEach((item) => {
  item.addEventListener("click", () => {
    item.querySelector(".plus").classList.toggle("plus_active");
    item.classList.toggle("docs__item_active");
    item.nextElementSibling.classList.toggle("hidden");
  });
});

// Search List

const searchItems = document.querySelectorAll(".search__item");
const arrowBlock = document.querySelectorAll(".arrow-block");
const infoLinks = document.querySelectorAll(".info__link");

infoLinks[0].classList.add("info__link_active");
for (let link of searchItems) {
  link.addEventListener("click", () => {
    infoLinks.forEach((infoLink) =>
      infoLink.classList.remove("info__link_active")
    );

    document.getElementById(`${link.dataset.element}`).scrollIntoView();
    link.classList.add("info__link_active");
  });
}

// Search results

document.querySelector("#search-form").addEventListener("submit", (e) => {
  e.preventDefault();

  const infoSearch = document.getElementById("info-search");
  const requestedText = infoSearch.value;
  const isEnglishLocale = document.cookie.match(/(^| )locale=([^;]+)/)[2] === 'en_US';

  const displaySection = (isDisplayed) => {
    document
      .querySelector(".legal-page-search-results")
      .classList[isDisplayed ? "remove" : "add"]("hidden");
  };

  if (requestedText?.length < 3) {
    infoSearch.classList.add("info__input_not-valid");

    displaySection(false);
    return;
  }

  if ((isEnglishLocale && /[а-я]/i.test(requestedText ?? '')) 
      || (!isEnglishLocale && /[a-z]/i.test(requestedText ?? ''))) {
        infoSearch.classList.add("info__input_not-valid");
        
        document.querySelector('.label__search').textContent = isEnglishLocale
        ? 'Please, use only latin characters'
        : 'Будь-ласка, використовуйте тільки кирилицю';

        displaySection(false);
        return;
      }

  infoSearch.classList.remove("info__input_not-valid");
  infoSearch.value = "";

  const request = new XMLHttpRequest();

  request.open(
    "GET",
    `${window.location.origin}/wp-json/myplugin/v1/search-documents?sought_part=${requestedText}`,
    true
  );

  request.onload = function () {
    const resultEntities = JSON.parse(this.response);
    const resultsList = document.getElementById("search-results");

    const displayMessage = (messageSelector) => {
      document.querySelector(messageSelector).classList.remove("hidden");
      resultsList.classList.add("hidden");
      displaySection(true);
    };

    if (request.status !== 200) {
      displayMessage(".search-results-not-available");
      return;
    }

    if (resultEntities === "not found") {
      displayMessage(".search-results-not-found");
      return;
    }

    for (const message of document.querySelectorAll("[data-search-message]")) {
      message.classList.add("hidden");
    }

    resultsList.classList.remove("hidden");
    const sectionResults = document.getElementById('section__search__results')

    for (let i = 0; i < resultEntities.length; i++) {
      const {document_type, content, title, url} = resultEntities[i]
      let resultItem;
      let hiddenResultItem;
      switch(document_type) {
        case 'text-field' :
          resultItem = sectionResults.querySelector('.docs__item').cloneNode(true);
          hiddenResultItem = sectionResults.querySelector('.text-block').cloneNode(true);
          hiddenResultItem.textContent = content;
          resultItem.querySelector('.item__text').textContent = title;
          break;
        case 'file-field' :
          resultItem = sectionResults
          .querySelector(".download__item")
          .cloneNode(true);

          resultItem.querySelector(".item__text").textContent =
          title;

          resultItem.querySelector(".download__label").href = url;
          break;
        case 'no-name-text': 
          resultItem = sectionResults.querySelector('.no-name__item').cloneNode(true)
          resultItem.querySelector('.item__text').innerHTML = content.replace('&lt;', '<').replace('&gt;', '>');
          break;
        default: 
          continue
      }
 
      
      if (i === 0) {
        resultsList.innerHTML = "";
      }
      
      resultItem.classList.remove('hidden');
      resultsList.append(resultItem);
    
      if(hiddenResultItem) resultsList.append(hiddenResultItem);
    }
    
    displaySection(true);

    resultsList.addEventListener('click', (e) => {
      const {target} = e;
      switch(true){
        case target.classList.contains('plus'):
            target.classList.toggle("plus_active");
            target.parentElement.classList.toggle("docs__item_active");
            target.parentElement.nextElementSibling.classList.toggle("hidden");
          break;
        case target.classList.contains('docs__item'): 
            target.querySelector('.plus').classList.toggle("plus_active");
            target.classList.toggle("docs__item_active");
            target.nextElementSibling.classList.toggle("hidden");
          break;
        case target.classList.contains('title-text'):
            target.parentElement.querySelector('.plus').classList.toggle("plus_active");
            target.parentElement.classList.toggle("docs__item_active");
            target.parentElement.nextElementSibling.classList.toggle("hidden");
            break;
        default:
          break;
        }
    })

  };

  request.send();
});

