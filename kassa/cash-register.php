<section class="wrapper_container_cash">
    <div class="cash_wrapper">
        <?php
        set_query_var('main-black-heading', 'Кассы.');
        set_query_var('main-gray-heading', 'Cash.');
        get_template_part('/heading'); ?>
        <p class="cash_subtitle">
            Премиальные классы для обмена валют, пополнения мобильных, банковских карт
            и других платежей.
        </p>
        <ul class="cash_list">
            <li class="cash_list_item_icon"></li>
            <li class="cash_list_item_icon"></li>
            <li class="cash_list_item_icon"></li>
        </ul>
    </div>
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/exchange_cash.webp" alt="" class="cash_exchange" />
</section>