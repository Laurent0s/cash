<section class="section">
    <div class="section_container_content">
        <?php
        set_query_var('main-black-heading', __('Main-success-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading',  __('main-success-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
        <!-- <p class="container__subtitle">
            <?php _e('Success-subtitle','Cash-Theme')?>!
        </p> -->
        <ul class="text_icon_group">
            <li class="group__subtitle"><span class="subtitle"><?php _e('Success-list-1','Cash-Theme')?></span></li>
            <li class="group__subtitle"> <span class="subtitle"><?php _e('Success-list-2','Cash-Theme')?></span></li>
            <li class="group__subtitle"><span class="subtitle"><?php _e('Success-list-3','Cash-Theme')?></span>
            </li>
            <li class="group__subtitle"><span class="subtitle"><?php _e('Success-list-4','Cash-Theme')?></span>
            </li>
        </ul>
        <?php set_query_var('clear-button-text', __('Main-success-button', 'Cash-Theme'));
        get_template_part('/clear-button'); ?>
    </div>
    <div class="city-animation-container">
        <video class="city-animation-media" src="<?php echo get_template_directory_uri(); ?>/assets/images/city-animation.mp4" autoplay loop muted></video>
    </div>
</section>