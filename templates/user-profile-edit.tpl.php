<div id="user-edit-<?php print $user->uid; ?>" class="user-edit-form">
  <div class="user-edit-container" id="user-edit-container">
    <div class="wizard">
      <?php print render($form['form_id']); ?>
      <?php print render($form['form_build_id']); ?>
      <?php print render($form['form_token']); ?>

      <div class="wizard-inner">
        <div class="connecting-line"></div>
        <ul class="nav nav-tabs" role="tablist">

          <li role="presentation" class="active">
            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="<?php print t('Account Information'); ?>">
                <span class="round-tab">
                    <i class="fa fa-user"></i>
                </span>
            </a>
          </li>

          <li role="presentation" class="disabled">
            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="<?php print t('Change Password'); ?>">
                <span class="round-tab">
                    <i class="fa fa-key"></i>
                </span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="<?php print t('Profile Information'); ?>">
                <span class="round-tab">
                    <i class="fa fa-image"></i>
                </span>
            </a>
          </li>

          <li role="presentation" class="disabled">
            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="<?php print t('Save changes'); ?>">
                <span class="round-tab">
                    <i class="fa fa-save"></i>
                </span>
            </a>
          </li>
        </ul>
      </div>

      <form role="form">
        <div class="tab-content">
          <div class="tab-pane active" role="tabpanel" id="step1">
            <h3><?php print t('Account Information'); ?></h3>
            <?php print render($form['account']['name']); ?>
            <?php print render($form['ed_field_full_name']); ?>
            <?php print render($form['account']['mail']); ?>
            <?php print render($form['account']['mail']); ?>
            <ul class="list-inline pull-right">
              <li><button type="button" class="btn btn-success next-step"><?php print t('Next'); ?></button></li>
            </ul>
          </div>
          <div class="tab-pane" role="tabpanel" id="step2">
            <h3><?php print t('Change Password'); ?></h3>
            <?php print render($form['account']['current_pass']); ?>
            <?php print render($form['account']['pass']); ?>
            <ul class="list-inline pull-right">
              <li><button type="button" class="btn btn-default prev-step"><?php print t('Previous'); ?></button></li>
              <li><button type="button" class="btn btn-success next-step"><?php print t('Next'); ?></button></li>
            </ul>
          </div>
          <div class="tab-pane" role="tabpanel" id="step3">
            <h3><?php print t('Profile Information'); ?></h3>
            <div style="min-height:135px; margin-bottom: 20px">
              <?php print render($form['picture']['picture_current']); ?>
              <?php print render($form['picture']['picture_upload']); ?>
              <?php print render($form['picture']['picture_delete']); ?>
            </div>

            <?php print render($form['ed_field_study_group']); ?>
            <?php print render($form['field_institution']); ?>
            <?php print render($form['field_pref_lang']); ?>
            <?php print render($form['ed_notification_content_types']); ?>

            <?php print render($form['account']['status']); ?>
            <?php print render($form['account']['roles']); ?>
            <ul class="list-inline pull-right">
              <li><button type="button" class="btn btn-default prev-step"><?php print t('Previous'); ?></button></li>
              <li><button type="button" class="btn btn-success btn-info-full next-step"><?php print t('Next'); ?></button></li>
            </ul>
          </div>
          <div class="tab-pane" role="tabpanel" id="complete">
            <h3><?php print t('Save changes'); ?></h3>
            <p><?php print t('You have successfully completed all steps'); ?></p>
            <?php print render($form['actions']); ?>
          </div>
          <div class="clearfix"></div>
        </div>
      </form>
    </div>

  </div>
</div>

<script>
  (function ($){


  $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();

    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

      var $target = $(e.target);

      if ($target.parent().hasClass('disabled')) {
        return false;
      }
    });

    $(".next-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      $active.next().removeClass('disabled');
      nextTab($active);

    });
    $(".prev-step").click(function (e) {

      var $active = $('.wizard .nav-tabs li.active');
      prevTab($active);

    });
  });

  function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
  }
  function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
  }

  })(jQuery)
</script>


<!---->
<!--<div id="user-edit---><?php //print $user->uid; ?><!--" class="user-edit-form">-->
<!--  <div class="user-edit-container" id="user-edit-container">-->
<!--    <div class="tabbable tabs-left">-->
<!---->
<!---->
<!--      --><?php //print render($form['form_id']); ?>
<!--      --><?php //print render($form['form_build_id']); ?>
<!--      --><?php //print render($form['form_token']); ?>
<!---->
<!---->
<!---->
<!---->
<!--      <ul class="nav nav-tabs">-->
<!--        <li class="active"><a href="#account" data-toggle="tab">Account Information</a></li>-->
<!--        <li><a href="#password" data-toggle="tab">Change Password</a></li>-->
<!--        <li><a href="#profile" data-toggle="tab">Profile Information</a></li>-->
<!--      </ul>-->
<!---->
<!--      <div class="tab-content">-->
<!--        <div class="tab-pane active" id="account">-->
<!--          <div class="">-->
<!--            <h1>Account Information</h1>-->
<!--            --><?php //print render($form['account']['name']); ?>
<!--            --><?php //print render($form['ed_field_full_name']); ?>
<!--            --><?php //print render($form['account']['mail']); ?>
<!--          </div>-->
<!--        </div>-->
<!--        <div class="tab-pane" id="password">-->
<!--          <div class="">-->
<!--            <h1>Change Password</h1>-->
<!--            --><?php //print render($form['account']['current_pass']); ?>
<!--            --><?php //print render($form['account']['pass']); ?>
<!--          </div>-->
<!--        </div>-->
<!---->
<!--        <div class="tab-pane" id="profile">-->
<!--          <div class="">-->
<!--            <h1>Profile Information</h1>-->
<!---->
<!--            <div style="min-height:135px; margin-bottom: 20px">-->
<!--              --><?php //print render($form['picture']['picture_current']); ?>
<!--              --><?php //print render($form['picture']['picture_upload']); ?>
<!--              --><?php //print render($form['picture']['picture_delete']); ?>
<!--            </div>-->
<!---->
<!---->
<!---->
<!--            --><?php //print render($form['ed_field_study_group']); ?>
<!--            --><?php //print render($form['field_institution']); ?>
<!--            --><?php //print render($form['field_pref_lang']); ?>
<!--            --><?php //print render($form['ed_notification_content_types']); ?>
<!---->
<!--            --><?php //print render($form['account']['status']); ?>
<!--            --><?php //print render($form['account']['roles']); ?>
<!---->
<!---->
<!---->
<!--          </div>-->
<!--        </div>-->
<!---->
<!---->
<!--      </div>-->
<!---->
<!--    </div>-->
<!---->
<!--    --><?php //print render($form['actions']); ?>
<!---->
<!--  </div>-->
<!--</div>-->
