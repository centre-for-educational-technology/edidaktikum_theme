<?php




$group_members_uids = _get_users_in_group($node->nid);
$group_members = user_load_multiple($group_members_uids);
sort($group_members);

$author = user_load($node->uid);
$userfullname = edidaktikum_get_full_name_for_user_account($author);

$tasks = ed_get_group_tasks($node->nid, true, true, true, true);
$bookmarks = ed_get_group_bookmarks($node->nid);
$files = ed_get_group_files($node->nid);



if(!empty($node->ed_field_featured_image)){
	$image = image_style_url('large', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri']);
}else{
	$image = $GLOBALS['base_url'].'/'.drupal_get_path('theme', $GLOBALS['theme']).'/images/icons/ed_group_icon_default.png';
}

?>
<div class="row">
	<div class="col-lg-12">
		<div class="blog-listing right group-single">
			<article class="blog-post single">
				
				<div class="blog-post__meta">
				
				</div>
<!--				<h3 class="blog-post__title">-->
<!--					--><?php //print $node->title; ?>
<!--				</h3>-->
				<ul class="blog-post__meta-list">
					<li>
						<p class="blog-post__meta-date"><?php print format_date($node->created, 'full'); ?></p>
					</li>
					<li>
						<p class="blog-post__meta-author">
							<?php print l($userfullname, '/user/'.$node->uid); ?>
						</p>
					</li>
					<? if(!empty( $node->ed_field_course_code)): ?>
						<li>
							<p class="blog-post__meta-category"><?php print check_plain($node->ed_field_course_code); ?></p>
						</li>
					<? endif; ?>
<!--					<li>-->
<!--						<p class="blog-post__meta-comments">3 Kommentaari</p>-->
<!--					</li>-->
				</ul>
				<div class="tabs single-course-tabs">
					<ul class="tabs__caption">
						<li class="active"><?php print t('Home'); ?></li>
						<li><?php print t('Tasks'); ?></li>
<!--						<li>--><?php //print t('Learning Resources'); ?><!--</li>-->
						<li><?php print t('Bookmarks'); ?></li>
						<li><?php print t('Files'); ?></li>
					</ul>
					<div class="tabs__content active">
						<h3><?php print t('Excerpt'); ?></h3>
						<p><?php print check_plain($node->ed_field_excerpt['und'][0]['value']); ?></p>
						<? if(!empty( $node->ed_field_course_aim)): ?>
							<h3><?php print t('Course objective'); ?></h3>
							<p><?php print $node->ed_field_course_aim['und'][0]['value']; ?></p>
						<? endif; ?>
					</div>
					<? if(!empty( $tasks)): ?>
					<div class="tabs__content">
						<ul class="curriculum-list">
							<li>
<!--								<h5 class="curriculum-list__title-01">Osa 1</h5>-->
								<ul>
									<?php foreach($tasks as $task): ?>
									
										<li>
											<div class="curriculum-list__box">
												<a href="<?php print url('/node/'.$task['nid'])?>">
													<span class="curriculum-list__title-02"><?php print format_date($task['due_date'], 'short'); ?></span> <?php print check_plain($task['title']); ?></a>
											</div>
<!--											<span class="curriculum-list__time">Vastamata</span>-->
										</li>
									<?php endforeach; ?>
									
								</ul>
							</li>
						</ul>
						<p><?php print t('Tasks'); ?> (<?php print t('Total'); ?>: <?php print count($tasks); ?>)</p>
					</div>
					<? endif; ?>
					<? if(!empty( $bookmarks)): ?>
						<div class="tabs__content">
							<ul class="curriculum-list">
								<li>
									<!--								<h5 class="curriculum-list__title-01">Osa 1</h5>-->
									<ul>
										<?php foreach($bookmarks as $bookmark): ?>
											<li>
												<div class="curriculum-list__box">
													<a href="<?php print url('/node/'.$bookmark['nid'])?>">
														<span class="curriculum-list__title-02"></span> <?php print check_plain($bookmark['title']); ?></a>
												</div>
														<span class="curriculum-list__time"><?php print l(check_plain($bookmark['url']), check_plain($bookmark['url'])) ?></span>
											</li>
										<?php endforeach; ?>
									
									</ul>
								</li>
							</ul>
							<p><?php print t('Bookmarks'); ?> (<?php print t('Total'); ?>: <?php print count($bookmarks); ?>)</p>
						</div>
					<? endif; ?>
					<? if(!empty( $files)): ?>
						<div class="tabs__content">
							<ul class="curriculum-list">
								<li>
									<!--								<h5 class="curriculum-list__title-01">Osa 1</h5>-->
									<ul>
										<?php foreach($files as $file): ?>
											<li>
												<div class="curriculum-list__box">
													<a href="<?php print url('/node/'.$file['nid'])?>">
														<span class="curriculum-list__title-02"></span> <?php print check_plain($file['title']); ?></a>
												</div>
<!--												<span class="curriculum-list__time">--><?php //print t($file['title']) ?><!--</span>-->
											</li>
										<?php endforeach; ?>
									
									</ul>
								</li>
							</ul>
							<p><?php print t('Files'); ?> (<?php print t('Total'); ?>: <?php print count($files); ?>)</p>
						</div>
					<? endif; ?>
<!--					<div class="tabs__content">-->
<!--						<div class="teachers-wrapp">-->
<!--							<div class="row">-->
<!--								<div class="col-sm-12">-->
<!--									<div class="comments">-->
<!--										<h3 class="comments-title">Arutelu (2)</h3>-->
<!--										<ul class="comments__list">-->
<!--											<li>-->
<!--												<div class="comments__user-wrapp">-->
<!--													<figure class="comments__user-img">-->
<!--														<img src="img/portree_mees_02.jpg" alt="">-->
<!--													</figure>-->
<!--												</div>-->
<!--												<div class="comments__content">-->
<!--													<h4 class="comments__user-name">Madis</h4>-->
<!--													<p class="comments__data">24 September 2017</p>-->
<!--													<a class="comments__reply" href="#">Vasta</a>-->
<!--													<div class="comments__text">-->
<!--														<p>Kommentaari vastuse sisutekst.</p>-->
<!--													</div>-->
<!--												</div>-->
<!--												<ul class="comments__child-list">-->
<!--													<li>-->
<!--														<div class="comments__user-wrapp">-->
<!--															<figure class="comments__user-img">-->
<!--																<img src="img/portree_naine_01.jpg" alt="">-->
<!--															</figure>-->
<!--														</div>-->
<!--														<div class="comments__content">-->
<!--															<h4 class="comments__user-name">Getter</h4>-->
<!--															<p class="comments__data">24 September 2017</p>-->
<!--															<a class="comments__reply" href="#">Vasta</a>-->
<!--															<div class="comments__text">-->
<!--																<p>Kommentaari vastuse sisutekst.</p>-->
<!--															</div>-->
<!--														</div>-->
<!--													</li>-->
<!--												</ul>-->
<!--											</li>-->
<!--										</ul>-->
<!--									</div>-->
<!--									<div class="reply-form">-->
<!--										<h3 class="reply-form__title">Vasta</h3>-->
<!--										<form action="./" class="reply-form__form">-->
<!--											<p>Tiit Paas</p>-->
<!--											-->
<!--											-->
<!--											<div class="reply-form__box-04">-->
<!--												<textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Sisu..."></textarea>-->
<!--											</div>-->
<!--											<div class="reply-form__box-05">-->
<!--												<button class="btn-01" type="submit">Lisa kommentaar</button>-->
<!--											</div>-->
<!--										</form>-->
<!--									</div>-->
<!--								</div>-->
<!--							-->
<!--							</div>-->
<!--						</div>-->
<!--					</div>-->
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
		</div>
		<aside class="blog-listing-sidebar right">
			<div class="featured-image padding-bottom-36">
					<img src="<?php print $image ?>" class="img-responsive">
			</div>
			<div class="widget text-widget">
				<h3 class="widget-title">Aine eesmärk</h3>
				<p>Kursuse eesmärk on toetada praktiliste oskuste kujunemist haridustehnoloogia rakendamise suunamiseks ja toetamiseks ning oskust nõustada erinevat tüüpi organisatsioonides selle liikmeid haridustehnoloogilistes ja digitehnoloogia rakendamise küsimustes.</p>
			</div>
			<div class="widget tags-cloud">
				<h3 class="widget-title"><?php print check_plain($node->title).' '.t('members') ?></h3>
				<ul class="tags-cloud__list">
					<?php
					
						foreach(array_values($group_members) as $index => $member){
							print '<li>'.l(edidaktikum_get_full_name_for_user_account($member), 'user/'.$member->uid).'</li>';
						}
					
					?>
				</ul>
			</div>
		
		
		</aside>
	</div>
</div>
