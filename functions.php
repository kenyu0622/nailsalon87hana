<?php
function my_enqueue_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script(
        'script_js',
        get_template_directory_uri().'/assets/js/script.js',
        array(),
        date('YmdGis', filemtime(get_template_directory().'/assets/js/script.js'))
        );
    wp_enqueue_style(
        'my_style',
        get_template_directory_uri().'/assets/css/style.css',
        array(),
        date('YmdGis', filemtime(get_template_directory().'/assets/css/style.css'))
        );
    wp_enqueue_style(
        'font_awesome',
        'https://use.fontawesome.com/releases/v5.6.1/css/all.css'
        );
    wp_enqueue_style(
        'font_titile',
        'https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap'
        );
    wp_enqueue_style(
        'font_entitle',
        'https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap'
        );
    wp_enqueue_style(
        'font_campaign',
        'https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap'
        );

}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

//抜粋分を固定ページに使えるようにする
add_post_type_support('page', 'excerpt');

//抜粋文の文末を変更する
function cms_excerpt_more(){
    return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

//抜粋文の改行を有効化する
function apply_excerpt_br($value){
    return nl2br($value);
}

//アイキャッチ画像を有効化する
function thum_setup_theme() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'thum_setup_theme' );

//ヘッダーのカスタムメニュー化
register_nav_menus(
    array(
        'place_global' => 'グローバル',
    )
    );

//抜粋文の文字数変更
function twpp_change_excerpt_length( $length ) {
    return 38;
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );

//ウィジェットエリア機能を有効化
function theme_widgets_init() {
    register_sidebar(array(
        'name' => 'サイドバーウィジェットエリア',
        'id' => 'primary-widget-area',
        'description' => '固定ページのサイドバー',
        'before_widget' => '<aside class="sidebar-inner">',
        'after_widget' => '</aside>',
    ));
}
add_action('widgets_init', 'theme_widgets_init');

//投稿ページにおけるターム情報取得
function get_term_obj() {
    if(is_singular('post')):
    $category_obj = get_the_category();
    return $category_obj;
    elseif(is_singular('news')):
    global $post;
    $term_obj = get_the_terms($post->ID, 'news_kind');
    return $term_obj;
    endif;
}

function get_specific_posts($number) {
    $post_type = get_post_type();
    $taxonomy = get_term_obj()[0]->taxonomy;
    $term = get_term_obj()[0]->name;
    $args = array(
        'post_type' => $post_type,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' =>'slug',
                'terms' => $term,
            ),
        ),
        'posts_per_page' => $number,
    );
    $specific_posts = new WP_Query($args);
    return $specific_posts;
}

function get_related_posts($number) {
    if(is_singular('post')) :
    $post_type = 'post';
    $taxonomy = 'category';
    $term = 'blog';
    elseif(is_singular('news')):
    $post_type = 'news';
    $taxonomy = 'news_kind';
    $term = 'top_news';
    endif;
    $args = array(
        'post_type' => $post_type,
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term,
            ),
        ),
        'posts_per_page' => $number,
    );
    $related_posts = new WP_Query($args);
    return $related_posts;
}

//タイトルタグ出力
add_theme_support('title-tag');