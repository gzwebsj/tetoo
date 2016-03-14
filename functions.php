<?php
/*配置文件*/
global $options;
add_theme_support('post-formats');
if (is_admin() ){
get_template_part('int/theme_fun');
}

/*全局回调函数*/
function getop($str){
$options = get_option('theme_options'); /*获取配置*/
echo $options[$str];
}
print_r($options);

/*调用文件*/
require_once("int/theme_ad_page.php");

//菜单导航选择器
if(function_exists('register_nav_menu')){
register_nav_menu('topmenu','顶部导航');
register_nav_menu('mainmenu','网站导航');
}

//全站小工具侧栏
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name'          => '首页侧栏',
'id'            => 'widget_homesidebar',
'before_widget' => '<li id="%1$s">',
'after_widget' => '</li>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
register_sidebar(array(
'name'          => '文章页侧栏',
'id'            => 'widget_postsidebar',
'before_widget' => '<li id="%1$s">',
'after_widget' => '</li>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
}

/*WordPress 后台禁用Google Open Sans字体，加速网站*/
if (!function_exists('remove_wp_open_sans')):
    function remove_wp_open_sans() {
        wp_deregister_style('open-sans');
        wp_register_style('open-sans', false);
    }
    /*前台删除Google字体CSS*/
    add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
    /*后台删除Google字体CSS*/
    add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
endif;
/*Gravatar头像缓存*/
function mytheme_get_avatar($avatar) {
    $avatar = preg_replace("/http:\/\/(www|\d).gravatar.com/", "http://0.bsdev.cn/", $avatar);
    return $avatar;
}
add_filter('get_avatar', 'mytheme_get_avatar');

/*移除WordPress头部最新评论的内联样式*/
function twentyten_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}
add_action('widgets_init', 'twentyten_remove_recent_comments_style');

/*去除头部冗余代码*/
function remove_open_sans() {
    wp_deregister_style('open-sans');
    wp_register_style('open-sans', false);
    wp_enqueue_style('open-sans', '');
}
add_action('init', 'remove_open_sans');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');
remove_action('wp_head', 'rel_canonical');
remove_action('pre_post_update', 'wp_save_post_revision');

/*移除版本号*/
function themepark_remove_cssjs_ver($src) {
    if (strpos($src, 'ver=' . get_bloginfo('version'))) $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'themepark_remove_cssjs_ver', 999);
add_filter('script_loader_src', 'themepark_remove_cssjs_ver', 999);
?>