<?php get_header(); ?>
<div id="marketengine-page">
	<div class="me-container">
		<div class="marketengine-content-wrap">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
		?>
			<div class="marketengine-page-title">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="marketengine-content">
				<?php the_content(); ?>
		<?php
			endwhile;

		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>