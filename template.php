<?php

function YourTemplate_preprocess_html(&$variables) {
	
	// CSS Files
	drupal_add_css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css', array('type' => 'external')); // Bootstrap v3.3.1
	drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array('type' => 'external')); // Font Awesome 4.2.0

	// JS Files
	drupal_add_js('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js', 'external'); // Bootstrap JS v3.3.1

}

function YourTemplate_menu_tree($variables) {
	return '<ul class="nav navbar-nav">' . $variables['tree'] . '</ul>';   
}

function YourTemplate_menu_link(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';
	$dropdown = '';
	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
		$sub_menu = str_replace('nav navbar-nav', 'dropdown-menu', $sub_menu);
		$dropdown = ' class="dropdown"';
		$element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
	} 
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	return '<li' .$dropdown. '>' . $output . $sub_menu . "</li>\n";
}

function phptemplate_menu_item_link($item, $link_item) {
	if ($item['path'] == '<none>') {
		$attributes['title'] = $link['description'];
		return '<span'. drupal_attributes($attributes) .'>'. $item['title'] .'</span>';
	} else {
		return l($item['title'], $link_item['path'], !empty($item['description']) ? array('title' => $item['description']) : array(), isset($item['query']) ? $item['query'] : NULL);
	}
}