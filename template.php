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

