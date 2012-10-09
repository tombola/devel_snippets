<?php

//apply display suite layouts across a set of content types

$content_type_group = 'repo_deposit';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);
$output = '';

foreach($ctg as $name => $machine_name) {
  // set title pattern
  // record output buffer so don't have to bother with escaping characters
  ob_start();
  ?>


  <?php
  $output .= str_replace('<TYPE_NAME>', $machine_name, ob_get_clean());
}

dpm($output);
$output2 = '';

foreach($ctg as $name => $machine_name) {
  // set title pattern
  $output2 .= 'features[ds_layout_settings][] = node|'. $machine_name .'|form
';
}

dpm($output2);
