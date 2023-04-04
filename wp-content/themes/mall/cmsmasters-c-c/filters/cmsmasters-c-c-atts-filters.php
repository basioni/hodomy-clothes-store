<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.8
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */


/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'translate_name_1' => 					esc_attr__('Translate value 1', 'mall'), 
			'translate_name_2' => 					esc_attr__('Translate value 2', 'mall') 
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');

