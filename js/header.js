const headerBurger = document.querySelector("[data-element='burger']");
const headerMenu = document.querySelector("[data-element='nav-list']");
const navLinks = document.querySelectorAll("[data-element='nav-link']");
const languageList = document.querySelector("[data-element='language-list']");
const languageBlock = document.querySelector("[data-element='language-block']");

if(!document.cookie.match(/(^| )locale=([^;]+)/)){
  document.cookie = `locale=uk; path=/`;
  document.querySelector('[data-element="lang"]').textContent = 'UA';
};

const toggleMenu = () => {
  headerBurger.classList.toggle("active");
  headerMenu.classList.toggle("active");
};

const closeMenu = () => {
  headerBurger.classList.remove("active");
  headerMenu.classList.remove("active");
};

document.addEventListener("click", (e) => {
  switch (e.target.dataset.element) {
    case "burger":
      toggleMenu();
      break;
    case "nav-link":
      closeMenu();
      break;
  }
});

languageBlock.addEventListener("click", () => {
  languageList.classList.toggle("hidden");
});

languageList.addEventListener("click", (e) => {
  if (!e.target.id) {
    return;
  }

  document.querySelector('[data-element="lang"]').textContent = e.target.textContent;
  document.cookie = `locale=${e.target.dataset.lang}; path=/`;
  document.location.reload();
});

document.querySelector('[data-element="lang"').textContent = document.querySelector(`[data-lang="${document.cookie.match(/(^| )locale=([^;]+)/)[2]}"]`).textContent