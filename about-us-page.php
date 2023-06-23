<?php

/**
 * Template Name: About Us Page
 */ ?>
<?php get_header('', array('class' => 'about-us-header')); ?>
<?php get_template_part('/about-us/about-the-company') ?>
<?php get_template_part('/about-us/development') ?>
<?php get_template_part('/about-us/company-time') ?>
<?php get_template_part('/about-us/map') ?>
<?php get_footer(); ?>