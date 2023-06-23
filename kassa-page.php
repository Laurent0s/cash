<?php

/**
 * Template Name: Kassa Page
 */ ?>
<?php get_header('', array('class' => 'kassa-header')); ?>
<?php get_template_part('/kassa/cash-register') ?>
<?php get_template_part('/kassa/office') ?>
<?php get_footer(); ?>