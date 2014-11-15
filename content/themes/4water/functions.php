<?php

include('fields.php');
include('MCAPI.class.php');
$MCAPI = new MCAPI('d679fdb60f02797dc3f1e8128a256ef9-us7');
define('MC_LIST_ID', 'fbca389038');

add_action('init', 'ft_theme_init');

if (!function_exists('ft_theme_init')) :
	function ft_theme_init() {
		ft_register_data_structures();
//		ft_register_image_sizes();
		ft_register_ajax('contact_us');
		ft_register_ajax('subscribe');
	}
endif;
//ft_register_image_sizes();
add_action('after_setup_theme', 'ft_register_image_sizes');

if (function_exists('register_options_page')) {
	register_options_page('General');
	register_options_page('Header');
	register_options_page('Footer');
}

function ft_register_data_structures() {
	if (is_root_site()) :
		register_post_type('product', array(
			'labels'		=> get_labels('Product'),
			'supports'		=> array('title', 'editor', 'thumbnail'),
			'has_archive'	=> true,
			'hierarchical'	=> false,
			'rewrite'		=> array('slug' => 'shop', 'with_front' => true),
			'public'		=> true
		));
	endif;
	if (is_project_site()) :
		register_post_type('tutorial', array(
			'labels'		=> get_labels('Tutorial'),
			'supports'		=> array('title', 'editor', 'thumbnail'),
			'has_archive'	=> true,
			'hierarchical'	=> false,
			'rewrite'		=> array('slug' => 'tutorials'),
			'public'		=> true
		));
		register_post_type('faq', array(
			'labels'		=> get_labels('FAQ'),
			'supports'		=> array('title', 'editor', 'thumbnail'),
			'has_archive'	=> true,
			'hierarchical'	=> false,
			'rewrite'		=> array('slug' => 'faqs', 'with_front' => true),
			'public'		=> true
		));

		register_taxonomy('level', array('tutorial'), array(
			'labels' 		=> get_labels('Level'),
			'hierarchical' 	=> true,
			'rewrite' 		=> array('slug' => 'tutorials/levels', 'with_front' => true, 'hierarchical'=>true)
		));
		add_rewrite_rule('tutorials/levels/(.+?)/?$','index.php?level=$matches[1]','top');
		
		register_taxonomy('tutorial_tag', array('tutorial'), array(
			'labels' 		=> get_labels('Tag'),
			'hierarchical' 	=> true,
			'rewrite' 		=> array('slug' => 'tutorials/tags','with_front' => true, 'hierarchical'=>true)
		));
		add_rewrite_rule('tutorials/tags/(.+?)/?$','index.php?tutorial_tag=$matches[1]','top');
		

	endif;
}

function ft_register_image_sizes() {
	add_theme_support( 'post-thumbnails' );
	add_image_size('hero', 990, 430, true);
	/*
		So if the image is bigger than 990, crop down to 990
		But if the height is bigger that 430, keep shrinking until you hit 430, cropping off the width
	*/
	add_image_size('blog', 633, 225, true);
	add_image_size('column', 306, 180, true);
}

function is_post_type($post) {
	return get_post_type() == $post;
}

function additional_active_item_classes($classes = array(), $menu_item = false){
    global $wp_query, $switched;

    // if the menu item is the News/Blog menu item, but we're not on the posts page or a single post page, remove the 'active' class
    if (($menu_item->title == 'News' || $menu_item->title == 'Blog') && (!is_home() && !is_single() && !is_post_type('post'))) {
    	$classes = array_diff($classes, array("active"));
    }

    // if the menu item is home, but the blog has been switched and it is the front page, remove the 'active' class
    if ($switched && is_front_page() && $menu_item->title == 'Home') {
    	$classes = array_diff($classes, array("active"));	
    }

    if ($switched && is_home() && $menu_item->title == 'Blog') {
    	$classes = array_diff($classes, array("active"));	
    }

    // if the blog has been switched, and the menu item is 'Cities', then we want to show it, so add the 'active' class
    if ($switched && $menu_item->title == 'Cities') {
    	$classes[] = 'active';
    }

    // if on a project site and switched, then ultimately we're on a city site.  So switch to that city site to get it's path, and if the current menu item's url matches, then add the 'active' class
    if (is_project_site() && $switched) {
    	$current_site = $GLOBALS['blog_id'];
    	restore_current_blog();
    	if (!is_root_site()) :
	    	$child_blog_path = ft_get_blog_path($GLOBALS['blog_id']);
	    	if ($menu_item->url == $child_blog_path) {
		    	$classes[] = 'active';
		    }
		endif;
		switch_to_blog($current_site);
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'additional_active_item_classes', 20, 2);

function ft_get_blog_path($blog_id) {
	global $wpdb;
	$sql = "SELECT path FROM $wpdb->blogs WHERE blog_id = ".$blog_id;
	return $wpdb->get_var($sql);
}

function ft_contact_us() {

}

function ft_subscribe() {
//	if (!wp_verify_nonce( $_REQUEST['nonce'], "subscribe_nonce")) {
//		$response = array(
//			'errors' => array(
//				'message' => "Nonce check failed"
//			)
//		);
//	} else {}
		$fullname = 	$_REQUEST["fullname"];
		$email =		$_REQUEST["email"];
		$interest = 	$_REQUEST["interest"];

		$response = array(
			'errors' => array()
		);

		$response = subscribe($fullname, $email, $interest, $response);
//	}

	if($_REQUEST['action'] != '') {
		echo json_encode($response);
	} else {
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}
	die();
}
function subscribe($fullname, $email, $interest_group, $response) {

	// trim edge and double spaces
	$fullname = trim(str_replace('  ', ' ', $fullname));
	$names = explode(' ', $fullname);
	$fname = array_shift($names);
	$lname = implode(' ', $names);

	$merge_vars = array(
		'GROUPINGS' => array(
			array(
				'name'		=> 'Projects/Cities',
				'groups'	=> $interest_group
			)
		),
		'FNAME' => $fname,
		'LNAME' => $lname
	);
	$email_type = 'html';
	$double_optin=true;
	$update_existing=true;
	$replace_interests=false;
	$send_welcome=true;

	$GLOBALS['MCAPI']->listInterestGroupAdd(MC_LIST_ID, $interest_group);

	$subscribed = $GLOBALS['MCAPI']->listSubscribe(MC_LIST_ID, $email, $merge_vars, $email_type, $double_optin, $update_existing, $replace_interests, $send_Welcome);

	if (!subscribed) {
		$response['errors'][] = array(
			'message'		=> "It wasn't possible to subscribe you to our mailing list - please contact us.",
			'techMessage'	=> $MailChimp->errorMessage,
			'code'			=> $MailChimp->errorCode
		);
	} else {
		$response['subscribed'] = $email;
	}
	return $response;
}

function is_root_site() {
	return $GLOBALS['blog_id'] == 1;
}
function is_project_site() {
	return nsh_get_parent($GLOBALS['blog_id']) == 1;
}
function is_city_site() {
	$parent = nsh_get_parent($GLOBALS['blog_id']);
	return $parent != 0 && $parent != 1;
}
function is_salsa_site() {
	return strpos(get_bloginfo('sitename'), 'salsa') !== FALSE;
}

add_action( 'widgets_init', 'register_my_widget' );
function register_my_widget() {
     register_widget ('ft_Recent_Comments_Widget');
}

function ft_get_facebook_photos($album_id) {
	require 'facebook.php';
	$facebook = new Facebook(array(
	  'appId'  => '178500142316342',
	  'secret' => '3394394869a737e004d8aa0f938f6d00',
	  'cookie' => true
	));

	$album = $facebook->api(
	   '/'.get_field('album_id') . '?fields=photos',
	   'GET'
	);
	return $album['photos']['data'];
}

function ft_get_facebook_video($video_id) {
	require 'facebook.php';
	$facebook = new Facebook(array(
	  'appId'  => '178500142316342',
	  'secret' => '3394394869a737e004d8aa0f938f6d00',
	  'cookie' => true
	));
	try {
		$video = $facebook->api(
		   '/'.$video_id . '?fields=format',
		   'GET'
		);
	} catch (Exception $e) {
		echo "<p>Sorry, the video of ID $video_id appears to be unavailable.</p>";
	}
	return $video['format'][1]['embed_html'];	
}

function get_virgin_total() {
	$ch = curl_init('http://uk.virginmoneygiving.com/fundraiser-web/fundraiser/showFundraiserProfilePage.action?userUrl=salsa4water&isTeam=true');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
	$content = curl_exec($ch);
	curl_close($ch);

	$doc = new DOMDocument();
	$doc->loadHTML($content);

	$finder = new DomXPath($doc);
	$classname="total";
	$nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");

	$tmp_dom = new DOMDocument(); 
	foreach ($nodes as $node) {
		foreach ($node->childNodes as $textNode) {
	    	$tmp_dom->appendChild($tmp_dom->importNode($textNode,true));
	    }
	}
	$innerHTML.=trim($tmp_dom->saveHTML());
	return substr($innerHTML, 0, strpos($innerHTML, '.'));
}

function the_virgin_total() {
	echo get_virgin_total();
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

function get_voucher() {
	$voucher = generateRandomString();
	wp_mail('salsa4water@gmail.com', '4water Voucher', $voucher);
	return $voucher;
}