<?

$content_type_group = 'repo_deposit';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);

foreach($ctg as $name => $machine_name) {
  // set title pattern
  variable_set('ant_pattern_'.$machine_name, '[node:field_dc_title]');
  // turn off/hide/on
  variable_set('ant_'.$machine_name, 1);
  variable_set('ant_php_'.$machine_name, 0);
}
