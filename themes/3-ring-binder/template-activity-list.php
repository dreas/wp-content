<?php /* Template Name: activity-list */

	/* Customisation for an 'activity template page */
	
	$excludeTags = array('Activity');
	$pageTagsList = get_the_tag_list('',',','');
	$pageTagsArray = explode(',',$pageTagsList);
	$pageTagsArrayLength = count($pageTagsArray);

	get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
		
<?php '<!-- Start the header ------------------------------------------------------- -->' ?>

<?php 

	echo'<H1>'.get_post_field('post_title', $post->ID).'</H1>';
	echo'<p> activity-list: build 0.1:</p>';
	echo'<p>'.get_post_field('post_content', $post->ID).'</p>';
	
	
	
?>
		
	
<?php '<!-- Pages in Array ---------------------------------------------------------- -->' ?>
				
	<?php
		$args = array();
		$mypages = get_pages($args);

		foreach( $mypages as $page ) {	
			$testId = $page->ID;
			$tagList = get_the_tag_list('',' ','',$testId);
			$displayFlag = true;
			
			// identify if item should be actively excluded ----------------------------
			for ($loop = 0; $loop < count($excludeTags); $loop++) {
				$testTag = $excludeTags[$loop];
				
				if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
					$displayFlag = false;
				}
			}	
				
			// 	insert content from other pages that match tags -------------------------
			if ($displayFlag){	
				for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
					$testTag = $pageTagsArray[$loop];
				
					//echo 'testing:'.$testTag.' is in:'.$tagList.'<br>';
					//echo 'outcome:'.(strpos($tagList,$testTag)).'<br>';
					//echo 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
					if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
						//echo 'Yes<br><br>';
						echo 'id:'.$testId.' title:'.$page->post_title. '<br>';			
						//echo 'tags:'.$tagList.'<br>'; 
						echo 'body:'.$page->post_content. '<br>';		
						echo '<br>';
						//break;
					}else{
						//echo 'Nope<br><br>';
					}
				}
			}
		}
		?>		

<?php '<!-- Start the body ------------------------------------------------------- -->' ?>

<?php '<!-- 2 ------------------------------------------------------- -->' ?>	
<p>End of content ---------------------</p>		
<?php '<!-- End the body ---------------------------------------------------------- -->' ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar();
get_footer(); ?>
