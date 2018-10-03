<?php

/**
 * @file
 * Default theme implementation to present a picture configured for the
 * user's account.
 *
 * Available variables:
 * - $user_picture: Image set by the user or the site's default. Will be linked
 *   depending on the viewer's permission to view the user's profile page.
 * - $account: Array of account information. Potentially unsafe. Be sure to
 *   check_plain() before use.
 *
 * @see template_preprocess_user_picture()
 *
 * @ingroup themeable
 */
?>

<?php if ($user_picture) : ?>


    <figure class="comments__user-img">
        <div class="useravatar profile-pic" id="<?php print $user_picture['uid']; ?>" data-image="<?php print file_create_url($user_picture['filepath']); ?>"></div>
    </figure>

    <script>
      (function ($){

        $(document).ready(function () {

          if ( $( ".useravatar.profile-pic#<?php print $user_picture['uid']; ?>" ).length ) {
            var picture = $(".useravatar.profile-pic#<?php print $user_picture['uid']; ?>" );

            picture.css('background-image', 'url(' + picture.data("image") + ')');
          }

        });


      })(jQuery)
    </script>
<?php endif; ?>

