<?php
    require_once 'utils/get-document-category-name.php';
    $category = $args['category'];
?>

<li class="info__item docs__item">
    <p class="item__text">
        <?php echo get_document_category_name($category); ?>
    </p>
    <div class="plus"></div>
</li>

<ul class="text-block hidden">
    <?php 
        get_template_part('legal-page/subcategories', 'subcategories', array(
            'category_id' => $category->term_id
        ));
        get_template_part('legal-page/category-documents', 'category-documents', array(
            'category' => $category
        ));
    ?>
</ul>