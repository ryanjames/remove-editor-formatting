<?php
/**
 * 
 * Remove Editor Formatting
 * 
 * @package   RemoveEditorFormatting
 * @author    ryanjames
 * @link      https://ryanjam.es
 * @license   GPL-2.0-or-later
 * 
 * @wordpress-plugin
 * Plugin Name: Remove Editor Formatting
 * Plugin URI:  https://github.com/ryanjames/remove-editor-formatting
 * Description: Removes default injected Gutenberg editor formatting
 * Version:     1.0.0
 * Author:      Ryan James
 * Author URI:  https://ryanjam.es
 * Text Domain: remove-editor-formatting 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

function custom_dequeue(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
} 
add_action( 'wp_enqueue_scripts', 'custom_dequeue', 100 );
add_action( 'wp_head', 'custom_dequeue', 100 );

add_filter( 'block_editor_settings' , 'remove_guten_wrapper_styles' );
function remove_guten_wrapper_styles( $settings ) {
    unset($settings['styles'][0]);
    return $settings;
}