<section class="page_container_cash" >
    <?php
    set_query_var('main-black-heading', __('Contacts-map-heading', 'Cash-Theme'));
    set_query_var('main-gray-heading', __('contacts-map-heading-gray', 'Cash-Theme'));
    get_template_part('/heading'); ?>
    <div class="page_container_cash__wrapper">
        <div class="group_subtitle_and_input">
            <span class="cash__wrapper__subtitle"><?php _e('Contacts-map','Cash-Theme')?></span>
            <input class="checbox_in" type="checkbox" data-element="map-checkbox">
            <span class="cash__wrapper__subtitle"><?php _e('Contacts-list','Cash-Theme')?></span>
        </div>
        <label class="wrapper_in_btn">
            <input type="text" placeholder="<?php _e('Contacts-street','Cash-Theme')?>" class="form_input">
            <button class="serch_btn"><?php _e('Contacts-search','Cash-Theme')?></button>
        </label>

        <button class="location"></button>

    </div>
    <img class="card_location" src="<?php echo get_template_directory_uri() ?>/assets/images/cardlocation.svg" alt="" 
    data-element="map-image">
</section>