<?php get_header();?>

  <!-- contents -->
  <div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
					<div class="clear">&nbsp;</div>
			


	

			<div class="post" id="post-<?php the_ID(); ?>">
			<div class="post-comments">
						<?php comments_popup_link(__('0'), __('1'), __('%')); ?>
						</div>
				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<div class="postdata">
Posted by <?php the_author() ?> on <?php the_time('M j, Y') ?> in <?php the_category(', ') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?>
					</div>

				
					<?php the_content('Read more... '); ?>
				<p class="single-meta" style="float:right; margin-top:5px; margin-right:10px; font-size:11px; "> <?php the_tags(); ?></p>

				
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
  <div id="r-sidebar"><?php get_sidebar(); ?></div>

<?php get_footer(); ?>
