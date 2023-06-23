<?php
global $post;

$category = $args['category'];

$documents = get_posts(
    array (
        'post_per_page' => -1,
        'numberposts' => -1,
        'post_type' => 'Documents',
        'tax_query' => array (
            array(
                'taxonomy' => 'categories',
                'field' => 'term_id',
                'terms' => $category->term_id,
                'include_children' => false
            )
        ),
    ));

foreach ( $documents as $post ):
    setup_postdata($post);

    switch ( get_field('document_type') ):
        case 'file-field':
?>
            <li class="info__item download__item">
                <p class="item__text">
                    <?php the_title() ?>
                </p>
                <div class="download">
                    <a href="<?php the_field('file') ?>" class="download__label" id="download__label"><?php _e('Legal-page-download','Cash-Theme')?></a>
                    <div class="download-icon"></div>
                </div>
            </li>
    <?php
        break;
        case 'text-field':
    ?>
            <li class="info__item docs__item">
                <p class="item__text">
                    <?php the_title() ?>
                </p>
                <div class="plus"></div>
            </li>

            <div class="text-block hidden">
                <p class="item__text"><?php the_content() ?></p>
            </div>
    <?php
        break;
        case 'no-name-text':
    ?>
        <li class="info__item docs__item">
            <p class="item__text"><?php the_content() ?></p>
        </li>
    <?php
        break;
        default:
            echo '<b>Document type error: undefined type</b>';
    ?>
<?php endswitch; ?>
<?php 
    endforeach;
    wp_reset_postdata(); 
?>