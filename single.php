 <?php
 get_header();
 gt_set_post_view();
?>
 <section class="wrapper single_post" id="singlePost">
   <div class="container">
     <div class="row-divide my-40">
       <div class="col-divide-9 col-divide-sm-12 mg-r-50 col-divide-md-12">
         <div class="post__contain">
          <?php
       if ( have_posts() ) {
         // Load posts loop.
         while ( have_posts() ) {
           the_post();?>
          <div class="post__item">
           <div class="thumbnail max--height--400"><?php the_post_thumbnail('large') ?></div>
           <div class="pad_single">
            <?php get_template_part('sections/breadcums'); ?>
            <div class="social--share">
              <div class="shareon d--flex">
                  <a class="facebook d--block mxr-5"><svg viewBox="0 0 64 64" width="32" height="32"><circle cx="32" cy="32" r="31" fill="#3b5998"></circle><path d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z" fill="white"></path></svg></a>
                  <a class="pinterest d--block mxr-5"><svg viewBox="0 0 64 64" width="32" height="32"><circle cx="32" cy="32" r="31" fill="#cb2128"></circle><path d="M32,16c-8.8,0-16,7.2-16,16c0,6.6,3.9,12.2,9.6,14.7c0-1.1,0-2.5,0.3-3.7 c0.3-1.3,2.1-8.7,2.1-8.7s-0.5-1-0.5-2.5c0-2.4,1.4-4.1,3.1-4.1c1.5,0,2.2,1.1,2.2,2.4c0,1.5-0.9,3.7-1.4,5.7 c-0.4,1.7,0.9,3.1,2.5,3.1c3,0,5.1-3.9,5.1-8.5c0-3.5-2.4-6.1-6.7-6.1c-4.9,0-7.9,3.6-7.9,7.7c0,1.4,0.4,2.4,1.1,3.1 c0.3,0.3,0.3,0.5,0.2,0.9c-0.1,0.3-0.3,1-0.3,1.3c-0.1,0.4-0.4,0.6-0.8,0.4c-2.2-0.9-3.3-3.4-3.3-6.1c0-4.5,3.8-10,11.4-10 c6.1,0,10.1,4.4,10.1,9.2c0,6.3-3.5,11-8.6,11c-1.7,0-3.4-0.9-3.9-2c0,0-0.9,3.7-1.1,4.4c-0.3,1.2-1,2.5-1.6,3.4 c1.4,0.4,3,0.7,4.5,0.7c8.8,0,16-7.2,16-16C48,23.2,40.8,16,32,16z" fill="white"></path></svg></a>
                  <a class="telegram d--block mxr-5"><i style="font-size: 31px;line-height: 22px;"class="fab fa-telegram"></i></a>
                  <a class="twitter d--block mxr-5">
                    <svg viewBox="0 0 64 64" width="32" height="32"><circle cx="32" cy="32" r="31" fill="#00aced"></circle><path d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z" fill="white"></path></svg>
                  </i></a>
              </div>
            </div>
            <div class="date myt-5"><i class="far fa-calendar-alt mxr-5"></i><?php the_date() ?></div>
            <div class="social_top-single">
                <div class="share_social_single">
                </div>
                <div class="posy"></div>
            </div>
              <h1 class="single_title"><?php the_title(); ?></h1>
            <div class="post__item-content">
              <?php the_content(); ?>
            </div>
           </div>
         </div>
       <?php }	}	?>
        </div>
       </div>
       <div class="col-divide-3 col-divide-sm-12 col-divide-md-12">
         <?php //get_template_part('sections/sidebar') ?>
         <div class="single_sidebar">
            <div class="follow-us">
              <h3 class="title-follow-us title-all-sidebar">THEO DÕI CHÚNG TÔI</h3>
              <div class="sidebar__social-list">
                <a href="https://www.facebook.com/Wolfactiveweb.design.SEO/" target="_blank" rel="noreferrer" class="social--icon social--facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.instagram.com/designbyngan/channel/" target="_blank" rel="noreferrer" class="social--icon social--instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.behance.net/kieungan16c6e9" rel="noreferrer" target="_blank" class="social--icon social--behance">
                  <i class="fab fa-behance-square"></i>
                </a>
                <a href="https://www.pinterest.com/kieungan16109/" rel="noreferrer" target="_blank" class="social--icon social--pinterest">
                  <i class="fab fa-pinterest-square"></i>
                </a>
                <a href="https://github.com/Wolfactive" rel="noreferrer" target="_blank" class="social--icon social--github">
                  <i class="fab fa-github-square"></i>
                </a>
              </div>
            </div>
            <div class="contact_single">
              <h3 class="title-all-sidebar">THÔNG TIN LIÊN HỆ</h3>
              <div class="contact_single-content">
                <div class="sidebar__infomation-list">
                  <p class="mbt-5"><i class="fas fa-envelope icon text--primary"></i><strong>Email:</strong>  <?php echo get_theme_mod('company_email') ?></p>
                  <div class="mbt-5"><i class="fas fa-mobile icon text--primary"></i><strong>Hotline:</strong> <?php echo get_theme_mod('company_phone') ?></div>
                </div>
              </div>
            </div>
            <div class="single_news_new">
              <h3 class="title-all-sidebar">BÀI VIẾT MỚI NHẤT</h3>
              <?php
                $args = array(
                  'post_type' => 'theme_products',
                  'posts_per_page' => 6,
                  'orderby' => 'date'
                );
                $mc_Query = new WP_Query($args);
                if($mc_Query->have_posts()) :
                  while($mc_Query->have_posts() ) : $mc_Query->the_post();
              ?>
                <div class="one_post_new">
                  <div class="sidebar_thumbnail">
                  <a href=" <?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                  </div>
                  <div class="mc-date-sidebar">
                    <i class="far fa-calendar-alt"></i><?php echo get_the_date(); ?>
                  </div>
                  <h4 class="title_post_new"> <a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>
              <?php
                endwhile;
                endif;
                wp_reset_postdata();
              ?>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
<?php
 get_footer();
?>
