<?php get_header(); ?>

<!-- we'll end container div in footer.php -->

<div id="content" class="row"> <!-- we'll end content div in footer.php -->
    <div class="large-12 columns">
		<div class="row">
			<!-- left column -->
			<div id="main" class="large-8 columns" role="main">
				<div class="row">

				<?php // rewind_posts(); // reiniciamos el bucle ?>
				<?php $i = 0; // cada dos iteraciones, separar ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php 
					$par = false;
					if( $i % 2 == 0 ){
						$par = true;
					}
				 ?>
				<?php if($par) echo '<div class="pair">'; // las colocamos de dos en dos ?>

					<article id="post-<?php the_ID(); ?>" class="medium-6 columns" role="article">
						<?php
						if( has_post_thumbnail() ){
							the_post_thumbnail();
						} else {
							echo '<img class="attachment-post-thumbnail" src="http://placehold.it/640x400&text=Placeholder">';
						}
						?>
						
						<h1 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					</article> <!-- end article -->

					<?php

						// Si es impar, cerramos

						if($par == false){
							echo '</div> <!-- end pair '.$i.'-->';
						}

						$i++;
					?>
					<?php endwhile; // have posts ?>
					<?php 
						if($par){
							// si hemos terminado y no se ha cerrado, lo hacemos
							echo '</div> <!-- end pair '.$i.'-->';
						}
					 ?>
				<?php endif; // have posts ?>

				<!-- </div> --> <!-- end row (inside main) -->

				<!-- code for pagination -->
				<nav class="row pagination">
					<div class="large-12 columns">
						<div class="right"><?php next_posts_link('Siguiente'); ?></div>
						<div class="left"><?php previous_posts_link('Anterior'); ?></div>
					</div>
				</nav> <!-- end pagination -->

			</div> <!-- end row -->
		</div> <!-- end main -->
		<?php get_sidebar(); ?>
	</div> <!-- end row -->

<?php get_footer(); ?>