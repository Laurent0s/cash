<section class="section_office_success">
    <ul class="license_wrapper__list">
        <li class="license_wrapper__list_item">Лицензия от Национального Банка Украины</li>
        <li class="license_wrapper__list_item">Индивидуальный дизайн кассы для каждого партнера</li>
        <li class="license_wrapper__list_item">Квалифицированные <br> кассиры</li>
        <li class="license_wrapper__list_item">Занимает минимальную площадь (2-4 м2)</li>
    </ul>
    <?php
    set_query_var('main-black-heading', 'Что может');
    set_query_var('main-gray-heading', 'касса?');
    get_template_part('/heading'); ?>
    <p class="success_wrapper__subtitle">
        Упрощает финансовые операции. <br>
        Делает обмен валюты и оплату услуг приятнее.
    </p>

    <img class="black_img" src="<?php echo get_template_directory_uri() ?>/assets/images/black_line_grou_block.svg" alt="">
    <ul class="success_wrapper__list">
        <li class="success_wrapper__list__item">Обмен большинства валют мира</li>
        <li class="success_wrapper__list__item">Пополнение мобильного</li>
        <li class="success_wrapper__list__item">Пополнение банковских карт</li>
        <li class="success_wrapper__list__item">Коммунальные платежи</li>
    </ul>
    <img class="img_change_cassa_money" src="<?php echo get_template_directory_uri() ?>/assets/images/change_cassa_money.webp" alt="">
</section>