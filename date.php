<?php get_header(); ?>



<div class="news" id="blog">
	<div class="news-container outer-container">
		<div class="title-wrapper">
    		<h1 class="common-date-title">
    			<?php echo get_the_date('Y/m'); ?>の記事一覧
    		</h1>
		</div>
		<div class="news-content-container">
			<?php if(have_posts()):while(have_posts()):the_post(); ?>
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