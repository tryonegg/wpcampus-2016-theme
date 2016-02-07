<?php

// Get URL
$blog_url = get_bloginfo('url');

?><!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
	<a href="#wpc-main" id="skip-to-content">Skip to Content</a>

	<div id="wpc-banner"></div>
	<div id="wpc-header">
		<div class="row">
			<div class="large-12 columns">
				<div class="banner-inside">
					<div class="menu left">
						<ul>
							<li<?php echo is_page( 'about' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/about/">About</a></li>
							<li<?php echo is_page( 'speakers' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/speakers/">Speakers</a></li>
							<li<?php echo is_page( 'schedule' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/schedule/">Schedule</a></li>
						</ul>
					</div>
					<div class="wpc-logo">
						<a href="<?php echo $blog_url; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wpcampus-logo-tagline-info-white.svg" alt="WPCampus: Where WordPress Meets Higher Education on July 15-16 in Sarasota, Florida" /></a>
					</div>
					<div class="menu right">
						<ul>
							<li<?php echo is_page( 'location' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/location">Location</a></li>
							<li<?php echo is_page( 'sponsors' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/sponsors">Sponsors</a></li>
							<li<?php echo is_page( 'contact' ) ? ' class="current"': null; ?>><a href="<?php echo $blog_url; ?>/contact/">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>