<?php
/*
Plugin Name: Viddler Video Integration
Plugin URI: 
Description: Integrate Viddler videos into WordPress
Author: Roger Johnston
Version: 1.0
Author URI: 
*/

define('VIDDLER_INTEGRATION_URL', plugins_url('',__FILE__));

//[viddler id=4242ae54 w=437 h=288]
function viddler_func( $atts ) {
	extract( shortcode_atts( array(
		'id' => '',
		'w' => '247',
		'h' => '181',
	), $atts ) );

	return '<a href="//www.viddler.com/embed/'.$id.'/?f=1&autoplay=0&player=full&loop=0&nologo=0&hd=0&iframe=true" rel="viddler-lightbox[iframes]"><img src="http://thumbs.cdn-ec.viddler.com/thumbnail_2_'.$id.'_v1.jpg" width="'.$w.'" height="'.$h.'"></a>';
}
add_shortcode( 'viddler', 'viddler_func' );


function viddler_lightbox_init()
{
    if (!is_admin()) 
    {
        wp_enqueue_script('jquery');
        wp_register_script('jquery.prettyphoto', VIDDLER_INTEGRATION_URL.'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.4');
        wp_enqueue_script('jquery.prettyphoto');
        wp_register_script('video-lightbox', VIDDLER_INTEGRATION_URL.'/js/video-lightbox.js', array('jquery'), '3.1.4');
        wp_enqueue_script('video-lightbox');
        wp_register_style('jquery.prettyphoto', VIDDLER_INTEGRATION_URL.'/css/prettyPhoto.css');
        wp_enqueue_style('jquery.prettyphoto');
    }
}

add_action('init', 'viddler_lightbox_init');


?>