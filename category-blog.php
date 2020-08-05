<?php get_header(); ?>

<div class="news" id="blog">
	<div class="news-container outer-container">
		<?php $blog_obj = get_term_by('slug', 'blog', 'category'); ?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title', $blog_obj->taxonomy.'_'.$blog_obj->term_id); ?></span>
    		</h1>
		</div>
		<h3 class="common-subtitle"><?php echo $blog_obj->description; ?></h3>
		<div class="news-content-container">
			<?php
			if(have_posts()):
			 while(have_posts()):the_post();
			?>
			<div class="news-item">
				<div class="news-image">
					<a href="<?php the_permalink(); ?>">
					   <?php the_post_thumbnail(); ?>
				   </a>
				</div>
				<div class="news-caption">
					<div class="news-title">
						<a href="<?php the_permalink(); ?>">
						【<?php the_title(); ?>】
						</a>
					</div>
					<h4 class="news-time"><?php the_time('Y.m.d'); ?></h4>
					<p class="news-text"><?php echo get_the_excerpt(); ?></p>
				</div>
			</div>
			<?php
    			endwhile;
			endif;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>