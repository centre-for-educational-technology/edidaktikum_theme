<div class="row">




    <?php

      $author = user_load($node->uid);
      $userfullname = edidaktikum_get_full_name_for_user_account($author);



      if(!empty($node->ed_field_featured_image)){

        $image = image_style_url('large', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri']);


      }else{
        $image = null;
      }

        if(!empty($node->ed_field_video_url)){

          $video = ed_learning_resource_generate_youtube_iframe($node->ed_field_video_url[LANGUAGE_NONE][0]['value']);

        }else{
          $video = null;
        }

      if(!empty($node->ed_field_study_area)){
        $study_areas = _ed_learning_resource_study_areas_options_list();
        $study_area = $study_areas[$node->ed_field_study_area[LANGUAGE_NONE][0]['value']];
      }

    ?>

<div class="col-lg-8">
    <article class="blog-post">
      <?php if(!empty( $image )): ?>
      <figure class="blog-post__img">
        <a href="<?php print url('node/'.$node->nid); ?>">
          <img src="<?php print $image ?>" alt="">
        </a>
      </figure>
      <?php endif; ?>

      <?php if(!empty( $video )): ?>
            <?php print $video ?>

      <?php endif; ?>

        <div class="blog-post__meta">
        <ul class="blog-post__meta-list">
          <li>
            <p class="blog-post__meta-date"><?php print format_date($node->created, 'full'); ?></p>
          </li>
          <li>
            <p class="blog-post__meta-author">
              <?php print l($userfullname, '/user/'.$node->uid); ?>
            </p>
          </li>
          <?php if(!empty( $study_area )): ?>
          <li>
            <p class="blog-post__meta-category"><?php print $study_area; ?></p>
          </li>
          <?php endif; ?>

          <li>
            <p class="blog-post__meta-comments"><?php print $node->comment_count.' '.t('Comments'); ?></p>
          </li>
        </ul>
      </div>
      <h3 class="blog-post__title">
        <a href="single-materjal.html"><?php print l($node->title, 'node/'.$node->nid) ; ?></a>
      </h3>
      <div class="blog-post__text">
        <p class="margin-bottom-40"><?php print edidaktikum_get_short_content_or_excerpt($node); ?></p>
      </div>
      <div class="blog-post__btn-wrapp ed-node-statistics">
        <a href="single-materjal.html" class="blog-post__btn"><?php print t('View'); ?></a>
        <div class="ed-node-statistics-likes">
          <a href="#" data-id="<?php print $node->nid; ?>" class="blog-post__likes"><span class="ed-likes-count"><?php print ed_get_likes($node->nid); ?><?php print ' '.t('likes'); ?></span></a>
        </div>
      </div>
    </article>
</div>


</div>
