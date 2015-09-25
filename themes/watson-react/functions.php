<?php

/*
Custom theme functions

Note: we recommend you prefix all your functions to avoid any naming
collisions or wrap your functions with if function_exists braces.
*/
function numeral($number) {
	$test = abs($number) % 10;
	$ext = ((abs($number) % 100 < 21 and abs($number) % 100 > 4) ? 'th' : (($test < 4) ? ($test < 3) ? ($test < 2) ? ($test < 1) ? 'th' : 'st' : 'nd' : 'rd' : 'th'));
	return $number . $ext;
}

function count_words($str) {
	return count(preg_split('/\s+/', strip_tags($str), null, PREG_SPLIT_NO_EMPTY));
}

function pluralise($amount, $str, $alt = '') {
	return intval($amount) === 1 ? $str : $str . ($alt !== '' ? $alt : 's');
}

function pages() {
	return Registry::get('menu');	
}

function relative_time($date) {
	if(is_numeric($date)) $date = '@' . $date;

	$user_timezone = new DateTimeZone(Config::app('timezone'));
	$date = new DateTime($date, $user_timezone);

	// get current date in user timezone
	$now = new DateTime('now', $user_timezone);

	$elapsed = $now->format('U') - $date->format('U');

	if($elapsed <= 1) {
		return 'Just now';
	}

	$times = array(
		31104000 => 'year',
		2592000 => 'month',
		604800 => 'week',
		86400 => 'day',
		3600 => 'hour',
		60 => 'minute',
		1 => 'second'
		);

	foreach($times as $seconds => $title) {
		$rounded = $elapsed / $seconds;

		if($rounded > 1) {
			$rounded = round($rounded);
			return $rounded . ' ' . pluralise($rounded, $title) . ' ago';
		}
	}
}

function twitter_account() {
	return site_meta('twitter', 'idiot');
}

function twitter_url() {
	return 'https://twitter.com/' . twitter_account();
}

function total_articles() {
	return Post::where(Base::table('posts.status'), '=', 'published')->count();
}

/*======================*/

/**
* Retrieve the introduction paragraph for a section
*/
function section_intro(){
	echo meta_html('section_intro');
	//echo $intro->value->html;
}

/**
* Determine whether to hide or show a jumbotron
* @return bool
*/
function hide_jumbo(){
	$hide = meta_text('hide_jumbo');
	return $hide == "true";

}

/**
* Retrieve meta for a page
* @param string
* @return string
*/
function meta($key){
	$meta = Extend::field('page', $key, menu_id());
	if(isset($meta->value)){
		return $meta->value;
	}else{
		return "";
	}
}

/**
* Retrieve meta text for a page
* @param string
* @return string
*/
function meta_text($key){
	$m = meta($key);
	if(isset($m->text)){
		return $m->text;
	}else{
		return "";
	}
}

/**
* Retrieve meta html for a page
* @param string
* @return string
*/
function meta_html($key){
	$m = meta($key);
	if(isset($m->html)){
		return $m->html;
	}else{
		return "";
	}
}

/**
* Retrieve page slug
*/
function this_page_slug(){
	$page = Registry::get('menu_item');
	echo $page->slug;
}

/**
* Echo the page icon
*/
function page_icon(){
	$icon = meta_text('icon');
	if($icon == ""){
		echo "glyphicon glyphicon-home";
	}else{
		echo $icon;
	}
}

/**
* Is the section a single page
*/
function one_page(){
	if(meta_text('one_page') == "true"){
		echo "one-page";
	}
}
