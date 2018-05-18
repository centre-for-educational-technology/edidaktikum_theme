<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

global $user;

$themeBaseUrl = $GLOBALS['base_url'] . '/' . drupal_get_path('theme', $GLOBALS['theme']);
?>

<!--[if lt IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="wrapp-content">
    <!-- Header -->
    <?php include(__DIR__ . '/includes/header.php') ?>

    <!-- Content -->

    <main class="content-row">

        <div class="parallax parallax_01" data-type="background" data-speed="10" style="background-image: url(<?php echo $themeBaseUrl; ?>/img/kool_bg.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="parallax-content-01">
                            <h3 class="parallax-title">
                                <span>Praktilised</span> näited Eesti koolidest</h3>
                            <div class="parallax-text">
                                <p>Eesti haridussüsteemis on palju häid näiteid nii õppeprotsessi, koolielu korraldamise kui koolijuhtimise kohta. Õpikäsituse muutusi on lihtsam saavutada, kui näeme, kuidas muutused töötavad juba mõnes koolis. </p>
                            </div>
                            <a href="#read-more" class="btn-01">Loe edasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-box-01 nav-pill-custom">
            <div class="container">
                <ul class="nav nav-pills">
                    <li><a href="#nav-link-01" class="nav-link-01">1. Muutuste suund</a></li>
                    <li><a href="#nav-link-02" class="nav-link-02">2. Muutuste protsess</a></li>
                    <li><a href="#nav-link-03" class="nav-link-03">3. Muutuste jätkusuutlikkus</a></li>
                </ul>
            </div>
        </div>

        <div class="content-box-01 padding-top-50 padding-bottom-40" id="read-more">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!--<h3 class="title-02 title-02--mr-02"><span></span></h3>-->
                        <p class="subtitle-02 subtitle-02--mr-01">Eesti haridussüsteemis on palju häid näiteid nii õppeprotsessi, koolielu korraldamise kui koolijuhtimise kohta. Õpikäsituse muutusi on lihtsam saavutada, kui näeme, kuidas muutused töötavad juba mõnes koolis. Praktikult– praktikule õppimist toetavad ülikoolide õppejõudude analüüsid ja selgitused, miks üht või teist lahendust tasub usaldada. Lisatud on allikaid lisalugemiseks, et muutusi kavandavad koolijuhid-õpetajad saaksid tutvuda nii praktikatega kui ka selgitusega, miks antud lähenemine/lahendus on kasulik õpilase arengule.</p>

                        <p class="subtitle-02 subtitle-02--mr-01">Järgnevad näited põhinevad alates 2017. aastast Tallinna Ülikooli teadlaste poolt läbiviidud koolikülastustel ja intervjuudel koolijuhtide ning õpetajatega. Iga näite kirjeldamise aluseks on kolm innovatsiooni aspekti: muutuste suund, muutuste protsess ja jätkusuutlikkus, kusjuures on toodud konkreetseid näiteid, mida need muutused tähendavad õppija, õpetaja ja kooli vaates.</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="content-box-02" id="nav-link-01">
            <div class="row">
                <div class="container">
                    <div class="col-sm-6 content-box-sc-01">
                        <h3 class="title-02">1. Muutuste suund
                            <span></span>
                        </h3>
                        <p class="subtitle-02">Põhieesmärk on teada saada:</p>
                        <ol>
                            <li> kuidas muutus on toetanud õppija, õpetaja ja n ka kooli autonoomiat (kui viimane on teemaks), täpsustavad näited, antud tabelis on ka toodud vaid võimalikke näiteid;
                            </li>
                            <li>kuidas muutus on toetanud koostööd - õpilaste, õpetajate ja koolide vahel, näited;
                            </li>
                            <li>kuidas muutus loob võimalusi oma tegevuse/õppimise mõtestamiseks ja analüüsimiseks, näited.
                            </li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <!--<div class="bg-img-sc-01"></div>-->

                        <img class="about-img bg-img-sc-01" src="<?php echo $themeBaseUrl; ?>/img/blog/blog-03.jpg" alt="">

                    </div>
                </div>

            </div>
        </div>

        <!--  <div class="content-box-02" id="nav-link-01">
            <div class="table-03">
                <div class="table-03__row">

                    <div class="table-03__box-01">
                    </div>
                    <div class="table-03__box-02">
                        <div class="table-03__content">
                            <h3 class="title-02">1. Muutuste suund
                                <span></span>
                            </h3>
                            <p class="subtitle-02">Põhieesmärk on teada saada:</p>
                            <ol>
                                <li> kuidas muutus on toetanud õppija, õpetaja ja n ka kooli autonoomiat (kui viimane on teemaks), täpsustavad näited, antud tabelis on ka toodud vaid võimalikke näiteid;
                                </li>
                                <li>kuidas muutus on toetanud koostööd - õpilaste, õpetajate ja koolide vahel, näited;
                                </li>
                                <li>kuidas muutus loob võimalusi oma tegevuse/õppimise mõtestamiseks ja analüüsimiseks, näited.
                                </li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="content-box-01 padding-top-50 padding-bottom-70">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 class="title-02 title-02--mr-02">
                            <span>Autonoomia</span>
                        </h3>
                        <p class="subtitle-02 subtitle-02--mr-01">Liikumine väliselt kontrollilt autonoomiat toetava tegevusmudeli suunas</p>
                        <div class="tabs offer-tabs">
                            <ul class="tabs__caption">
                                <li class="active">Õpilane</li>
                                <li>Õpetaja</li>
                                <li>Kool</li>
                            </ul>
                            <div class="tabs__content active">
                                <p>Sihiks on toetada õppuri iseseisvust, enesekindlust, vastutustunnet, riskijulgust, loomingulisust, ettevõtlikkust, eneseregulatsiooni võimekust.
                                </p>
                                <p>Tegevused – autonoomiat toetav õpetamine, ennastjuhtiv õppimine, valikute pakkumine ja vastutuse delegeerimine õppijale, individuaalne tagasiside ja õppija enesehindamine...</p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks anda õpetajale rohkem otsustusõigust ja võimalusi katsetamiseks, toetada õpetaja oma õpetamisstiili väljakujundamist. Õpetajatel on juhtkonna tugi, oskused ja vahendid, et viia läbi metoodiliselt mitmekesist õppetööd, arendada õppekava, algatada ja läbi viia projekte, valida sisulisi rõhuasetusi, õppematerjale ja otsustada distsipliiniküsimuste ning hindamispõhimõtete üle. Õpetajad on kaasatud kooli juhtimisse.
                                </p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks iga kooli unikaalse koolikultuuri väljakujundamine.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 class="title-02 title-02--mr-02">
                            <span>Koostöö</span>
                        </h3>
                        <p class="subtitle-02 subtitle-02--mr-01">Liikumine individuaalsest tegutsemisest koostöise tegevus- ja suhtemustri suunas</p>
                        <div class="tabs offer-tabs">
                            <ul class="tabs__caption">
                                <li class="active">Õpilane</li>
                                <li>Õpetaja</li>
                                <li>Kool</li>
                            </ul>
                            <div class="tabs__content active">
                                <p>Sihiks toetada õppuri sotsiaalsete oskuste arengut – eneseväljendus, suhtlemine, tiimitöö, eestvedamine, konfliktide lahendamine.</p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks võtta kasutusele õpetajate koostöös peituvad ressursid
                                </p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks õppimisalase eestvedamise juurdumine koolis, koostöise koolikultuuri kujundamine</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-box-01 padding-top-50 padding-lg-top-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <h3 class="title-02 title-02--mr-02">
                            <span>Mõtestatud õppimine</span>
                        </h3>
                        <p class="subtitle-02 subtitle-02--mr-01">Liikumine teadmist aktiivselt loova ja lõimiva ning tõenduspõhise lähenemise suunas</p>
                        <div class="tabs offer-tabs">
                            <ul class="tabs__caption">
                                <li class="active">Õpilane</li>
                                <li>Õpetaja</li>
                                <li>Kool</li>
                            </ul>
                            <div class="tabs__content active">
                                <p>Sihiks toetada tervikliku (aineülese) maailmapildi kujunemist, toetada tõenduspõhist argumenteerimisoskust ja kriitilist mõtlemist.
                                </p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks toetada õpetajate tõenduspõhiste praktikate rakendamist, lõimivate metoodikate ja lahenduste väljatöötamist.

                                </p>

                            </div>
                            <div class="tabs__content">
                                <p>Sihiks arendada koolis tõenduspõhist otsustamis- ja tegevuskultuuri.
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <img class="about-img" src="<?php echo $themeBaseUrl; ?>/img/blog/school-c.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content-box-02 padding-top-50 padding-bottom-70 timeline-wrp" id="nav-link-02">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="title-02 title-02--mr-02 text-center">2. Muutuste
                            <span>protsess</span></h3>
                        <p>
                            Muutuste protsessi näitlikustades püüame juhtida tähelepanu sellele, et koolikultuuri parendamine on protsess, mis läbib kõiki organisatsiooni tegevuse tasandeid, alates juhtimisest ja lõpetades muutustega füüsilises keskkonnas. Seega ei saa loota, et muutused jõuaksid süvatasandile, kui piirdutakse vaid ühe aspekti arendamisega.
                        </p>
                        <p class="lead text-center">Õppija areng ja õppimine</p>
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge info"><i class="fa fa-book" aria-hidden="true"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">1. Muutused õppe sisus ja õpikäsituses</h4>
                                    </div>
                                    <!--<div class="timeline-body">
                                    </div>-->
                                </div>
                            </li>
                            <li class="timeline-badge timeline-inverted">
                                <div class="timeline-badge info"><i class="fa fa-users" aria-hidden="true"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">2. Muutused õpetajate töös</h4>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge info"><i class="fa fa-sitemap" aria-hidden="true"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">3. Muutused õppekorralduses</h4>
                                    </div>

                                </div>
                            </li>
                            <li class="timeline-badge timeline-inverted">
                                <div class="timeline-badge info"><i class="fa fa-child" aria-hidden="true"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">4. Muutused kooli füüsilises keskkonnas</h4>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge info"><i class="fa fa-check" aria-hidden="true"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">5. Muutused koolijuhtimises, hindamises</h4>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-box-01 padding-top-50 padding-bottom-70 timeline-vertical-wrp" id="nav-link-03">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="title-02 title-02--mr-02 text-center">3. Muutuste
                            <span>jätkusuutlikkus</span></h3>
                        <p class="lead">
                            Hinnatakse muutuse sisseviimise nö astet, kuivõrd kaugele on muutuse rakendamisega jõutud.
                        </p>

                        <ul class="timeline-2">
                            <li>
                                <div class="timeline-image" id="timeline-01">
                                    <img class="img-circle img-responsive" src="<?php echo $themeBaseUrl; ?>/img/timeline-img-02a.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="title-02">1. Algne ja kaootiline</h4>
                                        <h4 class="subheading">episoodiline kasutamine</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">
                                            Uuenduslikke õpetamispraktikaid (n uurimuslik õpe, projektõpe, lõimitud õpe) kasutatakse üksikutel juhtudel mõnede õpetajate poolt.
                                        </p>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image" id="timeline-02">
                                    <img class="img-circle img-responsive" src="<?php echo $themeBaseUrl; ?>/img/timeline-img-01b.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="title-02">2. Esmased rutiinid</h4>
                                        <h4 class="subheading">koolisisene koordineerimine</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">
                                            Uusi lähenemisi ja õpiviise katsetatakse juhtkonna poolt juhitult, toimub kogemuste vahetus õpetajate vahel. Muudatused kajastuvad kooli õppekavas. Toimuvad arutelud ja koolitused uute praktikate juurutamiseks.

                                        </p>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </li>
                            <li>
                                <div class="timeline-image" id="timeline-03">
                                    <img class="img-circle img-responsive" src="<?php echo $themeBaseUrl; ?>/img/timeline-img-03.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="title-02">3. Pidev täiustamine</h4>
                                        <h4 class="subheading">õppeprotsessi muutmine</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">
                                            Kooli tasandil tehakse süsteemseid muutusi õppekorralduses, lähtudes ühtsest tõenduspõhisest analüüsist. Kooli tasandil on kokku lepitud uutes nõuetes õppekavadele ja neis kirjeldatud õpieesmärkidele, õpitulemustele ja hindamisviisidele.

                                        </p>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image" id="timeline-04">
                                    <img class="img-circle img-responsive" src="<?php echo $themeBaseUrl; ?>/img/timeline-img-04.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="title-02">4. Süsteemne rakendamine</h4>
                                        <h4 class="subheading">läbiv muutus</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">
                                            Omavahel lõimitud tegevused muutuvad märkamatuks ja kõikjale ulatuvaks süsteemseks osaks töö- ja õpikeskkonnas. Kooli juhtimises ja toimimisprotsessides on kinnistunud struktuursed muutused. Enamik kooli õpetajaid rakendavad kokkulepitud muutust.

                                        </p>
                                    </div>
                                </div>
                                <div class="line"></div>
                            </li>
                            <li>
                                <div class="timeline-image" id="timeline-05">
                                    <img class="img-circle img-responsive" src="<?php echo $themeBaseUrl; ?>/img/timeline-img-05.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="title-02">5. Võimendamine ja eestvedamine</h4>
                                        <h4 class="subheading">ümbermõtestamine ja innovatsiooni juhtimine</h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">
                                            Kooli uudsed praktikad laienevad koolist väljapoole. Kool on muutunud eestvedajaks mõne konkreetse uuendusliku õpetamispraktika osas kas oma regiooni või riigi tasandil, korraldades antud valdkonna konverentse, koolitusi ja juhtides arendusprojekte.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include(__DIR__ . '/includes/footer.php'); ?>
</div>

<script>
    (function( $ ) {
        $(function() {
            $('.single-related-posts__title').matchHeight();

            $(".btn-01").click(function() {
                $('html,body').animate({
                        scrollTop: $("#read-more").offset().top
                    },
                    'slow');
            });
            $(".nav-link-01").click(function() {
                $('html,body').animate({
                        scrollTop: $("#nav-link-01").offset().top
                    },
                    'slow');
            });
            $(".nav-link-02").click(function() {
                $('html,body').animate({
                        scrollTop: $("#nav-link-02").offset().top
                    },
                    'slow');
            });
            $(".nav-link-03").click(function() {
                $('html,body').animate({
                        scrollTop: $("#nav-link-03").offset().top
                    },
                    'slow');
            });
        });
    })(jQuery);
</script>
