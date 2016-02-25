<?php
/*
Template Name: Topic Page
*/
get_header(); ?>
	
	<main role="main">

		<!-- section -->
		<section class="item-wrapper">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="item">

				<figure class="featured-image">
					<?php the_post_thumbnail(); ?>
				</figure>

				<!-- article header -->
				<header class="item-header">
					<span class="kicker"><?php the_field('label'); ?></span>
					<h1><?php the_field('headline'); ?></h1>
					<p class="deck"><?php the_field('subhead'); ?></p>

					<!-- meta -->
					<div class="item-meta">
						<div class="byline">
							By <?php $url = get_field('author_link'); ?>
							<?php if ( $url ): ?><a href="<?php echo $url; ?>" class="author" target="_blank"><?php endif; ?>
							<span class="author"><?php the_author(); ?></span>
							<?php if ( $url ): ?></a><?php endif; ?>
						</div>
						<div class="pubdate">
							<?php 

								$published = get_the_date('U');
								$modified = get_the_modified_date('U');

								if ( $modified >= $published + 86400 ) {
									echo 'Updated ' . get_the_modified_date();
								} else {
									echo 'Published ' . get_the_date();
								}

							?>
						</div>
						<div class="length"><?php echo reading_time(); ?> min read</div>
						<div><?php edit_post_link(); ?></div>
					</div>
					<!-- /meta -->

				</header>
				<!-- /article header -->

				<!-- article body -->
				<div class="item-content">

					<!-- share links -->
					<ul class="item-share">
						<li>
							<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="http://twitter.com/share?text=%22<?php the_field('headline'); ?>%22%20via%20@Studio20NYU%20--&url=<?php the_permalink(); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="mailto:?subject=News%20Literacies%202016&body=How%20to%20be%20literate%20in%20what%27s%20changing%20in%20journalism?%0D%0A%0D%0A<?php the_title(); ?>:%20%22<?php the_field('summary'); ?>%22%0D%0A%0D%0ARead%20more%20at%20<?php the_permalink(); ?>" class="email" target="_blank"><i class="fa fa-envelope"></i></a>
						</li>
					</ul>
					<!-- /share links -->

					<!-- main column -->
					<div class="item-body">
						<?php the_content(); ?>

						<!-- key quotes -->
						<?php if( have_rows('quotes') ): ?>

							<div class="quotes">
								<h2>Key quotes</h2>

								<?php while(have_rows('quotes') ): the_row();

									$quote = get_sub_field('quote');
									$quote_name = get_sub_field('source_name');
									$quote_title = get_sub_field('source_title');
									$quote_url = get_sub_field('url');

									?>

									<blockquote cite="<?php echo $quote_url; ?>">
										<p><?php echo $quote; ?></p>
										<footer>
											<a href="<?php echo $quote_url; ?>" target="_blank">

												<?php if( $quote_title ): echo $quote_name; ?>, <cite title="<?php echo $quote_title; ?>"><?php echo $quote_title; ?></cite>

												<?php else: ?>

													<cite title="<?php echo $quote_name; ?>"><?php echo $quote_name; ?></cite>

												<?php endif; ?>

											</a>
										</footer>
									</blockquote>

								<?php endwhile; ?>

							</div>

						<?php endif; ?>
						<!-- /key quotes -->

						<!-- charts and graphs -->
						<?php if( have_rows('charts') ): ?>

							<div class="charts">
								<h2>Useful charts and graphs</h2>
								
								<?php while(have_rows('charts') ): the_row();

									$chart_title = get_sub_field('title');
									$chart_type = get_sub_field('chart_type');
									$chart_image = get_sub_field('image');
									$chart_source = get_sub_field('source');
									$chart_source_link = get_sub_field('source_link');
									$chart_embed = get_sub_field('embed');
									$chart_desc = get_sub_field('description');

									?>

									<div class="chart-wrapper">
										<h3><?php echo $chart_title; ?></h3>
										<?php if( $chart_type == 'is_image' ): ?>
												<img src="<?php echo $chart_image['url']; ?>" alt="<?php echo $chart_image['alt']; ?>" />
													<?php if( $chart_source ): ?>
														<span class="source">
															<?php if( $chart_source_link ): ?>
																<a href="<?php echo $chart_source_link; ?>" target="_blank"><?php endif; echo $chart_source; ?>
															<?php if( $chart_source_link ): ?>
																</a>
															<?php endif; ?>
														</span>
													<?php endif; ?>
												<?php else: echo $chart_embed; ?>
										<?php endif; ?>
										<p class="info"><?php echo $chart_desc; ?></p>
									</div>

								<?php endwhile; ?>

							</div>

						<?php endif; ?>
						<!-- /charts and graphs -->

						<!-- examples -->
						<?php if( have_rows('examples') ): ?>

							<div class="examples">
								<h2>Examples</h2>
								
								<?php while(have_rows('examples') ): the_row();

									$ex_title = get_sub_field('title');
									$ex_image = get_sub_field('image');
									$ex_source = get_sub_field('source');
									$ex_source_link = get_sub_field('source_link');
									$ex_desc = get_sub_field('description');

									?>

									<div class="chart-wrapper">
										<h3><?php echo $ex_title; ?></h3>
										<?php if( $ex_source_link ): ?>
											<a href="<?php echo $ex_source_link; ?>" target="_blank">
										<?php endif; ?>
											<img src="<?php echo $ex_image['url']; ?>" alt="<?php echo $ex_image['alt']; ?>" />
										<?php if( $ex_source_link ): ?>
											</a>
										<?php endif; ?>
										<?php if( $ex_source ): ?>
											<span class="source">
												<?php if( $ex_source_link ): ?>
													<a href="<?php echo $ex_source_link; ?>" target="_blank"><?php endif; echo $ex_source; ?>
												<?php if( $ex_source_link ): ?>
													</a>
												<?php endif; ?>
											</span>
										<?php endif; ?>
										<p class="info"><?php echo $ex_desc; ?></p>
									</div>

								<?php endwhile; ?>

							</div>

						<?php endif; ?>
						<!-- /examples -->

						<!-- article footer -->
						<footer class="item-footer">
							<span>Featured photo by <a href="<?php the_field('photographer_url') ?>" target="_blank"><?php the_field('photographer') ?></a> used under a Creative Commons license.</span> 
						</footer>
						<!-- /article footer -->

						<?php edit_post_link(); ?>

					</div>
					<!-- /main column -->

					<!-- pullout boxes -->
					<div class="item-asides">

						<!-- key summary -->
						<div class="box featured">
							<h4>Why is this important?</h4>
							<?php the_field('summary'); ?>
						</div>
						<!-- /key summary -->

						<!-- killer links -->
						<?php if( have_rows('killer_links') ): ?>

							<div class="box">
								<h4>
									Killer links
									<span class="info hidden-xs">
										<a tabindex="0" role="button" data-toggle="popover" data-placement="left" data-trigger="focus" data-content="This list of additional readings is curated by Studio 20 students. These are the best links we found for introducing the subject and gaining a good overview. No need to hunt around if you want to know more. Start here!"><i class="fa fa-info-circle"></i> What's this?</a>
									</span>
								</h4>
								<ul class="links">

								<?php while(have_rows('killer_links') ): the_row();

									$killer_source = get_sub_field('source');
									$killer_title = get_sub_field('title');
									$killer_url = get_sub_field('url');

									?>

									<li>
										<a href="<?php echo $killer_url; ?>" target="_blank">
											<span class="credit"><?php echo $killer_source; ?></span>
											<span class="title"><?php echo $killer_title; ?></span>
										</a>
									</li>

								<?php endwhile; ?>

								</ul>
							</div>

						<?php endif; ?>
						<!-- /killer links -->

						<!-- people to follow -->
						<?php if( have_rows('people_to_follow') ): ?>

							<div class="box">
								<h4>People to follow</h4>
								<ul class="people">

								<?php while(have_rows('people_to_follow') ): the_row();

									$ppl_name = get_sub_field('name');
									$ppl_url = get_sub_field('url');
									$ppl_desc = get_sub_field('description');
									$ppl_photo = get_sub_field('photo');

									?>

									<li>
										<a href="#">
											<?php if( $ppl_photo ): ?>
												<a href="<?php echo $ppl_url; ?>" target="_blank"><img src="<?php echo $ppl_photo['url']; ?>" alt="<?php echo $ppl_photo['alt']; ?>" /></a>
											<?php endif; ?>
											<div class="bio">
												<a href="<?php echo $ppl_url; ?>" target="_blank"><?php echo $ppl_name; ?></a>
												<?php echo $ppl_desc; ?>
											</div>
										</a>
									</li>

								<?php endwhile; ?>

								</ul>
							</div>

						<?php endif; ?>
						<!-- /people to follow -->

						<!-- glossary -->
						<?php if( have_rows('glossary') ): ?>

							<div class="box">
								<h4>Glossary</h4>
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

									<?php 

										$i = 1;

										while(have_rows('glossary') ): the_row();

										$glossary_term = get_sub_field('term');
										$glossary_def = get_sub_field('definition');

										?>

										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading-<?php echo $i; ?>">
												<h5 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $i; ?>">
														<?php echo $glossary_term; ?>
													</a>
												</h5>
											</div>
											<div id="collapse-<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $i; ?>">
												<div class="panel-body">
													<?php echo $glossary_def; ?>
												</div>
											</div>
										</div>

									<?php $i++; endwhile; ?>

								</div>
							</div>

						<?php endif; ?>
						<!-- /glossary -->

					</div>
					<!-- /pullout boxes -->

					<!-- author bio -->
					<div class="box author">
						<div>
							<figure>
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 200 ); ?>
							</figure>
							<h4>
								<?php the_author(); ?>
									<span class="author-share">

										<?php

											$twitter = null;
											$facebook = null;
											$social = null;

											$twitter = get_the_author_meta('twitter');
											$facebook = get_the_author_meta('facebook');

											if ( $twitter ) {
												$tw_array = array('twitter', $twitter);
												$social = array($tw_array);
											}											

											if ( $facebook ) {
												$fb_array = array('facebook', $facebook);
												$social[] = $fb_array;
											}

											foreach ($social as $x) { ?>

												<a href="<?php echo $x[1]; ?>" class="<?php echo $x[0]; ?>" target="_blank"><i class="fa fa-<?php echo $x[0]; ?>"></i></a>

											<?php } ?>

										<a href="mailto:<?php the_author_meta('user_email'); ?>" class="email"><i class="fa fa-envelope"></i></a>
									</span>
							</h4>
							<p class="bio"><?php the_author_meta('description'); ?></p>
						</div>
					</div>
					<!-- /author bio -->

				</div>
				<!-- /article body -->

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

		</section>
		<!-- /section -->

	</main>

<?php /* get_sidebar(); */ ?>

<?php get_footer(); ?>
