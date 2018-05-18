<?php
/**
 * @file
 * General page header section
 */
?>

<header class="wrapp-header">
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
                <div class="col-lg-2">
                    <a href="<?php print url('/'.$site_frontpage); ?>">
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
