<?php get_header();?>
<?php 
	$top_img = "news";
	if (in_category('4')) {
		$top_img = "home";
	}
	
?>
  <div class="content">
    <div class="page_title"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/title_<?php echo $top_img; ?>.gif"/></div>
    <div class="page_content">
     <div class="page_meat">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <div class="title_meat"><?php the_title(); ?></div>
        <div><?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?></div>
	<?php endwhile; else: ?>
		<p>Sorry, no posts matched your criteria.</p>
	<?php endif; ?>
      </div>
    </div>
    <div class="page_bm"></div>
    <div style="text-align:center;"><a href="news.html" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','<?php bloginfo('stylesheet_directory'); ?>/images/btn_back02_ov.gif',1)"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/btn_back02_off.gif" name="Image17" width="110" height="50" border="0" id="Image17" /></a></div>
  </div>


<?php get_footer(); ?>