<?php
 get_header();
 get_template_part('sections/breadcum');
?>
 <section class="wrapper" id="pageDefault">
    <?php
		if ( have_posts() ) {
			// Load posts loop.
			while ( have_posts() ) {
				the_post();?>
			 <div class="container">				
				<div class="page__Content my-20">
				   <?php the_content(); ?>
				</div>
			</div>
				</div>
			</div>
			<?php }
		}?>
 </section>
<?php
 get_footer();
?>
