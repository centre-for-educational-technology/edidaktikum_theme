<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

global $user;
?>

<div class="wrapp-content">

    <!-- Header -->
    <?php include(__DIR__ . '/includes/header.php'); ?>

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


        <header role="banner" id="page-header">
			    <?php print render($page['header']); ?>
        </header> <!-- /#page-header -->


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
<?php include(__DIR__ . '/includes/footer.php'); ?>
</div>
