<?php if(wp_is_mobile()): ?>
<section class="sidebar--mobile"> 
    <div class="sidebar--mobile__close text--right">
    <i class="fas fa-times icon text--light"></i>
    </div>
    <div class="sidebar--mobile__list">
        <div class="sidebar--mobile__contain container">
            <div class="sidebar__search">
                    <form class="form form__search" action="<?php bloginfo('url') ?>" method="get" name="form-search">
                        <div class="form__item">
                            <input type="text" aria-label="form-search-sidebar-home" name="s" value="" placeholder="Tìm kiếm">
                            <input type="hidden" value="1" name="sentence" />
                            <input type="hidden" value="theme_products" name="post_type" />
                        </div>
                        <div class="form__item">
                            <button class="btn" type="submit" name="searchSidebarMobileSubmit" aria-label="searchSidebarMobileSubmit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
            </div>
            <div class="sidebar__menu">           
                <?php
                    wp_nav_menu(array(
                    'theme_location' => 'mobile_nav' ));
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>