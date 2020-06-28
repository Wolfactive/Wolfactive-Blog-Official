<section class="postcontrol">
  <div class="postcontrol__item">
    <div class="postcontrol__setting">
      <?php if(!wp_is_mobile()):?>
      <div class="postcontrol__setting-toggle">
        <button class="btn" type="button" aria-label="search-button" name="searchBtn" onclick="showSearchFormPcHome()">Tìm kiếm</button>
      </div>
      <?php endif;?>
      <div class="postcontrol__setting-item">
        <button class="btn" type="button" aria-label="display" name="displayGrid"><i class="fas fa-th"></i></button>
        <button class="btn" type="button" aria-label="display" name="displayList"><i class="fas fa-list"></i></button>
      </div>
    </div>
  </div>
  <div class="postcontrol__item"></div>
</section>
