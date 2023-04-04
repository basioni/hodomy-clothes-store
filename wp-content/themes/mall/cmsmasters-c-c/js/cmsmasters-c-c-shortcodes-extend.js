/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.8
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


// Posts Slider
var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'amount') { // Delete Field
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'columns') { // Delete Field Attribute
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];  
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;

