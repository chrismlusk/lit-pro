<?php
/**
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */
get_header(); ?>

	<main id="default" role="main">

		<!-- section -->
		<section class="container">
			<div class="row">
				<div class="col-sm-12">

					<h1><?php the_title(); ?></h1>

					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="post-<?php the_ID(); ?>" class="item">

								<?php the_content(); ?>

							<?php edit_post_link(); ?>

						</article>
						<!-- /article -->

					<?php endwhile; ?>

					<?php else: ?>

						<!-- article -->
						<article>

							<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

						</article>
						<!-- /article -->

					<?php endif; ?>

				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>