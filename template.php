<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 */

 /**
 * Drupal cannot load external css from the .info file, so we do it here.
 */
 function byu_preprocess_html(&$variables) {
  drupal_add_css('//cloud.typography.com/75214/740862/css/fonts.css', array('type' => 'external'));
}


/**
 * Creates the variables to be used in the template (page.tpl.php is a view and should not have logic.)
 * @param array $variables
 */
function byu_preprocess_page(&$variables){
	$variables['search_box'] = drupal_get_form('search_block_form');
}


/**
* Change the default Drupal search id to match BYU theme's id
*/
function  byu_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['#id'] = 'basic-search'; // Change the text on the label element
  }
}

/**
 * Implements theme_menu_item()
 * 
 * Used to modify the markup of the menus. This is to accommodate the menus for when the megamenu module isn't being used.
 */

function byu_menu_link(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';
	$third_level = '';

	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	
	if ($element['#below'] && $element['#original_link']['depth'] == 1) {
		$sub_menu = drupal_render($element['#below']);
	} elseif ($element['#below'] && $element['#original_link']['depth'] == 2) {
		$third_level = drupal_render($element['#below']);

		$third_level = str_replace('menu', 'sublinks', $third_level);
	}

	$html = '<li' . drupal_attributes($element['#attributes']) . '>' . $output;
	$html .= ($third_level!='') ? $third_level : "";
	$html .= ($sub_menu!='') ? '<div class="sub">' . $sub_menu . '</div>' : "" ;
	$html .= "</li>";
	return $html;
}

 
/** 
 * Return a themed breadcrumb trail.
 *
 * @param $variables
 *   - title: An optional string to be used as a navigational heading to give
 *     context for breadcrumb links to screen-reader users.
 *   - title_attributes_array: Array of HTML attributes for the title. It is
 *     flattened into a string within the theme function.
 *   - breadcrumb: An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */

function byu_breadcrumb($variables) {
	global $base_path;
	global $theme_path;
	$breadcrumb = $variables['breadcrumb']; //This is a variable for your page.tpl.php 
	$breadcrumb_separator = ' › ';
	if(!drupal_is_front_page()){
	
		// Replace "Home" with the name of the website
		$home = array_shift($breadcrumb);
		$site_name = variable_get('site_name');
		array_unshift($breadcrumb,str_replace("Home",$site_name,$home));
    

		// Style breadcrumb so that only the last two appear on the page; the rest will be shown in a div like on lds.org
		$finalBreadcrumb = array_slice($breadcrumb,-1,1);
		array_pop($breadcrumb);
		array_unshift($breadcrumb,"<a href=\"http://byu.edu\">BYU Home</a>");
		if(empty($finalBreadcrumb[0])) { // Sometimes, the home page isn't loaded into the breadcrumb. this is my fix for that.
			$finalBreadcrumb[0] = '<a href="' . $base_path . '">' . $site_name . '</a>';
		}
	  
		// Build the breadcrumb trail.
		$output = '<ul class="breadcrumb">';
		$output .= '<li><div class="dropdown"><a href="" data-toggle="dropdown" class="home dropdown-toggle needsclick"><i class="icon-home icon-large"></i>';
		$output .= '<span class="visuallyhidden">Home</span><i class="icon-caret-down"></i></a>';
		$output .= '<ul class="dropdown-menu"><li>' . implode("" . '</li><li>', $breadcrumb) . '</li></ul>';
		$output .= '<i class="divider icon-angle-right"></i></div></li>';
		$output .= '<li>' . implode($breadcrumb_separator . '</li><li>', $finalBreadcrumb) . '<i class="divider icon-angle-right"></i></li>';      
		$output .= '<li class="active">' . drupal_get_title() . '</li>';
		$output .= '</ul>';
		return $output;
	}
}
