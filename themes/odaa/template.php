<?php
/**
 * @file
 * Preprocess and alter functions.
 */

global $theme_key, $path_to_odaa_core;
$theme_key = $GLOBALS['theme_key'];
$path_to_odaa_core = drupal_get_path('theme', 'odaa');

//Includes frequently used theme functions that gets theme info, css files etc.
include_once($path_to_odaa_core . '/inc/functions.inc');

/**
 * Implements theme_menu_tree().
 *
 * Addes wrapper clases for menus.
 */
function odaa_menu_tree__menu_block__1($vars) {
  return '<ul class="unstyled">' . $vars['tree'] . '</ul>';
}

function odaa_menu_tree__menu_block__2($vars) {
  return '<ul class="unstyled row-fluid">' . $vars['tree'] . '</ul>';
}

/**
 * Implements hook_css_alter().
 */
function odaa_css_alter(&$css) {
  global $theme_key;

  // Never allow this to run in our admin theme and only if the extension is enabled.
  if (theme_get_setting('enable_exclude_css') === 1) {

    // Get $css_data from the cache
    if ($cache = cache_get('odaa_get_css_files')) {
      $css_data = $cache->data;
    }
    else {
      $css_data = odaa_get_css_files($theme_key);
    }

    // We need the right theme name to get the theme settings
    $_get_active_theme_data = array_pop($css_data);
    if ($_get_active_theme_data['type'] == 'theme') {
      $theme_name = $_get_active_theme_data['source'];
    }
    else {
      $theme_name = $theme_key;
    }

    // Get the theme setting and unset files
    foreach ($css_data as $key => $value) {
      $setting = 'unset_css_' . drupal_html_class($key);
      if (theme_get_setting($setting, $theme_name) === 1) {
        if (isset($css[$key])) {
          unset($css[$key]);
        }
      }
    }
  }
}

function odaa_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary-tabs nav nav-tabs">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary-tabs nav nav-tabs">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}