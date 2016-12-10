<?php if (wppa_page('albums')) { // if is albums list page ?>
		
	<?php $alt = ''; ?>

	<?php foreach (wppa_get_albums() as $ta) :  global $album; $album = $ta; ?>
				
		<div class="album <?php echo $alt; ?>">
			<a href="<?php wppa_album_url(); ?>" title="View The <?php wppa_the_album_name(); ?> Album"><img src="<?php wppa_image_url(); ?>" alt="View The <?php wppa_the_album_name(); ?> Album" class="image" /></a>
			<h2 class="name"><a href="<?php wppa_album_url(); ?>" title="View The <?php wppa_the_album_name(); ?> Album"><?php wppa_the_album_name(); ?></a></h2> 
			<p class="description"><?php wppa_the_album_desc(); ?></p>
			<div class="clear"></div>
			
		</div>
		
		<?php if ($alt == '') { $alt = 'alt'; } else { $alt = ''; } ?> 
		
	<?php endforeach; ?>

<?php } else if (wppa_page('thumbs')) { // if is showing thumbs for an album ?>

	<h2 class="album_title"><?php wppa_album_name(); ?></h2>
			
	<?php wppa_breadcrumb(); ?><br />
			
	<div class="thumbs">
			
		<?php foreach (wppa_get_thumbs() as $tt) :  global $thumb; $thumb = $tt; ?>
				<a href="<?php wppa_photo_page_url(); ?>" class="img"><img src="<?php wppa_thumb_url(); ?>" alt="*" /></a>
		<?php endforeach; ?>
				
	</div>

<?php } else if (wppa_page('single')) { // if is showing a specific photo ?>

			<?php wppa_breadcrumb(); ?><br />
			<div class="prevnext">
				<?php wppa_prev_next('<div class="prev">&laquo;<a href="%link%">Previous Photo</a></div>', '<div class="next"><a href="%link%">Next Photo</a>&raquo;</div>'); ?>
				<div class="clear"></div>
			</div>
			<a href="<?php wppa_photo_url(); ?>"><img src="<?php wppa_photo_url(); ?>" alt="<?php wppa_photo_name(); ?>" class="big" <?php echo wppa_get_fullsize(); ?> /></a><br />
			<h3 class="imagetitle"><?php wppa_photo_name(); ?></h3>
			<p class="imagedesc"><?php wppa_photo_desc(); ?></p>
<?php }  ?>