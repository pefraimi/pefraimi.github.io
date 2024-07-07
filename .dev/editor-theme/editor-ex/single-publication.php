<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Editor
 */
?>

<?php

$pub_header = $settings['publication_header'];
$p = get_post();
$p->post_content = sprintf("%s<p style='text-align:justify;'>%s</p>%s[{$pub_header}]Citation[/{$pub_header}]<p><citation>%s</citation></p>[{$pub_header}]BibTeX[/{$pub_header}]<pre>%s</pre>",
	get_field('abstract') ? "[{$pub_header}]Abstract[/{$pub_header}]" : "",
	get_field('abstract'),
	$p->post_content,
	//bib2html(get_field('bib')),
	get_field('bib'),
	get_field('bib')
);

apply_go_back($p, $settings['publications_id']);

?>

<?php get_template_part( 'page' ); ?>
