<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
		</section>
		<div class="uthscsa-footer">
			<div id="footer-container">
				<footer id="footer">
					<?php do_action( 'foundationpress_before_footer' ); ?>
					<?php dynamic_sidebar( 'footer-widgets' ); ?>
					<?php do_action( 'foundationpress_after_footer' ); ?>
				</footer>
			</div>
			<div class="footer-closing-note">
				<p class="footer-closing-padding"> Material and links provided by UT Health Science Center San Antonio are for informational purposes only. Mauris elementum mauris vitae tortor. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Aliquam ornare wisi eu metus. Etiam egestas wisi a erat. Morbi scelerisque luctus velit. </p>
			</div>
		</div>
		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) == 'offcanvas' ) : ?>
		</div><!-- Close off-canvas wrapper inner -->
	</div><!-- Close off-canvas wrapper -->
</div><!-- Close off-canvas content wrapper -->
<?php endif; ?>

<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.12.8.js'><\/script>".replace("HOST", location.hostname));
//]]></script>
</body>
</html>
