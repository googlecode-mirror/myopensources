<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class='single-detail' id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			
			<div  class="postdata">
				<span class="author-icon small-icon">
				<?php echo __("Author"); ?> <?php the_author() ?> 
				<?php echo __("Date/Time"); ?> <?php the_time('Y/m/d H:i') ?> 
				</span>
			</div>
			
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<p>
				<?php edit_post_link(__('Edit post'), '<span class="edit-icon  small-icon">', '</span>'); ?>
				<?php the_tags('<span class="tag-icon  small-icon">', ',', '</span>'); ?>
			</p>
		</div>


	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
		


	</div>
  <!-- right sidebar -->
  <?php get_sidebar(); ?>

<?php get_footer(); ?>
