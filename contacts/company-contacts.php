<section class="page_section__contact">
    <a class="contact__link" href="main-page"><?php _e('Contacts-main','Cash-Theme')?>/</a>
    <a class="contact__link link__orang" href="#"><?php _e('Contacts-contacts','Cash-Theme')?></a>
    <?php
    set_query_var('main-black-heading', __('Contacts-heading', 'Cash-Theme'));
    set_query_var('main-gray-heading', __('contacts-heading-gray', 'Cash-Theme'));
    get_template_part('/heading'); ?>
    <?php
    $my_post = get_page_by_title('Контактні дані', OBJECT, 'post');
    ?>

    <ul class="contact__list">
        <li class="contact_list__item">
            <p class="item_subtitle"><?php _e('Contacts-address', 'Cash-Theme')?></p>
            <p class="item_title"><?php echo get_field('address', $my_post->ID) ?></p>
        </li>
        <li class="contact_list__item">
            <p class="item_subtitle"><?php _e('Contacts-phone', 'Cash-Theme')?></p>
            <p class="item_title"><?php echo get_field('phone_number', $my_post->ID) ?></p>
        </li>
        <li class="contact_list__item">
            <p class="item_subtitle"><?php _e('Contacts-email', 'Cash-Theme')?></p>
            <p class="item_title"><?php echo get_field('email', $my_post->ID) ?></p>
        </li>
    </ul>
</section>