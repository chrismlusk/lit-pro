<?php get_header(); ?>

	<main id="default" role="main">
		<!-- section -->
		<section class="container">
			<div class="row">
				<div class="col-sm-12">

					<!-- article -->
					<article id="post-404">

						<h1><?php _e( 'Page not found', 'html5blank' ); ?></h1>
						<p>
							Would you like to return to the <a href="<?php echo home_url(); ?>"><?php _e( 'homepage', 'html5blank' ); ?>?</a>
						</p>

					</article>
					<!-- /article -->

				</div>
			</div>
		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
