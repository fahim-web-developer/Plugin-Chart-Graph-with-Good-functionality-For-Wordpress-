<?php
/**
 * Plugin Name:       Chart Graph
 * Description:       Chart Graph plugin with Elementor adon.
 * Version:           1.2.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * License:           GPL v2 or later
 * TextDomain: chartgraph
 */

if ( ! defined('ABSPATH')) exit;  // if direct access 

//enqueueing scripts and styles

function chartgraph_plugin_scripts(){
    wp_enqueue_script('jquery');
     wp_enqueue_script('apexcharts', plugins_url( 'assets/js/apexcharts.js' , __FILE__ ), array('jquery'), '1.0', false);
     wp_enqueue_script('canvasjs', plugins_url( 'assets/js/canvasjs.min.js' , __FILE__ ), array('jquery'), '1.0', false);
    wp_enqueue_style('styleCSS', plugins_url( 'assets/css/charts_1graph.css' , __FILE__ ), false, '1.0', 'all' );
}
add_action("wp_enqueue_scripts","chartgraph_plugin_scripts");

// shortcode
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/financials.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/financials2.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/fy_table.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/revenue_breakdown.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/CR_chart.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/CR_chart2.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/apexcharts.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/template/pie_chart.php');