<?php
/*
Plugin Name: Simple Sidebar Navigation
Plugin URI: http://www.ibsteam.net/blog/web-development/simple-sidebar-navigation-plugin-wordpress
Description: Easy way to create custom navigation in sidebars or other pre-defined areas. Conditional tags are included to specify pages where widgets appear. Supports horizontal/top navigation, hierarchical navigation including dropdown menus like Suckerfish.
Author: Max Chirkov
Version: 2.0.9
Author URI: http://www.ibsteam.net
*/

include 'settings/settings.php';
function simple_sidenav_init()
{

	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;
	/*
	function simple_sidenav_pages() {
		$pages = get_pages();
		if($pages){
			foreach($pages as $page){
				if($page->post_parent > 0) { $indented = '&nbsp;&nbsp;&mdash;&nbsp;'; } else { $indented = ''; }
				//$output .= '<option value="'.get_page_link($page->ID).'">'.$page->post_title.'</option>';
				$output .= '<option value="'.$page->ID.'">'. $indented . $page->post_title.'</option>';
		 	}
		}
		return $output;
	}
	*/
	function simple_sidenav_pages($args = '') {
      $defaults = array(
          'depth' => 0, 'child_of' => 0,
          'selected' => 0, 'echo' => 1,
          'name' => 'page_id', 'show_option_none' => '', 'show_option_no_change' => '',
          'option_none_value' => ''
      );
  
      $r = wp_parse_args( $args, $defaults );
      extract( $r, EXTR_SKIP );
  
      $pages = get_pages($r);
      if (get_option('blog_post_links')) {
	  	$posts = get_posts('numberposts=-1');
		$pages = array_merge($pages, $posts);
	  }
	  $output = '';
  
      if ( ! empty($pages) ) {
          if ( $show_option_no_change )
              $output .= "\t<option value=\"-1\">$show_option_no_change</option>";
          if ( $show_option_none )
              $output .= "\t<option value=\"$option_none_value\">$show_option_none</option>\n";
          $output .= walk_page_dropdown_tree($pages, $depth, $r);
      }
  
      $output = apply_filters('wp_dropdown_pages', $output);
  
      if ( $echo )
          echo $output;
  
      return $output;
  }

	
	function simple_sidenav_current_page($arg) {
		if ( is_numeric($arg) ){
			$url = get_permalink($arg);
			$id = ' page-item-'.$arg;
		}else{
			if(strstr($arg, get_bloginfo('url'))){
				$url = $arg;
			}elseif($arg == '/' || $arg == get_bloginfo('url') . '/'){
				$url = get_bloginfo('url');
			}else{
				$url = get_bloginfo('url') . $arg;
			}
		}
		
		$class = '';
		global $wp_query;
		if ( is_page() || $wp_query->is_posts_page ){
			$current_page = $wp_query->get_queried_object_id();
		}
		if ( get_permalink($current_page) == $url ) {
			$class = 'page_item current_page_item';
		}elseif($id){
			$class = 'page_item'.$id;
		}
		return $class;
	}
	
	function _next_link_id($options){
		$lid = 0;
		$items = _decode_options($options);
		if(is_array($items)){
			foreach($items as $item){
				$link_ids[] = $item['linkid'];

			}
			if(is_array($link_ids)){
				rsort($link_ids);
			}
			if($link_ids[0] > 0){
				$lid = $link_ids[0];
			}
		}
		return $lid+1;
	}
	
	function _decode_options($options){
		
		//$str = str_replace('}";', '}', stripslashes($options)); 
		//$str = str_replace(':"a', ':a', $str);
		$str = stripslashes($options);
		//$str = stripslashes($options);
		$str = str_replace(chr(194).chr(160),' ',$str);
		$items = unserialize($str);
		//print_r($items);
		return $items;		
	}
	
	function _indented($link_array){
		if(is_array($link_array)){
			$indent = "";
			for($i=1; $i<=$link_array['depth']; $i++){
				$indent .= "&nbsp;&nbsp;&nbsp;";
			}
			return $indent;
		}
	}
	
	function simple_sidenav_parse_options($options, $output_type){
		//Check if data was saved old way with pipe characters
		//print_r($options);
		if(!strstr($options, '|||')){
			$items = _decode_options($options);
			$pages = get_pages();
			if (get_option('blog_post_links')) {
	  			$posts = get_posts('numberposts=-1');
				$pages = array_merge($pages, $posts);
	  		}
			if($pages){
				foreach($pages as $page){
					$titles[$page->ID] = $page->post_title;
					$parent[$page->ID] = $page->post_parent;
				}
			}
			$link = $items;			
			if(is_array($link)){
			for ($i=0; $i<count($link); $i++ ) {	
				//$li_class_current_page = ' class="' . simple_sidenav_current_page($link[$i]['title']) . '"';
					$a_class_depth = ' class="depth_' . $link[$i]['depth'] . '"';
					if(array_key_exists('page', $link[$i])){
						$uri = get_permalink($link[$i]['page']);
						$title = $titles[$link[$i]['page']]; //pulling up page title by page ID
						$li_class_current_page = ' class="' . simple_sidenav_current_page($link[$i]['page']) . '"';
					}elseif(array_key_exists('custom', $link[$i])){
						if(get_option('target_attr')){
						  $target = ' target="' . $link[$i]['target'] . '"';
						}
						$uri = $link[$i]['custom'];
						$title = base64_decode($link[$i]['title']);
						$li_class_current_page = ' class="' . simple_sidenav_current_page($link[$i]['custom']) . '"';
					}
					
				if( $output_type == 'list' ){											
					$output .= "\t\t<li" . $li_class_current_page . "><a" . $a_class_depth . ' href="' . $uri . '"' . $target .'><span>' . $title . "</span></a>";
					if($link[$i+1]['depth'] > $link[$i]['depth']){
						$diff1 = $link[$i+1]['depth'] - $link[$i]['depth'];
						for($x=0; $x<$diff1; $x++){
							$output .= "\n<ul>\n";
						}
					}elseif($link[$i]['depth'] > $link[$i+1]['depth']){
						$diff2 = $link[$i]['depth'] - $link[$i+1]['depth'];
						for($x=0; $x<$diff2; $x++){
							$output .= "</li>\n</ul>\n";
						}
							$output .= "\n\r</li>\n";
					}elseif( count($link) == 1 || ($link[$i]['depth'] == $link[$i-1]['depth'] && !$link[$i+1]['depth']) || $link[$i]['depth'] == $link[$i+1]['depth']){
						$output .= "</li>\n";
					}

				}elseif( $output_type == 'options' ){
					if( array_key_exists('page', $link[$i])){
						//if($parent[$link[$i]['page']] > 0){ $indented = " &mdash; "; }else{ $indented = ''; }
						$output .= "<option value='" . serialize($link[$i]) . "'>" . _indented($link[$i]) . $title . "</option>\n";
					}elseif( array_key_exists('custom', $link[$i]) ) {
						$output .= "<option value='" . serialize($link[$i]) . "'>" . _indented($link[$i]) . $title . " -  " . $link[$i]['custom'] . "</option>\n";
					}
				}
			}
		  }
		}else{
		
			$items = explode('|||', $options);
			$pages = get_pages();
			if (get_option('blog_post_links')) {
			  	$posts = get_posts('numberposts=-1');
				$pages = array_merge($pages, $posts);
	  		}
			if($pages){
		  foreach($pages as $page){
			$titles[$page->ID] = $page->post_title;
			$parent[$page->ID] = $page->post_parent;
				}
			}
			$n = count($items);
			$x = 0;
			foreach ( $items as $item ) {
				$x++;
				$link = explode('||', $item);
				if( $output_type == 'list' ){
					if( $link[0] == 'page' ){					
						$output .= "<li class='".simple_sidenav_current_page($link[1])."'><a href='" . get_page_link($link[1]) . "'><span>" . $titles[$link[1]] . "</span></a></li>\n";
					}elseif( $link[0] == 'custom' ) {
						$output .= "<li class='".simple_sidenav_current_page($link[2])."'><a href='" . $link[2] . "'><span>" . $link[1] . "</span></a></li>\n";
					}
				}elseif( $output_type == 'options' ){
					if( $link[0] == 'page' ){
					
						$new_link = array();
						$new_link['page'] = $link[1];
						$new_link['title'] = $titles[$link[1]];
						$new_link['linkid'] = $x;
						$new_link['depth'] = 0;
					
						//if ($parent[$link[1]] != 0) {$child = " &mdash; ";}else{ $child = ""; }
						$output .= "<option value='" . serialize($new_link) . "'>" . $titles[$link[1]] . "</option>\n";
					}elseif( $link[0] == 'custom' ) {
						$new_link = array();
						$new_link['custom'] = $link[2];
						$new_link['title'] = $link[1];
						$new_link['linkid'] = $x;
						$new_link['depth'] = 0;
						
						$output .= "<option value='" . serialize($new_link) . "'>" . $link[1] . " -  " . $link[2] . "</option>\n";
					}
				}
			}	
		}
			
		if( $output_type == 'list' ){
			$output = "\n\r" . "\t<ul class='sf'>\n" . $output . "\t</ul>\n";
		}
		
		return $output;
	}
	
	function simple_sidenav_control($number) {
		$options = $newoptions = get_option('simple_sidenav');
		if ( $_POST["simple_sidenav_submit_$number"] ) {
			$newoptions[$number]['title'] = strip_tags(stripslashes($_POST["simple_sidenav_title_$number"]));
			$newoptions[$number]['navlinks'] = $_POST["simple_sidenav_tmp_$number"];
			$newoptions[$number]['action'] = $_POST["simple_sidenav_action_$number"];
			$newoptions[$number]['show'] = $_POST["simple_sidenav_show_$number"];
			$newoptions[$number]['slug'] = strip_tags(stripslashes($_POST["simple_sidenav_slug_$number"]));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			//$options[$number]['navlinks'] = $options[$number]['navlinks'];
			update_option('simple_sidenav', $options);
		}
		$title = htmlspecialchars($options[$number]['title'], ENT_QUOTES);

		$allSelected = $homeSelected = $postSelected = $postInCategorySelected = $pageSelected = $categorySelected = $blogSelected = false;
		switch ($newoptions[$number]['action']) {
			case "1":
			$showSelected = true;
			break;
			case "0":
			$dontshowSelected = true;
			break;
		}
		switch ($options[$number]['show']) {
			case "all":
			$allSelected = true;
			break;
			case "":
			$allSelected = true;
			break;
			case "home":
			$homeSelected = true;
			break;
			case "post":
			$postSelected = true;
			break;
			case "post_in_category":
			$postInCategorySelected = true;
			break;
			case "page":
			$pageSelected = true;
			break;
			case "category":
			$categorySelected = true;
			break;
			case "blog": 
			$blogSelected = true;
			break;
		}
	?>
				<label for="simple_sidenav_title_<?php echo "$number"; ?>" title="Title above the widget" style="line-height:35px;display:block;">Title:<input style="width: 540px;" id="simple_sidenav_title_<?php echo "$number"; ?>" name="simple_sidenav_title_<?php echo "$number"; ?>" type="text" value="<?php echo $title; ?>" /></label> 
<p id="p_id_<?php echo "$number"; ?>" style="width: 575px; background: #ececec;"></p>				
				<div style="display:block; width: 575px;">
				<label for="simple_sidenav_pages_<?php echo "$number"; ?>" title="Existing Pages" style="display:block; float: left; width: 285px;">Existing Pages<br /><?php //echo str_replace('<select', '<select style="height: 200px; width: 250px;" size="10"', wp_dropdown_pages('echo=0&name=simple_sidenav_page_id_'.$number)); ?>
				<select style="height: 200px; width: 285px;" size="10" id="simple_sidenav_page_id_<?php echo "$number"; ?>"><?php simple_sidenav_pages($echo = 1); ?></select></label>
				<label for="simple_sidenav_navlinks_<?php echo "$number"; ?>" style="display:block; float: right; width: 285px;">Sidebar Navigation Links <a href="javascript:;" id="simple_sidenav_delete_all_<?php echo "$number"; ?>" style="margin-left: 50px;">Delete All links</a><br /><select name="simple_sidenav_navlinks_<?php echo "$number"; ?>[]" size="10" id="simple_sidenav_navlinks_<?php echo "$number"; ?>" style="height: 200px; width: 285px;">
				<?php echo simple_sidenav_parse_options($options[$number]['navlinks'], 'options');
						?>
				</select></label>
<!--hidden values-->
<?php 
//$_type = 'text';
$_type = 'hidden';
?>
				<input style="width: 575px;" id="simple_sidenav_tmp_<?php echo "$number"; ?>" name="simple_sidenav_tmp_<?php echo "$number"; ?>" type="<?php echo $_type;?>" value='<?php echo stripslashes($options[$number]['navlinks']); ?>' />
				<input id="simple_sidenav_nextlinkid_<?php echo "$number"; ?>" name="simple_sidenav_nextlinkid_<?php echo "$number"; ?>" type="<?php echo $_type;?>" value="<?php echo _next_link_id($options[$number]['navlinks']);?>" />
<!--hidden values-->
				<div style="clear: both;"></div>
				<div style="text-align: center;">
				<input class="button" name="simple_sidenav_add_page_<?php echo "$number"; ?>" type="button" id="simple_sidenav_add_page_<?php echo "$number"; ?>" value="Add Page" />
				<input class="button" name="simple_sidenav_add_child_page_<?php echo "$number"; ?>" type="button" id="simple_sidenav_add_child_page_<?php echo "$number"; ?>" value="Add Child Page" />
				<input class="button" name="simple_sidenav_remove_<?php echo "$number"; ?>" type="button" id="simple_sidenav_remove_<?php echo "$number"; ?>" value="Remove from Sidenav" />
				<input class="button" name="simple_sidenav_move_up_<?php echo "$number"; ?>" type="button" id="simple_sidenav_move_up_<?php echo "$number"; ?>" value="Move Up" />
				<input class="button" name="simple_sidenav_move_down_<?php echo "$number"; ?>" type="button" id="simple_sidenav_move_down_<?php echo "$number"; ?>" value="Move Down" />
				</div>
				<label>Here you can add custom links to your sidebar navigation:</label>
				<div>
				<label class="simple_sidenav_linktitle">Custom Link Title:</label> <input name="simple_sidenav_linktitle_<?php echo "$number"; ?>" type="text" id="simple_sidenav_linktitle_<?php echo "$number"; ?>" class="linktitle" size="61"><br />
				<label class="simple_sidenav_linkurl">Custom Link URL:</label> <input name="simple_sidenav_linkurl_<?php echo "$number"; ?>" type="text" id="simple_sidenav_linkurl_<?php echo "$number"; ?>" class="linkurl" value="http://" size="41">
				<?php
				if(get_option('target_attr')){
				?>
				<label class="simple_sidenav_linktarget">Link Target:</label> <select name="simple_sidenav_linktarget_<?php echo "$number"; ?>" id="simple_sidenav_linktarget_<?php echo "$number"; ?>">
    <option value="_self" selected="selected">self</option>
	<option value="_blank">blank</option>
	<option value="_parent">parent</option>
    <option value="_top">top</option>
  </select>
  				<?php
				}
				?>
				<div style="text-align: center;">
				<input class="button" name="simple_sidenav_add_custom_<?php echo "$number"; ?>" type="button" id="simple_sidenav_add_custom_<?php echo "$number"; ?>" value="Add Custom Link">
				<input class="button" name="simple_sidenav_add_child_custom_<?php echo "$number"; ?>" type="button" id="simple_sidenav_add_child_custom_<?php echo "$number"; ?>" value="Add Custom Child Link">
				</div>
				</div>
				</div>
				<label>On which pages to display sidebar navigation:</label><br />
				<label for="simple_sidenav_show_<?php echo "$number"; ?>"  title="Show only on specified page(s)/post(s)/category. Default is All" style="line-height:35px;"></label><select name="simple_sidenav_action_<?php echo"$number"; ?>" id="simple_sidenav_action_<?php echo"$number"; ?>"><option value="1" <?php if ($showSelected){echo "selected";} ?>>Show</option><option value="0" <?php if ($dontshowSelected){echo "selected";} ?>>Do NOT show</option></select> only on: <select name="simple_sidenav_show_<?php echo "$number"; ?>" id="simple_sidenav_show_<?php echo "$number"; ?>"><option label="All" value="all" <?php if ($allSelected){echo "selected";} ?>>All</option><option label="Home" value="home" <?php if ($homeSelected){echo "selected";} ?>>Home</option><option label="Post" value="post" <?php if ($postSelected){echo "selected";} ?>>Post(s)</option><option label="Post in Category ID(s)" value="post_in_category" <?php if ($postInCategorySelected){echo "selected";} ?>>Post In Category ID(s)</option><option label="Page" value="page" <?php if ($pageSelected){echo "selected";} ?>>Page(s)</option><option label="Category" value="category" <?php if ($categorySelected){echo "selected";} ?>>Category</option><option label="Blog" value="blog" <?php if ($blogSelected){echo "selected";} ?>>Blog/Single Posts/Archives</option></select> 
				<label for="simple_sidenav_slug_<?php echo "$number"; ?>"  title="Optional limitation to specific page, post or category. Use ID, slug or title." style="line-height:35px;">Slug/Title/ID: <input type="text" style="width: 130px;" id="simple_sidenav_slug_<?php echo "$number"; ?>" name="simple_sidenav_slug_<?php echo "$number"; ?>" value="<?php echo htmlspecialchars($options[$number]['slug']); ?>" /></label><br /><small>Multiple page IDs, slugs and category IDs separate by commas with no spaces ie.: 213,26,71.</small>
				<?php if ($postInCategorySelected) echo "<p>In <strong>Post In Category</strong> add one or more cat. IDs (not Slug or Title) comma separated!</p>" ?>
				<input type="hidden" id="simple_sidenav_submit_<?php echo "$number"; ?>" name="simple_sidenav_submit_<?php echo "$number"; ?>" value="1" />
	<?php
	}
	
	function simple_sidenav($args, $number = 1) {
		extract($args);
		$options = get_option('simple_sidenav');
		$title = $options[$number]['title'];
		$navlinks = simple_sidenav_parse_options($options[$number]['navlinks'], 'list');		
		$action  = $options[$number]['action'];
		$show = $options[$number]['show'];
		$slug = $options[$number]['slug'];
		?>
		<?php 
 
 /* Do the conditional tag checks. */
		if($action == "1"){
			switch ($show) {
				case "all": 
					echo $before_widget;
					echo "<div class='SimpleSideNav'>"; 
					$title ? print($before_title . $title . $after_title) : null;
					eval('?>'.$navlinks);
					echo "</div>"; 
					echo $after_widget."
					";			
					break;
				case "home":
					if (is_front_page()) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "post":
					$PoID = explode(",",$slug);
					$inPost = false;
					foreach($PoID as $PostID) {
						if (is_single($PostID)) {
							$inPost = true;
						}
					}
					if ($inPost) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
	
	
	
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "post_in_category":
					$PiC = explode(",",$slug);
					$InCategory = false;
					foreach($PiC as $CategoryID) {
						if(is_single() && in_category($CategoryID)){
							$InCategory = true;
						}
						elseif (is_category($CategoryID)) {
							$InCategory = true;
						}
					}
					if ($InCategory) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "page":
					$PiD = explode(",",$slug);
					$onPage = false;
					foreach($PiD as $PageID) {
						if (is_page($PageID)) {
							$onPage = true;
						}
					}
					if ($onPage) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "category":
					if (is_category($slug)) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "blog":
					if (is_home($slug) || is_single() || is_archive()) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
				break;
	
			}
		}else{
			switch ($show) {
				case "all": 			
					break;
				case "home":
					if (!is_front_page()) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "post":
					$PoID = explode(",",$slug);
					$inPost = false;
					foreach($PoID as $PostID) {
						if (!is_single($PostID)) {
							$inPost = true;
						}
					}
					if (!$inPost) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
	
	
	
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "post_in_category":
					$PiC = explode(",",$slug);
					$InCategory = false;
					foreach($PiC as $CategoryID) {
						if(!is_single() && !in_category($CategoryID)){
							$InCategory = true;
						}
						elseif (!is_category($CategoryID)) {
							$InCategory = true;
						}
					}
					if (!$InCategory) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "page":
					$PiD = explode(",",$slug);
					$onPage = false;
					foreach($PiD as $PageID) {
						if (!is_page($PageID)) {
							$onPage = true;
						}
					}
					if (!$onPage) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "category":
					if (!is_category($slug)) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
					break;
				case "blog":
					if (!is_home($slug) && !is_single() && !is_archive()) {
						echo $before_widget;
						echo "<div class='SimpleSideNav'>"; 
						$title ? print($before_title . $title . $after_title) : null;
						eval('?>'.$navlinks);
						echo "</div>"; 
						echo $after_widget."
						";				}
					else {
						echo "<!-- Simple Sidebar Navigation Widget ".$number." is disabled for this page/post! -->";
					}
				break;
	
			}
		}
		?>
	<?php
	}
	
	function simple_sidenav_setup() {
		$options = $newoptions = get_option('simple_sidenav');
		if ( isset($_POST['simple_sidenav_number-submit']) ) {
			$number = (int) $_POST['simple_sidenav_number'];
			/*if ( $number > 9 ) $number = 9;*/
			if ( $number < 1 ) $number = 1;
			$newoptions['number'] = $number;
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('simple_sidenav', $options);
			simple_sidenav_register($options['number']);
		}
	}
	
	function simple_sidenav_page() {
		$options = $newoptions = get_option('simple_sidenav');
	?>
		<div class="wrap">
			<form method="POST">
				<h2>Simple Sidebar Navigation Widgets</h2>
				<p style="line-height: 30px;"><?php _e('How many Simple Sidebar Navigation Widgets would you like?'); ?>
				<select id="simple_sidenav_number" name="simple_sidenav_number" value="<?php echo $options['number']; ?>">
	<?php for ( $i = 1; $i < $options['number']+10; ++$i ) echo "<option value='$i' ".($options['number']==$i ? "selected='selected'" : '').">$i</option>"; ?>
				</select>
				<span class="submit"><input type="submit" name="simple_sidenav_number-submit" id="simple_sidenav_number-submit" value="<?php _e('Save'); ?>" /></span></p>
			</form>
		</div>
	<?php
	}
	
	function simple_sidenav_register() {
		$options = get_option('simple_sidenav');
		$number = $options['number'];		
		if ( $number < 1 ) $number = 1;
		/*if ( $number > 9 ) $number = 9;*/
		for ($i = 1; $i <= $number; $i++) {
			$name = array('Simple Sidebar Navigation %s', null, $i);
			register_sidebar_widget($name, $i <= $number ? 'simple_sidenav' : /* unregister */ '', $i);
			register_widget_control($name, $i <= $number ? 'simple_sidenav_control' : /* unregister */ '', 580, 450, $i);
		}
		add_action('sidebar_admin_setup', 'simple_sidenav_setup');
		add_action('sidebar_admin_page', 'simple_sidenav_page');
	}
	// Delay plugin execution to ensure Dynamic Sidebar has a chance to load first
	simple_sidenav_register();
}

// Fixes the encoding to uf8 
function fixEncoding($in_str) 
{ 
  $cur_encoding = mb_detect_encoding($in_str) ; 
  if($cur_encoding == "UTF-8" && mb_check_encoding($in_str,"UTF-8")) 
    return $in_str; 
  else 
    return utf8_encode($in_str); 
} // fixEncoding 

function _plugin_folder(){
  $x = plugin_basename(__FILE__);
  $folder = str_replace('/simple-sidenav.php', '', $x);
  return $folder;
}
function simple_sidenav_livequery() {
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/'. _plugin_folder() .'/livequery_1.0.2/jquery.livequery.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/'. _plugin_folder() .'/php.default.js"></script>';
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/'. _plugin_folder() .'/simple-sidenav.js"></script>';
}

function simple_sidenav_head_default() {
	echo '<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/'. _plugin_folder() .'/suckerfish.css" type="text/css" media="screen, projection" />';
}
function simple_sidenav_head_custom() {
	$custom_css = get_option('custom_css');
	echo '<script type="text/javascript" src="'.get_bloginfo('wpurl').'/wp-content/plugins/'. _plugin_folder() .'/suckerfish_ie.js"></script>';
	echo '<link rel="stylesheet" href="'.$custom_css.'" type="text/css" media="screen, projection" />';
}
add_action('admin_head', 'simple_sidenav_livequery');

if (get_option('dropdown_css')){
	add_action('wp_head', 'simple_sidenav_head_default'); //Suckerfish support
}elseif(get_option('custom_css')){
	add_action('wp_head', 'simple_sidenav_head_custom'); 
}

// Tell Dynamic Sidebar about our new widget and its control
add_action('plugins_loaded', 'simple_sidenav_init');

//Adding new sidebar for the Top Navigation
function _top_nav_widget(){
	register_sidebar(
		$args = array(
			'name' => 'Simple Top Nav',
			'before_widget' => '<div id="suckerfishnav">',
			'after_widget' => "</div>\n",
			'before_title' => '<span style="display:none;">',
			'after_title' => '</span>',
		)
	);
}

add_action('init', '_top_nav_widget', 12);
?>