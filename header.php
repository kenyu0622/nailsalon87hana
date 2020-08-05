<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="header-block">
	<div class="header-container">
    	<div class="header-upper">
    		<a class="header-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/image/87hana_logo2.jpg"></a>
    		<div class="tel-mail-insta">
    			<p class="header-caption">
    				<span>小美玉市の</span>自宅ネイルサロン「nailsalon87hana」
    			</p>
    			<a class="mail-contact" href="#contact">
    				<i class="far fa-envelope"></i> <span>メールでのご予約</span>
				</a>
    			<div class="tel-insta-wrapper">
        			<a href="tel:08012644082" class="tel">Tel 080-1264-4082 </a>
        			<a class="tel-insta" href="https://www.instagram.com/nailsalon87hana/?hl=ja" target="_blank">
        				<i class="fab fa-instagram insta"></i>
        			</a>
    			</div>
    			<div class="menu-wrapper">
        			<ul class="menu-container">
        				<?php if(is_front_page()): ?>
        				<li class="menu-item">
        					<a href="#home">Home</a>
    					</li>
        				<li class="menu-item">
        					<a href="#fee">Plan & Price</a>
    					</li>
        				<li class="menu-item">
        					<a href="#information">Information</a>
    					</li>
        				<li class="menu-item">
        					<a href="#blog">Blog</a>
    					</li>
        				<li class="menu-item">
        					<a href="#contact">Contact</a>
    					</li>
    					<?php else: ?>
    					<li class="menu-item">
        					<a href="<?php echo esc_url(home_url('/')); ?>#home">Home</a>
    					</li>
        				<li class="menu-item">
        					<a href="<?php echo esc_url(home_url('/')); ?>#fee">Plan & Price</a>
    					</li>
        				<li class="menu-item">
        					<a href="<?php echo esc_url(home_url('/')); ?>#information">Information</a>
    					</li>
        				<li class="menu-item">
        					<a href="<?php echo esc_url(home_url('/')); ?>#blog">Blog</a>
    					</li>
        				<li class="menu-item">
        					<a href="<?php echo esc_url(home_url('/')); ?>#contact">Contact</a>
    					</li>
    					<?php endif; ?>
        			</ul>
    			</div>

    		</div>
    		<a class="menu-icon-wrapper">
				<span class="menu-icon top"></span>
				<span class="menu-icon center"></span>
				<span class="menu-icon bottom"></span>
			</a>
    	</div>
	</div>

</header>

<div class="gnav">
	<ul class="gnav-container">
		<li class="gnav-item">
			<a href="#home">Home</a>
		</li>
		<li class="gnav-item">
			<a href="#fee">Plan & Price</a>
		</li>
		<li class="gnav-item">
			<a href="#information">Information</a>
		</li>
		<li class="gnav-item">
			<a href="#blog">Blog</a>
		</li>
	</ul>
</div>

<?php if(is_front_page()): ?>
<div class="home" id="home">
	<div class="bg-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/image/87_welcome.JPG)"></div>
	<div class="bg-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/image/87_license.JPG)"></div>
	<div class="bg-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/image/87_billboard.JPG)"></div>
	<div class="home-title-wrapper">
		<p class="home-caption">小美玉市の自宅ネイルサロン</p>
		<h1 class="home-title">nailsalon87hana</h1>
	</div>
</div>
<?php else: ?>
<div class="under-block"></div>
<?php
if(function_exists('bread_crumb')):
    $args = array(
        'type' => 'string',
        'home_label' => 'Home'
    );
?>
    <div class="bread_crumb"><?php bread_crumb($args); ?></div>
<?php
endif;
?>
<?php endif; ?>