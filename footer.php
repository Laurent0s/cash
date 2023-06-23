<footer class="page_footer">
    <div class="page_footer_container">
        <div class="container_info_company">
            <?php
            $my_post = get_page_by_title('Контактні дані', OBJECT, 'post');
            ?>

            <div class="address_company">
                <p class="address_prag"><?php _e('Contacts-address', 'Cash-Theme')?></p>
                <h1 class="address_title"><?php echo get_field('address', $my_post->ID) ?></h1>
            </div>
            <div class="phone_company">
                <p class="address_prag"><?php _e('Contacts-phone', 'Cash-Theme')?></p>
                <a class="address_title" href="tel:+430432143241"><?php echo get_field('phone_number', $my_post->ID) ?></a>
            </div>
            <div class="mail_company">
                <p class="address_prag"><?php echo _e('Contacts-email', 'Cash-Theme')?></p>
                <a class="address_title" href="mailto:"><?php echo get_field('email', $my_post->ID) ?></a>
            </div>
            <p class="text-category">
                *
                <?php echo __('Footer-remark', 'Cash-Theme')?></p>
            <img class="logo_img" src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.svg" alt="logo" />
        </div>

        <div class="container_info_company_set">
            <div class="container_info">
                <div class="container_info_content">
                <ul class="first_info_list">
            <li class="fisrt_info_list_item">
              <a href="/main-page" class="fisrt_info_list_item_link"><?php _e('Menu-main','Cash-Theme')?></a>
            </li>
            <li class="fisrt_info_list_item">
              <a href="/contacts-page" class="fisrt_info_list_item_link"><?php _e('Menu-contacts','Cash-Theme')?></a>
            </li>
            <li class="fisrt_info_list_item">
              <a href="/legal-page" class="fisrt_info_list_item_link"><?php _e('Menu-legal-page','Cash-Theme')?></a>
            </li>
          </ul>
          <!-- <?php wp_nav_menu(array(
                    'theme_location' => 'top_menu',
                    'container' => 'div',
                    'container_class' => 'container_info_content',
                    'menu_class' => 'first_info_list',
                    'add_li_class'  => 'fisrt_info_list_item',
                    'link_class' => 'fisrt_info_list_item_link',
                    'items_wrap'  => '<ul class="first_info_list">%3$s</ul>',
                    'link_class'  => 'fisrt_info_list_item_link',
                )) ?> -->
                </div>
                <div class="icon_set_mesage">
                    <div class="linkeding_set icon_set_mesage">
                        <img class="icon_set_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin.webp" alt="" />
                    </div>
                    <div class="instagram_set icon_set_mesage">
                        <img class="icon_set_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.webp" alt="" />
                    </div>
                    <div class="facebook_set icon_set_mesage">
                        <img class="icon_set_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.webp" alt="" />
                    </div>
                </div>
            </div>
            <div class="registir_company">
                <?php
                $file = get_page_by_title('Політика конфіденційності', OBJECT, 'post');
                ?>
                <div class="privat">
                    <a href="<?php echo get_field('privacy_policy', $file->ID)['url'] ?>" class="privat_chex add-style-right"><?php echo _e('Footer-privacy-policy', 'Cash-Theme')?></a>
                    <p class="privat_chex"><?php echo _e('Footer-terms-of-use', 'Cash-Theme')?></p>
                </div>
                <div>
                    <p class="privat_chex chex-prag">
                        © 2022 CASH. <?php echo _e('Footer-rights', 'Cash-Theme')?>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>