<?php

// We need functions
require_once(drupal_get_path('theme', 'odaa') . '/inc/functions.inc');

/*
 * Implements form_system_theme_settings_alter().
 */
function odaa_form_system_theme_settings_alter(&$form, $form_state) {
  $path_to_at_core = drupal_get_path('theme', 'odaa');

  // Get the ddbasic name, we need it at some stage.
  $theme_name = $form_state['build_info']['args'][0];  
  
  // Unset CSS
  $form['odaa-settings']['cssexcludes'] = array(
  '#type' => 'fieldset',
  '#title' => t('Unset CSS'),
  '#collapsible' => TRUE,
  '#collapsed' => FALSE,
  '#weight' => -9,
  );

  $form['odaa-settings']['cssexcludes']['enable_exclude_css'] = array(
    '#type' => 'checkbox',
    '#title' => t('Unset CSS Files'),
    '#description' => t('Options to unset (exclude) CSS files from loading in your theme - includes settings for Core modules, CSS added by Libaries and your own declared exclusions (see your themes info file under "Stylesheets").'),
    '#default_value' => theme_get_setting('enable_exclude_css'),
  );

  // Exclude CSS
  $enable_exclude_css = isset($form_state['values']['enable_exclude_css']);
  if (($enable_exclude_css && $form_state['values']['enable_exclude_css'] == 1) || (!$enable_exclude_css && $form['odaa-settings']['cssexcludes']['enable_exclude_css']['#default_value'] == 1)) {
    require_once($path_to_at_core . '/inc/settings.cssexclude.inc');
  }
}
