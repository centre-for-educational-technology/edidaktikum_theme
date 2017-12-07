<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

global $user;
?>

<div class="wrapp-content">

    <!-- Header -->
    <header class="wrapp-header">
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
                    <div class="col-lg-2">
                        <a href="<?php print $site_frontpage; ?>">
                            <h3 class="logo">eDidaktikum</h3>
                        </a>
                    </div>
                    <div class="col-lg-10 text-center info-nav-wrap">
                        <div class="main-nav__btn">
                            <div class="icon-left"></div>
                            <div class="icon-right"></div>
                        </div>
                        <div class="info-box-02__box-01">
                         
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
    </header>

    <main class="content-row">
	
	    <?php if (!empty($page['sidebar_first'])): ?>
          <aside class="col-sm-3" role="complementary">
				    <?php print render($page['sidebar_first']); ?>
          </aside>  <!-- /#sidebar-first -->
	    <?php endif; ?>

     
        <?php if (!empty($page['highlighted'])): ?>
            <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
			
        
        
        <?php if (!empty($breadcrumb)): print $breadcrumb; endif;?>

    
        <?php if (!empty($title)): ?>
            <div class="page-title-wrapp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-title-01"><?php print render($title_prefix); ?> <?php print $title; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <div class="content-box padding-bottom-36">
            <div class="container">
            
            
							<?php print render($title_suffix); ?>
							<?php print $messages; ?>
							<?php if (!empty($tabs)): ?>
								<?php print render($tabs); ?>
							<?php endif; ?>
							<?php if (!empty($page['help'])): ?>
								<?php print render($page['help']); ?>
							<?php endif; ?>
							<?php if (!empty($action_links)): ?>
                                 <ul class="action-links"><?php print render($action_links); ?></ul>
							<?php endif; ?>
							<?php print render($page['content']); ?>
       
					
					<?php if (!empty($page['sidebar_second'])): ?>
              <aside class="col-sm-3" role="complementary">
								<?php print render($page['sidebar_second']); ?>
              </aside>  <!-- /#sidebar-second -->
					<?php endif; ?>

 
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