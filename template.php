<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
function edidaktikum_theme_bs3_form_element_label($variables)
{

  $element = $variables['element'];

  // Extract variables.
  $output = '';

  $title = !empty($element['#title']) ? filter_xss_admin($element['#title']) : '';

  // Only show the required marker if there is an actual title to display.
  $marker = array('#theme' => 'form_required_marker', '#element' => $element);
  if ($title && $required = !empty($element['#required']) ? drupal_render($marker) : '') {
    $title .= ' ' . $required;
  }

  $display = isset($element['#title_display']) ? $element['#title_display'] : 'before';
  $type = !empty($element['#type']) ? $element['#type'] : FALSE;
  $checkbox = $type && $type === 'checkbox';
  $radio = $type && $type === 'radio';

  // Immediately return if the element is not a checkbox or radio and there is
  // no label to be rendered.
  if (!$checkbox && !$radio && ($display === 'none' || !$title)) {
    return '';
  }

  // Retrieve the label attributes array.
  $attributes = &_bootstrap_get_attributes($element, 'label_attributes');

  // Add Bootstrap label class.
  $attributes['class'][] = 'control-label';

  // Add the necessary 'for' attribute if the element ID exists.
  if (!empty($element['#id'])) {
    $attributes['for'] = $element['#id'];
  }

  // Checkboxes and radios must construct the label differently.
  if ($checkbox || $radio) {
    if ($display === 'before') {
      $output .= $title;
    } elseif ($display === 'none' || $display === 'invisible') {
      $output .= '<span class="element-invisible">' . $title . '</span>';
    }
    // Inject the rendered checkbox or radio element inside the label.
    if (!empty($element['#children'])) {
      $output .= $element['#children'];
    }
    if ($display === 'after') {
      $output .= $title;
    }
  } // Otherwise, just render the title as the label.
  else {
    // Show label only to screen readers to avoid disruption in visual flows.
    if ($display === 'invisible') {
      $attributes['class'][] = 'element-invisible';
    }
    $output .= $title;
  }

  //USED BY ED ANSWER FEEDBACK FORM
  if (isset($element['#name'])
    && (substr($element['#name'], 0, 25) == 'ed_field_difficulty_feedb'
      || substr($element['#name'], 0, 21) == 'ed_field_satisf_feedb')) {
    if ($element['#type'] == 'radio') {
      return ' <label' . drupal_attributes($attributes) . '>' . $output . $element['#return_value'] . "</label>\n";
    }
  }
  return ' <label' . drupal_attributes($attributes) . '>' . $output . "</label>\n";
  // The leading whitespace helps visually separate fields from inline labels.

}


function edidaktikum_theme_bs3_checkboxes($variables)
{
  $element = $variables['element'];
  $attributes = array();
  if (isset($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }
  $attributes['class'][] = 'form-checkboxes';

  //USED BY ED ANSWER FEEDBACK FORM
  if (isset($element['#name'])
    && (substr($element['#name'], 0, 24) == 'ed_field_answer_emotions')) {
    if ($element['#type'] == 'checkboxes') {
      $attributes['class'] = 'btn btn-group btn-group-lg';
    }
  }


  if (!empty($element['#attributes']['class'])) {
    $attributes['class'] = array_merge($attributes['class'], $element['#attributes']['class']);
  }
  if (isset($element['#attributes']['title'])) {
    $attributes['title'] = $element['#attributes']['title'];
  }
  return '<div' . drupal_attributes($attributes) . '>' . (!empty($element['#children']) ? $element['#children'] : '') . '</div>';
}

function edidaktikum_theme_bs3_radios($variables)
{
  $element = $variables['element'];
  $attributes = array();
  if (isset($element['#id'])) {
    $attributes['id'] = $element['#id'];
  }

  $attributes['class'] = 'form-radios';

  //USED BY ED ANSWER FEEDBACK FORM
  if (isset($element['#name'])
    && (substr($element['#name'], 0, 25) == 'ed_field_difficulty_feedb'
      || substr($element['#name'], 0, 21) == 'ed_field_satisf_feedb')) {
    if ($element['#type'] == 'radios') {
      $attributes['class'] = 'btn btn-group btn-group-lg';
    }
  }

  if (!empty($element['#attributes']['class'])) {
    $attributes['class'] .= ' ' . implode(' ', $element['#attributes']['class']);
  }
  if (isset($element['#attributes']['title'])) {
    $attributes['title'] = $element['#attributes']['title'];
  }
  return '<div' . drupal_attributes($attributes) . '>' . (!empty($element['#children']) ? $element['#children'] : '') . '</div>';
}

function edidaktikum_theme_bs3_form_element(array &$variables)
{
  $element = &$variables['element'];
  $name = !empty($element['#name']) ? $element['#name'] : FALSE;
  $type = !empty($element['#type']) ? $element['#type'] : FALSE;
  $wrapper = isset($element['#form_element_wrapper']) ? !!$element['#form_element_wrapper'] : TRUE;
  $form_group = isset($element['#form_group']) ? !!$element['#form_group'] : $wrapper && $type && $type !== 'hidden';
  $checkbox = $type && $type === 'checkbox';
  $radio = $type && $type === 'radio';

  // Create an attributes array for the wrapping container.
  if (empty($element['#wrapper_attributes'])) {
    $element['#wrapper_attributes'] = array();
  }
  $wrapper_attributes = &$element['#wrapper_attributes'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  // Add wrapper ID for 'item' type.
  if ($type && $type === 'item' && isset($element['#markup']) && !empty($element['#id'])) {
    $wrapper_attributes['id'] = $element['#id'];
  }

  // Check for errors and set correct error class.
  if ((isset($element['#parents']) && form_get_error($element) !== NULL) || (!empty($element['#required']) && (!isset($element['#value']) || $element['#value'] === '') && bootstrap_setting('forms_required_has_error'))) {
    $wrapper_attributes['class'][] = 'has-error';
  }

  // Add necessary classes to wrapper container.
  $wrapper_attributes['class'][] = 'form-item';
  if ($name) {
    $wrapper_attributes['class'][] = 'form-item-' . drupal_html_class($name);
  }
  if ($type) {
    $wrapper_attributes['class'][] = 'form-type-' . drupal_html_class($type);
  }
  if (!empty($element['#attributes']['disabled'])) {
    $wrapper_attributes['class'][] = 'form-disabled';
  }
  if (!empty($element['#autocomplete_path']) && drupal_valid_path($element['#autocomplete_path'])) {
    $wrapper_attributes['class'][] = 'form-autocomplete';
  }

  // Checkboxes and radios do no receive the 'form-group' class, instead they
  // simply have their own classes.
  if ($checkbox || $radio) {
    $wrapper_attributes['class'][] = drupal_html_class($type);

    //USED BY ED ANSWER FEEDBACK FORM
    if (isset($element['#name'])
      && (substr($element['#name'], 0, 25) == 'ed_field_difficulty_feedb'
        || substr($element['#name'], 0, 21) == 'ed_field_satisf_feedb' || substr($element['#name'], 0, 24) == 'ed_field_answer_emotions')) {
      if ($element['#type'] == 'radio' || $element['#type'] == 'checkbox') {
        $wrapper_attributes['class'][] = 'btn btn-primary';
      }
    }

  } elseif ($form_group) {
    $wrapper_attributes['class'][] = 'form-group';
  }

  // Create a render array for the form element.
  $build = array(
    '#form_group' => $form_group,
    '#attributes' => $wrapper_attributes,
  );

  if ($wrapper) {
    $build['#theme_wrappers'] = array('container__form_element');

    // Render the label for the form element.
    /* @noinspection PhpUnhandledExceptionInspection */
    $build['label'] = array(
      '#markup' => theme('form_element_label', $variables),
      '#weight' => $element['#title_display'] === 'before' ? 0 : 2,
    );
  }

  // Checkboxes and radios render the input element inside the label. If the
  // element is neither of those, then the input element must be rendered here.
  if (!$checkbox && !$radio) {
    $prefix = isset($element['#field_prefix']) ? $element['#field_prefix'] : '';
    $suffix = isset($element['#field_suffix']) ? $element['#field_suffix'] : '';
    if ((!empty($prefix) || !empty($suffix)) && (!empty($element['#input_group']) || !empty($element['#input_group_button']))) {
      if (!empty($element['#field_prefix'])) {
        $prefix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $prefix . '</span>';
      }
      if (!empty($element['#field_suffix'])) {
        $suffix = '<span class="input-group-' . (!empty($element['#input_group_button']) ? 'btn' : 'addon') . '">' . $suffix . '</span>';
      }

      // Add a wrapping container around the elements.
      $input_group_attributes = &_bootstrap_get_attributes($element, 'input_group_attributes');
      $input_group_attributes['class'][] = 'input-group';
      $prefix = '<div' . drupal_attributes($input_group_attributes) . '>' . $prefix;
      $suffix .= '</div>';
    }

    // Build the form element.
    $build['element'] = array(
      '#markup' => $element['#children'],
      '#prefix' => !empty($prefix) ? $prefix : NULL,
      '#suffix' => !empty($suffix) ? $suffix : NULL,
      '#weight' => 1,
    );
  }

  // Construct the element's description markup.
  if (!empty($element['#description'])) {
    $build['description'] = array(
      '#type' => 'container',
      '#attributes' => array(
        'class' => array('help-block'),
      ),
      '#weight' => isset($element['#description_display']) && $element['#description_display'] === 'before' ? 0 : 20,
      0 => array('#markup' => filter_xss_admin($element['#description'])),
    );
  }

  // Render the form element build array.
  return drupal_render($build);
}


// load scripts
function edidaktikum_theme_bs3_preprocess_html(&$variables)
{


  //$variables['page']['header']['menu_ed-dashboard-menu'];

  if (drupal_is_front_page()) {
    $variables['classes_array'][] = 'home-02 home';
  } else {
    $variables['classes_array'][] = 'page';
  }

  if (in_array('page-schools', $variables['classes_array'])) {
    $variables['classes_array'][] = 'makings';
    $variables['classes_array'][] = 'page';
    $variables['classes_array'][] = 'school';
  }

  $options = array(
    'group' => JS_THEME,
  );

  //drupal_add_js(drupal_get_path('theme', 'edidaktikum_theme_bs3') . '/scripts/main.js', array('type'=>'file', 'group'=>JS_THEME));

  drupal_add_js(drupal_get_path('theme', 'edidaktikum_theme_bs3') . '/scripts/main.js', array('type' => 'file', 'scope' => 'footer'));

  drupal_add_js('jQuery(document).ready(function(){
      jQuery(".owl-theme-01__item").matchHeight();
      });', 'inline');

  $full_path_to_theme = base_path() . path_to_theme();

  $_meta_shortcut_icon = array(
    '#tag' => 'link',
    '#attributes' => array(
      'href' => $full_path_to_theme . '/favicon.ico',
      'rel' => 'shortcut icon',
      'type' => 'image/vnd.microsoft.icon'
    ),
  );
  drupal_add_html_head($_meta_shortcut_icon, 'my_meta_shortcut_icon');

  $_meta_apple_web_app_capable = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'apple-mobile-web-app-capable',
      'content' => 'yes',
    ),
  );
  drupal_add_html_head($_meta_apple_web_app_capable, 'my_meta_apple_web_app_capable');

  $_meta_mobile_web_app_capable = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'mobile-web-app-capable',
      'content' => 'yes',
    ),
  );
  drupal_add_html_head($_meta_mobile_web_app_capable, 'my_meta_mobile_web_app_capable');

  /**
   * Add default icon
   */
  $apple_icon = array(

    '#tag' => 'link',
    '#attributes' => array(
      'href' => $full_path_to_theme . '/favicons/apple-touch-icon.png',
      'rel' => 'apple-touch-icon',
    ),
  );

  drupal_add_html_head($apple_icon, 'apple-touch-icon');

  /**
   * Loop through to add various sizes
   */
  $apple_icon_sizes = array(57, 60, 72, 76, 114, 120, 144, 152, 180);

  foreach ($apple_icon_sizes as $size) {
    $apple = array(
      '#tag' => 'link',
      '#attributes' => array(
        'href' => $full_path_to_theme . '/favicons/apple-touch-icon-' . $size . 'x' . $size . '.png',
        'rel' => 'apple-touch-icon',
        'sizes' => $size . 'x' . $size,
      ),
    );
    drupal_add_html_head($apple, 'apple-touch-icon-' . $size);
  }


  $favicon_32 = array(

    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'icon',
      'sizes' => '32x32',
      'type' => 'image/png',
      'href' => $full_path_to_theme . '/favicons/favicon-32x32.png',
    ),

  );
  drupal_add_html_head($favicon_32, 'favicon-32x32');


  $favicon_16 = array(

    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'icon',
      'sizes' => '16x16',
      'type' => 'image/png',
      'href' => $full_path_to_theme . '/favicons/favicon-16x16.png',
    ),

  );
  drupal_add_html_head($favicon_16, 'favicon-16x16');


  $favicon_android_chrome = array(

    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'icon',
      'sizes' => '192x192',
      'type' => 'image/png',
      'href' => $full_path_to_theme . '/favicons/android-chrome-192x192.png',
    ),

  );
  drupal_add_html_head($favicon_android_chrome, 'favicon-16x16');


  $manifest = array(

    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'manifest',
      'href' => $full_path_to_theme . '/favicons/manifest.json',
    ),
  );
  drupal_add_html_head($manifest, 'manifest');


  $safari_pinned_tab = array(

    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'mask-icon',
      'color' => '#74b238',
      'href' => $full_path_to_theme . '/favicons/safari-pinned-tab.svg',
    ),
  );
  drupal_add_html_head($safari_pinned_tab, 'safari-pinned-tab');

}


function edidaktikum_theme_bs3_menu_tree__ed_dashboard_menu($variables)
{
  return '<div class="container"><div class="list-group tabs">' . $variables['tree'] . '</div></div> ';
}

function edidaktikum_theme_bs3_menu_tree__primary($variables)
{


  return '<ul class="main-nav__list">' . $variables['tree'] . '</ul>';

}

function edidaktikum_theme_bs3_menu_tree__secondary($variables)
{


  return $variables['tree'];

}

function edidaktikum_theme_bs3_pager($variables)
{
  $output = "";
  $items = array();
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];

  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // Current is the page we are currently paged to.
  $pager_current = $pager_page_array[$element] + 1;
  // First is the first page listed by this pager piece (re quantity).
  $pager_first = $pager_current - $pager_middle + 1;
  // Last is the last page listed by this pager piece (re quantity).
  $pager_last = $pager_current + $quantity - $pager_middle;
  // Max is the maximum page number.
  $pager_max = $pager_total[$element];

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }

  // End of generation loop preparation.
  $li_first = theme('pager_first', array(
    'text' => (isset($tags[0]) ? $tags[0] : t('first')),
    'element' => $element,
    'parameters' => $parameters,
  ));
  $li_previous = theme('pager_previous', array(
    'text' => (isset($tags[1]) ? $tags[1] : t('previous')),
    'element' => $element,
    'interval' => 1,
    'parameters' => $parameters,
  ));
  $li_next = theme('pager_next', array(
    'text' => (isset($tags[3]) ? $tags[3] : t('next')),
    'element' => $element,
    'interval' => 1,
    'parameters' => $parameters,
  ));
  $li_last = theme('pager_last', array(
    'text' => (isset($tags[4]) ? $tags[4] : t('last')),
    'element' => $element,
    'parameters' => $parameters,
  ));
  if ($pager_total[$element] > 1) {

    // Only show "first" link if set on components' theme setting
    if ($li_first && bootstrap_setting('pager_first_and_last')) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('prev'),
        'data' => $li_previous,
      );
    }
    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis', 'disabled'),
          'data' => '<span>…</span>',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            // 'class' => array('pager-item'),
            'data' => theme('pager_previous', array(
              'text' => $i,
              'element' => $element,
              'interval' => ($pager_current - $i),
              'parameters' => $parameters,
            )),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            // Add the active class.
            'class' => array('active'),
            'data' => "<a href='#'><span>$i</span></a>",
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'data' => theme('pager_next', array(
              'text' => $i,
              'element' => $element,
              'interval' => ($i - $pager_current),
              'parameters' => $parameters,
            )),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis', 'disabled'),
          'data' => '<span>…</span>',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('next'),
        'data' => $li_next,
      );
    }
    // // Only show "last" link if set on components' theme setting
    if ($li_last && bootstrap_setting('pager_first_and_last')) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }

    $build = array(
      '#theme_wrappers' => array('container__pager'),
      '#attributes' => array(
        'class' => array(
          'text-center',
        ),
      ),
      'pager' => array(
        '#theme' => 'item_list',
        '#items' => $items,
        '#attributes' => array(
          'class' => array('pagination-list'),
        ),
      ),
    );
    return drupal_render($build);
  }
  return $output;
}


/**
 * Implements theme_menu_link()
 */
function edidaktikum_theme_bs3_menu_link(array $variables)
{

  $element = $variables['element'];

  if (user_is_logged_in() && $element['#original_link']['menu_name'] == 'main-menu' && $element['#href'] == 'clusters') {
    $element['#href'] = 'clusters/mygroups';
  }

  if ($element['#original_link']['menu_name'] == 'user-menu') {

    if ($element['#href'] == 'faq') {
      $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'faq'))));
    } else if ($element['#href'] == 'user') {
      $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'user'))));
    } else if ($element['#href'] == 'user/logout') {
      $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'logout'))));
    } else if ($element['#href'] == 'user/login') {
      $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'login'))));
    } else if ($element['#href'] == 'privacy') {
      $output = l($element['#title'], $element['#href'], array('attributes' => array('class' => array('contact-block-01__email', 'privacy'))));
    }

    return $output;

  } elseif ($element['#original_link']['menu_name'] == 'ed-dashboard-menu') {

    $element['#localized_options']['attributes'] = array('class' => array('list-group-item'));
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    return $output;
  } else {

    $sub_menu = '';

    if ($element['#below']) {
      $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
  }
}


function get_current_search_terms()
{
// only do this once per request
  static $return;
  if (!isset($return)) {
    // extract keys from path
    $path = explode('/', $_GET['q'], 3);
    // only if the path is search (if you have a different search url, please modify)
    if (count($path) == 3 && $path[0] == "search") {
      $return = $path[2];
    } else {
      $keys = empty($_REQUEST['keys']) ? '' : $_REQUEST['keys'];
      $return = $keys;
    }
  }
  return $return;
}

/**
 * Implements hook_preprocess_page().
 */
function edidaktikum_theme_bs3_preprocess_page(&$vars)
{

  $page = $vars['page'];
  $vars['navbar_languages'] = FALSE;
  if (module_exists('locale')) {
    $languages_block = module_invoke('locale', 'block_view', 'language');
    $vars['navbar_languages'] = $languages_block['content'];
  }


  $system_languages = locale_language_list();

  $other_languages = array();

  foreach ($system_languages as $key => $system_language) {
    if ($vars['language']->language != $key) {
      if (!in_array([$key => $system_language], $other_languages)) {
        array_push($other_languages, ['name' => $key, 'value' => $system_language]);
      }

    }
  }

  $vars['other_languages'] = $other_languages;


  //With detailed search
  //$search_form = drupal_get_form('search_form', NULL, get_current_search_terms(), 'node');

  $search_form = drupal_get_form('search_form', NULL, get_current_search_terms());
  $search_box = drupal_render($search_form);


  $vars['search_box'] = $search_box;


  // Breadcrumbs are not displayed
//	$vars['breadcrumb'] = FALSE;


  $site_frontpage = variable_get('site_frontpage', 'node');

  $vars['site_frontpage'] = $site_frontpage;


  $contacts_text = variable_get('ed_contact_page_contacts_text', '');
  if (is_array($contacts_text)) {
    $contacts_text = check_markup($contacts_text['value'], $contacts_text['format']);
  }

  $vars['contacts_text'] = $contacts_text;


  $logos_text = variable_get('ed_contact_page_logos_text', '');
  if (is_array($logos_text)) {
    $logos_text = check_markup($logos_text['value'], $logos_text['format']);
  }


  if (drupal_is_front_page()) {
    $vars['logos_text'] = $logos_text;


    $vars['students_count'] = get_student_qt();

    $vars['teachers_count'] = get_teacher_qt();

    $vars['groups_count'] = get_cluster_qt();

    $vars['res_count'] = get_lr_qt();

    $vars['tasks_count'] = get_task_qt();


    $vars['what_text'] = variable_get('ed_home_page_what_text') ? variable_get('ed_home_page_what_text') : 'No text found';

    $vars['dashboard_text'] = variable_get('ed_home_page_dashboard_text') ? variable_get('ed_home_page_dashboard_text') : 'No text found';

    $vars['groups_text'] = variable_get('ed_home_page_groups_text') ? variable_get('ed_home_page_groups_text') : 'No text found';

    $vars['collections_text'] = variable_get('ed_home_page_collections_text') ? variable_get('ed_home_page_collections_text') : 'No text found';

  }


}


/*
 *  Form alter to add missing bootstrap classes and role to search form.
 */

function edidaktikum_theme_bs3_form_alter(&$form, &$form_state, $form_id)
{
  if ($form_id == 'search_form') {
    $form['#attributes']['class'] = 'search-block__form';
  }
}


function edidaktikum_theme_bs3_breadcrumb(array $variables)
{
  // Use the Path Breadcrumbs theme function if it should be used instead.
  if (_bootstrap_use_path_breadcrumbs()) {
    return path_breadcrumbs_breadcrumb($variables);
  }

  $output = '';
  $breadcrumb = $variables['breadcrumb'];

  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = bootstrap_setting('breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    $build = array(
      '#theme' => 'item_list__breadcrumb',
      '#attributes' => array(
        'class' => array('breadcrumbs'),
      ),
      '#items' => $breadcrumb,
      '#type' => 'ul',
    );
    $output = drupal_render($build);
  }
  return $output;
}


function edidaktikum_theme_bs3_bootstrap_search_form_wrapper($variables)
{


  $output = $variables['element']['#children'];

  return $output;
}


function get_student_qt()
{
  $query = db_select('users', 'u');
  $query->leftJoin('users_roles', 'ur', 'ur.uid = u.uid');
  $query->leftJoin('role', 'r', 'r.rid = ur.rid');
  $query->fields('u', array('uid'))
    ->condition('u.uid', 0, '!=')
    ->isNull('r.name');

  return $query->countQuery()->execute()->fetchField();
}

function get_teacher_qt()
{
  $query = db_select('users', 'u');
  $query->join('users_roles', 'ur', 'ur.uid = u.uid');
  $query->join('role', 'r', 'r.rid = ur.rid');
  $query->condition('r.name', 'teacher');
  $query->fields('u', array('uid'));

  return $query->countQuery()->execute()->fetchField();
}

function get_task_qt()
{
  $query = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->condition('type', 'ed_task');

  return $query->countQuery()->execute()->fetchField();
}

function get_lr_qt()
{
  $query = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->condition('type', 'ed_learning_resource');

  return $query->countQuery()->execute()->fetchField();
}

function get_cluster_qt()
{
  $query = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->condition('type', 'ed_cluster');

  return $query->countQuery()->execute()->fetchField();
}

function edidaktikum_theme_bs3_menu_link_alter(&$link)
{

  if ($link['link_path'] == 'contact') {
    $link['hidden'] = 1;
  }
}


/**
 * Implements template_preprocess_search_result().
 */
function edidaktikum_theme_bs3_preprocess_search_result(&$variables)
{
  if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
    global $pager_limits;
    $variables['attributes_array']['value'] = ((int)$_GET['page'] * $pager_limits[0]) + $variables['id'];
  }
}


function edidaktikum_theme_bs3_preprocess_field(&$variables)
{
  if ($variables['element']['#field_name'] == 'ed_field_category' || $variables['element']['#field_name'] == 'ed_field_competence') {
    $variables['classes_array'][] = 'categories-list';
  }
}

function edidaktikum_theme_bs3_textarea($variables)
{
  $element = $variables ['element'];
  element_set_attributes($element, array('id', 'name', 'cols', 'rows'));
  _form_set_class($element, array('form-textarea'));

  $wrapper_attributes = array(
    'class' => array('form-textarea-wrapper'),
  );

  $output = '<div' . drupal_attributes($wrapper_attributes) . '>';
  $output .= '<textarea' . drupal_attributes($element ['#attributes']) . '>' . check_plain($element ['#value']) . '</textarea>';
  $output .= '</div>';
  return $output;
}

function edidaktikum_theme_bs3_form_comment_form_alter(&$form, &$form_state)
{


  $form['comment_body'][LANGUAGE_NONE][0]['#attributes']['class'][] = 'reply-form__message';
  $form['subject']['#access'] = false;
  $form['subject']['#attributes']['class'][] = 'reply-form__topic';


}


function edidaktikum_theme_bs3_menu_local_tasks(&$variables)
{

  $output = '';

  if (!empty($variables['primary'])) {
    $node = menu_get_object();
    $isGroup = ($node && isset($node->type) && $node->type === 'ed_cluster');
    if (!$node) {
      // A special case for 'node/%/group' as the router does not have load the
      // node for this view as the loading function is not defined for it.
      if (drupal_match_path(menu_get_item()['path'], 'node/%/group')) {
        $isGroup = true;
      }
    }

    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= $isGroup ? '<div class="list-group tabs group-nav">' : '<div class="list-group tabs">';
    $variables['primary']['#suffix'] = '</div>';

    //This is user profile menu
    if (user_is_logged_in() && drupal_match_path($variables['primary'][0]['#link']['path'], 'user/*')) {
      $variables['primary']['#prefix'] = '<div class="tabbable tabs-left" id="user-profile-tabs"><ul class="nav nav-tabs">';
      $variables['primary']['#suffix'] = '</ul>';
    }
    $output .= drupal_render($variables['primary']);


  }

  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs--secondary pagination pagination-sm">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }


  return $output;
}


function edidaktikum_theme_bs3_menu_local_task(&$variables)
{

  $link = $variables['element']['#link'];
  $link_text = $link['title'];
  $link['localized_options']['html'] = TRUE;

  $pattern = '/\((\d+)\)$/i';
  $replacement = '<span class="badge top-right">$1</span>';
  // Replace (NUMBER) at the end of the $link_text with badge HTML
  $link_text = preg_replace($pattern, $replacement, $link_text);

  if (!empty($variables['element']['#active'])) {

    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }


    // Replace (NUMBER) at the end of the $link_text with badge HTML
    $link_text = t('!local-task-title!active', array(
      '!local-task-title' => preg_replace($pattern, $replacement, $link['title']),
      '!active' => $active,
    ));
  }


  if (user_is_logged_in() && drupal_match_path($link['path'], 'user/*')) {

    if (drupal_match_path($link['path'], 'user/%/view')) {
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-user fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";
    } elseif (drupal_match_path($link['path'], 'user/%/edit')) {
      $link['localized_options']['attributes'] = array('class' => array('user-block', 'edit'));
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-pencil fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";

    } elseif (drupal_match_path($link['path'], 'user/%/hybridauth')) {
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-key fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";
    } elseif (drupal_match_path($link['path'], 'user/%/groups')) {
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-users fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";
    } elseif (drupal_match_path($link['path'], 'user/%/scheduler')) {
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-clock-o fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";
    } elseif (drupal_match_path($link['path'], 'user/%/devel')) {
      return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l('<span class="fa-stack fa-2x"><i class="fa fa-circle fa-stack-2x icon-background"></i><i class="fa fa-cog fa-stack-1x stack-icon"></i></span>' . $link_text, $link['href'], $link['localized_options']) . "</li>\n";
    }

    return '<li' . (!empty($variables['element']['#active']) ? ' class="active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";

  }

  $link['localized_options']['attributes'] = array('class' => array('list-group-item'));

  if (drupal_match_path($link['path'], implode("\n", ['node/%/track', 'node/%/bookmark', 'node/%/forum', 'node/%/event', 'node/%/pages', 'node/%/subgroups', 'node/%/devel', 'node/%/blog', 'node/%/q_portfolio', 'clusters/add/*']))) {
    $link['localized_options']['attributes']['data-move-to-dropdown'] = 'true';
  }

  if (drupal_match_path($link['path'], implode("\n", ['clusters/add/*']))) {
    $link['localized_options']['attributes']['data-dropdown-text-add-new'] = 'true';
  }

  return l($link_text, $link['href'], $link['localized_options']);
}


function edidaktikum_theme_bs3_preprocess_user_picture(&$variables)
{
  $variables['user_picture'] = '';
  if (variable_get('user_pictures', 0)) {
    $account = $variables['account'];
    if (!empty($account->picture)) {
      // @TODO: Ideally this function would only be passed file objects, but
      // since there's a lot of legacy code that JOINs the {users} table to
      // {node} or {comments} and passes the results into this function if we
      // a numeric value in the picture field we'll assume it's a file id
      // and load it for them. Once we've got user_load_multiple() and
      // comment_load_multiple() functions the user module will be able to load
      // the picture files in mass during the object's load process.
      if (is_numeric($account->picture)) {
        $account->picture = file_load($account->picture);
      }
      if (!empty($account->picture->uri)) {
        $filepath = $account->picture->uri;
      }
    } elseif (variable_get('user_picture_default', '')) {
      $filepath = variable_get('user_picture_default', '');
    }
    if (isset($filepath)) {
      $alt = t("@user's picture", array('@user' => format_username($account)));
      // If the image does not have a valid Drupal scheme (for eg. HTTP),
      // don't load image styles.
      if (module_exists('image') && file_valid_uri($filepath) && $style = variable_get('user_picture_style', '')) {
        $variables['user_picture'] = theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt));
      } else {
        $variables['user_picture'] = theme('image', array('path' => $filepath, 'alt' => $alt, 'title' => $alt));
      }
      if (!empty($account->uid) && user_access('access user profiles')) {
        $attributes = array('attributes' => array('title' => t('View user profile.')), 'html' => TRUE);
        $variables['user_picture'] = array('filepath' => $filepath, 'uid' => $account->uid);
      }
    }
  }
}


function edidaktikum_theme_bs3_preprocess_hybridauth_provider_icon(&$vars, $hook)
{

  $icon_pack_classes = array(
    'hybridauth-icon',
    drupal_html_class($vars['provider_id']),
    drupal_html_class('hybridauth-icon-' . $vars['icon_pack']),
    drupal_html_class('hybridauth-' . $vars['provider_id']),
    drupal_html_class('hybridauth-' . $vars['provider_id'] . '-' . $vars['icon_pack']),
  );

  ctools_include('plugins');
  // Icon pack modifications.
  if ($function = ctools_plugin_load_function('hybridauth', 'icon_pack', $vars['icon_pack'], 'icon_classes_callback')) {
    $function($icon_pack_classes, $vars['provider_id']);
  }
  // Provider modifications.
  if ($provider = hybridauth_get_provider($vars['provider_id'])) {
    if ($function = ctools_plugin_get_function($provider, 'icon_classes_callback')) {
      $function($icon_pack_classes);
    }
  }

  $vars['icon_pack_classes'] = implode(' ', $icon_pack_classes);
}
