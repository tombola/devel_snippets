<?php // generate features permissions code for all permissions for just one role

$single_role = 'research management';
$specified_roles = array(
  'research management',
  'research coordinator',
  'research curator',
  'research director',
  );

$roles = array_flip(user_roles());
$role_permissions = user_role_permissions(array($roles['research management'] => 'research management'));

$role_permissions = array_shift($role_permissions);
$permission_modules = user_permission_get_modules();

dpm($roles);
dpm($permission_modules);
dpm($role_permissions);

$module_output = '';
$info_output = '';

foreach($role_permissions as $permission => $value) {
$module = $permission_modules[$permission];
$module_output .= "
\$permissions['$permission'] = array(
    'name' => '$permission',
    'roles' => array(\n";
      foreach ($specified_roles as $key => $role) {
        $module_output .= "$key => '$role',\n";
      };
      $module_output .=
      
    "),
    'module' => '$module',
  );
\n";
$info_output .= "features[user_permission][] = $permission \n";
}

dpm('// Put this code in feature .module file');
dpm($module_output);

dpm('// Put this code in feature .info file');
dpm($info_output);