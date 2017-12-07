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

        
    
        
        <!-- Header -->
        <header class="wrapp-header parallax">
            <div class="info-box-01">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
                            <div class="contact-block-01 email-02">
                                <a class="contact-block-01__email email_us" href="#">edidaktikum@tlu.ee</a>
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
                            <a href="<?php print $site_frontpage; ?>" class="logo">
                                <h3 class="logo">eDidaktikum</h3>
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
                                                    print "<li><a href='".base_path().$other_language['name']."/".language_url_split_prefix(current_path(), array($language->language))[1]."'>".$other_language['value']."</a></li>";
	
                                                }
                                            ?>
                                           
                                        </ul>


                                <div class="search-block">
                                    <button class="search-btn">Search</button>
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
                            <h3 class="info-box-subtitle">Õpin selleks,</h3>
                            <p class="info-box-title">
                                et
                                <span class="info-box-title__text"></span>
                            </p>
                            <div class="info-box-text">
                                <p>eDidaktikumi eesmärk on koondada kõikide erialavaldkondade<br> didaktikaalase info jagamist ja soodustada erinevates valdkondades<br> didaktikaga tegelevate inimeste koostööd.</p>
                            </div>
                            <a href="user" class="btn-01">Alusta</a>
                            <a href="#front-info" class="btn-03">Loe edasi</a>
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
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-01 icon-gradient">
                                <h3 class="servises-item__title">Personaalne töölaud</h3>
                                <div class="servises-item__text">
                                    <p>Kasutajale kuvatakse kõik viimased olulised uuendused, näiteks talle antud ülesanded koos tähtaegadega.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-02 icon-gradient">
                                <h3 class="servises-item__title">Ülesannete staatus</h3>
                                <div class="servises-item__text">
                                    <p>Iga ülesanne sisaldab staatust (kas sooritatud või mitte), lisatud on failid ning ajaveebipostitused.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-03 icon-gradient">
                                <h3 class="servises-item__title">Sobiv kõigile</h3>
                                <div class="servises-item__text">
                                    <p>Grupp võib olla formaalne õpetajakoolituse kursus, kui ka mitteformaalne grupp materjalide jagamiseks, ja koos õppimiseks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-04 icon-gradient">
                                <h3 class="servises-item__title">Mitteformaalne grupp</h3>
                                <div class="servises-item__text">
                                    <p>Mitteformaalse grupi võivad luua nii projektimeeskonnad, aineõpetajad, ainedidaktikud ülikoolide üleselt, didaktikalaborite juhid jne.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-05 icon-gradient">
                                <h3 class="servises-item__title">Kollektsioonid</h3>
                                <div class="servises-item__text">
                                    <p>eDidaktikum sisaldab kollektsioone, mis on õppematerjalide kogumikud. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="servises-item serv-item-06 icon-gradient">
                                <h3 class="servises-item__title">Kogumikud</h3>
                                <div class="servises-item__text">
                                    <p>Personaalsed kogumikud on kasutamiseks kõikide kasutajatele, kureeritud kogumikud on koostatud valdkonna spetsialistide poolt</p>
                                </div>
                            </div>
                        </div>
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
                        <h3 class="title-02 services-box-01__title">Kuidas eDidaktikum
                            <span>töötab?</span>
                        </h3>
                        <ol class="ol-list-01">
                            <li>
                                <h4 class="ol-list-01__title">Registreeri kasutajaks</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                            </li>
                            <li>
                                <h4 class="ol-list-01__title">Liitu huvipakkuva grupiga</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                            </li>
                            <li>
                                <h4 class="ol-list-01__title">Õpi ja jaga materjale</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
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
                                                <p class="counter_title"><?php print t('Teachers') ?></p>
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
                                                <p class="counter_title"><?php print t('Students') ?></p>
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
                                                <p class="counter_title"><?php print t('Learning Materials') ?></p>
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
                                                <p class="counter_title"><?php print t('Tasks Given') ?></p>
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
                            <h3 class="title-02">Õppejõudude ja tudengite
                                <span>arvamus</span>
                            </h3>
                            <p class="subtitle-01 margin-bottom-34">eDidaktikum on väga innovaatiline ja praktiline. Loe õppejõudude, õpetajate ja tudengite arvamust.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="owl-carousel owl-option-01 owl-theme-01">
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/portree_naine_01.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Katrin Maripuu</h3>
                                    <p class="owl-theme-01__item-subtitle">Õppejõud ülikoolis</p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“Duis aute irure dolor in reprehenderit in volu ptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.”</p>
                                </div>
                            </div>
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php print base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/portree_mees_02.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Kaarel Kaare</h3>
                                    <p class="owl-theme-01__item-subtitle">Tudeng</p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“Duis aute irure dolor in reprehenderit in volu ptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.”</p>
                                </div>
                            </div>
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php print base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/portree_naine_04.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Mari-Liis Lusmägi</h3>
                                    <p class="owl-theme-01__item-subtitle">Õppejõud</p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“Duis aute irure dolor in reprehenderit in volu ptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.”</p>
                                </div>
                            </div>
                            <div class="owl-theme-01__item">
                                <figure class="owl-theme-01__item-img">
                                    <img src="<?php print base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/portree_mees_03.jpg" alt="">
                                </figure>
                                <div class="owl-theme-01__item-header">
                                    <h3 class="owl-theme-01__item-title">Mihkel Pukspuu</h3>
                                    <p class="owl-theme-01__item-subtitle">Tudeng</p>
                                </div>
                                <div class="owl-theme-01__item-content">
                                    <p>“Duis aute irure dolor in reprehenderit in volu ptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.”</p>
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
                            <h3>Partnerid</h3><img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/partners_logos-1.png" class="img-responsive"></div>
                        <div class="col-sm-5">
                            <h3 style="padding-bottom: 12px;">Toetab</h3><img src="<?php echo base_path().drupal_get_path('theme',$GLOBALS['theme']); ?>/img/eduko_ESF-1.jpg" class="img-responsive"></div>
                    </div>
                </div>
            </div>
        </main>
    
    
    
        <!-- Footer -->
        <footer class="wrapp-footer">
            <div class="footer-box-01">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <h4 style="color:#fff;">eDidaktikum</h4>
                            <ul class="widget-contact">


                                <li>
                                    <h4 class="widget-contact__title">Priit Tammets</h4>
                                    <p class="widget-contact__text">+372 640 9355</p>
                                </li>
                                <li>
                                    <h4 class="widget-contact__title">Email:</h4>
                                    <p class="widget-contact__text">
                                        <a class="widget-contact__text-email" href="mailto:edidaktikum@tlu.ee">edidaktikum@tlu.ee</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="widget-link">
                                <h3 class="widget-title">Töölaud</h3>
                                <ul class="widget-list">
                                    <li>
                                        <a href="<?php print url('dashboard'); ?>">Minu töölaud</a>
                                    </li>
                                    <li>
                                        <a href="<?php print url('dashboard/qualification_portfolio'); ?>">Kutseomistamise portfoolio</a>
                                    </li>


                                    <li>
                                        <a href="<?php print url('dashboard/blogs'); ?>">Ajaveeb</a>
                                    </li>
                                    <li>
                                        <a href="<?php print url('dashboard/shared'); ?>">Minuga jagatud</a>
                                    </li>



                                </ul>
                            </div>
                        </div>
                        <!--                <div class="col-sm-3 col-md-3 col-lg-3">-->
                        <!--                    <div class="widget-link">-->
                        <!--                        <h3 class="widget-title">Kollektsioonid</h3>-->
                        <!--                        <ul class="widget-list">-->
                        <!--                            <li>-->
                        <!--                                <a href="#">Uusimad</a>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <a href="#">Lisa uus</a>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <a href="#">Liitu</a>-->
                        <!--                            </li>-->
                        <!--                            <li>-->
                        <!--                                <a href="#">Leia ja avasta</a>-->
                        <!--                            </li>-->
                        <!--                        </ul>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="widget-link">
                                <h3 class="widget-title">Grupid</h3>
                                <ul class="widget-list">
                                    <li>
                                        <a href="<?php print url('clusters/mygroups'); ?>">Minu grupid</a>
                                    </li>
                                    <li>
                                        <a href="<?php print url('clusters'); ?>">Kõik grupid</a>
                                    </li>
                                    <li>
                                        <a href="<?php print url('clusters/inactivegroups'); ?>">Mitteaktiivsed grupid</a>
                                    </li>
                                    <li>
                                        <a href="<?php print url('clusters/searchgroup'); ?>">Otsi gruppi</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-box-02">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <p class="copy-info">&copy; 2017 eDidaktikum. Kõik õigused kaitstud.</p>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 text-center">
    
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="footer-info">
                                <a class="footer-info__01" href="<?php print url('user'); ?>">Minu konto</a>
                                <a class="footer-info__02" href="<?php print url('faq'); ?>">KKK</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="back2top" title="Back to Top">Tagasi üles</a>
        </footer>
    </div>

