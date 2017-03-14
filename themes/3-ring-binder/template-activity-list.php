<?php /* Template Name: activity-list */
get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
		

			<H1><?php wp_title(' '); ?></H1>
			<p>activity-list: build 0.1 Showing tags:
			<?php
			$posttags = get_the_tags();
			if ($posttags) {

	

			  foreach($posttags as $tag) {
				echo $tag->name . ' '; 
			  }
			}
			?>
			</p>


		
		
		
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
		
		
		
		
		
		
		
		
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar();
get_footer(); ?>
