<?php /* Template Name: activity-list */
get_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		
		
<?php '<!-- Start the header ------------------------------------------------------- -->' ?>
			<H1><?php wp_title(' '); ?></H1>
			<p>activity-list: build 0.1 Showing tags:
			
			<?php
			$posttags = get_the_tags();
			if ($posttags) {
			  foreach($posttags as $tag) {
				echo $tag->name . ' '; 
			  }
			}
			
			$firstPageTag =  $posttags[0]->name;
			
			echo '$firstPageTag '. $firstPageTag;
			
			?>
			</p>
<?php '<!-- End the header ---------------------------------------------------------- -->' ?>
				
				

<?php '<!-- Start the body ------------------------------------------------------- -->' ?>
			<?php
				$args = array();
				
				$mypages = get_pages($args);
				
				$arrlength = count($mypages);
					
			for($x = 0; $x < $arrlength; $x++) {
				echo $mypages[$x];
				echo "<br>";
			}

				foreach( $mypages as $page ) {		
					$content = $page->post_content;
					if ( ! $content ) // Check for empty page
						continue;

					$content = apply_filters( 'the_content', $content );

				?>
					<h2><a href="<?php echo get_page_link( $page->ID ); ?>">
					<?php echo $page->post_title; ?> :
					<?php echo $page->meta_key; ?>:
					<?php echo $page->ID; ?></a></h2>
					<div class="entry"><?php echo $content; ?></div>
				<?php
				}	
				
			?>
<?php '<!-- 2 ------------------------------------------------------- -->' ?>	
		
<?php '<!-- End the body ---------------------------------------------------------- -->' ?>
	
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar();
get_footer(); ?>
