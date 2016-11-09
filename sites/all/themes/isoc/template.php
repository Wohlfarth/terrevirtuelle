<?php

// $Id: template.tpl.php,v 1.0 2011/05/26 01:41:18 balance Exp $
 function isoc_preprocess_page(&$vars, $hook) {
// Add id to the top level ul tag of the primary links menu
  $vars['primary_menu'] = preg_replace('/<ul class="menu/i', '<ul id="nav" class="menu', menu_tree('primary-links'), 1);
}

?>