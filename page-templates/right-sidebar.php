<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 * Template Name: Main w/Right Sidebar
 */

 get_header(); ?>

		<header id="page-title-banner" role="banner">
			<div class="row">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>
		</header>
 <?php get_template_part( 'template-parts/featured-image' ); ?>

 <div id="page" role="main">

 <?php do_action( 'foundationpress_before_content' ); ?>
 <?php while ( have_posts() ) : the_post(); ?>
   <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">
       <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
       <div class="entry-content">
           <?php the_content(); ?>
           <?php edit_post_link( __( 'Edit', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
       </div>
       <footer>
           <?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
           <p><?php the_tags(); ?></p>
       </footer>
       <?php do_action( 'foundationpress_page_before_comments' ); ?>
       <?php comments_template(); ?>
       <?php do_action( 'foundationpress_page_after_comments' ); ?>
   </article>
 <?php endwhile;?>
		<!-- Call Sidebar -->
		<?php do_action( 'foundationpress_after_content' ); ?>
		<?php get_sidebar(); ?>
		<!-- End Sidebar Call -->
		
		<!-- Start Blog Posts Query for 3-->
		<?php ## $temp_query = $wp_query; ?>
		<?php query_posts(array(
			'showposts' => 3,
			'category_name' => 'Featured' //You can insert any category name
		)); ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="columns large-3">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
			<?php the_post_thumbnail('front-page-post-thumbnail'); ?>  <?php the_excerpt(); ?><a class="button" href="<?php the_permalink() ?>">Learn More</a>
			</div>
		</div>
		<?php endwhile; ?>
 </div>
		<!-- End Blog Posts Query -->

 <?php get_footer();
