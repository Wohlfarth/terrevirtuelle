<?php

// $Id: page.tpl.php,v 1.20 2011/05/26 01:41:18 balance Exp $

?>

<?php if ($page['headerutility']): ?><div id="headerutility"><?php print render($page['headerutility']); ?><div class="clear"></div></div> <!-- header utility --><?php endif; ?>

	

<?php if ($page['header']): ?>

<header id="header" role="banner">

  <?php print render($page['header']); ?>

  <h1><?php if ($logo): ?>

  <a href="<?php print $base_path ?>" title="Internet Society - Go to Home Page">
  <img src="<?php print $logo ?>" class="logo" alt="Go to ISOC Home" width="197" height="82" >
  </a><?php endif; ?></h1>

  <div class="clear"></div>

</header> <!-- #header -->

<?php endif; ?>



<?php if ($page['navigation'] || $main_menu): ?>

<nav id="nav" role="navigation"><?php echo render($page['navigation']);	?><div class="clear"></div></nav><!-- #nav -->

<?php endif; ?>

				

<div id="columns">



<?php if ($is_front) : ?>

<div id="slideshow"><?php print render ($page['slideshow']); ?></div>

<div class="home-left"><?php print render ($page['home_left']); ?></div>

<div class="home-center"><a></a><?php print render ($page['home_center']); ?></div>

<div class="home-right"><?php print render ($page['home_right']); ?></div>

<?php endif; ?>



<?php if (!$is_front) : ?>

			<?php if ($page['sidebar_first']): ?><aside id="aside-left"><?php print render($page['sidebar_first']); ?></aside><?php endif; ?>



 	<section id="copy" role="main">

				<?php if ($page['highlighted']) : ?><div class="mission"><?php print render ($page['highlighted']); ?></div><?php endif; ?>

				<?php if (!$is_front) print $breadcrumb; ?>

				<?php if ($show_messages) { print $messages; }; ?>

      			<?php print render($title_prefix); ?>

									<?php if ($title): ?><h1><?php print $title; ?></h1><?php endif; ?>

      			<?php print render($title_suffix); ?>

      			<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>

      			<?php print render($page['help']); ?>
			<?php print render($page['content_above']); ?>

      			<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

		      	<?php if ($page['content']) : ?><?php print render ($page['content']); ?><?php endif; ?>

			</section> <!-- end main content -->

    			<?php if ($page['sidebar_second']): ?><aside id="aside-right" role="complementary"><?php print render($page['sidebar_second']); ?></aside> <!-- end aside-right --><?php endif; ?>



<?php endif; ?>



		

<div class="clear"></div></div><!-- end container -->

<?php if ($page['footer']): ?><footer id="footer" role="contentinfo"><?php print render ($page['footer']); ?></footer> <!-- end footer --><?php endif; ?>