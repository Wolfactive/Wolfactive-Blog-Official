<section class="carousel">
  <div class="carousel__contain row-divide">
    <div class="carousel__item col-divide-8 col-divide-md-12 ">
      <div class="carousel__item-slider">
        <!-- get post -->
        <?php $getposts = new WP_query();
        $getposts->query('post_status=publish&showposts=5&post_type=theme_products&order=DESC&order_by=date'); ?>
        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
          <div class="carousel__item-new d--block splide__slide">
            <div class="carousel__item-new-img">
              <?php the_post_thumbnail( 'large', array( 'sizes' => '(max-width:1242px) 1242px, (max-width:425px) 220px, 1242px' ) ); ?>
            </div>
            <a href="<?php the_permalink() ?>" class="carousel__item-new-des d--block">
              <h3 class="title--item">
                <?php the_title() ?>
              </h3>
              <div class="date">
                <i class="far fa-calendar-alt mxr-5"></i><span><?php the_date()?></span>
              </div>
              <div class="carousel__item-new-btn text--right">
                <buttton class="btn">Đọc tiếp</buttton>
              </div>
            </a>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="carousel__big-btn"></div>
    </div>
    <div class="carousel__item col-divide-4 col-divide-md-12">
      <h1 class="title--section text--center">
        Bài viết nổi bật
      </h1>
      <div class="carousel__item-popular">
        <!-- get post -->
        <?php $getposts = new WP_query();
        $getposts->query('post_status=publish&showposts=10&post_type=theme_products&order=DESC&order_by=date&taxonomy=cat-theme&field=slug&terms=bai-viet-noi-bat'); ?>
        <?php global $wp_query; $wp_query->in_the_loop = true; ?>
        <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
          <div class="carousel__item-popular-item row-divide">
            <div class="carousel__item-new-img col-divide-3">
              <?php the_post_thumbnail('thumbnail') ?>
            </div>
            <a href="<?php the_permalink() ?>" class="carousel__item-new-des d--block col-divide-9">
              <h3 class="title--item">
                <?php the_title() ?>
              </h3>
              <div class="date">
                <i class="far fa-calendar-alt mxr-5"></i><span><?php the_date()?></span>
              </div>
              <div class="carousel__item-new-btn text--right">
                <buttton class="btn">Đọc tiếp</buttton>
              </div>
            </a>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>
