<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.8
 * 
 * Blog Page Timeline Gallery Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_images = explode(',', str_replace(' ', '', str_replace('img_', '', get_post_meta(get_the_ID(), 'cmsmasters_post_images', true))));


$uniqid = uniqid();

?>

<!--_________________________ Start Gallery Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_timeline'); ?>>
	<?php 
	if ($date) {
		echo '<div class="cmsmasters_post_info entry-meta">';
		
			cmsmasters_post_date('page', 'timeline');
			
		echo '</div>';
	}
	?>
	<div class="cmsmasters_timeline_margin">
		<div class="cmsmasters_post_cont">
		<?php
			if (!post_password_required()) {
				if (sizeof($cmsmasters_post_images) > 1) {
			?>
					<script type="text/javascript">
						jQuery(document).ready(function () {
							jQuery('.cmsmasters_slider_<?php echo esc_attr($uniqid); ?>').owlCarousel( { 
								singleItem : 		true, 
								transitionStyle : 	false, 
								rewindNav : 		true, 
								slideSpeed : 		200, 
								paginationSpeed : 	800, 
								rewindSpeed : 		1000, 
								autoPlay : 			false, 
								stopOnHover : 		false, 
								pagination : 		true, 
								navigation : 		false, 
								navigationText : 	[ 
									'<span></span>', 
									'<span></span>' 
								] 
							} );
						} );
					</script>
					<div id="cmsmasters_owl_carousel_<?php the_ID(); ?>" class="cmsmasters_slider_<?php echo esc_attr($uniqid); ?> cmsmasters_owl_slider">
					<?php 
						foreach ($cmsmasters_post_images as $cmsmasters_post_image) {
							$image_atts = wp_prepare_attachment_for_js(strstr($cmsmasters_post_image, '|', true));
							
							
							echo '<div>' . 
								'<figure>' . 
									wp_get_attachment_image(strstr($cmsmasters_post_image, '|', true), 'post-thumbnail', false, array( 
										'class' => 	'full-width', 
										'alt' => ($image_atts['alt'] != '') ? esc_attr($image_atts['alt']) : cmsmasters_title(get_the_ID(), false), 
										'title' => ($image_atts['title'] != '') ? esc_attr($image_atts['title']) : cmsmasters_title(get_the_ID(), false) 
									)) . 
								'</figure>' . 
							'</div>';
						}
					?>
					</div>
				<?php 
				} elseif (sizeof($cmsmasters_post_images) == 1 && $cmsmasters_post_images[0] != '') {
					cmsmasters_thumb(get_the_ID(), 'post-thumbnail', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_images[0]);
				} elseif (has_post_thumbnail()) {
					cmsmasters_thumb(get_the_ID(), 'post-thumbnail', false, 'img_' . get_the_ID(), true, true, true, true, false);
				}
			}
			
			
			cmsmasters_post_heading(get_the_ID(), 'h3');
			
			
			if ($author || $categories) {
				echo '<div class="cmsmasters_post_cont_info entry-meta">';
					
					$author ? cmsmasters_post_author('page') : '';
					
					$categories ? cmsmasters_post_category(get_the_ID(), 'category', 'page') : '';
					
				echo '</div>';
			}
			
			
			cmsmasters_post_exc_cont();
			
			
			if ($more || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">';
					
					$more ? cmsmasters_post_more(get_the_ID()) : '';
					
					$likes ? cmsmasters_post_likes('page') : '';
					
					$comments ? cmsmasters_post_comments('page') : '';
					
				echo '</footer>';
			}
		?>
		</div>
	</div>
</article>
<!--_________________________ Finish Gallery Article _________________________ -->

