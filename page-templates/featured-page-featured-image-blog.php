<?php
/*
Template Name: Featured Page w/Image & Blog
*/
get_header(); ?>
		<header class="featured-image-tab" role="banner">
				<div class="row featured-container">
					<div class="large-5 columns">
					<div class="featured-title">
						<h1 class="white"><?php the_title(); ?></h1>
					</div>
					<div class="featured-text">
					<?php
						// Retrieves the stored value from the database
						$meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
					 
						// Checks and displays the retrieved value
						if( !empty( $meta_value ) ) {
							echo $meta_value;
						}
					?>
					</div>
					</div>
					<div class="featured-image large-5 columns">
						<?php if ( has_post_thumbnail() ) : the_post_thumbnail(); endif; ?>
					</div>
				</div>
		</header>

<?php //get_template_part( 'template-parts/featured-image' ); ?>
<div id="page-full-width" role="main">
<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
  <article <?php post_class('main-content') ?> id="post-<?php the_ID(); ?>">

      <?php do_action( 'foundationpress_page_before_entry_content' ); ?>
      <div class="entry-content">
          <?php the_content(); ?>
		  	  		<!-- Start Blog Posts Query for 3-->
					<hr>
		<?php $temp_query = $wp_query; ?>
		<?php query_posts(array(
			'showposts' => 3,
			'category_name' => 'Featured' //You can insert any category name
		)); ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="columns large-4">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h4>
			<?php the_post_thumbnail('front-page-post-thumbnail'); ?>  <?php the_excerpt(); ?><a class="button" href="<?php the_permalink() ?>">Learn More</a>
			</div>
		</div>
		<?php endwhile; ?>
		<?php wp_reset_query(); ?>
		</div>
		<!-- End Blog Posts Query -->
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

<?php do_action( 'foundationpress_after_content' ); ?>

<?php get_footer();
