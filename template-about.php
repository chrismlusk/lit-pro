<?php
/*
Template Name: About
*/
get_header(); ?>

	<main id="default" role="main">

		<!-- About this project -->
		<section id="about" class="container">
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
		<!-- /about -->

		<!-- Staff -->
		<section id="staff">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Meet the staff</h1>
					</div>
					<div>
						<?php 

							$staff = get_users_by_include(
										array( 'include' => array(13,3,1,4,2,6,5,7,12,9,10,11) )
									 );



							foreach( $staff as $user ) {

								$all_meta = get_user_meta( $user->ID );
								$u_photo = $all_meta['wp_user_avatars'][0];
								$u_name = $all_meta['first_name'][0] . ' ' . $all_meta['last_name'][0];
								$u_title = $all_meta['staff-title'][0];

								if ($user->user_url) {
									$u_link = $user->user_url;
								}
								else if ($all_meta['twitter'][0]) {
									$u_link = $all_meta['twitter'][0];
								}
								else if ($all_meta['facebook'][0]) {
									$u_link = $all_meta['facebook'][0];
								}
								else {
									$u_link = null;
								} ?>

								<a <?php if($u_link): ?>href="<?php echo $u_link; ?>" target="_blank"<?php endif; ?> class="bio col-xs-6 col-sm-3 col-md-2">
									<?php echo get_avatar( $user->ID, '200' ); ?>
									<h4><?php echo $u_name; ?></h4>
									<span><?php echo $u_title; ?></span>
								</a>
							<?php } ?>

					</div>
					<!-- <a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>esc_html( $user->display_name )</h4>
						<span>Editor-in-Chief</span>
					</a> -->
					<!-- <a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Kim Bode</h4>
						<span>Product Manager</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Chris Lusk</h4>
						<span>Designer/Developer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a>
					<a class="bio col-xs-6 col-sm-3 col-md-2">
						<img src="http://placehold.it/400x400" alt="">
						<h4>Fernanda Braune</h4>
						<span>Staff Writer</span>
					</a> -->
				</div>
			</div>
		</section>

	</main>

<?php get_footer(); ?>