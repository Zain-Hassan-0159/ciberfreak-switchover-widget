<?php

/**
 * Plugin Name:       ciberfreak El Widgets
 * Description:       ciberfreak El Widgets are created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ciberfreak
*/

if(!defined('ABSPATH')){
    exit;
}

if ( ! defined( 'CSW_PLUGIN_ASSETS_FILE' ) ) {
	define( 'CSW_PLUGIN_ASSETS_FILE', plugins_url( 'assets/', __FILE__ ) );
}

function ciberfreak_el_category( $elements_manager ) {

	$elements_manager->add_category(
		'ciberfreak-el-widgets',
		[
			'title' => esc_html__( 'ciberfreak Widgets', 'ciberfreak' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'ciberfreak_el_category' );


function register_ciberfreak_custom_el_widgets( $widgets_manager ) {
	require_once( __DIR__ . '/widgets/ciberfreak-switchover-widget.php' );
	$widgets_manager->register( new \ciberfreak_Switchover_Widget );

}
add_action( 'elementor/widgets/register', 'register_ciberfreak_custom_el_widgets' );

function ciberfreak_register_dependencies_scripts() {

	/* Scripts */
	wp_register_script( 'ciberfreak-switchover-widget', plugins_url( 'assets/js/ciberfreak-switchover-widget.js', __FILE__ ));

	/* Styles */
	wp_register_style( 'ciberfreak-switchover-widget', plugins_url( 'assets/css/ciberfreak-switchover-widget.css', __FILE__ ) );

}
add_action( 'wp_enqueue_scripts', 'ciberfreak_register_dependencies_scripts' );
