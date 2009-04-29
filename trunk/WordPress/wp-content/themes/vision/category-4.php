<?php get_header();?>

  <div class="content">
    <div class="page_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/title_home.gif"/></div>
    <div class="page_content">
	<?php query_posts($query_string.'&posts_per_page=5'); if (have_posts()) :   ?>
      <div class="page_meat">
		<?php while (have_posts()) : the_post(); ?>
        <div class="list_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon.gif" width="17" height="21" /> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span><?php the_time('Y/m/d H:i') ?> </span> </div>
        <div class="list_note"><?php the_excerpt(); ?></div>
        <?php endwhile; ?>
        
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>            

      </div>
    </div>
    <div class="page_bm"></div>
    
	<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>

  
<?php get_footer(); ?>