<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estore
 */

?>

<article id="post-<?php the_ID(); ?>" class="search-article col-md-4 col-sm-6 col-12">
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="catalog-list__heading"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			estore_posted_on();
			estore_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<figure class="search-article__image">
		<?php estore_post_thumbnail(); ?>
			
		
	</figure>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	
</article><!-- #post-<?php the_ID(); ?> -->
