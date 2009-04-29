<?php get_header();?>

  <div class="content">
    <div class="page_title_work"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/title_work.gif"/></div>
    <div class="page_content">
 
 		<!-- tab -->
 		<?php include 'work_tab.php'; ?>
       <div class="page_meat">
      	<!-- loop articles start -->
	<?php $posts = query_posts($query_string.'&posts_per_page=5'); if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
        <div class="list_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/icon02.gif"/> <?php the_title(); ?></div>
        <div class="list_note">
          <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
        <!-- loop articles end -->
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>          
      </div>
    </div>
    <div class="page_bm"></div>
	<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
  

    
  </div>
  
<?php get_footer(); ?>