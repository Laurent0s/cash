const fakeCheckbox = document.querySelector('[data-element="fake-checkbox"]')
const submitForm = document.querySelector("#submit-form")

const phoneInput = document.querySelector('#userPhone');
const nameInput = document.querySelector('#userName');

const phoneLabel = document.querySelector('[data-element="phone-label"]');

const phoneWarning = document.querySelector('[data-element="phone-warning"]');
const nameWarning = document.querySelector('[data-element="name-warning"]');

const validate = (inputValue, regExp) => {
    return regExp.test(inputValue);
}

phoneInput.addEventListener('change', (e) => {
  e.target.value = e.target.value.replace(/[\s\-]/g, '')
})

submitForm.addEventListener("submit", (e) => {
  nameInput.classList.remove('active');
  phoneLabel.classList.remove('active');
  phoneWarning.classList.add('hidden');
  nameWarning.classList.add('hidden');
  
  if (!/(?<=(^|\n)(38)?)(0\d{2})\d{7}(?=\r?\n|$)/.test(`380${phoneInput.value}`)) {
    phoneWarning.classList.remove('hidden');
    phoneLabel.classList.add('active');
    e.preventDefault();
  }

  if(!validate(nameInput.value, document.cookie.match(/(^| )locale=([^;]+)/)[2] === 'en_US' 
  ? /[a-zA-Z]{3,20}$/ 
  : /[а-яА-Я]{3,20}$/)){
    nameWarning.classList.remove('hidden');
    nameInput.classList.add('active');
    e.preventDefault();
  }

  if (document.querySelector("#userChecbox").checked) {
    fakeCheckbox.classList.remove('not-checked');
    return true;
  };
  
    fakeCheckbox.classList.add('not-checked')
    e.preventDefault();
  });
  