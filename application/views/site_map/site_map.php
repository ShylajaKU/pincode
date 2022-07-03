<?php





$source_table_name = 'all_india_po_list';
$select = array('sl_no','Related_Suboffice');
$source_ordered_by = 'Related_Suboffice';
$source_asc_or_desc = 'asc';
$array_lenth = 5000;
$col_name_of_value_to_get = 'Related_Suboffice';

$destination_table_name = 'suboffice_list';
$unique_no_col_name = 'suboffice_id';
$col_name_of_value_to_add = 'suboffice_name';
$slug_col_name = 'suboffice_name_slug';



$this->table_model->get_a_single_column_and_add_unique_values_to_another_table_fm(
    $source_table_name,
    $select,
    $source_ordered_by,$source_asc_or_desc, 
    $array_lenth, 
    $col_name_of_value_to_get,
    $destination_table_name,
    $unique_no_col_name,
    $col_name_of_value_to_add,
    $slug_col_name
);