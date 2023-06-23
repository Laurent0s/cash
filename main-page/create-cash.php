<section class="main_wrapper__container">
    <div class="container__main_wrapper">
        
        <?php

        $var1 = __('Main-create-cash-heading', 'Cash-Theme');
        set_query_var('main-black-heading',  __('Main-create-cash-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading', __('Main-create-cash-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
        <!-- <p class="main_wrapper__subtitle">
            <?php _e('Main-create-cash-text','Cash-Theme')?>
        </p> -->
        <ul class="main_wrapper__list">
            <li class="main_wrapper__list__item">£</li>
            <li class="main_wrapper__list__item">€</li>
            <li class="main_wrapper__list__item">$</li>
            <li class="main_wrapper__list__item">₴</li>
        </ul>
    </div>
    <img class="img_create_cash" src="<?php echo get_template_directory_uri() ?>/assets/images/create_cash.webp" alt="">
</section>