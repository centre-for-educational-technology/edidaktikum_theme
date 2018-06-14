<?php
if(!empty($node->ed_field_video_url)){

  $full_video = ed_learning_resource_generate_youtube_iframe($node->ed_field_video_url[LANGUAGE_NONE][0]['value']);

}else{
  $full_video = null;
}

if(!empty($node->ed_field_trailer_url)){

  $trailer_video = ed_learning_resource_generate_youtube_iframe($node->ed_field_trailer_url[LANGUAGE_NONE][0]['value']);

}else{
  $trailer_video = null;
}

$related_resources = ed_learning_resource_get_related_res($node);

$methodical_res = null;
$best_practice = null;


if(!empty($related_resources)){
    if(!empty($related_resources['methodical_res'])){
        $methodical_res = $related_resources['methodical_res'];
    }
    if(!empty($related_resources['best_practice'])){
      $best_practice = $related_resources['best_practice'];
    }
}


?>
<div class="row">
  <div class="col-lg-12">
    <div class="col-md-9">

      <div class="tabs single-course-tabs video-bit">
        <ul class="tabs__caption">
          <li class="active">Treiler</li>
          <li class="">Põhivideo</li>
        </ul>
        <div class="tabs__content active">
          <article class="video-post">
            <div class="embed-responsive embed-responsive-16by9">
              <?php if(!empty( $trailer_video )): ?>
                <?php print $trailer_video ?>

              <?php endif; ?>
            </div>
          </article>
        </div>
        <div class="tabs__content">
          <article class="video-post">
            <div class="embed-responsive embed-responsive-16by9">
              <?php if(!empty( $full_video )): ?>
                <?php print $full_video ?>

              <?php endif; ?>
            </div>
          </article>
        </div>

        <div class="blog-post__btn-wrapp ed-node-statistics">
          <!--					<ul class="post-tag-list">-->
          <!--						<li>-->
          <!--							<a href="#">Haridustehnoloogia</a>-->
          <!--						</li>-->
          <!--						<li>-->
          <!--							<a href="#">Praktika</a>-->
          <!--						</li>-->
          <!--						<li>-->
          <!--							<a href="#">S17</a>-->
          <!--						</li>-->
          <!--					</ul>-->
          <div class="ed-node-statistics-likes">
            <a href="#" data-id="369" class="blog-post__likes"><span class="count">1</span> Meeldimised</a>
          </div>
          <div class="preview_share_wrapper">
            <a href="#" class="preview_share_toggler">
              <i class="fa fa fa-share-alt"></i>
            </a>
            <div class="preview_share_block">
              <a class="share_facebook" href="#" data-image="http://localhost:8888/edidaktikum/sites/default/files/styles/large/public/ed_cluster_featured_images/aviationabstraction-1-L.jpg?itok=Vj4qeis2" data-title="asticky" data-desc="Kokkuvõte">
                <i class="fa fa-facebook"></i>
              </a>
              <a class="share_twitter" href="https://twitter.com/intent/tweet?text=eDidaktikum%20%22asticky%22%20http://localhost:8888/edidaktikum/et/content/asticky">
                <i class="fa fa-twitter"></i>
              </a>
              <a class="share_gplus" href="https://plus.google.com/share?url=http://localhost:8888/edidaktikum/et/content/asticky" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fa fa-google-plus"></i>
              </a>
              <a class="share_pinterest" href="#" data-media="http://localhost:8888/edidaktikum/sites/default/files/styles/large/public/ed_cluster_featured_images/aviationabstraction-1-L.jpg?itok=Vj4qeis2">
                <i class="fa fa-pinterest-p"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <?php if(!empty( $node->ed_field_training_url )): ?>
          <div class="single-related-posts">
              <a target="_blank" href="<?php print $node->ed_field_training_url[LANGUAGE_NONE][0]['value']; ?>" class="btn-01">Tule koolitusele</a>
          </div>
      <?php endif; ?>


      <?php if(!empty( $related_resources )): ?>
          <div class="single-related-posts">
              <h3 class="single-related__title">Vaata lisaks</h3>


            <?php if(!empty( $methodical_res )): ?>
                <h3 class="single-related-posts__title" style="height: 40px;">
                    Metoodilised leheküljed
                </h3>

                <div class="panel-group res" id="methodical-res-accordion" role="tablist" aria-multiselectable="true">
              <?php foreach($methodical_res as $res): ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="heading_<?php print $res['nid']; ?>">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#methodical-res-accordion" href="#collapse_<?php print $res['nid']; ?>" aria-expanded="true" aria-controls="collapse_<?php print $res['nid']; ?>">
                                      <?php print $res['title']; ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse_<?php print $res['nid']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php print $res['nid']; ?>">
                                <div class="panel-body">
                                    <?php print $res['content']['safe_value']; ?>
                                      <?php if(!empty( $res['url'] )): ?>
                                        <a href="<?php print  $res['url']; ?>" target="_blank" class="news-box-01__btn">Mine lehele</a>
                                      <?php endif; ?>
                                </div>
                            </div>
                        </div>

              <?php endforeach; ?>
                </div>
            <?php endif; ?>


            <?php if(!empty( $best_practice )): ?>
                <h3 class="single-related-posts__title" style="height: 40px;">
                    Muu maailma kogemus
                </h3>

                <div class="panel-group res" id="best-res-accordion" role="tablist" aria-multiselectable="true">
                  <?php foreach($best_practice as $res): ?>


                      <div class="panel panel-primary">
                          <div class="panel-heading" role="tab" id="heading_<?php print $res['nid']; ?>">
                              <h4 class="panel-title">
                                  <a role="button" data-toggle="collapse" data-parent="#best-res-accordion" href="#collapse_<?php print $res['nid']; ?>" aria-expanded="true" aria-controls="collapse_<?php print $res['nid']; ?>">
                                    <?php print $res['title']; ?>
                                  </a>
                              </h4>
                          </div>
                          <div id="collapse_<?php print $res['nid']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php print $res['nid']; ?>">
                              <div class="panel-body">
                                <?php print $res['content']['safe_value']; ?>
                                <?php if(!empty( $res['url'] )): ?>
                                    <a href="<?php print  $res['url']; ?>" target="_blank" class="news-box-01__btn">Mine lehele</a>
                                <?php endif; ?>
                              </div>
                          </div>
                      </div>

                  <?php endforeach; ?>
                </div>
            <?php endif; ?>

          </div>
      <?php endif; ?>




<!--      <div class="comments">-->
<!--        <h3 class="comments-title">Kommentaarid (3)</h3>-->
<!--        <ul class="comments__list">-->
<!--          <li>-->
<!--            <div class="comments__user-wrapp">-->
<!--              <figure class="comments__user-img">-->
<!--                <img src="img/portree_mees_02.jpg" alt="">-->
<!--              </figure>-->
<!--            </div>-->
<!--            <div class="comments__content">-->
<!--              <h4 class="comments__user-name">Nimi Perenimi</h4>-->
<!--              <p class="comments__data">12 jaanuar, 2018</p>-->
<!--              <a class="comments__reply" href="#">Vasta</a>-->
<!--              <div class="comments__text">-->
<!--                <p>Mauris, quis auctor risus libero et diam. Mauris vel felis eros. Donec ut nulla ornare, tristique risus quis, feugiat elit. Aliquam ornare libero quis lectus tempor convallis. Phasellus et mauris trist</p>-->
<!--              </div>-->
<!--            </div>-->
<!--            <ul class="comments__child-list">-->
<!--              <li>-->
<!--                <div class="comments__user-wrapp">-->
<!--                  <figure class="comments__user-img">-->
<!--                    <img src="img/portree_mees_03.jpg" alt="">-->
<!--                  </figure>-->
<!--                </div>-->
<!--                <div class="comments__content">-->
<!--                  <h4 class="comments__user-name">Nimi Perenimi</h4>-->
<!--                  <p class="comments__data">13 jaanuar, 2018</p>-->
<!--                  <a class="comments__reply" href="#">Vasta</a>-->
<!--                  <div class="comments__text">-->
<!--                    <p>Donec ut nulla ornare, tristique risus quis, feugiat elit. Aliquam ornare libero quis lectus tempor convallis. Phasellus et mauris trist </p>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </li>-->
<!--        </ul>-->
<!--      </div>-->
<!--      <div class="reply-form">-->
<!--        <h3 class="reply-form__title">Kommenteeri</h3>-->
<!--        <form action="./" class="reply-form__form">-->
<!---->
<!--          <div class="reply-form__box-04">-->
<!--            <textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Sõnum..."></textarea>-->
<!--          </div>-->
<!--          <div class="reply-form__box-05">-->
<!--            <button class="btn-01" type="submit">Postita</button>-->
<!--          </div>-->
<!--        </form>-->
<!--      </div>-->
      <?php //print render($content['comments']); ?>
      <div id="disqus_thread"></div>
      <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = 'https://edidaktikum.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
        })();
      </script>
      <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


    </div>
<!--    <aside class="col-md-3 blog-listing-video-sidebar">-->
<!--      <div class="widget related-posts">-->
<!---->
<!--        <div class="panel-pane pane-node-statistics-and-likes hidden-xs hidden-sm">-->
<!--          <div class="pane-content">-->
<!--            <div class="ed-node-statistics">-->
<!--              <div class="ed-node-statistics-views"><i class="fa fa-eye"></i>744 vaatamist (5 täna)</div>-->
<!--              <div class="ed-node-statistics-likes"><i class="fa fa-heart"></i><span class="ed-likes-count">0 meeldimist</span></div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--        <hr>-->
<!--        <h3 class="widget-title">Sulle võib meeldida ka</h3>-->
<!---->
<!--        <ul class="related-posts__list">-->
<!--          <li>-->
<!--            <figure class="related-posts__img">-->
<!--              <a href="#">-->
<!--                <img src="img/videoklotsid/video-img-06.jpg" alt="" class="related-img">-->
<!--              </a>-->
<!--            </figure>-->
<!---->
<!--            <h3 class="related-posts__title">-->
<!--              <a href="#" class="title-post">Pealkiri õppimine</a>-->
<!--            </h3>-->
<!--            <div class="related-posts__data">-->
<!--              <p>1-lauseline lühikirjeldus</p>-->
<!--            </div>-->
<!--          </li>-->
<!--          <li>-->
<!--            <figure class="related-posts__img">-->
<!--              <a href="#">-->
<!--                <img src="img/videoklotsid/video-img-02.jpg" alt="" class="related-img">-->
<!--              </a>-->
<!--            </figure>-->
<!---->
<!--            <h3 class="related-posts__title">-->
<!--              <a href="#" class="title-post">Pealkiri õppimine</a>-->
<!--            </h3>-->
<!--            <div class="related-posts__data">-->
<!--              <p>1-lauseline lühikirjeldus</p>-->
<!--            </div>-->
<!--          </li>-->
<!--          <li>-->
<!--            <figure class="related-posts__img">-->
<!--              <a href="#">-->
<!--                <img src="img/videoklotsid/video-img-01.jpg" alt="" class="related-img">-->
<!--              </a>-->
<!--            </figure>-->
<!---->
<!--            <h3 class="related-posts__title">-->
<!--              <a href="#" class="title-post">Pealkiri õppimine</a>-->
<!--            </h3>-->
<!--            <div class="related-posts__data">-->
<!--              <p>1-lauseline lühikirjeldus</p>-->
<!--            </div>-->
<!--          </li>-->
<!---->
<!--        </ul>-->
<!--      </div>-->
<!---->
<!--    </aside>-->
  </div>
</div>