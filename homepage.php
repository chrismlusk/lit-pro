<?php
/**
 * Template Name: Homepage
 */
get_header(); ?>

	<main id="default" role="main">

		<!-- intro -->
		<section id="intro" class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="summary">
						<h3>What's changing in journalism?</h3>
						<div>
							<span>As news consumption moves to <a href="<?php echo get_permalink(111); ?>">mobile</a><sup>One</sup></span>
							<span>and publishers loose control of <a href="<?php echo get_permalink(10); ?>">distribution</a>,<sup>Two</sup></span>
							<span><a href="<?php echo get_permalink(224); ?>">business models</a> have to evolve with changes in the larger ecosystem.<sup>Three</sup></span>
							<span>Wiser media companies are focusing more on <a href="<?php echo get_permalink(241); ?>">products</a>,<sup>Four</sup></span>
							<span>exploring how to <a href="<?php echo get_permalink(76); ?>">personalize</a> the flow of information,<sup>Five</sup></span>
							<span>and engineering a smarter newsroom <a href="<?php echo get_permalink(157); ?>">workflow</a>.<sup>Six</sup></span>
							<span>Meanwhile, journalists are realizing that <a href="<?php echo get_permalink(124); ?>">data</a> can help them tell better stories,<sup>Seven</sup></span>
							<span>and they’re making friends with <a href="<?php echo get_permalink(292); ?>">automation</a>.<sup>Eight</sup></span>
							<span>They understand that <a href="<?php echo get_permalink(260); ?>">users can assist</a> in news production,<sup>Nine</sup></span>
							<span>that if you can’t have scale it’s better to be <a href="<?php echo get_permalink(231); ?>">niche</a>,<sup>Ten</sup></span>
							<span>and that excelling at <a href="<?php echo get_permalink(270); ?>">explanation</a> can interest more people in the news.<sup>Eleven</sup></span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- intro -->

		<!-- topics-list -->
		<section id="topics-list" class="container-fluid">

			<div class="row">

			<?php 

				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$thispage = 43; // 43 is the ID for the Topics page
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