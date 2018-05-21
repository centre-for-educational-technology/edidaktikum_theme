<?php if($provider_name == 'Facebook') : ?>
  <span class="fb-login-button <?php print $icon_pack_classes; ?>" title="<?php print $provider_name; ?>" data-max-rows="1" data-size="large" data-button-type="login_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></span>
<?php else : ?>
  <span class="<?php print $icon_pack_classes; ?>" title="<?php print $provider_name; ?>"></span>
<?php endif; ?>