<?php
/**
 * @file
 * odaa_forum.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function odaa_forum_user_default_permissions() {
  $permissions = array();

  // Exported permission: access comments.
  $permissions['access comments'] = array(
    'name' => 'access comments',
    'roles' => array(
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: administer advanced forum.
  $permissions['administer advanced forum'] = array(
    'name' => 'administer advanced forum',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'advanced_forum',
  );

  // Exported permission: administer comments.
  $permissions['administer comments'] = array(
    'name' => 'administer comments',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'comment',
  );

  // Exported permission: administer messaging.
  $permissions['administer messaging'] = array(
    'name' => 'administer messaging',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'messaging',
  );

  // Exported permission: administer notifications.
  $permissions['administer notifications'] = array(
    'name' => 'administer notifications',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'notifications',
  );

  // Exported permission: create forum content.
  $permissions['create forum content'] = array(
    'name' => 'create forum content',
    'roles' => array(
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: create subscriptions.
  $permissions['create subscriptions'] = array(
    'name' => 'create subscriptions',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'notifications',
  );

  // Exported permission: delete any forum content.
  $permissions['delete any forum content'] = array(
    'name' => 'delete any forum content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: delete own forum content.
  $permissions['delete own forum content'] = array(
    'name' => 'delete own forum content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: delete terms in 2.
  $permissions['delete terms in 2'] = array(
    'name' => 'delete terms in 2',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: edit any forum content.
  $permissions['edit any forum content'] = array(
    'name' => 'edit any forum content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'node',
  );

  // Exported permission: edit own comments.
  $permissions['edit own comments'] = array(
    'name' => 'edit own comments',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'comment',
  );

  // Exported permission: edit own forum content.
  $permissions['edit own forum content'] = array(
    'name' => 'edit own forum content',
    'roles' => array(
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'node',
  );

  // Exported permission: edit terms in 2.
  $permissions['edit terms in 2'] = array(
    'name' => 'edit terms in 2',
    'roles' => array(),
    'module' => 'taxonomy',
  );

  // Exported permission: maintain own subscriptions.
  $permissions['maintain own subscriptions'] = array(
    'name' => 'maintain own subscriptions',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'notifications',
  );

  // Exported permission: manage all subscriptions.
  $permissions['manage all subscriptions'] = array(
    'name' => 'manage all subscriptions',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'notifications',
  );

  // Exported permission: post comments.
  $permissions['post comments'] = array(
    'name' => 'post comments',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: skip comment approval.
  $permissions['skip comment approval'] = array(
    'name' => 'skip comment approval',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'comment',
  );

  // Exported permission: skip notifications.
  $permissions['skip notifications'] = array(
    'name' => 'skip notifications',
    'roles' => array(
      'administrator' => 'administrator',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'notifications',
  );

  // Exported permission: subscribe to content.
  $permissions['subscribe to content'] = array(
    'name' => 'subscribe to content',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'notifications_content',
  );

  // Exported permission: subscribe to content type.
  $permissions['subscribe to content type'] = array(
    'name' => 'subscribe to content type',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'notifications_content',
  );

  // Exported permission: view forum statistics.
  $permissions['view forum statistics'] = array(
    'name' => 'view forum statistics',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'advanced_forum',
  );

  // Exported permission: view last edited notice.
  $permissions['view last edited notice'] = array(
    'name' => 'view last edited notice',
    'roles' => array(
      'administrator' => 'administrator',
    ),
    'module' => 'advanced_forum',
  );

  return $permissions;
}
