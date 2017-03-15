<?php /* Template Name: template */
get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<H1><?php wp_title($display = true); ?></H1>
			<p>build 0.1</p>


				<?php
					echo '<h1>Hello World</h1>';
				?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_sidebar();
get_footer(); ?>
