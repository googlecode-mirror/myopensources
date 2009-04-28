<?php get_header();?>

  <div class="content">
    <div class="page_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/title_news.gif"/></div>
    <div class="page_content">
      <div class="page_list">
	<?php if (have_posts()) : ?>
        <ul>
		<?php while (have_posts()) : the_post(); ?>
        
          <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
        </ul>
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>            
      </div>
    </div>
    <div class="page_bm"></div>
	<?php posts_nav_link(); ?>
    
	
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right"><span class="number"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image15','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_back_on.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_back_off.gif" name="Image15" width="110" height="50" border="0" id="Image15" /></a></span></td>
        <td width="230"><span class="num"> <span class="number_off"><a href="#">1</a></span> <span class="number_on"><a href="#">2</a></span> <span class="number_off"><a href="#">3</a></span> <span class="number_off"><a href="#">4</a></span> <span class="number_off"><a href="#">5</a></span> <span class="number_off"><a href="#">6</a></span> <span class="number_off"><a href="#">7</a></span> <span class="number_off"><a href="#">8</a></span> <span class="number_off"><a href="#">9</a></span> <span class="number_off"><a href="#">10</a></span> </span></td>
        <td><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image16','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_next_on.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_next_off.gif" name="Image16" width="110" height="50" border="0" id="Image16" /></a></td>
      </tr>
    </table>
  </div>
  
<?php get_footer(); ?>