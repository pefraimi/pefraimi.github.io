<?php
/**
 * Template Name: Single Course
 */
?>

<?php

$p = get_post();
if ( get_page_template_slug($p->post_parent) !== $settings['course_year_template'] ) {
	$p->post_content = "<p style='color:red'>The parent of this course page is not of {$settings['course_year_template']}</p>" . $p->post_content;
}

?>

<?php get_template_part( 'page' ); ?>
