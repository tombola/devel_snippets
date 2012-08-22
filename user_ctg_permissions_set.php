<?php // change all crud permissions for a content type group for specified roles

$specified_roles = array(
  'researcher',
);
/*
$specified_roles = array(
  'research curator',
  'research coordinator',
  'research director',
);
  */
$crud_permissions = array(
  'create' => TRUE,
  'edit own' => TRUE,
  'edit any' => FALSE,
  'delete own' => TRUE,
  'delete any' => FALSE,
  );
/*
$crud_permissions = array(
  'create' => FALSE,
  'edit own' => FALSE,
  'edit any' => FALSE,
  'delete own' => FALSE,
  'delete any' => FALSE,
  );
  */

$content_type_group = 'repo_deposit';

//============================================

$crud_regex = '((edit any|edit own|delete any|delete own|create) [a-z_]* content)';

foreach($specified_roles as $role) {
  $role = user_role_load_by_name($role);
  $roles[$role->name] = $role->rid;
}
$roles = array_flip($roles);
$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);

$permission_modules = user_permission_get_modules();

foreach ($roles as $rid => $role) {
  dpm($role);

  foreach($permission_modules as $permission => $module) {
    // is this a node permission?
    if ($module == 'node') {
      // is it a crud permission?
      if (preg_match($crud_regex, $permission)) {
        $words = explode(' ', trim($permission));
        if ($words[0] == 'create' && in_array($words[1], $ctg)) {
          $crud_op = 'create';
          $permissions[$permission] = $crud_permissions[$crud_op];
        } 
        elseif (in_array($words[2], $ctg)) {
          $crud_op = $words[0] .' '. $words[1];
          $permissions[$permission] = $crud_permissions[$crud_op];
        }
      }
    }
  }
  user_role_change_permissions($rid, $permissions);
}
dpm($permissions);
