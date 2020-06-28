<?php
 get_header();
?>
   <section class="wrapper post_archive" id="postArchive">
     <div class="container">
        <div class="big_title_arhive">
           <span>Chuyên mục : </span> <?php echo single_cat_title(); ?>
        </div>
        <div class="archive_containt row-divide">
            <?php
                while (have_posts()) : the_post(); ?>
                    <div class="archive col-divide-4 col-divide-md-6 col-divide-sm-12">
                        <div class="archive_image"> <a href="<?php the_permalink() ?>" class="archive_image-link"> <?php the_post_thumbnail('full') ?></a></div>
                        <div class="archive_content">
                            <div class="archive__date date"><i class="far fa-calendar-alt mxr-5"></i> <?php echo get_the_date('l j F , Y') ?> </div>
                            <h4 class="archive__title"><a class="archive_content__title-link" href=" <?php the_permalink() ?> "> <?php the_title() ?> </a></h4>
                            <div class="archive_read_more"> <a href="<?php the_permalink(); ?>">Đọc Tiếp</a> </div>
                        </div>
                    </div>
            <?php endwhile;  ?>
        </div>
        <div class="archive_pagination">
            <?php the_posts_pagination()  ?>
        </div>
     </div>
 </section>
<?php
 get_footer();
?>
