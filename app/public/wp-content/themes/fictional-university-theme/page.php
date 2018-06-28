<?php
get_header();
while(have_posts()) {
	the_post();
	pageBanner(); ?>


	<div class="container container--narrow page-section">

		<?php
		$parentId = wp_get_post_parent_id(get_the_ID());
		if ($parentId != 0) { ?>
			<div class="metabox metabox--position-up metabox--with-home-link">
				<p><a class="metabox__blog-home-link" href="<?php echo get_permalink($parentId); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parentId) ;?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
			</div>
		<?php }
		?>

		<?php
		$childrenPageArray = get_pages(array('child_of' => get_the_ID()));
		if ($parentId != 0 || $childrenPageArray) { ?> <!-- //page is not parent and does not have any children -->
			<div class="page-links">
				<h2 class="page-links__title"><a href="<?php echo get_permalink($parentId); ?>"><?php echo get_the_title($parentId); ?></a></h2>
				<ul class="min-list">
					<?php
						if ($parentId == 0) {
							$pageArray = array('title_li' => NULL,
												'child_of' => get_the_ID());
						}
						else {
							$pageArray = array('title_li' => NULL,
												'child_of' => $parentId);
						}
						wp_list_pages($pageArray);
					 ?>
				</ul>
			</div>
		<?php
		} 
		?>

		<div class="generic-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php }
get_footer();
?>


