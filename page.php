<?php get_header(); ?>

	<div id="content" class="row"> <!-- we'll end content div in footer.php -->
		<div class="large-12 columns"> <!-- we'll end large-12 columns div in footer.php -->
			<div class="row">
				<div id="main" class="large-8 columns" role="main">
					<div class="row single">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
  <header class="article-header">
    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
  </header> <?php // end article header ?>

  <section class="entry-content cf" itemprop="articleBody">
  <?php
  // the content (pretty self explanatory huh)
  the_content();
  ?>
  </section>

  <!-- <footer class="article-footer">
  </footer> -->

</article> <?php // end article ?>

					<?php endwhile; ?>

					<?php else : ?>
						<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
						</article>
					<?php endif; ?>

					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>

<?php get_footer(); ?>
