<?php
    require_once 'utils/get-document-category-name.php';
    $category = $args['category'];
?>

<div class="info__heading">
    <h2 class="info__link" id="<?php echo $category->term_id ?>">
        <h1 class="section-heading"><?php echo get_document_category_name($category); ?></h1>
    </h2>
</div>

<?php
    get_template_part('legal-page/subcategories', 'subcategories', array(
        'category_id' => $category->term_id
    ));

    get_template_part('legal-page/category-documents', 'category-documents', array(
        'category' => $category
    ));
?>