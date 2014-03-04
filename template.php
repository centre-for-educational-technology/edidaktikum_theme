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

