<?php 
/* Template Name: user-checklists */
/* Author dreas1@me.com 03/2017 */
/* Customisation for an 'role template page */

/* load shared scripts */
	
	include 'shared.php';
	
	$excludeTags = array('Role');
// 	$pageTagsList = get_the_tag_list('',',','');
// 	$pageTagsArray = explode(',',$pageTagsList);
// 	$pageTagsArrayLength = count($pageTagsArray);
	
	get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
<?php echo'<!-- Start the header ------------------------------------------------- -->' ?>

<?php 
	echo'<H1>'.get_post_field('post_title').'</H1>';
	echo'<span class="site-info debug">Role overview-list: build 0.4:</span>';
	echo'<p>'.get_post_field('post_content').'</p>';
?>	
	
<?php '<!-- Pages in Array ------------------------------------------------------- -->' ?>

	<?php
	
		echo getContent($excludeTags)
	
	// 	$args = array(
// 			'sort_order'   => 'ASC',
// 			'sort_column'  => 'menu_order',
// 		);
// 		$mypages = get_pages($args);
// 
// 		foreach( $mypages as $page ) {	
// 			$testId = $page->ID;
// 			$tagList = get_the_tag_list('',' ','',$testId);
// 			$displayFlag = true;
// 			
// 			//echo '----------------------------------------------------<br>';
// 			// identify if item should be actively excluded ----------------------------
// 			for ($loop = 0; $loop < count($excludeTags); $loop++) {
// 				$testTag = $excludeTags[$loop];
// 				
// 				if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
// 					$displayFlag = false;
// 					//echo 'excluded<br>';
// 				}
// 			}	
// 				
// 			// 	insert content from other pages that match tags -------------------------
// 			if ($displayFlag){	
// 				for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
// 					$testTag = $pageTagsArray[$loop];
// 				
// 					//echo 'testing:'.$testTag.' is in:'.$tagList.'<br>';
// 					//echo 'outcome:'.(strpos($tagList,$testTag)).'<br>';
// 					//echo 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
// 					if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
// 						//echo 'Yes<br><br>';
// 						//echo '<h2>id:'.$testId.' title:'.$page->post_title. '</h2>';
// 						echo '<h2>'.$page->post_title. '</h2>';			
// 						//echo 'tags:'.$tagList.'<br>'; 
// 						echo '<span>'.$page->post_content. '</span>';		
// 						//echo '<br>';
// 						//break;
// 					}else{
// 						//echo 'Nope<br>';
// 					}
// 				}
// 			}
// 		}
		?>		

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_sidebar();
get_footer(); ?>
