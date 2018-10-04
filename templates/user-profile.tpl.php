 <div class="tab-content">
    <div class="tab-pane active">

        <div class="col-lg-8 col-sm-8 user-profile" id="user-profile-card">
            <div class="card hovercard">
                <div class="card-background">
                    <img class="card-bkimg" alt="" src="<?php print file_create_url($user_profile['og_user_node']['#object']->picture->uri); ?>">
            </div>
                <?php print render($user_profile['user_picture']); ?>
                <div class="card-info"> <span class="card-title"><?php print ($user_profile['ed_field_full_name']['#items'][0]['safe_value']); ?></span>

                </div>
            </div>





            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#groups"><?php print t('Group membership'); ?></a></li>
                <li><a data-toggle="tab" href="#study_groups"><?php print t('Study groups'); ?></a></li>
                <li><a data-toggle="tab" href="#email"><?php print t('More info'); ?></a></li>

            </ul>

            <div class="well">

                <div class="tab-content">
                    <div id="groups" class="tab-pane fade in active">
                        <h3><?php print t('Groups'); ?></h3>
                        <p><?php print render($user_profile['og_user_node']); ?></p>
                    </div>
                    <div id="study_groups" class="tab-pane fade">
                        <h3><?php print t('Study groups'); ?></h3>
                        <p><?php print render($user_profile['ed_field_study_group']); ?></p>
                    </div>
                    <div id="email" class="tab-pane fade">
                        <h3><?php print t('More info'); ?></h3>
                        <h4><?php print t('E-mail'); ?></h4>
                        <p><?php print render($user_profile['email']); ?></p>
                        <h4><?php print t('Institution'); ?></h4>
                        <p><?php print render($user_profile['field_institution']); ?></p>
                        <h4><?php print t('Liikmeks oldud aeg'); ?></h4>
                        <p><?php print render($user_profile['summary']); ?></p>
                    </div>

                </div>

            </div>

        </div>


    </div>



  </div>


<script>

  (function ($){

    if ( !$( "#user-profile-tabs" ).length ) {
      $( "#user-profile-card" ).addClass('col-lg-offset-2 col-sm-offset-2');
    }

  })(jQuery)


</script>


 </div>
