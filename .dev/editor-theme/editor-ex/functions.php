<?php

$settings = [
	'course_year_template' => 'templates/page-course-year.php',
	'course_template'      => 'templates/page-course.php',
	'course_list_template' => 'templates/page-course-list.php',
	'publications_id'      => 2244,
	'publication_header'   => 'publication-header'
];

/* Functions */
/*function run($cmd, $stdin) {
    $descriptorspec = array(
        0 => array("pipe", "r"),
        1 => array("pipe", "w"),
        2 => array("file", "/dev/null", "a")
    );
    $process = proc_open($cmd, $descriptorspec, $pipes);
    if (!is_resource($process)) {
        return false;
    }
    fwrite($pipes[0], $stdin);
    fclose($pipes[0]);
    $stdout = stream_get_contents($pipes[1]);
    fclose($pipes[1]);
    return [
        "stdout" => $stdout,
        "code" => proc_close($process)
    ];
}*/
/*function bib2html($bib, $extra = '') {
	require_once __DIR__ . '/lib/bibtex2html.php';
	$bib_type = $bib;
	$bib_type = strstr($bib_type, '@');
	$bib_type = strstr($bib_type, '{', true);
	$bib_type = substr($bib_type, 1);
	$bib_type = trim(strtolower($bib_type));
	$bib_accent_table = make_accent_table();
	$f = bibtex2html($bib, $bib_type, $bib_accent_table);
	if ($extra) {
		$f = "{$f} [{$extra}]";
	}
	return $f;
}*/

function apply_go_back($p, $parent) {
	$parent_url = get_permalink($parent);
	$parent_title = get_the_title($parent);
	$p->post_title = "<a href='{$parent_url}' data-parent='{$parent}' title='Go back to {$parent_title}' style='margin-right:0.3em;float:left;'><i class='fa fa-arrow-circle-left'></i></a><div style='overflow:hidden;'>{$p->post_title}</div>";
	//$p->post_content = "<h4 style='padding:2%;margin-bottom:1.5em;background:#F5F5F5;text-transform:uppercase;font-weight:bold;'><a href='{$parent_url}'><i style='margin-right:0.5em;' class='fa fa-arrow-circle-left'></i>Go Back to {$parent_title}</a></h4>{$p->post_content}";
}

function apply_attributes($atts) {
	if ($atts) {
		$s = "";
		foreach ($atts as $key => $value) {
			$s = $s . sprintf(" %s='%s'", $key, $value);
		}
		return $s;
	} else {
		return "";
	}
}

/* Shortcodes */
add_shortcode( 'citation', function($atts, $content) {
	return sprintf("<citation %s>%s</citation>",
		apply_attributes($atts),
		$content
	);
});
add_shortcode( 'p', function($atts, $content) {
	return sprintf("<p>%s</p>",
		do_shortcode($content)
	);
});
add_shortcode( 'source', function($atts, $content) {
	$host = parse_url($content)['host'];
	return do_shortcode("[icon-button href='{$content}' icon='fa-globe']{$host}[/icon-button]");
});
add_shortcode( 'icon-button', function($atts, $content) {
	return sprintf("<span><a class='button' style='line-height:3;white-space:nowrap;' href='%s'><i class='fa %s' style='margin-right:0.5em;'></i>%s</a></span>",
		$atts['href'],
		$atts['icon'],
		$content ? $content : "Download"
	);
});
add_shortcode( 'icon-button-pdf', function($atts, $content) {
	return do_shortcode(sprintf("[icon-button href='%s' icon='fa-file-pdf-o']%s[/icon-button]",
		$atts['href'],
		$content ? $content : "Download PDF"
	));
});
add_shortcode( 'icon-button-demo', function($atts, $content) {
	return do_shortcode(sprintf("[icon-button href='%s' icon='fa-desktop']%s[/icon-button]",
		$atts['href'],
		$content ? $content : "Demo"
	));
});
add_shortcode( $settings['publication_header'], function($atts, $content = "") {
	return sprintf("<h3>%s</h3>", $content);
});
add_shortcode( 'publication', function($atts) {
	$id = $atts['id'];
	$url = get_permalink($id);
	return do_shortcode(sprintf('[citation after="%s" href="%s"]%s[/citation]',
		get_field('extra', $id),
		$url,
		get_field('bib', $id)
	));
});
add_shortcode( 'code-demo', function($atts, $content) {
	return sprintf("<div style='border:1px solid #ccc;margin-bottom:1em;'><div style='border-bottom:1px solid #ccc;padding:1em;'>%s</div><div style='font-family:monospace;font-size:1.9rem;background: #f5f5f5;padding:1em;'>%s</div></div>",
		do_shortcode($content),
		$content
	);
});
add_shortcode( 'icon', function($atts, $content) {
	return "<i class='fa {$content}'></i>";
});
add_shortcode( 'note', function($atts, $content) {
	return "<h4 style='padding: 1em; background-color: #404040; color: #fff; margin-bottom: 1.5em; border-radius: 2px;'><i class='fa {$atts['icon']}' style='margin-right:0.5em;float:left;line-height:1.2;'></i><div style='overflow:hidden;'>{$content}</div></h4>";
});
add_shortcode( 'note-info', function($atts, $content) {
	return do_shortcode("[note icon='fa-info-circle']{$content}[/note]");
});
add_shortcode( 'member', function($atts, $content) {
	$display_website = $atts['website'] ? 'inline' : 'none';
	$display_email = $atts['email'] ? 'inline' : 'none';
	$display_photo = $atts['photo'] ? 'block' : 'none';
	$display_default_photo = $atts['photo'] ? 'none' : 'block';
	$left_width = '120px';
	$margin_bottom = '1%';
	return "
		<div style='margin-bottom:3%;padding:5% 6%;background:#f9f9f9;'>
			<div style='float:left;margin-right:4%;text-align:center;width:{$left_width};'>
				<div style='margin-bottom:5%;'>
					<i class='fa fa-user-circle' style='font-size:{$left_width};display:{$display_default_photo};'></i>
					<img src='{$atts['photo']}' alt='{$atts['name']}' style='margin:0 auto;border-radius:50%;display:{$display_photo};'>
				</div>
				<a href='{$atts['website']}' style='margin:0 0.1em;display:{$display_website}'><i class='fa fa-globe'></i></a>
				<a href='mailto:{$atts['email']}' style='margin:0 0.1em;display:{$display_email}'><i class='fa fa-envelope'></i></a>
			</div>
			<div style='overflow:hidden;'>
				<div style='margin-bottom:{$margin_bottom};'>
					<h3 style='display:inline;'>{$atts['name']}</h3><i>, {$atts['title']}</i>
				</div>
				<div style='margin-bottom:{$margin_bottom};'>
					<i class='fa fa-flask' style='float:left;line-height:1.5;margin:0 2%;'></i>
					<div style='font-style:italic;overflow:hidden;'>{$atts['research']}</div>
				</div>
				<div style='text-align:justify;color:#888;'>{$content}</div>
			</div>
		</div>
	";
});

/* Add Euclid Internal Page to Admin Bar */
add_action( 'admin_bar_menu', function($wp_admin_bar) {
	$wp_admin_bar->add_menu([
		'id'    => 'euclid-internal',
		'title' => '<span class="dashicons dashicons-groups" style="font:400 20px/1 dashicons;margin-right:6px;padding:4px 0;color:rgba(240,245,250,.6);position:relative;top:2px;"></span>Euclid Internal',
		'href'  => 'https://euclid.ee.duth.gr/internal/'
	]);
}, 35);

/* Go Back Link */
add_action( 'wp', function() {
	global $wp_query;
	if ( $wp_query->is_page() && $wp_query->posts[0]->post_parent !== 0 ) {
		apply_go_back($wp_query->posts[0], $wp_query->posts[0]->post_parent);
	}
});

/* Replace stock javascript because it has bugs */
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_script( 'editor-js' );
	wp_deregister_script( 'editor-js' );
	wp_enqueue_script( 'editor-js', get_stylesheet_directory_uri() . '/js/editor-ex.js', array(), '20170102', true );
}, 20 );

/* Upgrade font awesome */
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'editor-font-awesome-css' );
	wp_deregister_style( 'editor-font-awesome-css' );
	wp_enqueue_style( 'editor-font-awesome-css', '//cdn.jsdelivr.net/npm/font-awesome@4.7/css/font-awesome.min.css', array(), '4.7', 'screen' );
}, 20);

/* Change fonts */
add_action( 'wp_enqueue_scripts', function() {
	wp_dequeue_style( 'editor-fonts' );
	wp_deregister_style( 'editor-fonts' );
	wp_enqueue_style( 'editor-fonts', '//fonts.googleapis.com/css?family=Arimo:400,400i,700,700i|Fira+Mono:400,500,700|Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=greek,greek-ext,latin-ext', array(), null );
}, 20 );

/* Add remove accent for uppercase Greek characters */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'jquery-remove-upcase-accents', '//cdn.jsdelivr.net/gh/ebababi/jquery-remove-upcase-accents@1.2/jquery.remove-upcase-accents.min.js', array(), '1.2', true );
}, 20 );

/* Add citation.js */
add_action( 'wp_enqueue_scripts', function() {
	wp_enqueue_script( 'citation-js', '//cdn.rawgit.com/larsgw/citation.js/archive/citation.js/citation-0.3.4.min.js', array(), '0.3.4', true );
	wp_enqueue_script( 'citation-integration-js', get_stylesheet_directory_uri() . '/js/citation-integration.js', array(), '20170921', true );
}, 20 );

?>
