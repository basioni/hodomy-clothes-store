<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.8
 * 
 * Content Composer Client Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$counter = 0;

if ($content == null) {
	$content = esc_html__('Name', 'mall');
}


if ($logo != '') {
	$client_logo = wp_get_attachment_image_src(strstr($logo, '|', true), 'full');
	
	
	$this->clients_atts['client_out'] .= '<div class="cmsmasters_clients_item item' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">' . "\n" . 
		($link != '' ? '<a href="' . $link . '"' . (($target == 'blank') ? ' target="_blank"' : '') . '>' : '') . 
			'<img src="' . $client_logo[0] . '" alt="' . $content . '" />' . 
			'<span>' . $content . '</span>' . 
		($link != '' ? '</a>' : '') . 
	'</div>' . "\n";
}

