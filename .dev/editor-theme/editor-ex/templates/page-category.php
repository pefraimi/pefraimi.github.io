<?php
/**
 * Template Name: Category
 */
?>

<?php

function get() {
	$pages_field = get_field('pages');

	$pages = split(',', $pages_field);
	$pages_n = count($pages);

	$extra = "";
	$extra = $extra . "[su_row]";
	foreach ($pages as $page) {
		$p = get_post($page);
		$url = get_permalink($p);
		$extra = $extra . "[su_column size='1/{$pages_n}']";
		$extra = $extra . "<a href='{$url}' class='button' style='display:block;width:100%;text-align:center;margin-bottom:1em;'>{$p->post_title}<i class='fa fa-arrow-circle-right' style='margin-left:0.4em;'></i></a>";
		$extra = $extra . "[/su_column]";
	}
	$extra = $extra . "[/su_row]";

	return $extra;
}

$p = get_post();
$p->post_content = $p->post_content . get();

?>

<?php get_template_part( 'page' ); ?>
