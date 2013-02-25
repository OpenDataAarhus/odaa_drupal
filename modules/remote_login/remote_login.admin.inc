<?php
/**
 * @file
 *
 */

function remote_login_admin() {
  $form = array(
    '#tree' => TRUE,
  );

  $defaults = variable_get('remote_login', array());

  $form['remote_login']['uid'] = array(
    '#type' => 'textfield',
    '#title' => t('UID'),
    '#description' => t('CKAN UID for the administrator user.'),
    '#default_value' => isset($defaults['uid']) ? $defaults['uid'] : '',
  );

  $form['remote_login']['api_key'] = array(
    '#type' => 'textfield',
    '#title' => t('API Key'),
    '#description' => t('CKAN api-key that matches the UID given above.'),
    '#default_value' => isset($defaults['api_key']) ? $defaults['api_key'] : '',
  );

  if (isset($defaults['uid'])) {
    $form['remote_login']['sha'] = array(
      '#markup' => '<label>Generated SHA</label>' . _remote_login_token($defaults['uid'], $defaults['api_key']),
    );
  }

  $form['remote_login']['ips'] = array(
    '#type' => 'textfield',
    '#title' => t('Limit user create'),
    '#description' => t('Limit user create calls by IP addresses. Enter comma sperated list.'),
    '#default_value' => isset($defaults['ips']) ? $defaults['ips'] : '',
  );

  return system_settings_form($form);
}