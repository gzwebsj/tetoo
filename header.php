<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<link rel="shortcut icon" href="<?php echo get_option('theme_Lenmo_favicon')?>">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/font-awesome.css">
<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?>-<?php echo get_bloginfo ( 'description' );?></title>
<!-- <?php
	global $post;
	if (is_single()){
		$keywords = get_post_meta($post->ID, "keyword", true);
		if($keywords == ""){
			$tags = wp_get_post_tags($post->ID);
			foreach ($tags as $tag){
				$keywords = $keywords.$tag->name.",";
			}
			$keywords = rtrim($keywords, ', ');
		}
		$description = get_post_meta($post->ID, "description", true);
		if($description == ""){
			if($post->post_excerpt){
				$description = $post->post_excerpt;
			}else{
				$description = mb_strimwidth(strip_tags($post->post_content),0,200,'');
			}
		}
	}elseif (is_page()){
		$keywords = $options['keyword'];
		$description = $options['description'];
	}elseif (is_category()){
		$keywords = single_cat_title('', false);
		$description = category_description();
	}elseif (is_tag()){
		$keywords = single_tag_title('', false);
		$description = tag_description();
	}
	$keywords = trim(strip_tags($keywords));
	$description = trim(strip_tags($description));
	?> -->
<meta  name="keywords" content="<?php if (is_home()){echo get_option('theme_Lenmo_keywords');}else{echo $keywords;}?>">
<meta  name="description" content="<?php if (is_home()){echo get_option('theme_Lenmo_description');}else{echo $description;}?>">
<meta name="description" content="<?php echo $description; ?>" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/js.js"></script>
</head>
<body>
	<div class="contain">
		<div class="head">
			<div class="header container">
				<div class="logo col-md-2 container-fluid">
					<a href="<?php echo bloginfo('url')?>"><img class="logo img-responsive img-responsive" src="<?php echo get_option('theme_Lenmo_Logo')?>"></a>
				</div>

				<div class="nav col-md-10" id="menu">
					<ul <?php echo strip_tags(wp_nav_menu( $menu)); ?></ul>
				</div>
			</div>
			</div>
			
		</div>
	</div>
</body>