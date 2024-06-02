<?php

// подключаем стили и скрипты
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_style('fancybox-gallery', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css');
    wp_enqueue_style('wow-animate', get_template_directory_uri() . "/assets/css/animate.min.css");
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_style('pollinamak-style', get_template_directory_uri() . "/assets/css/main.css");
    wp_enqueue_style('pollinamak-fonts-google', 'https://fonts.googleapis.com');
    wp_enqueue_style('pollinamak-fonts-gstatic', 'https://fonts.gstatic.com');
    wp_enqueue_style('pollinamak-fonts-raleway', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    wp_enqueue_style('pollinamak-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
    wp_enqueue_style('pollinamak-fonts-montseratt', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    wp_enqueue_style('pollinamak-fonts-tenor-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Tenor+Sans&display=swap');


	wp_enqueue_script('fancybox-gallery-js', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', array(), '1.0.0', true);
	wp_enqueue_script('gallery-js', get_template_directory_uri() . '/assets/javascript/gallery.js', array(), '1.0.0', true);
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '1.0.0', true);
	wp_enqueue_script('main', get_template_directory_uri() . '/assets/javascript/app.js', array(), '1.0.0', true);
	wp_enqueue_script('slider', get_template_directory_uri() . '/assets/javascript/slider.js', array(), '1.0.0', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/javascript/wow.min.js', array(), '1.0.0', true);
    
    }
	);

add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support( 'custom-logo');

// убрать лишние пункты меню в админке

function remove_menus(){
    remove_menu_page( 'edit.php' );                   //Записи
    remove_menu_page( 'edit-comments.php' );          //Комментарии
  }
  add_action( 'admin_menu', 'remove_menus' );



// разрешить svg файлы

add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg+xml';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	}
	else {
		$dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext']  = false;
			$data['type'] = false;
		}

	}

	return $data;
}

// убираем лишние p и br и span из Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});

// add_filter('wpcf7_form_elements', function($content) {
//     $zamena = '\';
//     $content = preg_replace($zamena, '', $content);
//     return $content;
// });

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Основные настройки',
		'menu_title'	=> 'Настройки темы',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки шапки',
		'menu_title'	=> 'Шапка',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки подвала',
		'menu_title'	=> 'Подвал',
		'parent_slug'	=> 'theme-general-settings',
	));
	
};


// кастомный вид записей "Услуга"

// Регистрация кастомного типа записей "Услуга"
function register_custom_post_type_service() {
    $labels = array(
        'name' => 'Услуги',
        'singular_name' => 'Услуга',
        'add_new' => 'Добавить новую',
        'add_new_item' => 'Добавить новую услугу',
        'edit_item' => 'Редактировать услугу',
        'new_item' => 'Новая услуга',
        'view_item' => 'Просмотреть услугу',
        'search_items' => 'Искать услуги',
        'not_found' => 'Услуг не найдено',
        'not_found_in_trash' => 'В корзине услуг не найдено',
        'menu_name' => 'Услуги',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-tickets-alt', // Иконка для меню в админке
        'supports' => array('title', 'thumbnail', 'editor'),
    );

    register_post_type('service', $args);
}
add_action('init', 'register_custom_post_type_service');

// Добавление дополнительных полей для кастомного типа записей "Услуга"
function add_custom_fields_to_service() {
    add_meta_box('service_meta_box', 'Информация об услуге', 'render_service_meta_box', 'service', 'normal', 'high');
}
add_action('add_meta_boxes', 'add_custom_fields_to_service');

// Отображение полей в админке
function render_service_meta_box($post) {
    // Получаем значения полей, если они уже были заполнены
    $service_time = get_post_meta($post->ID, 'service_time', true);
    $service_output_photos = get_post_meta($post->ID, 'service_output_photos', true);
    $service_price = get_post_meta($post->ID, 'service_price', true);

    // Выводим поля в админке
    ?>
    <p><label for="service_time">Время съёмки:</label><br />
    <input type="text" id="service_time" name="service_time" value="<?php echo esc_attr($service_time); ?>" size="60" /></p>

    <p><label for="service_output_photos">Фотографии на выходе:</label><br />
    <input type="text" id="service_output_photos" name="service_output_photos" value="<?php echo esc_attr($service_output_photos); ?>" size="60" /></p>

    <p><label for="service_price">Цена:</label><br />
    <input type="text" id="service_price" name="service_price" value="<?php echo esc_attr($service_price); ?>" size="60" /></p>
    <?php
}

// Сохранение значений полей кастомного типа записей "Услуга"
function save_custom_fields_of_service($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Сохранение данных
    if (isset($_POST['service_time'])) {
        update_post_meta($post_id, 'service_time', sanitize_text_field($_POST['service_time']));
    }
    if (isset($_POST['service_output_photos'])) {
        update_post_meta($post_id, 'service_output_photos', sanitize_text_field($_POST['service_output_photos']));
    }
    if (isset($_POST['service_price'])) {
        update_post_meta($post_id, 'service_price', sanitize_text_field($_POST['service_price']));
    }
}
add_action('save_post_service', 'save_custom_fields_of_service');


