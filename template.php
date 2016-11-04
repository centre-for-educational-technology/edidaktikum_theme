<?php


/**
 * @file
 * Provides preprocess logic and other functionality for theming.
 */

/**
 * Implements hook_preprocess_page().
 */
function edidaktikum_theme_preprocess_page(&$vars) {
  $page = $vars['page'];
  $vars['navbar_languages'] = FALSE;
  if (module_exists('locale')) {
    $languages_block = module_invoke('locale', 'block_view', 'language');
    $vars['navbar_languages'] = $languages_block['content'];
  }
  // Breadcrumbs are not displayed
  $vars['breadcrumb'] = FALSE;



  $contacts_text = variable_get('ed_contact_page_contacts_text', '');
  if (is_array($contacts_text)) {
    $contacts_text = check_markup($contacts_text['value'], $contacts_text['format']);
  }

  $vars['contacts_text'] = $contacts_text;


  $logos_text = variable_get('ed_contact_page_logos_text', '');
  if (is_array($logos_text)) {
    $logos_text = check_markup($logos_text['value'], $logos_text['format']);
  }

  $vars['logos_text'] = $logos_text;



  $vars['students_count'] = get_student_qt();

  $vars['teachers_count'] = get_teacher_qt();

  $vars['groups_count'] = get_cluster_qt();

  $vars['res_count'] = get_lr_qt();

  $vars['tasks_count'] = get_task_qt();


  $vars['what_text'] = variable_get('ed_home_page_what_text')? variable_get('ed_home_page_what_text') : 'No text found';

  $vars['dashboard_text'] = variable_get('ed_home_page_dashboard_text')? variable_get('ed_home_page_dashboard_text') : 'No text found';

  $vars['groups_text'] = variable_get('ed_home_page_groups_text')? variable_get('ed_home_page_groups_text') : 'No text found';

  $vars['collections_text'] = variable_get('ed_home_page_collections_text')? variable_get('ed_home_page_collections_text') : 'No text found';

}



function get_student_qt(){
  $query = db_select('users', 'u');
  $query->leftJoin('users_roles', 'ur', 'ur.uid = u.uid');
  $query->leftJoin('role', 'r', 'r.rid = ur.rid');
  $query->fields('u', array('uid'))
      ->condition('u.uid', 0, '!=')
      ->isNull('r.name');

  return $query->countQuery()->execute()->fetchField();
}

function get_teacher_qt(){
  $query = db_select('users', 'u');
  $query->join('users_roles', 'ur', 'ur.uid = u.uid');
  $query->join('role', 'r', 'r.rid = ur.rid');
  $query->condition('r.name' , 'teacher');
  $query->fields('u',array('uid'));

  return $query->countQuery()->execute()->fetchField();
}

function get_task_qt(){
  $query = db_select('node', 'n')
      ->fields('n', array('nid'))
      ->condition('type', 'ed_task');

  return $query->countQuery()->execute()->fetchField();
}

function get_lr_qt(){
  $query = db_select('node', 'n')
      ->fields('n', array('nid'))
      ->condition('type', 'ed_learning_resource');

  return $query->countQuery()->execute()->fetchField();
}

function get_cluster_qt(){
  $query = db_select('node', 'n')
      ->fields('n', array('nid'))
      ->condition('type', 'ed_cluster');

  return $query->countQuery()->execute()->fetchField();
}

function edidaktikum_theme_menu_link_alter(&$link) {

  if ($link['link_path'] == 'contact') {
    $link['hidden'] = 1;
  }
}




/**
 * Implements template_preprocess_search_result().
 */
function edidaktikum_theme_preprocess_search_result(&$variables) {
  if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
    global $pager_limits;
    $variables['attributes_array']['value'] = ((int)$_GET['page'] * $pager_limits[0]) + $variables['id'];
  }
}

/**
 * Implements hook_preprocess_html().
 */
function edidaktikum_theme_preprocess_html(&$vars) {
    _edidaktikum_theme_load_fontawsome();

  $_meta_shortcut_icon = array(
      '#tag' => 'link',
      '#attributes' => array(
          'href' => path_to_theme() .'/favicon.ico',
          'rel' => 'shortcut icon',
          'type'=> 'image/vnd.microsoft.icon'
      ),
  );
  drupal_add_html_head($_meta_shortcut_icon,'my_meta_shortcut_icon');

  $_meta_apple_web_app_capable = array(
      '#tag' => 'meta',
      '#attributes' => array(
          'name' => 'apple-mobile-web-app-capable',
          'content' => 'yes',
      ),
  );
  drupal_add_html_head($_meta_apple_web_app_capable,'my_meta_apple_web_app_capable');

  $_meta_mobile_web_app_capable = array(
      '#tag' => 'meta',
      '#attributes' => array(
          'name' => 'mobile-web-app-capable',
          'content' => 'yes',
      ),
  );
  drupal_add_html_head($_meta_mobile_web_app_capable,'my_meta_mobile_web_app_capable');

  /**
   * Add default icon
   */
  $apple_icon =  array(

      '#tag' => 'link',
      '#attributes' => array(
          'href' => path_to_theme() .'/favicons/apple-touch-icon.png',
          'rel' => 'apple-touch-icon',
      ),
  );

  drupal_add_html_head($apple_icon, 'apple-touch-icon');

  /**
   * Loop through to add various sizes
   */
  $apple_icon_sizes = array(57,60,72,76,114,120,144,152,180);

  foreach($apple_icon_sizes as $size){
    $apple = array(
        '#tag' => 'link',
        '#attributes' => array(
            'href' => path_to_theme().'/favicons/apple-touch-icon-'.$size.'x'.$size.'.png',
            'rel' => 'apple-touch-icon',
            'sizes' => $size . 'x' . $size,
        ),
    );
    drupal_add_html_head($apple, 'apple-touch-icon-'.$size);
  }


  $favicon_32 = array(

      '#tag' => 'link',
      '#attributes' => array(
          'rel' => 'icon',
          'sizes' => '32x32',
          'type' => 'image/png',
          'href' => path_to_theme() .'/favicons/favicon-32x32.png',
      ),

  );
  drupal_add_html_head($favicon_32, 'favicon-32x32');


  $favicon_16 = array(

      '#tag' => 'link',
      '#attributes' => array(
          'rel' => 'icon',
          'sizes' => '16x16',
          'type' => 'image/png',
          'href' => path_to_theme() .'/favicons/favicon-16x16.png',
      ),

  );
  drupal_add_html_head($favicon_16, 'favicon-16x16');


  $favicon_android_chrome = array(

      '#tag' => 'link',
      '#attributes' => array(
          'rel' => 'icon',
          'sizes' => '192x192',
          'type' => 'image/png',
          'href' => path_to_theme() .'/favicons/android-chrome-192x192.png',
      ),

  );
  drupal_add_html_head($favicon_android_chrome, 'favicon-16x16');


  $manifest = array(

      '#tag' => 'link',
      '#attributes' => array(
          'rel' => 'manifest',
          'href' => path_to_theme() .'/favicons/manifest.json',
      ),
  );
  drupal_add_html_head($manifest, 'manifest');


  $safari_pinned_tab = array(

      '#tag' => 'link',
      '#attributes' => array(
          'rel' => 'mask-icon',
          'color' => '#74b238',
          'href' => path_to_theme() .'/favicons/safari-pinned-tab.svg',
      ),
  );
  drupal_add_html_head($safari_pinned_tab, 'safari-pinned-tab');
}

/**
 * Globally load font-awsome.
 */
function _edidaktikum_theme_load_fontawsome() {
    $css_options = array(
        'group' => CSS_THEME,
        'weight' => -1000,
        'every_page' => TRUE,
    );
    _tweme_add_asset('css', path_to_theme() . '/libraries/font-awesome/css/font-awesome.min.css', $css_options);
}

