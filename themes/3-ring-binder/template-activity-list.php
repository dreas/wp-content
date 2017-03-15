<?php /* Template Name: activity-list */
get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
		
<?php '<!-- Start the header ------------------------------------------------------- -->' ?>
	<H1><?php wp_title(' '); ?></H1>
	<p>activity-list: build 0.1:
		<?php

		$pageTagsList = get_the_tag_list('',',','');
		$pageTagsArray = explode(',',$pageTagsList);
		$pageTagsArrayLength = count($pageTagsArray);
// 		echo 'page tags:'.$pageTagsList.'<br>'; 
// 		echo 'page tags length:'.$pageTagsArrayLength.'<br>'; 
// 		
// 		for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
// 			echo 'pageTagsArray item:'.$pageTagsArray[$loop].'<br>'; 
// 		} 
// 		echo '<p>End of intro ---------------------</p>';	
		?>
	</p>
<?php '<!-- Pages in Array ---------------------------------------------------------- -->' ?>
				
	<?php
		$args = array();
		$mypages = get_pages($args);

		foreach( $mypages as $page ) {	
			$testId = $page->ID;
			$tagList = get_the_tag_list('',',','',$testId);
					
			for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
			
				$testTag = $pageTagsArray[$loop];
				//echo 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
				if( strpos($tagList,$testTag)){
					echo 'match<br>';
				}
			} 	

			echo 'title:'.$page->post_title.'<br>'; 
			echo 'id:'.$testId.'<br>'; 
			echo 'count:'.count($pageTagsArray).'<br>'; 
			
// 			echo 'tags:'.$tagList.'<br>'; 
// 			echo 'tag count:'.strpos($tagList,$pageTagsList).'<br>';
	   
			echo '----------------<br>';
// 	   
// 	   
		}
		?>		

<?php '<!-- Start the body ------------------------------------------------------- -->' ?>

<?php '<!-- 2 ------------------------------------------------------- -->' ?>	
<p>End of scripts ---------------------</p>		
<?php '<!-- End the body ---------------------------------------------------------- -->' ?>
	
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar();
get_footer(); ?>
