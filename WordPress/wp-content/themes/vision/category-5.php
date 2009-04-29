<?php get_header();?>

  <div class="content">
    <div class="page_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/title_rock.gif"/></div>
    <div class="page_content">
      <div class="page_list">
	<?php $posts = query_posts($query_string.'&posts_per_page=10'); if (have_posts()) : ?>
        <ul>
		<?php while (have_posts()) : the_post(); ?>
        
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
        </ul>
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