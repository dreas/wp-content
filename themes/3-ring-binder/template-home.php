<?php 
/* Template Name: template-home */
/* Author dreas1@me.com 03/2017 */
/* Customisation for the home  page */
	
// 	$excludeTags = array('Activity');
// 	$pageTagsList = get_the_tag_list('',',','');
// 	$pageTagsArray = explode(',',$pageTagsList);
// 	$pageTagsArrayLength = count($pageTagsArray);

	get_header();
		?>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">	
		<?php
	
		echo '<!-- Start the header ------------------------------------------------------- -->';
			echo'<H1>'.get_post_field('post_title', $post->ID).'</H1>';
			echo'<span class="site-info debug"> site head (home): build 0.1:</span>';
			echo'<p>'.get_post_field('post_content', $post->ID).'</p>';

		echo '<!-- List Roles ------------------------------------------------------- -->';
		echo'<h2>Roles</h2>';
		echo do_shortcode("[pt_view id=2f2a24fbpf]");
		
		echo '<!-- List Activities ------------------------------------------------------- -->';
		echo'<h2>Activities</h2>';
		echo do_shortcode("[pt_view id=fb2c420y8a]"); 
		
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_sidebar();
get_footer(); ?>
