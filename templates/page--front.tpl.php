<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

global $user;
?>


    <!--[if lt IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <div class="wrapp-content">

        <!-- Snowflakes in december-->
      <?php if (date("m") == 12 ): ?>
        <script src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/scripts/snowstorm-min.js"></script>
      <?php endif; ?>

        <!-- Header -->
        <header class="wrapp-header parallax">
            <div class="info-box-01">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
                            <div class="contact-block-01 email-02">
                                <a class="contact-block-01__email email_us" href="mailto:edidaktikum@tlu.ee">edidaktikum@tlu.ee</a>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-8 col-lg-8 text-sm-center text-right">
                            <div class="contact-block-01">
			                        <?php if (!empty($secondary_nav)): ?>
				                        <?php print render($secondary_nav); ?>
			                        <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-nav">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?php print url('/'.$site_frontpage); ?>" class="logo">
                                <h3 class="logo">eDidaktikum</h3>
                                <p class="tagline"><?php print t('Learning and teaching space'); ?></p>
                            </a>
                            <div class="main-nav__btn text-center info-nav-wrap">
                                <div class="icon-left"></div>
                                <div class="icon-right"></div>
                            </div>
                            <div class="search-block">

                                        <a class="dropdown-toggle contact-block-01__lang" data-toggle="dropdown" href="#" role="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="false"><?php print $language->name; ?></a>


                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <?php
                                                foreach ($other_languages as $other_language){
                                                  print "<li><a href='".check_plain(base_path().$other_language['name'])."/".check_plain(language_url_split_prefix(current_path(), array($language->language))[1])."'>".check_plain($other_language['value'])."</a></li>";
                                                }
                                            ?>

                                        </ul>


                                <div class="search-block">
                                    <button class="search-btn"><?php print t('Search'); ?></button>
                                    <?php print $search_box; ?>
                                </div>

                            </div>

	                        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>


	                                <?php if (!empty($primary_nav)): ?>
		                                <?php print render($primary_nav); ?>
	                                <?php endif; ?>


	                        <?php endif ?>

                        </div>
                    </div>


                </div>
            </div>
            <div class="info-box-03">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="info-box-subtitle" style="white-space:pre"></h3>
                            <p class="info-box-title">
                                <span class="info-box-title__text"></span>
                            </p>
                            <div class="info-box-text">
                                <p>
                                  <?php print t('eDidaktikum provides a fresh picture of the world of education.<br>Daily <strong>@count</strong> students, teachers, educators and lecturers are using eDidaktikum<br>to collect and share materials, to discuss on learning and teaching.<br>Planning and giving sense to learning together is more effective!', [ '@count' => $teachers_count+$students_count, ]); ?>
                                </p>
                            </div>
                            <?php if (!user_is_logged_in()): ?>
                              <a href="<?php print url('user'); ?>" class="btn-01"><?php print t('Log in'); ?></a>
                            <?php else: ?>
                              <a href="<?php print url('dashboard'); ?>" class="btn-01"><?php print t('Dashboard'); ?></a>
                            <?php endif; ?>
                            <a href="#front-info" class="btn-03"><?php print t('Read on'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->


        <main class="content-row">
            <div class="content-box-01 padding-top-100 padding-sm-top-50" id="front-info">
                <div class="container">
                    <div class="row">
                        <a href="<?php print url('dashboard'); ?>">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-01 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('Personal dashboard'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('All latest updates and tasks with upcoming deadlines.'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php print url('dashboard/tasks'); ?>">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-02 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('Task manager'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('Is my answer accepted or rejected? What is my overall progress?'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-03 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('One size for all'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('Group can be formal (teacher training) or non-formal (as a co-working space for sharing materials).'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <a href="<?php print url('clusters'); ?>">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-04 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('Non-formal group'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('Can be used also for project management, trainings or other purposes.'); ?></p>
                                    </div>
                                </div>
                            </div>
                        <a href="<?php print url('collections'); ?>">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-05 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('Collections'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('Curated collections of learning materials'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="<?php print url('video-bricks'); ?>">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="servises-item serv-item-06 icon-gradient">
                                    <h3 class="servises-item__title"><?php print t('Videoblocks'); ?></h3>
                                    <div class="servises-item__text">
                                        <p><?php print t('Need some inspiration? Check out our videos on different school-related activities.'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="content-box-02">
                <div class="wrapp-box-01">
                    <div class="service-video">
                        <div class="video_bg">
                            <div class="video_img-03"></div>
                            <a class="play-video" href="#" data-video-url="https://www.youtube.com/embed/nr-G27pQohM?rel=0&amp;controls=1&amp;showinfo=0">Esita video</a>
                            <iframe class="video_frame frame16x14" src="https://www.youtube.com/embed/nr-G27pQohM?rel=0&amp;controls=1&amp;showinfo=0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="wrapp-box-02">
                    <div class="services-box-01">
                        <h3 class="title-02 services-box-01__title">
                          <?php print t('How does eDidaktikum <span>work?</span>'); ?>
                        </h3>
                        <ol class="ol-list-01">
                            <li>
                                <h4 class="ol-list-01__title"><?php print t('Register user'); ?></h4>
                                <p><?php print t('Everyone may become an eDidaktikum user. You don\'t have to be a student or a teacher at university or school.'); ?></p>
                            </li>
                            <li>
                                <h4 class="ol-list-01__title"><?php print t('Join a group'); ?></h4>
                                <p><?php print t('One may find all different sorts of groups. Groups can be public or private.'); ?></p>
                            </li>
                            <li>
                                <h4 class="ol-list-01__title"><?php print t('Learn and share materials'); ?></h4>
                                <p><?php print t('eDidaktikum is a platform that gives you an opportunity to teach and learn at the same time. You may share your learning materials with classmates, students or colleagues.'); ?></p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="parallax parallax_03">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="module-counter counter-02">
                                <div class="shortcode_counter">
                                    <div class="counter_wrapper">
                                        <div class="counter_content">
                                            <div class="stat_count_wrapper">
                                                <p class="stat_count" data-count="<?php print $teachers_count ?>">0</p>
                                                <p class="counter_title"><?php print t('Teachers', [], [ 'context' => 'front page', ]); ?></p>
                                            </div>

                                            <div class="stat_temp"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shortcode_counter">
                                    <div class="counter_wrapper">
                                        <div class="counter_content">
                                            <div class="stat_count_wrapper">
                                                <p class="stat_count" data-count="<?php print $students_count ?>">0</p>
                                                <p class="counter_title"><?php print t('Students', [], [ 'context' => 'front page', ]); ?></p>
                                            </div>
                                            <div class="stat_temp"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shortcode_counter">
                                    <div class="counter_wrapper">
                                        <div class="counter_content">
                                            <div class="stat_count_wrapper">
                                                <p class="stat_count" data-count="<?php print $res_count ?>">0</p>
                                                <p class="counter_title"><?php print t('Learning resources', [], [ 'context' => 'front page', ]); ?></p>
                                            </div>
                                            <div class="stat_temp"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="shortcode_counter">
                                    <div class="counter_wrapper">
                                        <div class="counter_content">
                                            <div class="stat_count_wrapper">
                                                <p class="stat_count" data-count="<?php print $tasks_count ?>">0</p>
                                                <p class="counter_title"><?php print t('Tasks', [], [ 'context' => 'front page', ]); ?></p>
                                            </div>
                                            <div class="stat_temp"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="content-box-01 padding-top-93 padding-bottom-100 padding-sm-bottom-80">-->
<!--                <div class="container">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12 text-center">-->
<!--                            <h3 class="title-02">Populaarsed-->
<!--                                <span>kollektsioonid</span>-->
<!--                            </h3>-->
<!--                            <p class="subtitle-01">Kollektsioonid on õppematerjalide kogumikud. Personaalsed kogumikud on kasutamiseks kõikide kasutajatele, kureeritud kogumikud on koostatud valdkonna spetsialistide poolt.</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12">-->
<!--                            <div class="owl-carousel owl-option-04">-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-01.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Psühholoogia</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Psühholoogia ajalugu</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">12 Materjali</p>-->
<!--                                            <p class="item-info__text-02">35 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-04.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Disain</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Õppedisaini alused</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">10 Materjali</p>-->
<!--                                            <p class="item-info__text-02">14 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-02.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Bioloogia</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Bioloogia I osa</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">21 Materjali</p>-->
<!--                                            <p class="item-info__text-02">56 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-05.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Disain</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Sisekujundus I osa</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">17 Materjali</p>-->
<!--                                            <p class="item-info__text-02">15 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-06.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Majandus</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Makroökonoomika</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">14 Materjali</p>-->
<!--                                            <p class="item-info__text-02">25 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="item">-->
<!--                                    <div class="product-list__item">-->
<!--                                        <figure class="product-list__img">-->
<!--                                            <a href="#">-->
<!--                                                <img src="--><?php //echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?><!--/img/kollektsioon/kollektsioon_img-03.jpg" alt="">-->
<!--                                            </a>-->
<!--                                        </figure>-->
<!--                                        <div class="product-list__content">-->
<!--                                            <a class="product-list__category" href="#">Tehnoloogia</a>-->
<!--                                            <h3 class="product-list__title">-->
<!--                                                <a href="#">Digiturunduse alused</a>-->
<!--                                            </h3>-->
<!--                                            <ul class="product-list__star-list">-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                                <li>-->
<!--                                                    <a href="#">-->
<!--                                                        <i class="fa fa-star" aria-hidden="true"></i>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                        <div class="product-list__item-info">-->
<!--                                            <p class="item-info__text-01">21 Materjali</p>-->
<!--                                            <p class="item-info__text-02">56 Vaatamist</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="row padding-top-20">-->
<!--                        <div class="col-lg-12 text-center">-->
<!--                            <a href="#" class="btn-01">Vaata edasi</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->



            <div class="content-box-02 padding-top-96 padding-bottom-67">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3 class="title-02">
                              <?php print t('What students and lectures are <span>saying</span>'); ?>
                            </h3>
                            <p class="subtitle-01 margin-bottom-34"><?php print t('We think that eDidakikum is very innovative and practical. Read lecturers, teachers and student opinions.'); ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="owl-carousel owl-option-01 owl-theme-01">
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/kairit.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Kairit Tammets</h3>
                                    <p class="owl-theme-01__item-subtitle"><?php print t('Lecturer'); ?></p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“<?php print t('eDidaktikum helps me to plan my courses based on competences and to keep on eye my students in different courses - how they really progress and participate.'); ?>”</p>
                                </div>
                            </div>
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/katrin.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Katrin Poom-Valickis</h3>
                                    <p class="owl-theme-01__item-subtitle"><?php print t('Associate Professor of General Didactics'); ?></p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“<?php print t('I really like the idea of feedback system and task manager. It gives good over- view of the learning process of my students.'); ?>”</p>
                                </div>
                            </div>
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/kai.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Kai Pata</h3>
                                    <p class="owl-theme-01__item-subtitle"><?php print t('Senior Research Fellow in Educational Technology'); ?></p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“<?php print t('I’m able to connect tasks with competency model which will eventually trans- forms into competency based student portfolios. I do like the way materials can be used for different courses.'); ?>”</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box-03 padding-top-96 padding-bottom-67 support" style="background-color:#fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-7">
                            <h3><?php print t('Partners'); ?></h3><img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/partners_logos-1.png" class="img-responsive"></div>
                        <div class="col-sm-5">
                            <h3 style="padding-bottom: 12px;"><?php print t('Supporters'); ?></h3><img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/eduko_ESF-1.jpg" class="img-responsive"></div>
                    </div>
                </div>
            </div>
        </main>


        <!-- Footer -->
        <?php include(__DIR__ . '/includes/footer.php'); ?>
    </div>
