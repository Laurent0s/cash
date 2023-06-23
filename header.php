<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo get_bloginfo('name') ?> | <?php the_title() ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>

</head>

<body>
    <header style="position: relative; z-index: 3" class="page_header <?php echo $args['class'] ?>">
        <div class="page_header_container">
            <div class="header__burger" data-element="burger">
                <span data-element="burger"></span>
            </div>
            <a href="main-page" class="logo">
                <img class="img__logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.svg"
                    alt="" />
            </a>
            <nav class="nav">

                <!-- <?php wp_nav_menu(array(
                    'theme_location' => 'top_menu',
                    'container' => 'nav',
                    'container_class' => 'nav',
                    'menu_class' => 'nav_list',
                    'menu_id' => 'nav_list',
                    'add_li_class'  => 'nav_list_item',
                    'link_class' => 'nav_list_item_link',
                    'items_wrap'  => '<ul id="nav_list" class="nav_list" data-element="nav-list">%3$s</ul>',
                    'link_class'  => 'nav_list_item_link',
                    'link_data' => 'nav_link',
                )) ?> -->


                <ul class="nav_list" data-element="nav-list">
                    <li class="nav_list_item">
                        <a href="/main-page" 
                        class="nav_list_item_link" data-element="nav-link"><?php _e('Menu-main','Cash-Theme')?></a>
                    </li>
                    <li class="nav_list_item">
                        <a href="/contacts-page" 
                        class="nav_list_item_link" data-element="nav-link"><?php _e('Menu-contacts','Cash-Theme')?></a>
                    </li>
                    <li class="nav_list_item">
                        <a href="/legal-page" 
                        class="nav_list_item_link" data-element="nav-link"><?php _e('Menu-legal-page','Cash-Theme')?></a>
                    </li>
                </ul>
                <div class="flag_uk_rus activ_rus" data-element="language-block">
                <span class="language" data-element="lang"></span> 
                    <ul class="lang hidden" data-element="language-list">
                        <li class="lang-button language" id="en_US" data-lang="en_US">EN</li>
                        <li class="lang-button language" id="uk" data-lang="uk">UA</li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>