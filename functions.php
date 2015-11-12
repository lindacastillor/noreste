<?php

/*
 *  Theme Support
 */

	add_theme_support( 'post-thumbnails' );




/*
 *  ACF - Options
 */

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Opciones y Menús',
			'menu_title'	=> 'Opciones',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}




/*
 *  Image handling:
 *
 *	1 Tamaños de Imágenes
 */

	add_action( 'after_setup_theme', 'baw_theme_setup' );
	function baw_theme_setup() {
		add_image_size( 'larger', 1400, 1400 );
		add_image_size( 'largest', 1800, 1800 );
		add_image_size( 'huge', 2200, 2200 );
	}


	//    2 Borrar tamaño original de disco y opción

	function replace_uploaded_image($image_data) {
		if (!isset($image_data['sizes']['huge'])) return $image_data;

		$upload_dir = wp_upload_dir();
		$uploaded_image_location = $upload_dir['basedir'] . '/' .$image_data['file'];
		$large_image_filename = $image_data['sizes']['huge']['file'];

		$image_basename = wp_basename($uploaded_image_location);
		$large_image_location = str_replace($image_basename, $large_image_filename, $uploaded_image_location);

		unlink($uploaded_image_location);

		rename($large_image_location, $uploaded_image_location);

		$image_data['width'] = $image_data['sizes']['huge']['width'];
		$image_data['height'] = $image_data['sizes']['huge']['height'];
		unset($image_data['sizes']['huge']);

		foreach($image_data['sizes'] as $size => $sizeData) {
			if ($sizeData['file'] === $large_image_filename)
			unset($image_data['sizes'][$size]);
		}

		return $image_data;
	}
	  add_filter('wp_generate_attachment_metadata', 'replace_uploaded_image');


	function theme_t_wp_set_image_size_options( $sizes ){
		$sizes = array(
			'thumbnail' => 'Miniatura',
			'medium' => 'Mediana',
			'large' => 'Grande',
			'larger' => __( 'Mas grande' ),
			'largest' => __( 'Grandísimo' ),
			'huge' => __( 'Gigantesco' )
		);
		return $sizes;
	}
	add_filter('image_size_names_choose', 'theme_t_wp_set_image_size_options');




// Posts -> Proyectos





/*
 * Tiny MCE Mods
 */
	//  Editar styleselect
	function my_mce_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array( 'title' => 'Titulo', 'block' => 'h1'),
			array( 'title' => 'Subtitulo', 'block' => 'h2'),
			array( 'title' => 'Párrafo', 'block' => 'p')
		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );




/*
 *  Hide Menu Items for Editors
 */

	function hide_menu() {
		global $current_user;
		$user_id = get_current_user_id();

		if($user_id != '1') {
			remove_menu_page( 'index.php' );                    //Dashboard
			remove_menu_page( 'upload.php' );                   //Media
			remove_menu_page( 'edit-comments.php' );            //Comments
			remove_menu_page( 'plugins.php' );                  //Plugins
			remove_submenu_page( 'themes.php', 'themes.php' );
			remove_submenu_page( 'themes.php', 'theme-editor.php' );
			remove_submenu_page( 'themes.php', 'customize.php' );
			remove_menu_page( 'nav-menus.php' );                //Editar Menus
			// remove_menu_page( 'users.php' );                   Users
			remove_menu_page( 'tools.php' );                    //Tools
			remove_menu_page( 'options-general.php' );          //Settings
			remove_menu_page( 'edit.php?post_type=acf' );       //Advanced Custom Fields
			remove_menu_page( 'admin.php?page=cpt_main_menu' ); //Custom Post Types
			remove_menu_page( 'themes.php' );           //Custom Fields

		}
	}

	add_action('admin_head', 'hide_menu');




/*
 *  Change Posts => Log
 */

	function revcon_change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Proyectos';
		$submenu['edit.php'][5][0] = 'Proyectos';
		$submenu['edit.php'][10][0] = 'Proyecto nuevo';
		// $submenu['edit.php'][16][0] = 'Nuevas Etiquetas';
		echo '';
	}
	function revcon_change_post_object() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Proyectos';
		$labels->singular_name = 'Proyecto';
		$labels->add_new = 'Nuevo';
		$labels->add_new_item = 'Proyecto nuevo';
		$labels->edit_item = 'Editar proyecto';
		$labels->new_item = 'Nuevo';
		$labels->view_item = 'Ver proyecto';
		$labels->search_items = 'Buscar en Proyectos';
		$labels->not_found = 'No se encontraron Proyectos';
		$labels->not_found_in_trash = 'No hay proyectos en la basura';
		$labels->all_items = 'Todos los Proyectos';
		$labels->menu_name = 'Proyectos';
		$labels->name_admin_bar = 'Proyecto';
	}

	add_action( 'admin_menu', 'revcon_change_post_label' );
	add_action( 'init', 'revcon_change_post_object' );





	/*
	 *  Img call Functions
	 */

	function imgObj($imgObj, $size){
		echo '<div class="'.$size.'"><img src="'.$imgObj['sizes']['large'].'"></div>';
	}

	function full_bgImg($img, $imgID){
		if($img){
			$img_med = wp_get_attachment_image_src($img, 'medium');
			$img_large = wp_get_attachment_image_src($img, 'large');
			$img_larger = wp_get_attachment_image_src($img, 'larger');
			$img_largest = wp_get_attachment_image_src($img, 'largest');
			$img_huge = wp_get_attachment_image_src($img, 'full-size');

			echo '<style> '.$imgID.' {background-image: url(' . $img_med[0] . ');}';
			if($img_med) { echo ' @media (min-width: 600px) { '.$imgID.' {background-image: url(' . $img_large[0] . ');} }'; }
			if($img_large) { echo ' @media (min-width: 1024px) { '.$imgID.' {background-image: url(' . $img_larger[0] . ');} }'; }
			if($img_larger) { echo ' @media (min-width: 1400px) { '.$imgID.' {background-image: url(' . $img_largest[0] . ');} }'; }
			if($img_largest) { echo ' @media (min-width: 1800px) { '.$imgID.' {background-image: url(' . $img_huge[0] . ');} }'; }
			echo '</style>';
		}
	}

	function inOut($sel) {
		if($sel == 'exterior') {
			echo 'Exterior';
		} else {
			echo 'Interior';
		}
	}
