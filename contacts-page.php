<?php

/**
 * Template Name: Contacts Page
 */ ?>

<?php get_header('', array('class' => 'contacts-legal-header')); ?>
<?php get_template_part('/contacts/company-contacts') ?>
<?php get_template_part('/contacts/map') ?>
<?php get_template_part('/contacts/branches') ?>
<?php get_footer(); ?>