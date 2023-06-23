<?php

/**
 * Template Name: Legal Page
 */ ?>


<?php 
	require_once 'legal-page/utils/get-document-category-children.php';
	get_header('', array('class' => 'contacts-legal-header')); 
?>

<div class="info__heading-container">
	<main class="container">
		<?php get_template_part('./legal-page/search'); ?>
		<?php get_template_part('./legal-page/search-results'); ?>
	</main>
</div>
<div class="container">
<section class="information" style="margin-bottom: 120px;">
    <div class="information-search__block">
        <?php get_template_part('/search-list') ?>
    </div>

    <div class="information-docs__block">
		<?php
			foreach (get_document_category_children(null) as $category) {
				get_template_part('legal-page/category', 'category', array(
					'category' => $category
				));
			}
		?>

        <div class="info__heading info__heading_no-border">
            <h1 id="requisites" class=" section-heading">
			<?php _e('Legal-search-list-requisites','Cash-Theme')?>
            </h1>
        </div>
        <?php get_template_part('/legal-page/requisites') ?>
    </div>
</section>

</div>

<?php get_footer(); ?>