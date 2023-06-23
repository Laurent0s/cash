<dl class="contact-info">
    <?php $my_post = get_page_by_title('Контактні дані', OBJECT, 'post'); ?>
    <dt class="info__label"><?php _e('Legal-page-requisites-name-label','Cash-Theme')?></dt>
    <dd class="contact-info__text">
        <?php _e('Legal-page-requisites-name','Cash-Theme')?>
    </dd>
    <dt class="info__label"><?php _e('Legal-page-requisites-place-label','Cash-Theme')?></dt>
    <dd class="contact-info__text">
    <?php _e('Legal-page-requisites-place','Cash-Theme')?>
    </dd>
    <dt class="info__label"><?php _e('Legal-page-requisites-work-hours-label','Cash-Theme')?></dt>
    <dd class="contact-info__text">
    <?php _e('Legal-page-requisites-work-hours','Cash-Theme')?>
    </dd>
    <dt class="info__label"><?php _e('Legal-page-requisites-code-label','Cash-Theme')?></dt>
    <dd class="contact-info__text">43010876</dd>
    <dt class="info__label"><?php _e('Legal-page-requisites-phone-label','Cash-Theme')?></dt>
    <dd class="contact-info__text contact-info__text_orange">
        <a href="tel:<?php echo get_field('phone_number', $my_post->ID) ?>" class="contact-info__text contact-info__text_orange" id="contact-info-link">
        <?php echo get_field('phone_number', $my_post->ID) ?>
        </a>
    </dd>
    <dt class="info__label">E-mail</dt>
    <dd class="contact-info__text contact-info__text_orange">
        <a href="mailto:<?php echo get_field('email', $my_post->ID) ?>" 
        class="contact-info__text contact-info__text_orange" id="contact-info-link"><?php echo get_field('email', $my_post->ID) ?></a>
    </dd>
    <dt class="info__label"><?php _e('Legal-page-requisites-complaint-label','Cash-Theme')?></dt>
    <dd class="contact-info__text contact-info__text_orange">
        <a href="mailto:<?php echo get_field('email', $my_post->ID) ?>" 
        class="contact-info__text contact-info__text_orange" id="contact-info-link"><?php echo get_field('email', $my_post->ID) ?></a>
    </dd>
    <dt class="info__label">
    <?php _e('Legal-page-requisites-complaint-address-label','Cash-Theme')?>
    </dt>
    <dd class="contact-info__text">
    <?php _e('Legal-page-requisites-complaint-address','Cash-Theme')?>
    </dd>
</dl>