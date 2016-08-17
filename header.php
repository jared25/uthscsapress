<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

 
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<?php wp_head(); ?>
	</head>
	<!-- Start of function to select the theme colors in customize. Looking to move this to the PHP file soon -->
	<?php
    $example_position = get_theme_mod( 'fp_theme_switch_control' );
    if( $example_position != '' ) {
        switch ( $example_position ) {
            case 'orangeTheme':
			//Dark Orange: #d44f0d;   Light Orange:#f26722;
                echo '<style type="text/css">';
                echo '#page-title-banner{ background-color: #a43d0a; }';
                echo '.featured-image-tab{ background-color: #a43d0a; }';
				echo '.top-bar, .top-bar ul{ background-color: #f26722; }';
				echo '.top-border {border-top: #f26722 5px solid}';
				echo '.utility .right-top-info{background-color: #f26722;}';
				echo '.menu .active > a { background-color: #a43d0a;}';
				echo '.top-bar .menu a:hover:not(.button) {background-color: #d44f0d;}';
				echo '.site-title {color:#d44f0d;}';
                echo '</style>';
                break;
            case 'purpleTheme':
			//Dark Purple: #4b3d73;   Light Purple:#7a68ae;
                echo '<style type="text/css">';
                echo '#page-title-banner{ background-color: #4b3d73; }';
                echo '.featured-image-tab{ background-color: #4b3d73; }';
				echo '.top-bar, .top-bar ul{ background-color: #7a68ae; }';
				echo '.top-border {border-top: #4b3d73 5px solid}';
				echo '.utility .right-top-info{background-color: #4b3d73;}';
				echo '.menu .active > a { background-color: #4b3d73;}';
				echo '.top-bar .menu a:hover:not(.button) {background-color: #614f94;}';
				echo '.top-bar-right, .top-bar-right ul li{ background-color: #4b3d73; }';
				echo '.uthscsa-footer{ background-color: #7a68ae; }';
				echo '.site-title {color:#4b3d73; }';
                echo '</style>';
                break;
            case 'tealTheme':
			//Dark Teal: #005d66;   Light Teal:#008c99;
                echo '<style type="text/css">';
                echo '#page-title-banner{ background-color: #005d66; }';
                echo '.featured-image-tab{ background-color: #005d66; }';
				echo '.top-bar, .top-bar ul{ background-color: #008c99; }';
				echo '.top-border {border-top: #005d66 5px solid ; }';
				echo '.utility .right-top-info{background-color: #005d66;}';
				echo '.menu .active > a { background-color: #005d66;}';
				echo '.top-bar .menu a:hover:not(.button) {background-color: #007580;}';
				echo '.top-bar-right, .top-bar-right ul li{ background-color: #005d66; }';
				echo '.uthscsa-footer{ background-color: #008c99; }';
				echo '.site-title {color:#005d66;}';
                echo '</style>';
                break;
			case 'blueTheme':
			//Dark Blue: #004067;   Light Blue:#0066a4;
                echo '<style type="text/css">';
                echo '#page-title-banner{ background-color: #004067; }';
                echo '.featured-image-tab{ background-color: #004067; }';
				echo '.top-bar, .top-bar ul{ background-color: #0066a4; }';
				echo '.top-border {border-top: #004067 5px solid }';
				echo '.utility .right-top-info{background-color: #004067;}';
				echo '.menu .active > a { background-color: #004067;}';
				echo '.top-bar .menu a:hover:not(.button) {background-color: #005385;}';
				echo '.top-bar-right, .top-bar-right ul li{ background-color: #004067; }';
				echo '.uthscsa-footer{ background-color: #0066a4; }';
				echo '.site-title {color:#0066a4; }';
                echo '</style>';
                break;
			}
		}
	?>
	<!-- End of custom theme color function --> 
	
	<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	
	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
	<div class="off-canvas-wrapper">
		<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>
	<?php do_action( 'foundationpress_layout_start' ); ?>
	
	<!-- Start of the header -->
	<header id="masthead" class="site-header" role="banner">
		<div class="top-border">
		
		<!-- Custom Logo -->
			<div class="logoHeader">
				<a href="<?php echo get_option('home'); ?>"/><img src='<?php echo esc_url( get_theme_mod( 'FoundationPress_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				<div class="site-title"><?php printf( esc_html__( '| %s', '' ), get_bloginfo ( 'description' ) ); ?></div>
			</div>
		<!-- End of Logo Div -->
		
			<!-- Top Right Utility -->
			<div class="utility hide-for-small-only"><p class="right-top-info"><i class="icon-logo-hex-group top-uthscsa-icon"></i>  Part of the UT Health Science Center</p>					
				<!-- Search Form Below -->
				<div class="custom-search">
					<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
							<div><input type="text" size="18px" name="s" id="s" value="Search" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/></div>
					</form>
				</div>
				<!-- End of the Search Form -->
			</div>
			<!-- End of the Top Right Utility -->
			
			<!-- Start of Nav -->
			<nav id="site-navigation" class="main-navigation top-bar" role="navigation">
				<div class="row">
					<div class="top-bar-left">
						<?php foundationpress_top_bar_l(); ?>
					</div>
					<div class="top-bar-right">		
						<?php foundationpress_top_bar_r(); ?>
								<div class="right-menu">
									<?php if ( ! get_theme_mod( 'wpt_mobile_menu_layout' ) || get_theme_mod( 'wpt_mobile_menu_layout' ) == 'topbar' ) : ?>
									<?php get_template_part( 'template-parts/mobile-top-bar' ); ?>
									<?php endif; ?>
								</div>
							</div>
					</div>
				
					<!-- End of the Nav -->
				</nav>
				<!-- Start of Mobile Nav -->
				<div class="title-bar" data-responsive-toggle="site-navigation">
					<button class="menu-icon" type="button" data-toggle="mobile-menu"></button>
					<div class="title-bar-title">
					</div>
				</div>

			</div>
			<!-- End of Mobile Nav -->
		</header>

	<section class="container">
		<?php do_action( 'foundationpress_after_header' );
