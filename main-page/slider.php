<section class="page_content_section">
    <div class="content_section__title">
        <?php
        set_query_var('main-black-heading', __('Main-slider-heading', 'Cash-Theme'));
        set_query_var('main-gray-heading', __('main-slider-heading-gray', 'Cash-Theme'));
        get_template_part('/heading'); ?>
    </div>

    <div class="content_section__card_hotels">
        <div class="slider-container" data-element="container">
            <button class="slider-arrow slider-prev" data-element="prev-button"></button>
            <div class="slider-track" data-element="track">
                <?php
                $my_posts = get_posts(array(
                    'numberposts' => -1,
                    'category' => 0,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'include' => array(),
                    'exclude' => array(),
                    'meta_key' => '',
                    'meta_value' => '',
                    'post_type' => 'location',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                ));

                global $post;

                foreach ($my_posts as $post) {
                    setup_postdata($post);
                ?>

                    <article class="card_hotels slider-item" data-element="item">
                        <?php
                        $media = get_attached_media('image', $post->ID);
                        $media = array_shift($media);

                        $image_url = $media->guid;
                        ?>
                        <img class="airlans_kiev" alt="kiev-airport" src="<?php echo $image_url ?>" />
                        <div class="wrapper__items">
                            <h1 class="titles">
                                <?php the_title(); ?>
                            </h1>
                            <div class="place-type place-type-label <?php 
                                switch(get_field('place-type')){
                                    case 'Airport':
                                    case 'Аеропорт':
                                        echo 'airport';
                                        break;
                                    case 'Hotel':
                                    case 'Готель':
                                        echo 'hotel';
                                        break;
                                    default: 
                                        break;
                                }
                            ?>"><?php echo get_field('place-type'); ?></div>
                            <p class="subtitle_local">
                                <?php _e('main-slider-city', 'Cash-Theme'); echo get_field('city'); ?>
                            </p>
                        </div>
                    </article>
                <?php }

                ?>



            </div>

            <button class="slider-arrow slider-next" data-element="next-button"></button>
        </div>
    </div>
</section>