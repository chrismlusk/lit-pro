<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?></title>

		<meta property="og:title" content="<?php the_field('headline'); ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php the_field('summary'); ?>" />
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<?php 
				if ( is_page_template( 'template-topic-page.php' ) ) {
					$class = 'topic-page';
				} else {
					$class = 'default';
				}
			?>
			<header class="<?php echo $class; ?>" role="banner">

				<!-- nav -->
				<nav class="navbar navbar-default navbar-fixed-top navbar-topic-page" role="navigation">
					<div class="container-fluid">

						<!-- logo -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo home_url(); ?>">
								News Literacies 2016<span class="credit hidden-xs"> by @Studio20NYU</span>
							</a>
						</div>
						<!-- /logo -->

						<!-- navbar -->
						<?php html5blank_nav(); ?>
						<!-- /navbar -->

					</div>
				</nav>
				<!-- /nav -->

			</header>
			<!-- /header -->