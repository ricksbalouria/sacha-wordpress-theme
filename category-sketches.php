<?php get_header(); 

if ($orderby == 'title')
{ 
   $posts = query_posts($query_string . '&orderby=title&order=asc&posts_per_page=5');
}
else
{
   $posts = query_posts($query_string . '&orderby=date&order=desc&posts_per_page=5');
}
?>
<style type="text/css">ul.post_list li { margin-bottom: 10px; } </style>

<div class="grid_16 content">
<div id="cse" style="width:100%;"></div>
	<?php if(have_posts()): ?>
	
	<h2 class="archive_head">Entries Tagged as '<?php echo single_cat_title(); ?>'</h2>
      
  <div class="navigation">
    <div class="left">
      <?php next_posts_link('&laquo; Older posts'); ?>
    </div><div class="right">	
      <?php previous_posts_link('Newer posts &raquo;'); ?>
    </div>
  <div style="clear: both"></div>
  </div>

	<?php while(have_posts()):the_post(); ?>
<p style="margin-top: 20px; margin-bottom: 20px;">
		<strong><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></strong><br/>
<?php the_content(); ?>
<? if (function_exists('social_bookmark')) { social_bookmark(); } ?> 
				<span class="postmetadata">
<?php _e('Posted on'); ?> <span class="postdate"><?php the_time('F jS, Y') ?></span> 
<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?></span><br/> 
</p>
<script src="http://feeds.feedburner.com/~s/sachac?i=<?php the_permalink() ?>" type="text/javascript" charset="utf-8"></script>
		<hr size="1" />	

	<?php endwhile; ?>
</ul>
  <div class="navigation">
    <div class="left">
      <?php next_posts_link('&laquo; Older posts'); ?>
    </div><div class="right">	
      <?php previous_posts_link('Newer posts &raquo;'); ?>
    </div>
  <div style="clear: both"></div>
  </div>

	<?php else: ?>

		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><?php _e('Not Found'); ?></h2>

		</div>

	<?php endif; ?>

</div>

<?php get_footer() ?>
