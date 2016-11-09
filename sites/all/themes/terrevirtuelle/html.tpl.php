<?php

/**
 * @file
 * ISOC theme's implementation to display the basic html structure of a single
 * Drupal page.
 */

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir; ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <link rel="stylesheet" href="/sites/all/themes/isoc/css/handheld.css" media="handheld"/>
		<!--[if IE]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
 <div id="skip-link">
	<a href="#nav" class="element-invisible element-focusable">Jump to Navigation</a>
	<a href="#columns" class="element-invisible element-focusable">Jump to Content</a>
	<a href="/sitemap" class="element-invisible element-focusable">Jump to Site Map</a>
 </div>

  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>