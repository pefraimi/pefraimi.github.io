<?php
/**
 * Template Name: Course Year
 */
?>

<?php

$p = get_post();
$p->post_content = $p->post_content . "[su_subpages depth='0']";

?>

<?php get_template_part( 'page', 'category' ); ?>
