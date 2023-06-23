<div class="container__sum-calcullator">
  <h1 class="name-title-calc"><?php _e('Main-calculator-heading','Cash-Theme')?></h1>
  <form class="container__calculator" data-element="form-calculator">
    <div class="first_container">
      <label class="calculator__subtitle"><?php _e('Main-calculator-subtitle','Cash-Theme')?></label>
      <div class="calculator-input__container">
        <input class="calculator__in_money val-inputs" type="text" data-element="money-input" value="1" />
      </div>
      <label class="date__subtitle">₴</label>
      <input type="range" name="range" id="sum-range" value="1" min="1" max="7000" class="sum range-input" />
      <div class="calculator-values__container">
        <span class="calculator-values" data-element="sum-min-value">1₴</span>
        <span class="calculator-values" data-element="sum-max-value">7000₴</span>
      </div>

      <label class="calculator__subtitle date__subtitle"><?php _e('Main-calculator-date-subtitle','Cash-Theme')?></label>
      <div class="data-input__container">
        <input class="data_calculator val-inputs" value="7" type="text" data-element="days-input" id="days" />
      </div>
      <label class="date__subtitle">дн</label>
      <input type="range" name="days-range" id="days-range" value="7" min="1" max="30" class="days range-input" />
      <div class="calculator-values__container">
        <span class="calculator-values" data-element="date-min-value"><?php _e('Main-calculator-date-min-value','Cash-Theme')?></span>
        <span class="calculator-values" data-element="date-max-value"><?php _e('Main-calculator-date-max-value','Cash-Theme')?></span>
      </div>
    </div>
    <ul class="last_container">
      <li class="calculator__subtitle"><?php _e('Main-calculator-return-to','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="return-date"></li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-sum','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="sum">1₴</li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-total-spendings','Cash-Theme')?>:</li>
      <li class="calculator__subtitle">0₴</li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-amounts-of-payments','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="amount-of-payments">
        500,05₴
      </li>
    </ul>
    <ul class="last_container">
      <li class="calculator__subtitle"><?php _e('Main-calculator-annual-percentage','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="annual-percentage"></li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-real-annual-inerest-rate','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="real-annual-interest-rate"></li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-total-number-of-payments','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="total-number-of-payments">1</li>
      <li class="calculator__subtitle"><?php _e('Main-calculator-total-cost','Cash-Theme')?>:</li>
      <li class="calculator__subtitle" data-element="total-cost"></li>
    </ul>
  </form>
</div>