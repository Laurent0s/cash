<?php get_header('', array('class' => 'done-header')); ?>
<a class="contact__link padding" href="main-page"><?php _e('Contacts-main','Cash-Theme')?> /</a>
<a class="contact__link link__orang " href="#">404</a>


<h1 class="text_404"><?php _e('Not-found-code','Cash-Theme')?><br><span class="text_405"><?php _e('Not-found-page','Cash-Theme')?></span></h1>
<p class="text_406"><?php _e('Not-found-reason','Cash-Theme')?></p>

<a class="gobackbutton" href="main-page"> <?php _e('Not-found-button','Cash-Theme')?> </a>

<img class="right_arrow" src="<?php echo get_template_directory_uri() ?>/assets/images/right_arrow.webp" art="Проблема с картинкой">

<?php get_footer(); ?>