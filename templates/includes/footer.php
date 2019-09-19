<?php
/**
 * @file
 * General page footer section
 */
?>

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
                            <h4 class="widget-contact__title"><?php print t('Email'); ?>:</h4>
                            <p class="widget-contact__text">
                                <a class="widget-contact__text-email" href="mailto:edidaktikum@tlu.ee">edidaktikum@tlu.ee</a>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <div class="widget-link">
                        <h3 class="widget-title"><?php print t('Dashboard'); ?></h3>
                        <ul class="widget-list">
                            <li>
                                <a href="<?php print url('dashboard'); ?>"><?php print t('My dashboard'); ?></a>
                            </li>
<!--                            <li>-->
<!--                                <a href="--><?php //print url('dashboard/qualification_portfolio'); ?><!--">Kutseomistamise portfoolio</a>-->
<!--                            </li>-->


                            <li>
                                <a href="<?php print url('dashboard/blogs'); ?>"><?php print t('My blog'); ?></a>
                            </li>
                            <li>
                                <a href="<?php print url('dashboard/shared'); ?>"><?php print t('Shared with me'); ?></a>
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
                        <h3 class="widget-title"><?php print t('Groups'); ?></h3>
                        <ul class="widget-list">
                            <li>
                                <a href="<?php print url('clusters/mygroups'); ?>"><?php print t('My active groups'); ?></a>
                            </li>
                            <li>
                                <a href="<?php print url('clusters'); ?>"><?php print t('All groups'); ?></a>
                            </li>
                            <li>
                                <a href="<?php print url('clusters/inactivegroups'); ?>"><?php print t('My inactive groups'); ?></a>
                            </li>
                            <li>
                                <a href="<?php print url('clusters/searchgroup'); ?>"><?php print t('Search for a group'); ?></a>
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
                    <p class="copy-info">&copy; <?php echo date("Y"); ?> <?php print t('@sitename All rights reserved.', [ '@sitename' => 'eDidaktikum.', ]); ?></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 text-center">

                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="footer-info">
                        <a class="footer-info__01" href="<?php print url('user'); ?>"><?php print t('My account'); ?></a>
                        <a class="footer-info__02" href="<?php print url('faq'); ?>"><?php print t('FAQ'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="back2top" title="<?php print t('Back to Top'); ?>"><?php print t('Back to Top'); ?></a>
</footer>
