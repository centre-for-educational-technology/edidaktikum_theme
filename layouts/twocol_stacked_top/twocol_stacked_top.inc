<?php

// Plugin definition
$plugin = array(
  'title' => t('Two column stacked top only'),
  'category' => t('Columns: 2'),
  'icon' => 'twocol_stacked_top.png',
  'theme' => 'twocol_stacked_top',
  'css' => 'twocol_stacked_top.css',
  'regions' => array(
    'top' => t('Top'),
    'left' => t('Left side'),
    'right' => t('Right side'),
    'bottom' => t('Bottom')
  ),
);
