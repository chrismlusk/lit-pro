<?php
/*
Template Name: Section
*/
get_header(); ?>

	<main id="default" role="main">
		<!-- topics-list -->
		<section id="topics-list" class="container-fluid">

			<div class="row">

			<?php 

				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$thispage = get_the_ID();
					}
				}

				// Query for children of this page
				$children = get_pages( array(
					'child_of' => $thispage,
					'sort_column' => 'menu_order',
					'sort_order' => 'ASC',
					));

				// Back up global $post object
				$post_backup = $post;

				// Display children pages
				foreach( (array) $children as $post ) {
					setup_postdata( $post );
					$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

			?>

				<article class="topics-list-article" style="background-image:url('<?php echo $img_url[0] ?>');">
					<a href="<?php echo the_permalink(); ?>">
						<div class="col-sm-10 col-sm-offset-1 col-lg-9 col-lg-offset-2">
							<span class="kicker"><?php echo the_field('label'); ?></span>
							<h2><?php echo the_field('headline'); ?></h2>
						</div>
					</a>
				</article>

			<?php }

				// Restore global $post object
				$post = $post_backup; 

			?>

			</div>

		</section>
		<!-- /topics-list -->

	</main>

<?php get_footer(); ?>