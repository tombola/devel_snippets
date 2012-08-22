<?php // http://goo.gl/LYhFF

/*
 * change field instance info (eg weight) across a group of content types
 */

$content_type_group = 'repo_deposit';
$field = 'field_repo_url';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());

foreach($ctg as $name => $machine_name) {
  $type = $machine_name;

  node_types_rebuild();
  $node_type = node_type_get_type($type);  
  
  // change title of body field
  // node_add_body_field($node_type, 'Question');
  
  if($instance = field_read_instance('node', $field, $type)) {
    dpm($instance);
    $instance['widget']['weight'] = -10;
    //$instance['widget']['settings']['rows'] = 6;
  }
  field_update_instance($instance);
}
