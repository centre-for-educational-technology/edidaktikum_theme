<?php
$author = user_load($node->uid);
$userfullname = edidaktikum_get_full_name_for_user_account($author);


if(!empty($node->ed_field_featured_image)){
	$image = image_style_url('large', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri']);
}else{
	$image = $GLOBALS['base_url'].'/'.drupal_get_path('theme', $GLOBALS['theme']).'/images/icons/ed_group_icon_default.png';
}

$study_areas = _ed_learning_resource_study_areas_options_list();
$study_area = $study_areas[$node->ed_field_study_area[LANGUAGE_NONE][0]['value']];

$languages = _ed_learning_resource_language_list();
$language = $languages[$node->ed_learning_resource_language[LANGUAGE_NONE][0]['value']];


$assets_distribution_list = _ed_learning_resource_assets_distribution_options_list();
$assets_distribution = $assets_distribution_list[$node->ed_field_assets_distribution[LANGUAGE_NONE][0]['value']];


$study_areas_list  = _ed_learning_resource_study_areas_options_list();
$study_area = $study_areas_list[$node->ed_field_study_area [LANGUAGE_NONE][0]['value']];


if(!empty( $node->ed_field_category )){
	$ed_field_category = field_view_field('node', $node, 'ed_field_category', 'full');
}else{
	$ed_field_category =null;
}


if(!empty($node->ed_field_featured_image)){
	$image = image_style_url('large', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri']);
}else{
	$image = null;
}


?>

<div class="row">
	<div class="col-lg-12">
		<div class="blog-listing right">
			<article class="blog-post single">
                <?php if($image): ?>
                    <figure class="blog-post__img">
                        <img src="<?php print $image ?>" alt="">
                    </figure>
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
						<li>
							<p class="blog-post__meta-category"><?php print $study_area; ?></p>
						</li>
						<li>
							<p class="blog-post__meta-comments"><?php print $node->comment_count.' '.t('Comments'); ?></p>
						</li>
					</ul>
				</div>
<!--				<h3 class="blog-post__title">-->
<!--					Kuidas õpilasi motiveerida. Käsiraamat õpetajale-->
<!--				</h3>-->
				<div class="blog-post__text">
					<p><?php print $node->ed_field_content['und'][0]['safe_value']; ?></p>
				</div>
				<div class="blog-post__btn-wrapp ed-node-statistics">
					<?php if(!empty( $node->field_tags )): ?>
						<ul class="post-tag-list">
						<?php foreach($node->field_tags[LANGUAGE_NONE] as $tag): ?>
								<li>
									<?php print l($tag['taxonomy_term']->name,$tag['taxonomy_term']->vocabulary_machine_name.'/'.$tag['taxonomy_term']->name) ; ?>
								</li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					
					<div class="ed-node-statistics-likes">
						<a href="#" data-id="<?php print $node->nid; ?>" class="blog-post__likes"><span class="count"><?php print ed_get_likes($node->nid); ?></span><?php print ' '.t('Likes'); ?></a>
					</div>
					
					<div class="preview_share_wrapper">
						<a href="#" class="preview_share_toggler">
							<i class="fa fa fa-share-alt"></i>
						</a>
						<div class="preview_share_block">
							<a class="share_facebook" href="#" data-image="<?php print $image ?>" data-title="<?php print check_plain($node->title); ?>" data-desc="<?php print check_plain($node->ed_field_excerpt['und'][0]['value']); ?>">
								<i class="fa fa-facebook"></i>
							</a>
							<a class="share_twitter" href="https://twitter.com/intent/tweet?text=eDidaktikum%20%22<?php print check_plain($node->title); ?>%22%20<?php print url(current_path(), array('absolute' => TRUE)) ?>">
								<i class="fa fa-twitter"></i>
							</a>
							<a class="share_gplus" href="https://plus.google.com/share?url=<?php print url(current_path(), array('absolute' => TRUE)) ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
								<i class="fa fa-google-plus"></i>
							</a>
							<a class="share_pinterest" href="#" data-media="<?php print $image ?>">
								<i class="fa fa-pinterest-p"></i>
							</a>
						</div>
					</div>
				</div>
			</article>
<!--			<div class="single-post-nav">-->
<!--				<a class="single-post-nav__prew" href="#">eelmine</a>-->
<!--				<a class="single-post-nav__next" href="#">järgmine</a>-->
<!--			</div>-->
<!--			<div class="single-related-posts">-->
<!--				<h3 class="single-related__title">Vaata lisaks</h3>-->
<!--				<ul class="single-related-posts__list">-->
<!--					<li>-->
<!--						<figure class="single-related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_mees_02.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<p class="single-related-posts__data">5 jaanuar, 2018</p>-->
<!--						<h3 class="single-related-posts__title">-->
<!--							<a href="#">Õppimise hästi hoitud saladused</a>-->
<!--						</h3>-->
<!--						<a class="single-related-posts__btn" href="#">Loe edasi</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<figure class="single-related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_naine_01.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<p class="single-related-posts__data">5 jaanuar, 2018</p>-->
<!--						<h3 class="single-related-posts__title">-->
<!--							<a href="#">Õppimise hästi hoitud saladused</a>-->
<!--						</h3>-->
<!--						<a class="single-related-posts__btn" href="#">Loe edasi</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<figure class="single-related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_mees_03.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<p class="single-related-posts__data">5 jaanuar, 2018</p>-->
<!--						<h3 class="single-related-posts__title">-->
<!--							<a href="#">Õppimise hästi hoitud saladused</a>-->
<!--						</h3>-->
<!--						<a class="single-related-posts__btn" href="#">Loe edasi</a>-->
<!--					</li>-->
<!--				-->
<!--				</ul>-->
<!--			</div>-->
<!--			<div class="comments">-->
<!--				<h3 class="comments-title">Kommentaarid (3)</h3>-->
<!--				<ul class="comments__list">-->
<!--					<li>-->
<!--						<div class="comments__user-wrapp">-->
<!--							<figure class="comments__user-img">-->
<!--								<img src="img/portree_naine_04.jpg" alt="">-->
<!--							</figure>-->
<!--						</div>-->
<!--						<div class="comments__content">-->
<!--							<h4 class="comments__user-name">Nimi Perenimi</h4>-->
<!--							<p class="comments__data">12 jaanuar, 2018</p>-->
<!--							<a class="comments__reply" href="#">Vasta</a>-->
<!--							<div class="comments__text">-->
<!--								<p>Mauris, quis auctor risus libero et diam. Mauris vel felis eros. Donec ut nulla ornare, tristique risus quis, feugiat elit. Aliquam ornare libero quis lectus tempor convallis. Phasellus et mauris trist</p>-->
<!--							</div>-->
<!--						</div>-->
<!--						<ul class="comments__child-list">-->
<!--							<li>-->
<!--								<div class="comments__user-wrapp">-->
<!--									<figure class="comments__user-img">-->
<!--										<img src="img/portree_mees_03.jpg" alt="">-->
<!--									</figure>-->
<!--								</div>-->
<!--								<div class="comments__content">-->
<!--									<h4 class="comments__user-name">Nimi Perenimi</h4>-->
<!--									<p class="comments__data">13 jaanuar, 2018</p>-->
<!--									<a class="comments__reply" href="#">Vasta</a>-->
<!--									<div class="comments__text">-->
<!--										<p>Donec ut nulla ornare, tristique risus quis, feugiat elit. Aliquam ornare libero quis lectus tempor convallis. Phasellus et mauris trist </p>-->
<!--									</div>-->
<!--								</div>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</div>-->
					
            <?php print render($content['comments']); ?>
<!--			<div class="reply-form">-->
<!--				<h3 class="reply-form__title">Kommenteeri</h3>-->
<!--				<form action="./" class="reply-form__form">-->
<!--					-->
<!--					<div class="reply-form__box-04">-->
<!--						<textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Sõnum..."></textarea>-->
<!--					</div>-->
<!--					<div class="reply-form__box-05">-->
<!--						<button class="btn-01" type="submit">Postita</button>-->
<!--					</div>-->
<!--				</form>-->
<!--			</div>-->
		</div>
		<aside class="blog-listing-sidebar right">
<!--			<div class="widget sidebar-search-block">-->
<!--				<form class="sidebar-search" action="./">-->
<!--					<div class="sidebar-search__label">-->
<!--						<input class="sidebar-search__inp-text" placeholder="Otsi..." type="text" name="inp-text">-->
<!--						<button class="sidebar-search__inp-btn" type="button">Otsi</button>-->
<!--					</div>-->
<!--				</form>-->
<!--			</div>-->
            <?php if(!empty( $node->og_group_ref  )): ?>
              <div class="widget tags-cloud">
                  <h3 class="widget-title"><?php print t('Group'); ?></h3>
                  <ul class="tags-cloud__list">
                    <?php foreach($node->og_group_ref[LANGUAGE_NONE] as $group): ?>
                        <li>
                            <?php print l(_ed_get_group_name_from_id($group['target_id']),'/node/'.$group['target_id']) ; ?>
                        </li>
                    <?php endforeach; ?>
                  </ul>
              </div>
            <?php endif; ?>
            <?php if(!empty( $node->ed_learning_resource_authors )): ?>
              <div class="widget tags-cloud">
                  <h3 class="widget-title"><?php print t('Authors'); ?></h3>
                  <ul class="tags-cloud__list">
                    <?php foreach($node->ed_learning_resource_authors[LANGUAGE_NONE] as $author): ?>
                        <li>
							<?php print l($author['taxonomy_term']->name,'/taxonomy/term/'.$author['taxonomy_term']->tid) ; ?>
                        </li>
                    <?php endforeach; ?>
                  </ul>
              </div>
            <?php endif; ?>
            <div class="widget tags-cloud">
                <h3 class="widget-title"><?php print t('Valdkond'); ?></h3>
                <p><?php print t($study_area); ?></p>
            </div>
            <div class="widget tags-cloud">
                <h3 class="widget-title"><?php print t('Õppevara jaotus'); ?></h3>
                <p><?php print t($assets_distribution); ?></p>
            </div>
            <div class="widget tags-cloud">
                <h3 class="widget-title"><?php print t('Learning Resource Type'); ?></h3>
                <ul class="tags-cloud__list">
                    <li>
						<?php print l(taxonomy_term_load($node->ed_learning_resource_type[LANGUAGE_NONE][0]['value'])->name,'/resources/type/'.$node->ed_learning_resource_type[LANGUAGE_NONE][0]['value']) ; ?>
                    </li>
                </ul>
            </div>
            <?php if(!empty( $node->ed_field_category  )): ?>
            <div class="widget categories">
                <h3 class="widget-title"><?php print t('Category'); ?></h3>
	            <?php print render($ed_field_category); ?>
            </div>
            <?php endif; ?>
			
            
<!--				<h3 class="widget-title">Kategooriad</h3>-->
<!--				<ul class="categories-list">-->
<!--					<li>-->
<!--						<a href="#">Ülddidaktika (15)</a>-->
<!--						<ul>-->
<!--							<li>-->
<!--								<a href="#">Kategooria 2 (08)</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Kategooria 4 (17)</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Kategooria 3 (09)</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Kategooria 6 (25)</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Kategooria 5 (03)</a>-->
<!--					</li>-->
<!--				</ul>-->
<!--			<div class="widget related-posts">-->
<!--				<h3 class="widget-title">Seotud postitused</h3>-->
<!--				<ul class="related-posts__list">-->
<!--					<li>-->
<!--						<figure class="related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_mees_02.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<div class="related-posts__data">-->
<!--							15 jaanuar 2018-->
<!--						</div>-->
<!--						<h3 class="related-posts__title">-->
<!--							<a href="#">Postitus pealkiri 1</a>-->
<!--						</h3>-->
<!--					</li>-->
<!--					<li>-->
<!--						<figure class="related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_naine_01.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<div class="related-posts__data">-->
<!--							15 jaanuar 2018-->
<!--						</div>-->
<!--						<h3 class="related-posts__title">-->
<!--							<a href="#">Uudis number 3</a>-->
<!--						</h3>-->
<!--					</li>-->
<!--					<li>-->
<!--						<figure class="related-posts__img">-->
<!--							<a href="#">-->
<!--								<img src="img/portree_mees_03.jpg" alt="">-->
<!--							</a>-->
<!--						</figure>-->
<!--						<div class="related-posts__data">-->
<!--							15 jaanuar 2018-->
<!--						</div>-->
<!--						<h3 class="related-posts__title">-->
<!--							<a href="#">Postitus 3</a>-->
<!--						</h3>-->
<!--					</li>-->
<!--				</ul>-->
<!--			</div>-->
<!--			<div class="widget tags-cloud">-->
<!--				<h3 class="widget-title">#teemaviited</h3>-->
<!--				<ul class="tags-cloud__list">-->
<!--					<li>-->
<!--						<a href="#">Kursused</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Disain</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Alumni</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Ülddidaktika</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Õppetöö</a>-->
<!--					</li>-->
<!--					<li>-->
<!--						<a href="#">Blogi</a>-->
<!--					</li>-->
<!--				-->
<!--				</ul>-->
<!--			</div>-->
            <div class="widget tags-cloud">
                <h3 class="widget-title"><?php print t('Language'); ?></h3>
                <ul class="tags-cloud__list">
                      <li>
                        <?php print l($language,'/resources/language/'.$node->ed_learning_resource_language[LANGUAGE_NONE][0]['value']) ; ?>
                      </li>
                </ul>
            </div>
			<?php if(!empty( $node->ed_learning_resource_authors )): ?>
			<div class="widget tags-cloud">
				<h3 class="widget-title"><?php print t('Authors'); ?></h3>
				<ul class="tags-cloud__list">
					<?php foreach($node->ed_learning_resource_authors[LANGUAGE_NONE] as $author): ?>
						<li>
							<?php print l($author['taxonomy_term']->name,'/taxonomy/term/'.$author['taxonomy_term']->tid) ; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
		</aside>
	</div>
</div>