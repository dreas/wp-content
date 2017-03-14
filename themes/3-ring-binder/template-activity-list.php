<?php /* Template Name: activity-list */
get_header();?>


<H1><?php wp_title($display = true); ?></H1>
<p>build 0.1</p>

<?php
	/*$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );*/
	
	$mypages = get_pages( array() );
	
	foreach( $mypages as $page ) {		
		$content = $page->post_content;
		if ( ! $content ) // Check for empty page
			continue;

		$content = apply_filters( 'the_content', $content );
	?>
		<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
		<div class="entry"><?php echo $content; ?></div>
	<?php
	}	
?>






<?php get_sidebar();
get_footer(); ?>
