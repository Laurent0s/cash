<?php

/**
 * Template Name: Done Page
 *
 */ ?>


<?php get_header('', array('class' => 'done-header')); ?>
<a class="contact__link padding" href="main-page"><?php _e('Contacts-main','Cash-Theme')?> /</a>
<a class="contact__link link__orang" href="#"><?php _e('Done-page-link','Cash-Theme')?></a>

<div class="inside">
    <img class="check_mark" src="<?php echo get_template_directory_uri() ?>/assets/images/check_mark.webp" art="Проблема с картинкой">
    <h1 class="big_text"><?php _e('Done-heading','Cash-Theme')?></h1>
    <p class="small_text"><?php _e('Done-text','Cash-Theme')?></p>

    <ul class="social-icons">
        <li class="li-icons"><a class="social-icon-linkedin" href="#" title="..." target="_blank" rel="noopener"><img class="li_icon" src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin_ikon.webp"></a></li>
        <li class="li-icons"><a class="social-icon-instagram" href="#" title="..." target="_blank" rel="noopener"><img class="li_icon" src="<?php echo get_template_directory_uri() ?>/assets/images/instagram_icon.webp"></a></li>
        <li class="li-icons"><a class="social-icon-fb" href="#" title="..." target="_blank" rel="noopener"><img class="li_icon" src="<?php echo get_template_directory_uri() ?>/assets/images/facebook_icon.webp"></a></li>

    </ul>
</div>
<?php get_footer(); ?>