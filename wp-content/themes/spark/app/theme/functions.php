<?php

/**
 * Laravel Mix Manifest tracker
 *
 * @param  string $asset Path to the Mix'd asset
 *
 * @return string        Path to the asset file
 */

function mix($asset)
{
	$manifest = App\config('theme.dir') . '/public/mix-manifest.json';

	if (file_exists($manifest)) {
		$asset_paths = json_decode(file_get_contents($manifest));
		$asset = $asset_paths->{$asset};
	}

	return ltrim($asset, '/');
}


/**
 * Add a class to the <main> element of the current page slug
 *
 * @return string CSS Class
 */

function main_class()
{
	$query = get_queried_object();
	$page_class = 'default';


	if (is_archive()) {
		if (is_category()) {
			$page_class = $query->taxonomy . ' ' . $query->slug;
		} elseif (is_tax()) {
			$page_class = str_replace('_', '-', $query->taxonomy);
		} elseif (is_date()) {
			$page_class = 'date';
		} else {
			$page_class = str_replace('/', '-', $query->rewrite['slug']);
		}
	} elseif (is_single()) {
		$post_type_slug = str_replace('_', '-', $query->post_type);
		$page_class = $post_type_slug . '-single';
	} elseif (is_page()) {
		$template_path = str_replace('.blade.php', '', get_page_template_slug($post->ID));
		$page_class = str_replace('views/page-', '', $template_path);
		if (!$page_class) {
			$page_class = 'default';
		}
	} elseif (is_404()) {
		$page_class = 'four-oh-four';
	} elseif (is_home()) {
		$page_class = 'blog';
	}

	return $page_class;
}


/**
 * Generate a URL to the theme images folder
 *
 * @param string $img Image name and extension e.g. icon.png
 *
 * @return string Image URL
 */

function the_img($img)
{
	return App\asset_path("img/{$img}");
}


/**
 * Add ACF Options page
 */

if (function_exists('acf_add_options_page')) {
	acf_add_options_page([
	  'menu_title' => 'Global Content',
	  'menu_slug'  => 'global-content',
	  'capability' => 'edit_posts',
	  'redirect'   => true,
	  'icon_url'   => 'dashicons-admin-site',
	]);

	acf_add_options_sub_page([
	  'page_title'  => 'Site General Settings',
	  'menu_title'  => 'General',
	  'parent_slug' => 'global-content',
	]);

	acf_add_options_sub_page([
	  'page_title'  => 'Site Header Settings',
	  'menu_title'  => 'Header',
	  'parent_slug' => 'global-content',
	]);

	acf_add_options_sub_page([
	  'page_title'  => 'Site Footer Settings',
	  'menu_title'  => 'Footer',
	  'parent_slug' => 'global-content',
	]);

	acf_add_options_sub_page([
	  'page_title'  => 'Site Analytics Settings',
	  'menu_title'  => 'Analytics',
	  'parent_slug' => 'global-content',
	]);
}


/**
 * Custom excerpt by character length
 */

//function get_excerpt($count){
//    $excerpt = get_the_content();
//    $excerpt = strip_tags($excerpt);
//    $excerpt = substr($excerpt, 0, $count);
//    $excerpt = $excerpt.'...';
//    return $excerpt;
//}






/**
 * get array of fields
 */

function ft_get_sub_fields($fields, $id = null){
    $obj = (object)NULL;
    foreach($fields as $field) {
        $obj->{$field} = get_sub_field($field);
    }
    
    return $obj;
}

function ft_get_fields($fields, $id = null){
    $obj = (object)NULL;
    foreach($fields as $field) {
        $obj->{$field} = get_field($field);
    }
    
    return $obj;
}



/**
 * global classes
 */


function ft_class($val){
    global $classes;
    if($val) $classes[] = $val;
}

function ft_add_class($name, $val){
    global $classes;
    if($name && $val) $classes[] = $name.$val;
}

function ft_classes($arr = null){
    global $classes;
    if(!$classes) return '';
    $str = join(' ', $arr ? $arr : $classes);
    $arr ?  : $classes = null;
    return $str;
}

/**
 * global container
 */
function ft_container($val){
    global $container;
    if($val) $container[] = $val;
}

function ft_add_container($name, $val){
    global $container;
    if($name && $val) $container[] = $name.$val;
}

function ft_containers($arr = null){
    global $container;
    if(!$container) return '';
    $str = join(' ', $arr ? $arr : $container);
    $arr ?  : $container = null;
    return $str;
}



/**
 * global styles
 */
function ft_add_style($attr, $val = null, $suffix = null){
    global $styles;
    if($val) $styles[] = ft_style($attr, $val, $suffix);
}

function ft_style($attr, $val = null, $suffix = null){
    
    if(!$val) return '';
    
    if($attr == 'background-image') {
        $val = 'url('.$val.')';
    }
    
    $str = $attr.':';
    $str .= $val ;
    $str .= $suffix ? $suffix : '';
    
    return $str;
}

function ft_styles($s = null){
    global $styles;
    if(!$styles) return '';
    $str = join('; ', $s ? $s : $styles);
    $s ?  : $styles = null;
    return $str;
}



/**
 * get rgba from hex and opacity
 */

function ft_rgba($color, $opacity = false) {
    
    $default = 'rgb(0,0,0)';
    
    //Return default if no color provided
    if(empty($color))
        return $default;
    
    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
    
    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }
    
    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);
    
    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }
    
    //Return rgb(a) color string
    return $output;
}


