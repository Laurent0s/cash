<?php
    require_once 'legal-page/utils/get-document-category-name.php';
?>

<ul class="search__list">
    <?php
    $terms = get_terms([
        'taxonomy' => 'categories',
        'hide_empty' => false,
    ]);
    if ($terms) {
        foreach ($terms as $term) {
            if ($term->parent === 0) { ?>
                <li class="search__item item__label info__link" data-element="<?php echo $term->term_id ?>">
                    <?php echo get_document_category_name($term); ?>
                </li>
    <?php }
        }
    }
    ?>
    <li class="search__item item__label info__link" data-element="requisites">
    <?php _e('Legal-search-list-requisites','Cash-Theme')?>
    </li>
</ul>