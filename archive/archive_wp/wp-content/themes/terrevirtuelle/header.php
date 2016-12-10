<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); 

$path="/wp-content/themes/terrevirtuelle/";
?>
</head>
<body>



<div class="main">
<object class="flash" title="Water">
	<param name="movie" value="flash/head.swf">
    <param name="quality" value="high">
    <embed src="/wp-content/themes/terrevirtuelle/head.swf" quality="high" bgcolor="#a2a451" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" class="flash"></embed>
</object>

<ul class="topnav"><?php if (is_home()):?><li class="current_page_item">
<a href="<?php echo get_settings('home');?>" style="margin-left:-2px">Main Page</a>
</li><?php wp_list_pages('depth=1&title_li='); ?><?php else :?><li>
<a href="<?php echo get_settings('home'); ?>" style="margin-left:-2px">Main Page</a>
</li><?php wp_list_pages('depth=1&title_li=');?><?php endif;?></ul>
<DIV class="content">

<?php
// INTERIOR PAGES: SUBNAVIGATION
// see http://www.cmurrayconsulting.com/wordpress-tips/current-section-navigation-wordpress/
echo "<ul id='sidenav'>";
$post_ancestors = get_post_ancestors($post);
if (count($post_ancestors)) {
    $top_page = array_pop($post_ancestors);
    $children = wp_list_pages('title_li=&child_of='.$top_page.'&echo=0');
    $sect_title = get_the_title($top_page);
} elseif (is_page()) {
    $children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=2');
    $sect_title = the_title('','', false);
}

echo $children;
// however you want to output your section navigation
if ($children) { //echo $children; }
echo "</ul>";
}
?>

