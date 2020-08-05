<?php get_header(); ?>

<div class="greeting">
	<div class="greeting-container outer-container">
		<h1 class="greeting-title">
			「<?php bloginfo('name'); ?>」
		</h1>
		<h3 class="greeting-caption">
			<?php bloginfo('description'); ?>
		</h3>
		<div class="campaign-wrapper">
			<div class="campaign-container">
				<div class="campaign-title-wrapper">
					<h1 class="campaign-title">
						OPEN
					</h1>
					<h3 class="campaign-subtitle">記念キャンペーン</h3>
				</div>
				<div class="campaign-content-wrapper">
					<div class="campaign-content-container">
    					<p class="campaign-list">
    						<i class="far fa-check-square"></i>ご新規様、他店ジェル<span class="under">”オフ無料！”</span>
    					</p>
    					<p class="campaign-list">
    						<i class="far fa-check-square"></i>１ヶ月以内の当店ジェルネイル
    						<br>&rArr;付け替えに限り<span class="under">”オフ無料！”</span>
    					</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="news">
	<div class="news-container outer-container">
		<?php $news_obj = get_term_by('slug', 'top_news', 'news_kind'); ?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title', $news_obj->taxonomy.'_'.$news_obj->term_id); ?></span>
    		</h1>
		</div>
		<h3 class="common-subtitle"><?php echo $news_obj->description; ?></h3>
		<div class="news-content-container">
			<?php
			$args = array(
			    'post_type' => 'news',
			    'tax_query' => array(
			        array(
			            'taxonomy' =>'news_kind',
			            'field' => 'slug',
			            'terms' => 'top_news',
			        ),
			    ),
			    'posts_per_page' => 3,
			);
			$news_posts = new WP_Query($args);
			if($news_posts->have_posts()):
			 while($news_posts->have_posts()):$news_posts->the_post();
			?>
			<div class="news-item fadeIn">
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
    			wp_reset_postdata();
			endif;
			?>
		</div>
		<div class="news-link-wrapper">
    		<a class="news-link" href="<?php echo esc_url(get_term_link($news_obj)); ?>">
    			<?php echo $news_obj->name; ?>一覧へ
    		</a>
		</div>
	</div>
</div>

<div class="concept" id="concept">
	<div class="concept-container outer-container">
		<?php
		$concept_obj = get_page_by_path('concept');
		$post = $concept_obj;
		setup_postdata($post);
		?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title'); ?></span>
    		</h1>
		</div>
		<h3 class="common-subtitle"><?php the_excerpt(); ?></h3>
		<?php wp_reset_postdata(); ?>

		<div class="concept-content-container">
    		<?php
    		$parent_id = $concept_obj->ID;
    		$args = array(
    		    'posts_per_page' => -1,
    		    'post_type' => 'page',
    		    'orderby' => 'menu_order',
    		    'order' => 'ASC',
    		    'post_parent' => $parent_id,
    		);
    		$concept_pages = new WP_Query($args);
    		if($concept_pages->have_posts()):
    		  while($concept_pages->have_posts()) : $concept_pages->the_post();
    		?>
    		<div class="concept-item fadeIn">
    			<h3 class="common-label"><?php the_title(); ?></h3>
        		<h2 class="common-sublabel"><?php the_field('en_title'); ?></h2>
        		<div class="concept-wrapper">
        			<div class="concept-image">
        				<?php the_post_thumbnail(); ?>
        			</div>
        			<div class="concept-caption">
        				<?php the_content(); ?>
        			</div>
        		</div>
    		</div>
    		<?php
    		  endwhile;
    		  wp_reset_postdata();
            endif;
    		?>
		</div>
	</div>
</div>

<div class="fee" id="fee">
	<div class="fee-container outer-container">
		<?php
		$fee_obj = get_page_by_path('fee');
		$post = $fee_obj;
		setup_postdata($post);
		?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title'); ?></span>
    		</h1>
		</div>
		<div class="common-subtitle"><?php the_excerpt(); ?></div>
		<?php wp_reset_postdata(); ?>
		<div class="fee-content-container">
			<?php
			$args = array(
			    'post_type' => 'menu',
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'kind',
			            'field' => 'slug',
			            'terms' => 'plan',
			        ),
			    ),
			    'posts_per_page' => -1,
			    'orderby' => 'menu_order',
			    'order' => 'ASC',
			);
			$fee_posts = new WP_Query($args);
			if($fee_posts->have_posts()):
			 while($fee_posts->have_posts()): $fee_posts->the_post();
			?>
			<div class="fee-item fadeIn">
				<div class="fee-item-wrapper">
    				<h2 class="fee-title"><i class="far fa-dot-circle"></i> <?php the_title(); ?></h2>
    				<div class="fee-image"><?php the_post_thumbnail(); ?></div>
    				<p class="fee-price"><?php the_field('fee'); ?></p>
    				<p class="fee-caption"><?php the_content(); ?></p>
				</div>
			</div>
			<?php
    			endwhile;
    			wp_reset_postdata();
            endif;
			?>
		</div>
	</div>
</div>

<div class="bg-wrapper">
</div>

<div class="information" id="information">
	<div class="information-container outer-container">
		<?php
		$information_pages = get_page_by_path('information');
		$post = $information_pages;
		setup_postdata($post); ?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title'); ?></span>
    		</h1>
		</div>
		<div class="common-subtitle"><?php the_excerpt(); ?></div>
		<?php
		if(have_rows('information')):
		  while(have_rows('information')) : the_row();
		?>
		<div class="shop-info-wrapper">
			<div class="shop-info-container">
    			<div class="shop-image fadeIn">
    				<img src="<?php the_field('main_image'); ?>">
    			</div>
    			<div class="shop-info fadeIn">
    				<table>
    					<tr>
    						<td>サロン名</td><td><?php bloginfo('name'); ?></td>
    					</tr>
    					<tr>
    						<td>住所</td><td><?php the_sub_field('address'); ?></td>
    					</tr>
    					<tr>
    						<td>クレジットカード</td><td><?php the_sub_field('card'); ?><td>
    					</tr>
    				</table>
    			</div>
			</div>
		</div>
		<div class="shop-map-wrapper">
			<div class="shop-map-container">
				<div class="map-image fadeIn">
					<?php the_content(); ?>
				</div>
				<div class="map-info fadeIn">
					<table>
						<tr>
							<td>電話番号</td><td><?php the_sub_field('number'); ?></td>
						</tr>
						<tr>
							<td>営業日</td><td><?php the_sub_field('date'); ?></td>
						</tr>
						<tr>
							<td>定休日</td><td><?php the_sub_field('close'); ?></td>
						</tr>
						<tr>
							<td>営業時間</td><td><?php the_sub_field('time'); ?></td>
						</tr>
						<tr>
							<td>駐車場</td><td><?php the_sub_field('parking'); ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="staff-wrapper">
			<div class="staff-container">
				<div class="staff-image fadeIn">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="staff-info fadeIn">
					<h2 class="staff-name"><?php the_sub_field('en_name'); ?></h2>
					<p class="staff-license">
						<?php the_sub_field('license'); ?>
					</p>
					<span class="staff-insta">
						インスタグラムやってます♪
					</span>
					<a href="<?php the_sub_field('insta'); ?>" target="_black">
						<i class="fab fa-instagram insta"></i>
					</a>
					<p class="nail9-link">
    					姉の自宅ネイルサロンホームページです
						<br><a href="https://nailsalon-9.com/">nailsalon9</a>（かすみがうら市稲吉東）
					</p>
				</div>
			</div>
		</div>
		<?php
		  endwhile;
		endif;
		?>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

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
			$args = array(
			    'post_type' => 'post',
			    'tax_query' => array(
			        array(
			            'taxonomy' =>'category',
			            'field' => 'slug',
			            'terms' => 'blog',
			        ),
			    ),
			    'posts_per_page' => 3,
			);
			$blog_posts = new WP_Query($args);
			if($blog_posts->have_posts()):
			 while($blog_posts->have_posts()):$blog_posts->the_post();
			?>
			<div class="news-item fadeIn">
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
    			wp_reset_postdata();
			endif;
			?>
		</div>
		<div class="news-link-wrapper">
    		<a class="news-link" href="<?php echo esc_url(get_term_link($blog_obj)); ?>">
    			<?php echo $blog_obj->name; ?>一覧へ
    		</a>
		</div>
	</div>
</div>

<div class="contact" id="contact">
	<div class="contact-container outer-container">
    	<?php
    	$contact_obj = get_page_by_path('contact');
    	$post = $contact_obj;
    	setup_postdata($post);
    	?>
		<div class="title-wrapper">
    		<h1 class="common-title">
    			<span class="common-entitle"><?php the_field('en_title'); ?></span>
    		</h1>
		</div>
		<div class="common-subtitle"><?php the_excerpt(); ?></div>

		<?php the_content(); ?>

		<?php wp_reset_postdata(); ?>

		<?php
		$privacy_obj = get_page_by_path('privacy-policy');
		$post = $privacy_obj;
		setup_postdata($post);
		?>
		<p class="privacy-caption">
			お問い合わせフォームをご利用の際は必ず<a href="<?php the_permalink(); ?>" target="_blank">プライバシーポリシー</a>を
			一読してください。
		</p>
		<?php wp_reset_postdata(); ?>
	</div>
</div>

<div class="page-top-wrapper">
	<a class="page-top"><i class="fas fa-arrow-up"></i></a>
</div>

<?php get_footer(); ?>