<section class="page_container_cash">
    <?php
    set_query_var('main-black-heading', 'Решения Cash');
    set_query_var('main-gray-heading', 'доступны по всей Украине!');
    get_template_part('/heading'); ?>
    <div class="page_container_cash__wrapper">
        <div class="group_subtitle_and_input">
            <span class="cash__wrapper__subtitle">Карта</span>
            <input class="checbox_in" type="checkbox">
            <span class="cash__wrapper__subtitle">Список</span>
        </div>
        <label class="wrapper_in_btn">
            <input type="text" placeholder="Название улицы" class="form_input">
            <button class="serch_btn">Найти</button>
        </label>

        <button class="location"></button>

    </div>
    <img class="card_location" src="<?php echo get_template_directory_uri() ?>/assets/images/cardlocation.svg" alt="">
</section>