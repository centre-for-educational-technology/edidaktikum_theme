<div class="row">
    <div class="col-lg-12 text-center">
        <p class="process-text-01 video-brick"><i>Videoklots on esmane teejuht neile, kellel on huvi ja soovi katsetada. Iga videoklots sisaldab videot, mis tutvustab uuendust, toob näiteid selle kasutamisest Eesti koolis, annab eksperthinnangu selle mõjudele ning näpunäiteid / viiteid neile, kes tahaksid ise proovida. Videot toetab valik metoodilisi lehekülgi ning videoteek muu maailma kogemusega.
                Kombineeri videoklotsidest just sulle sobiv õpetamisviis või koolimudel!</i></p>
    </div>
</div>

<div class="row">
  <?php
  foreach ($nodes as $node) : ?>
    <?php
    if(!empty($node->ed_field_featured_image)){
      $image = image_style_url('large', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri']);
    }else{
      $image = $GLOBALS['base_url'].'/'.drupal_get_path('theme', $GLOBALS['theme']).'/img/videoklotsid/video-img-01.jpg';
    }
    ?>
  <div class="col-sm-6 col-md-6 col-lg-4 text-center">
    <div class="news-box-01 video-bricks">
      <figure class="news-box-01__img">
        <a href="<?php print url('node/'. $node->nid); ?>">
          <img src="<?php print $image; ?>" alt="">
        </a>
      </figure>
      <h3 class="news-box-01__title">
        <?php print l($node->title, 'node/'.$node->nid) ; ?>
      </h3>
      <div class="news-box-01__text">
        <p><?php print edidaktikum_get_short_content_or_excerpt($node); ?></p>
      </div>
      <a class="news-box-01__btn" href="<?php print url('node/'. $node->nid); ?>">Ava video</a>
    </div>
  </div>

  <?php endforeach; ?>
</div>