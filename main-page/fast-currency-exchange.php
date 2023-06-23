<section class="first__container">
    <div class="container__change_money">
        <?php
        set_query_var('main-black-heading', __('Main-fast-currency-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading', __('Main-fast-currency-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
        <ul class="change_money__list">
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-1', 'Cash-Theme');?></p>
            </li>
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-2', 'Cash-Theme');?></p>
            </li>
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-3', 'Cash-Theme');?></p>
            </li>
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-4', 'Cash-Theme');?></p>
            </li>
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-5', 'Cash-Theme');?></p>
            </li>
            <li class="change_money__item">
                <p class="change_money__item--subtitle"><?php _e('Main-fast-currency-list-6', 'Cash-Theme');?></p>
            </li>
        </ul>
    </div>
    <div class="change_money_auto">
        <form class="img_air">
            <img class="imgfisrt" src="<?php echo get_template_directory_uri() ?>/assets/images/image17.webp" alt="" />
            <div class="img_cash_money_auto">
                <div class="label" data-element="radio-buttons-block">
                    <input id="orange-radio" type="radio" value="orange" class="radio" name="color" data-element='color-radio' />
                    <label for="orange-radio" class="input-label"></label>
                    <input id="silver-radio" type="radio" value="silver" class="radio" name="color" data-element='color-radio' />
                    <label for="silver-radio" class="input-label label_gray"></label>
                    <input id="black-radio" type="radio" value="black" class="radio" name="color" data-element='color-radio' checked />
                    <label for="black-radio" class="input-label label_gunmetal"></label>
                </div>
                <img class="img-z" src="<?php echo get_template_directory_uri(); ?>/assets/images/black.webp" alt="" data-element="automat-image">
            </div>
        </form>
    </div>
</section>