<?php 
/* Author dreas1@me.com 03/2017 */
/* Shared scripts (mainly across the template scripts */
//
//---------------------------------------------------------------------------------------
//
function testCall(){
	return 'testCall returning home';
}
//
//---------------------------------------------------------------------------------------
//
function getContent($excludeTags){

	$pageTagsList = get_the_tag_list('',',','');
	$pageTagsArray = explode(',',$pageTagsList);
	$pageTagsArrayLength = count($pageTagsArray);

	$returnContent = 'getContent:build 0.1<br>';

// 	$args = array(
// 		'order'   => 'ASC',
// 		'sort_column'  => 'ID'
// 	);
	
	$mypages = get_pages($args);
	
	foreach( $mypages as $page ) {	
		$returnContent .= 'menu order: '.$page->menu_order.' : '.$page->ID.' : '.$page->post_title.'<br>';
	}
	
	
	foreach( $mypages as $page ) {	
		$testId = $page->ID;
		$tagList = get_the_tag_list('',' ','',$testId);
		$displayFlag = true;
			
		// identify if item should be actively excluded --------------------------
		
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
					//$returnContent .= '<p>'.$page->menu_order.'<p>';	
					//echo '<h2>id:'.$testId.' title:'.$page->post_title. '</h2>';
					$returnContent .= '<h2>'.$page->post_title. '</h2>';			
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
//
//---------------------------------------------------------------------------------------
//

?>