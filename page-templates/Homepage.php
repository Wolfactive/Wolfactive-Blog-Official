 <?php
 /**
 * template name: Home Page
 */
 get_header();
 get_template_part('sections/carousel'); ?>
  <section class="contain">
    <div class="row-divide">
      <?php if(!wp_is_mobile()): ?>
      <div class="col-divide-4 col-divide-sm-12">
        <?php get_template_part('sections/sidebar') ?>
      </div>
    <?php endif;?>
      <div class="col-divide-8 col-divide-sm-12 col-divide-md-12 col-divide-lg-12">
        <?php get_template_part('sections/post-control'); ?>
        <div class="blog__list grid row-divide">
          <!-- get post -->
          <?php $getposts = new WP_query();
          $getposts->query('post_status=publish&showposts=9&post_type=theme_products&order=DESC&order_by=date'); ?>
          <?php global $wp_query; $wp_query->in_the_loop = true; ?>
          <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
          <?php  get_template_part('sections/post-list')?>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="blog__pagiantion text--center">
          <button class="btn" type="button" name="prevPage" aria-label="prev-page" aria-controls="blog__list">Prev</button>
          <button class="btn" type="button" name="nextPage" aria-label="next-page" aria-controls="blog__list">Next</button>
        </div>
      </div>
    </div>
  </section>
<?php  get_footer();?>
