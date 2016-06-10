<?php
/*
Template Name: Featured Page w/ Image 2
*/
get_header(); ?>
		<!-- Start of the custom featured header banner -->
		<header class="featured-image-two-tab" role="banner">
						<img class="hex" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/uthscsa/hex-landing-header_blue.png">
				<div class="row featured-two-container">
					<div class="large-8 columns featured-two-image">
					<!-- Calling Featured Image into Header -->
						<?php 
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'fp-full' ); 

							if ($image) : ?>
								<img src="<?php echo $image[0]; ?>" alt="" />
							<?php endif; ?> 
					</div>
					<!-- Start of the right featured text -->
					<div class="large-4 columns">
						<div class="featured-two-container">
							<h1 class="entry-title featured-two-title"><?php the_title(); ?></h1>
							<div class="featured-two-text">
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

</div>

<?php get_footer();
