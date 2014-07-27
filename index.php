<?php get_header(); ?>

<!-- we'll end container div in footer.php -->

<div id="content" class="row"> <!-- we'll end content div in footer.php -->
    <div class="large-12 columns"> <!-- we'll end large-12 columns div in footer.php -->
    	<!-- slider -->
      	<div class="slider row">
        	<div class="large-12 hide-for-small">
          		<div id="featured" data-orbit data-options="animation:slide;
															animation_speed:1000;
															pause_on_hover:true;
															animation_speed:500;
															navigation_arrows:true;
															bullets:false;
															slide_number: false;">
					<?php $bucle_portada = new WP_Query('category_name=Portada&posts_per_page=3'); // tomamos los 3 primeros posts con la categoría PORTADA ?>
					<?php while ($bucle_portada->have_posts()) : $bucle_portada->the_post(); // inicializamos el loop ?>
  						<?php
  							// Sacamos todas las imágenes
  							$imagenes = rwmb_meta( 'portada_image', $args = array('type' => 'image', size => 'portada'));
  							// nos quedamos con la primera
  							$imagen = reset($imagenes);
  							// obtenemos también el permalink del post
  							$link = get_permalink();
  							// $post_title = get_the_title();
  							// la imprimimos
  							echo "<a href='{$link}' title='{$imagen['title']}'><img src='{$imagen['url']}' width='{$imagen['width']}' height='{$imagen['height']}' alt='slide image' /></a>";
  							// echo "<div class='orbit-caption'>{$post_title}</div>";
  						?>
					<?php endwhile; ?>
            	</div> <!-- end featured -->
      		</div> <!-- end large-12 hide-for-smal -->
    	</div> <!-- end slider -->

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

						<?php $category = get_the_category(); // tomamos la primera categoría asignada ?>
						<a class="main-category" href="<?php echo get_category_link( $category[0]->term_id ) ?>"><?php echo $category[0]->cat_name; ?></a>
					
						<?php
						if( has_post_thumbnail() ){
							echo '<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">';
								the_post_thumbnail();
							echo '</a>';
						} else {
							// echo '<img class="attachment-post-thumbnail" src="http://placehold.it/640x400&text=Placeholder">';
							// echo '<img class="attachment-post-thumbnail" src="/wp-content/themes/thenextframe/library/images/leather.png">';

							echo '<a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">
								<img class="attachment-post-thumbnail" src="/wp-content/themes/thenextframe/library/images/leather.png">
							</a>';
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
				<!-- <nav class="row pagination"> -->
					<div class="pagination large-12 columns">
						<div class="right"><?php next_posts_link('Siguiente'); ?></div>
						<div class="left"><?php previous_posts_link('Anterior'); ?></div>
					</div>
				<!-- </nav> --> <!-- end pagination -->

			</div> <!-- end row -->
		</div> <!-- end main -->
		<?php get_sidebar(); ?>
	</div> <!-- end row -->

<?php get_footer(); ?>