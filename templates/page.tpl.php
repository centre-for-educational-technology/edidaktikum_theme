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

<?php if ($page['featured']): ?>
<!-- Featured -->
<div id="featured" class="container-wrapper hidden-phone">
  <div class="container">
    <?php print render($page['featured']) ?>
  </div>
</div>
<?php endif ?>

<?php if ($preface): ?>
<!-- Header -->
<header id="header" class="container-wrapper">
  <div class="container">
    <?php print $preface ?>
  </div>
</header>
<?php endif ?>

<!-- Main -->
<div id="main">
  <div class="container">
    <?php print render($page['header']) ?>
    <?php print $messages ?>
    <div class="row row-toggle">
      <?php if ($has_sidebar_first): ?>
      <!-- Sidebar first -->
      <aside id="sidebar-first" class="sidebar span3 hidden-phone">
        <?php print render($page['sidebar_first']) ?>
        <?php print render($page['sidebar_first_affix']) ?>
      </aside>
      <?php endif ?>
      <!-- Content -->
      <section id="content" class="span<?php print $content_cols ?>">
        <?php print render($page['content']) ?>
      </section>
      <?php if ($has_sidebar_second): ?>
      <!-- Sidebar second -->
      <aside id="sidebar-second" class="sidebar span3 hidden-phone">
        <?php print render($page['sidebar_second']) ?>
        <?php print render($page['sidebar_second_affix']) ?>
      </aside>
      <?php endif ?>
    </div>
	</div>
</div>

</div>

<!-- Footer -->
<footer id="footer" class="container-wrapper">
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
