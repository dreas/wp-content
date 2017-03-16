<?php 
/* Author dreas1@me.com 03/2017 */
/* Shared scripts (mainly across the template scripts */

function testCall(){
	return 'testCall returning home';
}



function getContent($excludeTags){

	$pageTagsList = get_the_tag_list('',',','');
	$pageTagsArray = explode(',',$pageTagsList);
	$pageTagsArrayLength = count($pageTagsArray);

	$returnContent = 'init';

	$args = array(
		'sort_order'   => 'ASC',
		'sort_column'  => 'menu_order',
	);
	$mypages = get_pages($args);
	
	
	
	foreach( $mypages as $page ) {	
		$testId = $page->ID;
		$tagList = get_the_tag_list('',' ','',$testId);
		$displayFlag = true;
		
		
		
		//echo '----------------------------------------------------<br>';
		// identify if item should be actively excluded ----------------------------
		
// 		$returnContent .= '$excludeTags:'.$excludeTags.'<br>';
		
		for ($loop = 0; $loop < count($excludeTags); $loop++) {
			$testTag = $excludeTags[$loop];
			
// 			$returnContent .= '$testTag:'.$testTag.'<br>';
			
			if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
				$displayFlag = false;
			}
		}	

// 		$returnContent .= '$displayFlag:'.$displayFlag.'<br>';
		
		// 	insert content from other pages that match tags -------------------------
		if ($displayFlag){	
			for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
				$testTag = $pageTagsArray[$loop];
			
// 				$returnContent .='testing:'.$testTag.' is in:'.$tagList.'<br>';
// 				$returnContent .= 'outcome:'.(strpos($tagList,$testTag)).'<br>';
// 				$returnContent .= 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
				
				
				
				if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
					//echo 'Yes<br><br>';
					//echo '<h2>id:'.$testId.' title:'.$page->post_title. '</h2>';
					$returnContent .= '<h2>'.$page->menu_order.':'.$page->post_title. '</h2>';			
					//echo 'tags:'.$tagList.'<br>'; 
					$returnContent .= '<span>'.$page->post_content. '</span>';		
					//echo '<br>';
					//break;
				}else{
					//echo 'Nope<br><br>';
				}
			}
		}
	}
	
	
	return $returnContent;
}


?>