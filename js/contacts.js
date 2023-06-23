const hiddenSmElements = document.querySelectorAll('[data-element="td-hidden_sm"]');
const hiddenXsSmElements = document.querySelectorAll('[data-element="td-hidden_xs"], [data-element="td-hidden_sm"]');

const toogleTableExpanding = (table, tableContainer, tableButton) => {
    const currentTable = document.querySelector(`[data-element="${table}"]`);
    currentTable.querySelectorAll('[data-element="td-hidden"]').forEach(el => el.classList.toggle('hidden'));
    document.querySelector(`[data-element="${tableContainer}"]`).classList.toggle('branches__table-container_active');
    currentTable.classList.toggle('branches__table-active');

    const changeButtonLanguage = (close, open) => {
        tableButton.textContent = currentTable.classList.contains('branches__table-active') ? close : open;
    }

    document.cookie.match(/(^| )locale=([^;]+)/)[2] === 'en_US' 
    ? changeButtonLanguage('close full table', 'open full table') 
    : changeButtonLanguage('закрити повну таблицю', 'відкрити повну таблицю')    
}
document.body.addEventListener('click', (e) => {
    const {target: {dataset: {element : elementData}}} = e;
    switch(elementData){
        case 'table-button':
            toogleTableExpanding('branches-table', 'table-container', e.target);
            break;
        case 'currency-table-button':
            toogleTableExpanding('currency-branches-table', 'currency-table-container', e.target);
            break;
        default: 
            break;
    }
})





const changeColumnsVisibility = () => {
    const addHiddenClass = (elements) => {
        elements.forEach(el => el.classList.add('hidden'));
    } 
      
    const removeHiddenClass = (elements) => {
        elements.forEach(el => el.classList.remove('hidden'))
    }

    document.body.offsetWidth <= 768 && document.body.offsetWidth > 569 ?
    addHiddenClass(hiddenSmElements)
    : document.body.offsetWidth <= 568 
    ? addHiddenClass(hiddenXsSmElements)
    : removeHiddenClass(hiddenXsSmElements);
}

window.onload = () => {
  changeColumnsVisibility();
}

window.addEventListener('resize', () => {
    changeColumnsVisibility();
})
const mapCheckbox = document.querySelector('[data-element="map-checkbox"]');
mapCheckbox.addEventListener('click', () => {
    document.querySelectorAll('[data-element="branches-container"]').forEach(container => {
        container.classList.toggle('hidden')
    })
    document.querySelector('[data-element="map-image"]').classList.toggle('hidden')
})
