<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

global $user;
?>

<div id="wrap">


<!-- Navbar -->
<div id="navbar" class="navbar navbar-static-top">
  <div class="navbar-inner">
    <div class="container">

    <?php print $navbar_toggler ?>
    <?php print $navbar_brand ?>

    <?php if (user_is_logged_in()): ?>
      <div class="brand brand-avatar">
        <?php
        $user_picture_data = array('account' => $user);
        template_preprocess_user_picture($user_picture_data);
        print $user_picture_data['user_picture'];
        ?>
      </div>
    <?php endif; ?>

    <?php print $navbar_search ?>
    <?php if ($navbar_languages): ?><?php print $navbar_languages ?><?php endif ?>
    <?php if ($navbar_menu): ?>
      <nav class="nav-collapse collapse" role="navigation">
        <?php print $navbar_menu ?>
      </nav>
    <?php endif ?>
    </div>
  </div>
</div>




<section class="front-image-section">
  <div class="container front-page-image">



    <article class="front-calltoaction row">

        <h1 class="headline">
        <?php print t('Didaktikavaramu ja õpetajakoolituse keskkond') ?>
        </h1>
        <p class="call-to-action">
<!--          <a href="#" class="btn btn-large btn-primary rounded">Logi sisse</a>-->
          <?php
          if (!$user->uid) {
            print l(t('Sign in'), 'user', array('attributes' => array('class' => 'btn btn-large btn-primary rounded')));
          }
          ?>
          <?php
          if (!$user->uid) {
            print l(t('Register'), 'user/register', array('attributes' => array('class' => 'btn btn-large btn-success rounded')));
          }
          ?>
          <?php
          if ($user->uid) {
            print l(t('Dashboard'), 'dashboard', array('attributes' => array('class' => 'btn btn-large btn-success rounded')));
          }
          ?>
        </p>



    </article>
  </div>
</section>



<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container front-page">


  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="span12 heading">
      <h2>Mis on eDidaktikum?</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
    </div>
    <div class="span4">
      <i class="fa fa-5x fa-dashboard"></i>
      <h2>Töölaud</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
      <p><a class="btn" href="#">View details »</a></p>
    </div><!-- /.span4 -->
    <div class="span4">
      <i class="fa fa-5x fa-users"></i>
      <h2>Grupid ja kursused</h2>
      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn" href="#">View details »</a></p>
    </div><!-- /.span4 -->
    <div class="span4">
      <i class="fa fa-5x fa-star"></i>
      <h2>Kollektsioonid</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn" href="#">View details »</a></p>
    </div><!-- /.span4 -->
  </div><!-- /.row -->


  <!-- START THE FEATURETTES -->

  <hr class="featurette-divider">

  <section class="row">
    <div class="span12">
      <div class="flex-video widescreen"><iframe src="https://www.youtube.com/embed/nr-G27pQohM" frameborder="0" allowfullscreen=""></iframe></div>

    </div>


  </section>


  <hr class="featurette-divider">

  <!-- Three columns of text below the carousel -->
  <div class="row">
    <div class="span12 heading">
      <h2>eDidaktikum numbrites</h2>
    </div>
    <div class="span4">
      <i class="fa fa-5x fa-smile-o"></i>
      <p><?php print $teachers_count ?> õppejõudu ja <?php print $students_count ?> tudengit</p>
    </div><!-- /.span4 -->
    <div class="span4">
      <i class="fa fa-5x fa-book"></i>
      <p><?php print $groups_count ?> kursust ja gruppi <?php print $res_count ?> õppematerjali</p>
    </div><!-- /.span4 -->
    <div class="span4">
      <i class="fa fa-5x fa-files-o"></i>
      <p><?php print $tasks_count ?> antud ülesannet</p>
    </div><!-- /.span4 -->
  </div><!-- /.row -->
  <hr class="featurette-divider">

  <!-- /END THE FEATURETTES -->

  <div class="row">
    <div class="span12 contact">
      <div class="hero-unit">
        <h2><?php print t('Contact Us') ?></h2>
        <br>
        <?php print $contacts_text ?>
      </div>
    </div>
  </div><!-- /.row -->


  <!-- FOOTER -->
  <div class="row">
    <div class="span12">
      <div id="logos-text">
        <?php print $logos_text ?>
      </div>

    </div>
  </div>

</div><!-- /.container -->

</div>

  <!-- Footer -->
<footer id="footer">
  <div class="container">
    <div class="footer-links pull-right">
      <?php if ($feed_icons): ?><?php print $feed_icons ?><?php endif ?>
      <?php if ($secondary_menu): ?>
        <?php foreach ($secondary_menu as $item): ?>
          <?php print l($item['title'], $item['href']) ?>
        <?php endforeach ?>

        <a href="#"><?php print t('Back to top') ?> </a>
      <?php endif ?>
      <?php
      if (!$user->uid) {
        Print l(t('Sign in'), 'user');
      }
      ?>
    </div>
    <?php print $copyright ?>
  </div>
</footer>






<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="../assets/js/jquery.js"></script>-->
<!--<script src="../assets/js/bootstrap-transition.js"></script>-->
<!--<script src="../assets/js/bootstrap-alert.js"></script>-->
<!--<script src="../assets/js/bootstrap-modal.js"></script>-->
<!--<script src="../assets/js/bootstrap-dropdown.js"></script>-->
<!--<script src="../assets/js/bootstrap-scrollspy.js"></script>-->
<!--<script src="../assets/js/bootstrap-tab.js"></script>-->
<!--<script src="../assets/js/bootstrap-tooltip.js"></script>-->
<!--<script src="../assets/js/bootstrap-popover.js"></script>-->
<!--<script src="../assets/js/bootstrap-button.js"></script>-->
<!--<script src="../assets/js/bootstrap-collapse.js"></script>-->
<!--<script src="../assets/js/bootstrap-carousel.js"></script>-->
<!--<script src="../assets/js/bootstrap-typeahead.js"></script>-->

<!--<script src="../assets/js/holder/holder.js"></script>-->


