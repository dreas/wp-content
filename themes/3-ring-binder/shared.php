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

	$returnContent = '<span class="site-info debug">getContent:build 0.5</span><br>';

	$args = array(
		'order'=>'ASC',
		'sort_column'=>'menu_order'
	);
	
	$mypages = get_pages($args);

	//---------------------------------------------------------------------------------
	// Find if either 'Arrk' or 'Customer is in the tag list and add the opposite to the exclude list
		
	for ($loop = 0; $loop < $pageTagsArrayLength; $loop++) {
		$singleTag = $pageTagsArray[$loop];
		//$returnContent .='<span class="site-info debug">single tag: '.$singleTag.'</span><br>';
		
		If (findWord(false, $singleTag, 'Arrk')){
			//$returnContent .= "Arrk Role<br>";
			
			array_push($excludeTags,"Customer");
		}else{
			//$returnContent .= "Not Arrk<br>";	
		}
		
		If (findWord(false, $singleTag, 'Customer')){
			//$returnContent .= "Got Customer<br>";
			
			array_push($excludeTags,"Arrk");
		}else{
			//$returnContent .= "Not Customer<br>";	
		}
		
	}	

	//$returnContent .='<span class="site-info debug">exclude tags: '.implode(" ",$excludeTags).'</span><br>';

	//---------------------------------------------------------------------------------
	
	
	foreach( $mypages as $page ) {	
		$testId = $page->ID;
		$tagList = get_the_tag_list('',' ','',$testId);
		$displayFlag = true;
			
// 		$returnContent .= 'mo:'.$page->menu_order.' id: '.$page->ID.' title: '.$page->post_title.'<br>';
// 		$returnContent .= 'excludeTags:'.implode($excludeTags).'<br>';
// 		$returnContent .= 'tagList:'.$tagList.'<br>';
	
			//identify if item should be actively excluded --------------------------------		

		// Exlude role pages from being shown within a role page -----------------------
		for ($loop = 0; $loop < count($excludeTags); $loop++) {
			$testTag = $excludeTags[$loop];
			
// 			$returnContent .= '$testTag:'.$testTag.'<br>';
			
			if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){	
// 				$returnContent .= '<b>excluded</b><br>';
				$displayFlag = false;
			}
		}	
		
		

		
		
		
		
		
// 		$returnContent .= '<br>';
// 		$returnContent .= '$displayFlag:'.$displayFlag.'<br>';
		
		// 	insert content from other pages that match tags -------------------------
		if ($displayFlag){	
			for ($loop = 0; $loop < count($pageTagsArray); $loop++) {
				$testTag = $pageTagsArray[$loop];
			
				// $returnContent .='testing:'.$testTag.' is in:'.$tagList.'<br>';
// 				$returnContent .='outcome:'.(strpos($tagList,$testTag)).'<br>';
				$returnContent .= $loop.': pageTagsArray:'.$pageTagsArray[$loop].' == '.$tagList.'<br>';

				if( strpos($tagList,$testTag) || strpos($tagList,$testTag)===0){
				
// 					$returnContent .='<span class="site-info debug">testing:'.$testTag.' is in:'.$tagList.'</span><br>';
// 					$returnContent .='<span class="site-info debug">outcome:'.(strpos($tagList,$testTag)).'</span><br>';
// 					$returnContent .= '<span class="site-info debug">mo:'.$page->menu_order.' id: '.$page->ID.'</span><br>';	
					
					
					$returnContent .= '<h2>'.$page->post_title. '</h2>';		
					$returnContent .= '<span>'.$page->post_content. '</span>';		

				}
			}
			$returnContent .= '<br>';
		}
	}
		
	return $returnContent;
}
//
//---------------------------------------------------------------------------------------
//
function findWord($caseSensitive, $testString, $findWord) {

    if ($caseSensitive === true) {
        if (strpos($testString, $findWord) !== false) {
            return true;
        } else {
            return false;
        }
    } else {
        if (strpos(strtolower($testString), strtolower($findWord)) !== false) {
            return true;
        } else {
            return false;
        }
    }

}
//
//---------------------------------------------------------------------------------------
//
?>