<?php
add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'scripts_theme');
add_action('after_setup_theme', 'theme_register_header_menu');

function theme_register_header_menu()
{
    register_nav_menu('top_menu', 'меню в шапке');
}

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_menu_link_data($atts, $item, $args)
{
    if (property_exists($args, 'link_data')) {
        $atts['data-element'] = $args->link_data;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_data', 1, 3);

function style_theme()
{
    wp_enqueue_style('style', get_stylesheet_uri());
}
function scripts_theme()
{
    $translation_array = array('templateUrl' => get_stylesheet_directory_uri());

    wp_enqueue_script('script', get_template_directory_uri() . '/js/header.js');
    wp_localize_script('script', 'object_name', $translation_array);

    if (is_page('main-page')) {
        wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
        wp_enqueue_script('form-script', get_template_directory_uri() . '/js/form.js');
    } else if (is_page('legal-page')) {
        wp_enqueue_script('legal-page-script', get_template_directory_uri() . '/js/legal-page.js');
    } else if (is_page('contacts-page')) {
        wp_enqueue_script('contacts-script', get_template_directory_uri() . '/js/contacts.js');
    }
}

function disable_wp_auto_p($content)
{
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');

    return $content;
}
add_filter('the_content', 'disable_wp_auto_p', 0);

add_filter('register_post_type_args', 'change_register_post_type_args', 10, 2);

function change_register_post_type_args($args, $post_type)
{
    if ('Documents' === $post_type) {
        $args['hierarchical'] = true;
    }

    return $args;
}
add_post_type_support('Documents', array('page-attributes'));



add_action('init', 'create_taxonomy');
function create_taxonomy()
{
    register_taxonomy('categories', ['Документы'], [
        'label'                 => '', 
        'labels'                => [
            'name'              => 'Категорії',
            'singular_name'     => 'Категорія',
            'search_items'      => 'Знайти категорію',
            'all_items'         => 'Всі категорії',
            'view_item '        => 'Подивитись категорію',
            'parent_item'       => 'Батьківська категорія',
            'parent_item_colon' => 'Батьківська категорія:',
            'edit_item'         => 'Редагувати категорію',
            'update_item'       => 'Змінити категорію',
            'add_new_item'      => 'Добавити нову категорію',
            'new_item_name'     => 'Нова назва категорії ',
            'menu_name'         => 'Категорії',
            'back_to_items'     => '← Назад до категорії',
        ],
        'public'                => true,
        'hierarchical'          => true,
        'default_term' => [ 
            'name' => 'Інше', 
            'slug' => 'another',
            'description' => '',
        ],
    ]);
}

add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('Documents', [
        'label'  => null,
        'labels' => [
            'name'               => 'Документи',
            'singular_name'      => 'Документ',
            'add_new'            => 'Додати документ',
            'add_new_item'       => 'Додавання документа',
            'edit_item'          => 'Редагування документа',
            'new_item'           => 'Новий документ',
            'view_item'          => 'Дивитись документ',
            'search_items'       => 'Знайти документ',
            'not_found'          => 'Не знайдено',
            'not_found_in_trash' => 'Не знайдено в корзині',
            'parent_item_colon'  => '',
            'menu_name'          => 'Документи',
        ],
        'menu_position'       => 4,
        'menu_icon'           => true,
        'hierarchical'        => true,
        'supports'            => ['title', 'editor'], 
        'taxonomies'          => ['categories', 'type'],
        'has_archive'         => false,
        'public' => true,
        'rewrite' => array(
            'slug'       => 'my_post_type',
            'with_front' => false,
        ),
        'supports' => array(
            'page-attributes',
            'title',
            'editor',
            'something-else',
        ),
    ]);
    register_post_type('location', [
        'label'  => null,
        'labels' => [
            'name'               => 'Локації',
            'singular_name'      => 'Локація',
            'add_new'            => 'Додати локацію',
            'add_new_item'       => 'Додавання локації',
            'edit_item'          => 'Редагування локації',
            'new_item'           => 'Нова локація',
            'view_item'          => 'Дивитись локацію',
            'search_items'       => 'Знайти локацію',
            'not_found'          => 'Не знайдено',
            'not_found_in_trash' => 'Не знайдено в корзині',
            'parent_item_colon'  => '',
            'menu_name'          => 'Локації', 
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true, 
        'show_in_rest'        => true, 
        'rest_base'           => true,
        'menu_position'       => 4,
        'menu_icon'           => true,
        'hierarchical'        => true,
        'supports'            => ['title', 'editor'], 
        'taxonomies'          => ['place'],
        'has_archive'         => false,
        'public' => true,
        'rewrite' => array(
            'slug'       => 'my_post_type',
            'with_front' => false,
        ),
        'supports' => array(
            'page-attributes',
            'title',
            'editor',
            'something-else',
        ),
    ]);
    register_post_type('branches', [
        'label'  => null,
        'labels' => [
            'name'               => 'Відділення',
            'singular_name'      => 'Відділення',
            'add_new'            => 'Додати відділення',
            'add_new_item'       => 'Додати нове відділення',
            'edit_item'          => 'Редагувати відділення',
            'new_item'           => 'Нове відділення',
            'view_item'          => 'Дивитись відділення',
            'search_items'       => 'Знайти відділення', 
            'not_found'          => 'Не знайдено',
            'not_found_in_trash' => 'Не знайдено в корзині',
            'parent_item_colon'  => '',
            'menu_name'          => 'Відділення', 
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true, 
        'show_in_rest'        => true, 
        'rest_base'           => true,
        'menu_position'       => 4,
        'menu_icon'           => true,
        'hierarchical'        => true,
        'supports'            => ['title', 'editor'], 
        'taxonomies'          => ['place'],
        'has_archive'         => false,
        'public' => true,
        'rewrite' => array(
            'slug'       => 'my_post_type',
            'with_front' => false,
        ),
        'supports' => array(
            'page-attributes',
            "title",
            'editor',
            'something-else',
        ),
        'query_var'=> true,
    ]);
}

add_action('rest_api_init', function () {
    $namespace = 'myplugin/v1';

    register_rest_route($namespace, '/search-documents', [
        'methods'  => 'GET',
        'callback' => 'search_documents',
    ]);

    register_rest_route($namespace, '/calculator', [
        'methods' => 'GET',
        'callback' => 'receive_calculator_constants'
    ]);
});

function str_contains_registry_insensitive($haystack, $needle)
{
    return str_contains(mb_strtolower($haystack), mb_strtolower($needle));
}

add_action('locale', 'set_user_locale');

function set_user_locale($default_locale) {
    if (!isset($_COOKIE['locale'])) {
        return $default_locale;
    }
    
    return $_COOKIE['locale'];
}

function receive_calculator_constants()
{
    $formulas = get_page_by_title('Формули', 'OBJECT', 'post');
    return array(
        'maxCreditSum' => array(
            'shortTermMaxLoan' => get_field('short_term_max_loan', $formulas),
            'middleTermMaxLoan' => get_field('middle_term_max_loan', $formulas),
            'longTermMaxLoan' => get_field('long_term_max_loan', $formulas)
        ),
        'annualInterestRate' => array(
            'shortTermRate' => get_field('short_term', $formulas),
            'middleTermRate' => get_field('middle_term', $formulas),
            'longTermRate' => get_field('long_term', $formulas)
        )
    );
}

add_filter('the_title', 'locale_post_field_handler', 10, 2);
add_filter('the_content', 'locale_post_field_handler', 10, 1);
add_filter('acf/format_value', 'locale_post_field_handler', 10, 3);
add_filter('document_category_name', 'locale_post_field_handler', 10, 2);

function locale_post_field_handler($value, $entity_id = null, $field = null) {
    if (get_locale() !== 'en_US') {
        return $value;
    }
    
    switch (current_filter()) {
        case 'the_title':
            $name = 'title';
            break;
        case 'the_content':
            $name = 'content';
            break;
        case 'acf/format_value':
            $name = $field['name'];
            break;
        case 'document_category_name':
            $name = 'category-name';
            $entity = "categories_{$entity_id}";
            break;
        default:
            trigger_error('Localization Error: Undefined field type', E_USER_WARNING);
    }
     
    $locale_value = get_field("en-{$name}", $entity ?? $entity_id);

    if (!$locale_value) {
        return $value;
    }
    
    return $locale_value;
}

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'branches-fields',
        'title' => 'Для таблиць',
        'fields' => array(
            array(
                'key' => 'place_field',
                'label' => 'Місцезнаходження',
                'name' => 'place',
                'type' => 'text',
            ),
            array(
                'key' => 'work_hours_field',
                'label' => 'Режим роботи',
                'name' => 'work_hours',
                'type' => 'text',
            ),
            array(
                'key' => 'financial_services_field',
                'label' => 'Перелік фінансових послуг',
                'name' => 'financial_services',
                'type' => 'text',
            ),
            array(
                'key' => 'payment_services_field',
                'label' => 'Перелік платіжних послуг',
                'name' => 'payment_services',
                'type' => 'text',
            ),
            array(
                'key' => 'unit_head_field',
                'label' => 'Керівник підрозділу',
                'name' => 'unit_head',
                'type' => 'text',
            ),
            array(
                'key' => 'phone_number_field',
                'label' => 'Номер телефону для звернень і режим його роботи',
                'name' => 'phone_number',
                'type' => 'text',
            ),
            array(
                'key' => 'email_address_field',
                'label' => 'Адреса електронної скриньки та поштової адреси для листування з підрозділом',
                'name' => 'email_address',
                'type' => 'text',
            ),
            array(
                'key' => 'closing_date_field',
                'label' => 'Дата закриття та контактна інформація для звернень\'',
                'name' => 'closing_date',
                'type' => 'text',
            ),
            array(
                'key' => 'open_date_field',
                'label' => 'Дата відкриття',
                'name' => 'open_date',
                'type' => 'text',
            ),
            array(
                'key' => 'register_inclusion_field',
                'label' => 'Дата включення до реєстру та гіперпосилання',
                'name' => 'register_inclusion',
                'type' => 'text',
            ),
            array(
                'key' => 'work_status_field',
                'label' => 'Статус роботи',
                'name' => 'work_status',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Працює',
                'ui_off_text' => 'Не працює',
            ),
            array(
                'key' => 'cash_register_field',
                'label' => 'Каса',
                'name' => 'cash_register',
                'type' => 'true_false',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Так',
                'ui_off_text' => 'Ні',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'branches',
                ),
            ),
        ),
    ));

    endif;		
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'branches-name',
            'title' => 'Name ',
            'fields' => array(
                array(
                    'key' => 'branches-title',
                    'label' => 'Title',
                    'name' => 'en-title',
                    'type' => 'text',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'branches',
                    ),
                ),
            ),
        ));
    
        endif;		
    
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'en-branches-fields',
            'title' => 'For branches',
            'fields' => array(
                array(
                    'key' => 'en-place_field',
                    'label' => 'Location',
                    'name' => 'en-place',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-work_hours_field',
                    'label' => 'Mode of operation',
                    'name' => 'en-work_hours',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-financial_services_field',
                    'label' => 'List of financial services',
                    'name' => 'en-financial_services',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-payment_services_field',
                    'label' => 'List of payment services',
                    'name' => 'en-payment_services',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-unit_head_field',
                    'label' => 'Head of the unit',
                    'name' => 'en-unit_head',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-phone_number_field',
                    'label' => 'Phone number for inquiries and its mode of operation',
                    'name' => 'en-phone_number',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-email_address_field',
                    'label' => 'E-mail address and postal address for correspondence with the unit',
                    'name' => 'en-email_address',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-closing_date_field',
                    'label' => 'Closing date and contact information for inquiries',
                    'name' => 'en-closing_date',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-open_date_field',
                    'label' => 'Opening date',
                    'name' => 'en-open_date',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-register_inclusion_field',
                    'label' => 'Date of inclusion in the register and hyperlink',
                    'name' => 'en-register_inclusion',
                    'type' => 'text',
                ),
                array(
                    'key' => 'en-work_status_field',
                    'label' => 'Work-status',
                    'name' => 'en-work_status',
                    'type' => 'true_false',
                    'ui' => 1,
                    'ui_on_text' => 'Працює',
                    'ui_off_text' => 'Не працює',
                ),
                array(
                    'key' => 'cash_register_field',
                    'label' => 'Is Kassa',
                    'name' => 'cash_register',
                    'type' => 'true_false',
                    'default_value' => 0,
                    'ui' => 1,
                    'ui_on_text' => 'Так',
                    'ui_off_text' => 'Ні',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'branches',
                    ),
                ),
            ),
        ));
    
        endif;

function search_documents(WP_REST_Request $request)
{
    $sought_posts = [];

    $sought_part = $request['sought_part'];

    foreach (get_posts(array('numberposts' => '-1', 'post_type' => 'Documents')) as $post) {
        $title = get_the_title($post);
        $content = get_locale() === 'en_US'? get_field('en-content', $post->ID): $post->post_content;

        if (
            !str_contains_registry_insensitive($title, $sought_part)
            && !str_contains_registry_insensitive($content, $sought_part)
        ) continue;

        $sought_posts[] = array(
            'title' => $title,
            'url' => get_field('file', $post),
            'document_type' => get_field('document_type', $post),
            'content' => $content
        );
    }
    return $sought_posts? $sought_posts : 'not found';
}