<div class="wrapper_first_content" id="main-form-section">
    <div class="section__title">
        <?php
        set_query_var('main-black-heading', __('Main-personal-consultaion-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading', __('main-personal-consultaion-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
    </div>
    <?php get_template_part('/form') ?>
</div>