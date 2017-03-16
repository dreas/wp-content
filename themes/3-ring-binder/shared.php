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

	$returnContent = '<span class="site-info debug">getContent:build 0.3</span><br>';

	$args = array(
		'order'=>'ASC',
		'sort_column'=>'menu_order'
	);
	
	$mypages = get_pages($args);
	
// 	foreach( $mypages as $page ) {	
// 		$returnContent .= 'mo:'.$page->menu_order.' id: '.$page->ID.' title: '.$page->post_title.'<br>';
// 	}
	
	
	foreach( $mypages as $page ) {	
		$testId = $page->ID;
		$tagList = get_the_tag_list('',' ','',$testId);
		$displayFlag = true;
			
		// identify if item should be actively excluded --------------------------		
		// $returnContent .= 'mo:'.$page->menu_order.' id: '.$page->ID.' title: '.$page->post_title.'<br>';
// 		$returnContent .= 'excludeTags:'.implode($excludeTags).'<br>';
// 		$returnContent .= 'tagList:'.$tagList.'<br>';
	
		for ($loop = 0; $loop < count($excludeTags); $loop++) {
			$testTag = $excludeTags[$loop];
			
// 			$returnContent .= '$testTag:'.$testTag.'<br>';
			
			if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){	
				//$returnContent .= '<b>excluded</b><br>';
				$displayFlag = false;
			}
		}	
		
// 		$returnContent .= '<br>';
// 		$returnContent .= '$displayFlag:'.$displayFlag.'<br>';
		
		// 	insert content from other pages that match tags -------------------------
		if ($displayFlag){	
			for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
				$testTag = $pageTagsArray[$loop];
			
// 				$returnContent .='testing:'.$testTag.' is in:'.$tagList.'<br>';
// 				$returnContent .= 'outcome:'.(strpos($tagList,$testTag)).'<br>';
// 				$returnContent .= 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
							
				if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
				
					$returnContent .='<span class="site-info debug">testing:'.$testTag.' is in:'.$tagList.'</span><br>';
					$returnContent .='<span class="site-info debug">outcome:'.(strpos($tagList,$testTag)).'</span><br>';
					//$returnContent .= 'pageTagsArray:'.$pageTagsArray[$loop].'<br>'; 
							
					//$returnContent .= '<b>Match</b><br>';
					//echo 'Yes<br><br>';
					//$returnContent .= '<p>'.$page->menu_order.'<p>';	
					//echo '<h2>id:'.$testId.' title:'.$page->post_title. '</h2>';
					$returnContent .= '<span class="site-info debug">mo:'.$page->menu_order.' id: '.$page->ID.'</span><br>';	
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

//
//---------------------------------------------------------------------------------------
//
?>