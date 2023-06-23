<?php
    require_once 'utils/get-document-category-children.php';

    foreach (get_document_category_children($args['category_id']) as $child_category) {
        get_template_part('legal-page/subcategory', 'subcategory', array(
            'category' => get_term($child_category->term_id, 'categories')
        ));
    }
?>