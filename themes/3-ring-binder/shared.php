<?php 
/* Author dreas1@me.com 03/2017 */
/* Shared scripts (mainly across the template scripts */
//
//---------------------------------------------------------------------------------------
//
function getContent($excludeTags,$includeTags){
	//$returnContent = '<span class="site-info debug">getContent:build 1.0</span><br>';
	//-------------------------------------------
	// get the tags in current page
	
	$thisPageTagsArray = explode(',',get_the_tag_list('',',',''));

	//-------------------------------------------
	// Clean Array

	for ($loop = 0; $loop < count($thisPageTagsArray); $loop++) {
		$singleTag = $thisPageTagsArray[$loop];

// 		$returnContent .='<span class="site-info debug">do : '.$loop.'</span><br>';
// 		$returnContent .='<span class="site-info debug">strpos:'.$loop.':'.strpos($thisPageTagsArray[$loop], '>').'</span><br>';

		$thisPageTagsArray[$loop] = delete_all_between('<', '>', $singleTag);
		
		if (strpos($thisPageTagsArray[$loop], '>')){
// 			$returnContent .='<span class="site-info debug">not clean</span><br>';
			$loop--;
		}

	}

	//-------------------------------------------
	// Remove excludeTags from Array
	
	for ($loop = 0; $loop < count($thisPageTagsArray); $loop++) {
		$singleTag = $thisPageTagsArray[$loop];
		for ($loop2 = 0; $loop2 < count($excludeTags); $loop2++) {
			
			If (findWord(false, $singleTag, $excludeTags[$loop2])){

				unset($thisPageTagsArray[$loop]); // remove item at index 0
			}
		}
	
		//$returnContent .='<span class="site-info debug">tag:'.$loop.':'.$singleTag.'</span><br>';
	}

	//-------------------------------------------
	// Add includeTags to Array
	
	$thisPageTagsArray = array_merge ( $thisPageTagsArray,$includeTags);
	
	//-------------------------------------------
	// Demo what we've got
	
	//$returnContent .='<span class="site-info debug">Updated Tags from page</span><br>';
	
	for ($loop = 0; $loop < count($thisPageTagsArray); $loop++) {
		$singleTag = $thisPageTagsArray[$loop];

		$returnContent .='<span class="site-info debug">'.$singleTag.', </span>';

	}	
	
// 	$returnContent .='<span class="site-info debug">-------------------------------------</span><br>';
	
	//-------------------------------------------
	// make a list of all pages
	$args = array(
		'order'=>'ASC',
		'sort_column'=>'menu_order'
	);

	$allPages = get_pages($args);	
		
	//-------------------------------------------
	//cycle through each other page and decide if it should be included
	foreach( $allPages as $page ) {	
		$testPageId = intval($page->ID);
		$tagPageList = explode(',',get_the_tag_list('',',','',$testPageId));
		
// 		$returnContent .= '<span class="site-info debug">mo:'.$page->menu_order.' id: '.$testPageId.' title: '.$page->post_title.'</span><br>';
// 		$returnContent .= '<span class="site-info debug">tagList:'.implode(' ',$tagPageList.'</span><br>');
// 		$returnContent .= '<span class="site-info debug">tagList size :'. count($tagPageList).'</span><br>';
		
		for ($loop = 0; $loop < count($tagPageList); $loop++) {
			$tagPageList[$loop] = delete_all_between('<', '>', $tagPageList[$loop]);

			if (strpos($tagPageList[$loop], '>')){
				$loop--;
			}	
			
		}
		
		for ($loop = 0; $loop < count($tagPageList); $loop++) {
			
			$singleTag = $tagPageList[$loop];
// 			$returnContent .='<span class="site-info debug">tag :'.$loop.': '.$singleTag.'</span><br>';
			
		}
		
// 		$returnContent .='<span class="site-info debug">-------------------------------------</span><br>';		
// 		$returnContent .= '<span class="site-info debug">tagList:'.implode(' ',$tagPageList).'</span><br>');
	
		$containsSearch = count(array_intersect($thisPageTagsArray, $tagPageList)) == count($thisPageTagsArray);
// 		
// 		$returnContent .= '<span class="site-info debug">Match:'.$containsSearch.'</span><br>';
// 		$returnContent .='<span class="site-info debug">---------------</span><br>';		
// 		$returnContent .= '<span class="site-info debug">mo:'.$page->menu_order.' id: '.$page->ID.' title: '.$page->post_title.'</span><br>';

		if ($containsSearch){
			$returnContent .= '<h2>'.$page->post_title. '</h2>';		
			$returnContent .= '<span>'.$page->post_content. '</span>';
		}
	
	}
	
	//--------------------------------------------------------------------------------
	// All done, return outcome
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
function delete_all_between($beginning, $end, $string) {
  $beginningPos = strpos($string, $beginning);
  $endPos = strpos($string, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

  return str_replace($textToDelete, '', $string);
}
//
//---------------------------------------------------------------------------------------
//
function testCall(){
	return 'testCall returning home';
}

//
//---------------------------------------------------------------------------------------
//
?>