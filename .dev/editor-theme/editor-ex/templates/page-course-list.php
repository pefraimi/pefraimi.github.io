<?php
/**
 * Template Name: Course List
 */
?>

<?php

function is_course($post_url, $course_template) {
	// return 0 if not course
	// return 1 if course
	// return 2 if non-page
	$post_id = url_to_postid($post_url);
	if ( $post_id === 0 ) {
		return 2;
	} else if ( get_page_template_slug($post_id) === $course_template ) {
		return 1;
	} else {
		return 0;
	}
}
 
function get() {
	global $settings;

	$courses_field = get_field('courses');
	$year_field = get_field('year_name');
	$winter_field = get_field('winter_semester');
	$summer_field = get_field('summer_semester');
	$separator_field = get_field('separator');
	$dashes_field = get_field('convert_dashes');
	$course_template = $settings['course_template'];

	$courses = [];
	$courses_field = explode("\n", $courses_field);
	foreach ($courses_field as $line) {
		$line = explode("|", trim($line));
		if (count($line) === 5) {
			$courses[$line[0]][$line[1]][$line[2]] = [ $line[3], $line[4] ];
		}
	}

	$extra = "";
	foreach ($courses as $year_k => $year_v) {
		if ($dashes_field) {
			$year_k = str_replace('-', '–', $year_k);
		}
		$extra = $extra . "<h2>{$year_field} {$year_k}</h2>[su_row][su_column size='1/2']<p><b>{$winter_field}</b></p><ul>";
		foreach ($year_v[0] as $winter_k => $winter_v) {
			$is_course = is_course($winter_v[0], $course_template);
			if ( $is_course === 0 ) {
				$extra = $extra . "<li><b style='color:red;'><a href='{$winter_v[0]}'>{$winter_k}</a> is not of proper template</b></li>";
			} else if ($winter_v[0] == "-") {
				$extra = $extra . "<li><b>{$winter_k}</b> {$winter_v[1]}</li>";
			} else if ( $is_course === 1 ) {
				$extra = $extra . "<li><a href='{$winter_v[0]}'><b>{$winter_k}</b></a> {$winter_v[1]}</li>";
			} else {
				$extra = $extra . "<li><a href='{$winter_v[0]}' target='_blank'><b>{$winter_k}</b><i class='fa fa-external-link-square' style='margin-left:0.3em;'></i></a> {$winter_v[1]}</li>";
			}
		}
		$extra = $extra . "</ul>[/su_column][su_column size='1/2']<p><b>{$summer_field}</b></p><ul>";
		foreach ($year_v[1] as $summer_k => $summer_v) {
			$is_course = is_course($summer_v[0], $course_template);
			if ( $is_course === 0 ) {
				$extra = $extra . "<li><b style='color:red;'><a href='{$summer_v[0]}'>{$summer_k}</a> is not of proper template</b></li>";
			} else if ($summer_v[0] == "-") {
				$extra = $extra . "<li><b>{$summer_k}</b> {$summer_v[1]}</li>";
			} else if ( $is_course === 1 ) {
				$extra = $extra . "<li><a href='{$summer_v[0]}'><b>{$summer_k}</b></a> {$summer_v[1]}</li>";
			} else {
				$extra = $extra . "<li><a href='{$summer_v[0]}' target='_blank'><b>{$summer_k}</b><i class='fa fa-external-link-square' style='margin-left:0.3em;'></i></a> {$summer_v[1]}</li>";
			}
		}
		$extra = $extra . "</ul>[/su_column][/su_row]";
		$extra = $extra . $separator_field;
	}

	$extra = substr($extra, 0, strrpos($extra, $separator_field));

	return $extra;
}

$p = get_post();
$p->post_content = $p->post_content . get();

?>

<?php get_template_part( 'page' ); ?>
