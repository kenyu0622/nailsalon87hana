<?php get_header(); ?>

<div class="privacy-policy">
	<div class="privacy-policy-container outer-container">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<div class="privacy-policy-content">
			<?php the_content(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>