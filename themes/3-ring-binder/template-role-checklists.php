<?php 
/* Template Name: role-checklists */
/* Author dreas1@me.com 03/2017 */
/* Customisation for an 'role template page */

/* load shared scripts */	
	include 'shared.php';
	
	$excludeTags = array('Role');
	$includeTags = array('Checklist');

	get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
<?php echo'<!-- Start the header ------------------------------------------------- -->' ?>

<?php 
	echo'<H1>'.get_post_field('post_title').'</H1>';
	//echo'<span class="site-info debug">Role overview-list: build 0.4:</span>';
	echo'<p>'.get_post_field('post_content').'</p>';
?>	
	
<?php echo'<!-- Pages in Array --------------------------------------------------- -->' ?>

	<?php
		echo getContent($excludeTags,$includeTags);
	?>	
		
<?php echo'<!-- End pages in array ----------------------------------------------- -->' ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php 
	get_sidebar();
	get_footer(); 
?>
