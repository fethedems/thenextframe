<!-- <div class="row"> -->
	<div id="sidebar1" class="sidebar large-4 columns" role="complementary">

	<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
		<div class="social">
			<ul class="social-list">
				<li class="social-element">
					<a href="https://twitter.com/TheNextFrame" class="social-link twitter"></a>
				</li>
				<li class="social-element">
					<a href="https://www.facebook.com/theNextFrame" class="social-link facebook"></a>
				</li>
				<li class="social-element">
					<a href="<?php bloginfo('rss2_url'); ?>" class="social-link feed"></a>
				</li>
			</ul>
		</div>

	<?php dynamic_sidebar( 'sidebar1' ); ?>
	<?php else : ?>
	<?php
		/*
		 * This content shows up if there are no widgets defined in the backend.
		*/
	?>
		<div class="no-widgets">
			<p><?php _e( 'This is a widget ready area. Add some and they will appear here.', 'bonestheme' );  ?></p>
		</div>
	<?php endif; ?>

	</div> <!-- end sidebar -->
<!-- </div> --> <!-- end row -->