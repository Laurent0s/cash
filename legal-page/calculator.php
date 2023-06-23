<section class="calculator">
    <h2 class="calculator__headling">
        <?php echo __('Legal-Calculator', 'Cash-Theme'); ?>
        <span class="section-heading_gray">обмена валют</span>
    </h2>

    <form class="calculator__inputs">
        <div class="calculator-select__block usd-image" id="calculator__select" data-element="currency-switch-block">
            <p class="select-head calculator__select" data-element="select-head">
                USD <br />
                <span class="select-head_label" data-element="select-head-label">Доллар, США</span>
            </p>

            <ul class="currency__options hidden" data-element="currency-list">
                <li class="option-item usd-image" data-element="currency" data-currency="USD">
                    <p class="select-head" data-element="select-head">
                        USD <br />
                        <span class="select-head_label">Доллар, США</span>
                    </p>
                </li>
                <li class="option-item eur-image" data-element="currency" data-currency="EUR">
                    <p class="select-head" data-element="select-head">
                        EUR <br />
                        <span class="select-head_label">Евро</span>
                    </p>
                </li>
            </ul>
        </div>

        <input type="text" class="calculator__input info__input calculator__input_left" placeholder="Введите сумму" data-element="currency-input" />

        <div class="equal-sign__block equal-sign" data-element="equal-sign">=</div>

        <input disabled type="text" class="calculator__input info__input calculator__input_right" placeholder="Вы получите XXX" data-element="result-input" />
    </form>
</section>