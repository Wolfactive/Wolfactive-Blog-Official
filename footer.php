    </main>
    <footer class="footer">
	    <!----------=========Main==========-------->
      <div class="big_footer">
        <div class="row-divide">
          <div class="col-divide-3 logo_and_mt mg-r-30 col-divide-sm-12 col-divide-md-6">
            <div class="footer_logo">
              <img src="<?php echo get_field('logo_footer','option'); ?>" alt="logo-footer">
            </div>
            <div class="descr_short">
              <?php echo get_field('descr_short_bottom_logo','option'); ?>
            </div>
          </div>
          <div class="col-divide-3 footer_contact_us pd-t-50 mg-r-30 col-divide-sm-12 col-divide-md-6">
            <h4>Liên Hệ</h4>
            <?php while(have_rows('contact_us','option')) : the_row() ?>
            <div class="footer_address">
              <p class="title_dc">Địa chỉ</p>
              <p class="dcf_content"><?php echo get_sub_field('address_footer','option'); ?></p>
            </div>
            <div class="tel_number_footer">
              <p class="title_tel_footer">Hotline</p>
              <a class="telf_content" href="tel:<?php echo get_sub_field('telephone_number','option'); ?>"><?php echo get_sub_field('telephone_number','option'); ?></a>
            </div>
            <div class="email_footer">
              <p class="title_email_footer">E-mail</p>
              <p class="emf_content"><?php echo get_sub_field('email_footer','option'); ?></p>
            </div>
            <?php endwhile; ?>
          </div>
          <div class="col-divide-3 footer_cat pd-t-50 mg-r-30 col-divide-sm-12 col-divide-md-6">
            <h4>Chuyên Mục</h4>
            <?php
              wp_nav_menu(array(
              'theme_location' => 'footer_cat_menu' ));
            ?>
          </div>
          <div class="col-divide-3 subcribe_footer pd-t-50 mg-r-30 col-divide-sm-12 col-divide-md-6">
            <h4>Đăng kí nhận tin</h4>
            <p class="mt_follow">
              <?php echo get_field('register_email','option'); ?>
            </p>
            <div class="subscribe-email">
                <input type="text" name="emailFooter" value="" placeholder="E-mail" />
            </div>
            <div class="submit_email">
                <input type="submit" name="" id="submitEmailFooter" />
            </div>
            <div class="footer_social">
              <h3 class="title--sidebar">Theo dõi chúng tôi</h3>
              <div class="footer_social-list">
                <a href="https://www.facebook.com/Wolfactiveweb.design.SEO/" target="_blank" rel="noreferrer" class="mc-social social-facebook"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.instagram.com/designbyngan/channel/" target="_blank" rel="noreferrer" class="mc-social social-instagram">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.behance.net/kieungan16c6e9" rel="noreferrer" target="_blank" class="mc-social social-behance">
                  <i class="fab fa-behance-square"></i>
                </a>
                <a href="https://www.pinterest.com/kieungan16109/" rel="noreferrer" target="_blank" class="mc-social social-pinterest">
                  <i class="fab fa-pinterest-square"></i>
                </a>
                <a href="https://github.com/Wolfactive" rel="noreferrer" target="_blank" class="mc-social social-github">
                  <i class="fab fa-github-square"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
	    <!----------=========Main==========-------->

		<!----------=========Sub==========-------->
	  <div class="footer__sub">
	    <div class="container"><p class="text--center">
        <?php if(!wp_is_mobile()): ?>
          © 2020, Built with Wolfactive Framework. All Right Reserved Wolfactive
        <?php else: ?>
          © 2020, Built with Wolfactive Framework.<br/> All Right Reserved Wolfactive
        <?php endif;?>
      </p></div>
	  </div>
	    <!----------=========Sub==========-------->
 </footer> 
 <?php get_template_part('sections/navgator');?>
 <?php wp_footer(); ?>
 </body>
</html>
