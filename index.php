<?php
/**
 * Plugin Name: My Guten (by Sally)
 * Plugin URI : https://wordpress.stackexchange.com/q/366881
 * Description: Testing WordPress script translation (JED).
 * Version    : 1.0.0
 * Text Domain: wpse-366881
 *
 * I changed the Text Domain from 'gbg' to wpse-366881 - the plugin's folder name.
 */

defined( 'ABSPATH' ) || die;

function gbg_myguten_block_init() {
	$plugin_path = plugin_dir_path( __FILE__ );

	// This will load lang/wpse-366881-<locale>.mo
	load_plugin_textdomain( 'wpse-366881', false, basename( __DIR__ ) . '/lang/' );

	// Automatically load dependencies and version.
	$asset_file = include( $plugin_path . 'build/index.asset.php' );

	wp_register_script(
		'gbg-myguten-script',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);

	register_block_type(
		'gbg/myguten',
		array(
			'editor_script' => 'gbg-myguten-script',
		)
	);

	// This will load lang/wpse-366881-<locale>-gbg-myguten-script.json
	// NOTE: This works only if the script has already been added (enqueued or registered)!
	wp_set_script_translations( 'gbg-myguten-script', 'wpse-366881', $plugin_path . 'lang' );
}
add_action( 'init', 'gbg_myguten_block_init' );
