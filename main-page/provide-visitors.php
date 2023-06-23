<section class="visitors-container">
    <div class="visitors-container__change_money">
     <?php
        set_query_var('main-black-heading', __('Main-provide-visitors-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading', __('main-provide-visitors-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
        <p class="visitors-container__subtitle">
        <?php _e('Provide-visitors-subtitle','Cash-Theme')?>
        </p>
        <ul class="visitors-container__general-icon">
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-hotel','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-station','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-airports','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-mall','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-supermarket','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-restaurants','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-night-clubs','Cash-Theme')?></li>
            <li class="visitors-container__icon-subtitle"><?php _e('Provide-visitors-list-resedential','Cash-Theme')?></li>
        </ul>
    </div>
    <img class="visitors-container__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/Two-img-money-aouto.svg" alt="">
</section>