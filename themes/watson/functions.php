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
	echo meta('section_intro');
}

/**
* Determine whether to hide or show a jumbotron
* @return bool
*/
function hide_jumbo(){
	$hide = meta('hide_jumbo');
	return $hide == "true";

}

/**
* Retrieve meta text for a page
* @param string
* @return string
*/
function meta($key){
	$meta = Extend::field('page', $key, menu_id());
	if(isset($meta->value->text)){
		return $meta->value->text;
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