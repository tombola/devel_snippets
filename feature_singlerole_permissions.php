<?php // generate features permissions code for all permissions for just one role

$roles = array_flip(user_roles());
$role_permissions = user_role_permissions(array($roles['research management'] => 'research management'));

$role_permissions = array_shift($role_permissions);
$permission_modules = user_permission_get_modules();

dpm($roles);
dpm($permission_modules);
dpm($role_permissions);

$output = '';

foreach($role_permissions as $permission => $value) {
$module = $permission_modules[$permission];
$output .= "
\$permissions['$permission'] = array(
    'name' => '$permission',
    'roles' => array(
      0 => 'developer',
    ),
    'module' => '$module',
  );
\n";
}

dpm($output);