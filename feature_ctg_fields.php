<?php

//apply display suite layouts across a set of content types

$content_type_group = 'repo_deposit';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);
$output = '';

foreach($ctg as $name => $machine_name) {
  // use feature code taken from template feature 
  // record output buffer so don't have to bother with escaping characters
  ob_start();
  ?>
// Exported field: 'node-<TYPE_NAME>-field_repo_file'.
  $fields['node-<TYPE_NAME>-field_repo_file'] = array(
    'field_config' => array(
      'active' => '1',
      'cardinality' => '1',
      'deleted' => '0',
      'entity_types' => array(),
      'field_name' => 'field_repo_file',
      'field_permissions' => array(
        'type' => '0',
      ),
      'foreign keys' => array(
        'fid' => array(
          'columns' => array(
            'fid' => 'fid',
          ),
          'table' => 'file_managed',
        ),
      ),
      'indexes' => array(
        'fid' => array(
          0 => 'fid',
        ),
      ),
      'locked' => '0',
      'module' => 'file',
      'settings' => array(
        'display_default' => 0,
        'display_field' => 0,
        'uri_scheme' => 'private',
      ),
      'translatable' => '0',
      'type' => 'file',
    ),
    'field_instance' => array(
      'bundle' => '<TYPE_NAME>',
      'deleted' => '0',
      'description' => '',
      'display' => array(
        'default' => array(
          'label' => 'above',
          'module' => 'file',
          'settings' => array(),
          'type' => 'file_default',
          'weight' => 17,
        ),
        'teaser' => array(
          'label' => 'above',
          'settings' => array(),
          'type' => 'hidden',
          'weight' => 0,
        ),
      ),
      'display_label' => '',
      'entity_type' => 'node',
      'fences_wrapper' => 'div',
      'field_name' => 'field_repo_file',
      'label' => 'File upload',
      'required' => 0,
      'settings' => array(
        'description_field' => 0,
        'file_directory' => 'deposits',
        'file_extensions' => 'txt pdf doc docx jpeg jpg tif tiff png psd ai mp3 xls odf m4a mpg mpeg aiff',
        'max_filesize' => '',
        'user_register_form' => FALSE,
      ),
      'widget' => array(
        'active' => 1,
        'module' => 'file',
        'settings' => array(
          'progress_indicator' => 'bar',
        ),
        'type' => 'file_generic',
        'weight' => '1',
      ),
    ),
  );

  <?php
  $output .= str_replace('<TYPE_NAME>', $machine_name, ob_get_clean());
}

dpm($output);
$output2 = '';

foreach($ctg as $name => $machine_name) {
  // set title pattern
  $output2 .= 'features[field][] = node-'. $machine_name .'-field_repo_file'."\n";
}

dpm($output2);
