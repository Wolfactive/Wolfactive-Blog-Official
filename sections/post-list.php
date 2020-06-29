<div class="Post__item col-divide-4 col-divide-md-6 col-divide-sm-12 my-15">
  <a href="<?php the_permalink()?>" class="Post__item-img d--block">      
      <?php the_post_thumbnail( 'large', array( 'sizes' => '(max-width:425px) 220px, 500px' ) ); ?>
  </a>
  <div class="Post__item-content">
    <div class="date">
      <i class="far fa-calendar-alt"></i> <span><?php the_date() ?></span>
    </div>
    <h4 class="Post__item-title title--item">
      <?php the_title() ?>
    </h4>
    <a class="Post__item-btn btn text--dark" href="<?php the_permalink() ?>">
      Đọc Tiếp
    </a>
    </div>
</div>
