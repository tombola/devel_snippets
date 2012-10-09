<?

$content_type_group = 'repo_deposit';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);

$output = '';
foreach($ctg as $name => $machine_name) {
  // set title pattern
  ob_start();
  ?>

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|<TYPE_NAME>|default';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = '<TYPE_NAME>';
  $ds_layout->view_mode = 'default';
  $ds_layout->layout = 'ds_2col_stacked';
  $ds_layout->settings = array(
    'regions' => array(
      'left' => array(
        0 => 'field_dc_date',
        1 => 'field_repo_resgroup',
        2 => 'field_repo_parent',
        3 => 'field_repo_file',
        4 => 'field_dc_contributor',
        5 => 'field_dc_creator',
        6 => 'field_repo_license',
        7 => 'links',
        8 => 'field_c4r_uoa',
      ),
      'right' => array(
        9 => 'field_dc_title',
        10 => 'field_dc_abstract',
      ),
    ),
    'fields' => array(
      'field_dc_date' => 'left',
      'field_repo_resgroup' => 'left',
      'field_repo_parent' => 'left',
      'field_repo_file' => 'left',
      'field_dc_contributor' => 'left',
      'field_dc_creator' => 'left',
      'field_repo_license' => 'left',
      'links' => 'left',
      'field_c4r_uoa' => 'left',
      'field_dc_title' => 'right',
      'field_dc_abstract' => 'right',
    ),
    'classes' => array(),
    'wrappers' => array(
      'header' => 'div',
      'left' => 'div',
      'right' => 'div',
      'footer' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => 1,
  );
  $export['node|<TYPE_NAME>|default'] = $ds_layout;

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = 'node|<TYPE_NAME>|form';
  $ds_layout->entity_type = 'node';
  $ds_layout->bundle = '<TYPE_NAME>';
  $ds_layout->view_mode = 'form';
  $ds_layout->layout = 'ds_2col_stacked_fluid';
  $ds_layout->settings = array(
    'regions' => array(
      'header' => array(
        0 => 'title',
        1 => 'field_repo_file',
        2 => 'field_dc_title',
        3 => 'field_dc_contributor',
        4 => 'field_dc_creator',
      ),
      'left' => array(
        5 => 'field_repo_resgroup',
        6 => 'field_dc_date',
        7 => 'field_dc_abstract',
      ),
      'right' => array(
        8 => 'field_dc_language',
        9 => 'flag',
        10 => 'field_c4r_uoa',
        11 => 'field_c4r_sensitive',
        12 => 'field_c4r_interdisciplinary',
        13 => 'field_repo_license',
      ),
      'footer' => array(
        14 => 'field_repo_parent',
      ),
      'hidden' => array(
        15 => '_add_existing_field',
      ),
    ),
    'fields' => array(
      'title' => 'header',
      'field_repo_file' => 'header',
      'field_dc_title' => 'header',
      'field_dc_contributor' => 'header',
      'field_dc_creator' => 'header',
      'field_repo_resgroup' => 'left',
      'field_dc_date' => 'left',
      'field_dc_abstract' => 'left',
      'field_dc_language' => 'right',
      'flag' => 'right',
      'field_c4r_uoa' => 'right',
      'field_c4r_sensitive' => 'right',
      'field_c4r_interdisciplinary' => 'right',
      'field_repo_license' => 'right',
      'field_repo_parent' => 'footer',
      '_add_existing_field' => 'hidden',
    ),
    'classes' => array(),
    'wrappers' => array(
      'header' => 'div',
      'left' => 'div',
      'right' => 'div',
      'footer' => 'div',
    ),
    'layout_wrapper' => 'div',
    'layout_attributes' => '',
    'layout_attributes_merge' => 1,
  );
  $export['node|<TYPE_NAME>|form'] = $ds_layout;

  <?php
  $output .= str_replace('<TYPE_NAME>', $machine_name, ob_get_clean());
}
dpm($output);


$output3 = '';
foreach($ctg as $name => $machine_name) {
  // set title pattern
  $output3 .= 'features[ds_layout_settings][] = node|'. $machine_name ."|default\n";
  $output3 .= 'features[ds_layout_settings][] = node|'. $machine_name ."|form\n";
}
dpm($output3);
