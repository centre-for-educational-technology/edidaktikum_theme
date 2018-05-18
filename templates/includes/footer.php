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
<!--                            <li>-->
<!--                                <a href="--><?php //print url('dashboard/qualification_portfolio'); ?><!--">Kutseomistamise portfoolio</a>-->
<!--                            </li>-->


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
                    <p class="copy-info">&copy; <?php echo date("Y"); ?> eDidaktikum. Kõik õigused kaitstud.</p>
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
