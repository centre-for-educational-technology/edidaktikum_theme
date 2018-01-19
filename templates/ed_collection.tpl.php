<div class="row">
<?php
foreach ($nodes as $node) : ?>
	
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
   
            <div class="product-list__item">
                <figure class="product-list__img">
                    <a href="<?php print url('node/'. $node->nid); ?>">
                        <img src="<?php
                        print image_style_url('thumbnail', $node->ed_field_featured_image[LANGUAGE_NONE][0]['uri'])
                        
                        ?>" alt="">
                    </a>
                </figure>
                <div class="product-list__content collection">
                  <?php
                      $author = user_load($node->uid);
                      $username = edidaktikum_get_full_name_for_user_account($author);
                      print l($username, 'user/'.$node->uid,  array('attributes' => array('class' => 'product-list__category'))) ;
                  ?>
                    <h3 class="product-list__title">
	                    <?php print l($node->title, $node->nid) ; ?>
                    </h3>
<!--                    <ul class="product-list__star-list">-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="#">-->
<!--                                <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </div>
                <div class="product-list__item-info">
                    <p class="item-info__text-01">
                      <?php
                          $items_field = isset($node->ed_collection_field_items[LANGUAGE_NONE]) ? $node->ed_collection_field_items[LANGUAGE_NONE] : array();
                          print $items_count = is_array($items_field) ? count($items_field) : 0;
                      ?>
                    </p>
                    <p class="item-info__text-02"><?php print ed_get_views($node->nid); ?></p>
                </div>
            </div>
      
    </div>




<?php endforeach; ?>
</div>