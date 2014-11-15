<?php

function img($filename, $alt_text) {
	echo '<img src="'.get_bloginfo('stylesheet_directory').'/img/'.$filename.'" alt="'.$alt_text.'" />';
}

function get_labels($singular, $plural = '') {
	if ($plural == '')	$plural = $singular.'s';

	return array(
		'name'                          => $plural,
		'singular_name'                 => $singular,
		'menu_name'						=> $plural,
		'all_items'                     => 'All '.$plural,
		'add_new'						=> 'Add New',
		'add_new_item'                  => 'Add New '. $singular,
		'edit_item'                     => 'Edit '. $singular,
		'new_item'		                => 'New '. $singular,
		'new_item_name'                 => 'New '. $singular,
		'view_item'						=> 'View '. $singular,
		'search_items'                  => 'Search '.$plural,
		'not_found'						=> 'No '. $plural . ' found',
		'not_found_in_trash'			=> 'No '. $plural . ' found in trash',
		'parent_item_colon'				=> 'Parent '. $singular,


		'update_item'                   => 'Update '.$singular,

		'parent_item'                   => 'Parent '.$singular,
		'popular_items'                 => 'Popular '.$plural,
		'separate_items_with_commas'    => 'Separate '.$plural.' with commas',
		'add_or_remove_items'           => 'Add or remove '.$plural,
		'choose_from_most_used'         => 'Choose from most used '.$plural,

    );
}

function ft_register_ajax($action, $public_function = null, $private_function = null) {
	if (is_null($public_function))	$public_function = 'ft_'.$action;
	if (is_null($private_function))	$private_function = $public_function;
	add_action('wp_ajax_'.$action, 			$private_function);
	add_action('wp_ajax_nopriv_'.$action,	$public_function);
}

function ft_nice_date($date) {
	$date = strtotime($date);
	switch ($date) {
		case ($date >= strtotime("today noon")) :	return 'This afternoon';
		case ($date >= strtotime("today")) : 		return 'This morning';
		case ($date >= strtotime("yesterday")) :	return 'Yesterday';
		case ($date >= strtotime("this week")) :	return 'This week';
		case ($date >= strtotime("last week")) :	return 'Last week';
		case ($date >= strtotime("this month")) :	return 'This month';
		
		default : 									return "A while ago";
	}
}