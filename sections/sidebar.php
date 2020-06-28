<div class="sidebar">
  <div class="sidebar__contain">
    <div class="sidebar__search">
      <form class="form form__search" action="<?php bloginfo('url') ?>" method="get" name="form-search">
        <div class="form__item">
          <input type="text" aria-label="form-search-sidebar-home" name="s" value="" placeholder="Tìm kiếm">
          <input type="hidden" value="1" name="sentence" />
          <input type="hidden" value="theme_products" name="post_type" />
        </div>
      </form>
    </div>
    <div class="sidebar__menu">
      <h3 class="title--sidebar">Chuyên mục</h3>
      <?php
       wp_nav_menu(array(
      'theme_location' => 'side_nav' ));
      ?>
      <div class="sidebar__tag">
        <h3 class="title--sidebar">Từ khóa</h3>
        <div class="sidebar__tag-contain">
          <?php get_term_list('tag-key') ?>
        </div>
      </div>
    </div>
    <div class="sidebar__infomation">
      <h3 class="title--sidebar">Thông tin liên hệ</h3>
      <div class="sidebar__infomation-list">
        <p class="mbt-5"><i class="fas fa-envelope icon text--primary"></i><strong>Email:</strong> <?php echo get_theme_mod('company_email') ?></p>
        <div class="mbt-5"><i class="fas fa-mobile icon text--primary"></i><strong>Hotline:</strong> <?php echo get_theme_mod('company_phone') ?></div>
      </div>
    </div>
    <div class="sidebar__social">
      <h3 class="title--sidebar">Theo dõi chúng tôi</h3>
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
  </div>
</div>
