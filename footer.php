<footer class="footer-block">
	<div class="footer-wrapper">
    	<div class="outer-container">
        	<?php
        	$information_pages = get_page_by_path('information');
        	$post = $information_pages;
        	setup_postdata($post); ?>
        	<div class="footer-container">
            	<ul class="footer-item-link">
            		<li><a href="#home">Home</a></li>
            		<li><a href="#fee">Plan & Price</a></li>
            		<li><a href="#information">Information</a></li>
            		<li><a href="#blog">Blog</a></li>
            		<li><a href="#contact">Contact</a></li>
            	</ul>

            	<?php
            	if(have_rows('information')):
            	  while(have_rows('information')) : the_row();
            	?>
            	<ul class="footer-item-info">
            		<li><?php bloginfo('name'); ?></li>
            		<li><?php the_sub_field('address'); ?></li>
            		<li><?php the_sub_field('date'); ?></li>
            		<li><?php the_sub_field('time'); ?></li>
            		<li><?php the_sub_field('number'); ?></li>
            	</ul>
        	</div>

        	<h3 class="copyright">
        		Copyright&copy; <?php bloginfo('name'); ?> All Rights Reserved
        	</h3>

        	<?php
        	  endwhile;
        	endif;
        	?>
        	<?php wp_reset_postdata(); ?>

    	</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>