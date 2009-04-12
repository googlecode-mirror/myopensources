<?php get_header();?>

  <!-- contents -->
  <div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
					<div class="clear">&nbsp;</div>
			


	

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-comments">
					<?php comments_popup_link(__('0'), __('1'), __('%')); ?>
					<span><?php echo __("Comments"); ?></span>
				</div>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="postdata">
					<span class="author-icon small-icon">
					<?php echo __("Author"); ?> <?php the_author() ?> 
					<?php echo __("Date/Time"); ?> <?php the_time('Y/m/d H:i') ?> 
					</span>
				</div>

				
					<?php the_content('Read more... '); ?>
				<div id="single-meta">
					<span class="category-icon  small-icon">
					<?php the_category(', ') ?>
					</span>
					<?php edit_post_link(__('Edit post'), '<span class="edit-icon  small-icon">', '</span>'); ?>
					<?php the_tags('<span class="tag-icon  small-icon">', ',', '</span>'); ?>
				</div>

				
			</div>

		<?php endwhile; ?>
		<div id="nav-global" class="navigation">
		<div class="nav-previous">
		<?php 
			next_posts_link('&laquo; Previous entries');
			echo '&nbsp;';
			previous_posts_link('Next entries &raquo;');
		?>
		
		</div>
		</div>
		

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>  
  </div>
  
  <!-- right sidebar -->
  <?php get_sidebar(); ?>

<?php get_footer(); ?>
