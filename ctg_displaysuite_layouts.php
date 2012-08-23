<?

$content_type_group = 'repo_deposit';

//============================================

$content_type_group = new ContentTypeGroup($content_type_group);
$ctg = array_flip($content_type_group->typeList());
dpm($ctg);

foreach($ctg as $name => $machine_name) {
  // set title pattern
  $output .= '

  $ds_layout = new stdClass();
  $ds_layout->api_version = 1;
  $ds_layout->id = \'node|'. $machine_name .'|form\';
  $ds_layout->entity_type = \'node\';
  $ds_layout->bundle = \''. $machine_name .'\';
  $ds_layout->view_mode = \'form\';
  $ds_layout->layout = \'ds_2col_stacked_fluid\';
  $ds_layout->settings = array(
    \'regions\' => array(
      \'header\' => array(
        0 => \'title\',
        1 => \'field_dc_title\',
        2 => \'field_dc_creator\',
        3 => \'field_dc_contributor\',
      ),
      \'left\' => array(
        4 => \'field_repo_resgroup\',
        5 => \'field_dc_date\',
        6 => \'field_dc_abstract\',
      ),
      \'right\' => array(
        7 => \'field_dc_language\',
        8 => \'flag\',
        9 => \'field_c4r_uoa\',
        10 => \'field_c4r_sensitive\',
        11 => \'field_c4r_interdisciplinary\',
        12 => \'field_repo_license\',
      ),
      \'footer\' => array(
        13 => \'field_repo_parent\',
      ),
      \'hidden\' => array(
        14 => \'_add_existing_field\',
      ),
    ),
    \'fields\' => array(
      \'title\' => \'header\',
      \'field_dc_title\' => \'header\',
      \'field_dc_creator\' => \'header\',
      \'field_dc_contributor\' => \'header\',
      \'field_repo_resgroup\' => \'left\',
      \'field_dc_date\' => \'left\',
      \'field_dc_abstract\' => \'left\',
      \'field_dc_language\' => \'right\',
      \'flag\' => \'right\',
      \'field_c4r_uoa\' => \'right\',
      \'field_c4r_sensitive\' => \'right\',
      \'field_c4r_interdisciplinary\' => \'right\',
      \'field_repo_license\' => \'right\',
      \'field_repo_parent\' => \'footer\',
      \'_add_existing_field\' => \'hidden\',
    ),
    \'classes\' => array(),
    \'wrappers\' => array(
      \'header\' => \'div\',
      \'left\' => \'div\',
      \'right\' => \'div\',
      \'footer\' => \'div\',
    ),
    \'layout_wrapper\' => \'div\',
    \'layout_attributes\' => \'\',
    \'layout_attributes_merge\' => 1,
  );
  $export[\'node|'. $machine_name .'|form\'] = $ds_layout;
  ';
  dpm($output);
}
