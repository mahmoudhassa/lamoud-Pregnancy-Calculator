<?php
/**
 * Plugin Name: lamoud-Pregnancy-Calculator
 * Plugin URI: https://lamoud.com/
 * Description: lamoud Pregnancy Calculator's plugin to the pregnancy calculation, shows the number of remaining and missed weeks of pregnancy, depending on the last day of menstrual bleeding.
 * Version: 1.0.0
 * Author: Mahmoud Hassan
 * Author URI: https://wa.me/00201062332549
 * Text Domain: lamoud
 * Domain Path: /languages/
 * Requires at least: 5.4
 * Requires PHP: 7.0
**/

wp_reset_query(); 

define( 'lamoud-Pregnancy-Calculator', '1.0.0' );
add_action('wp_enqueue_scripts', 'lamoud_enqueue_custom_style');
function lamoud_enqueue_custom_style() {
    wp_enqueue_script('lamoud-js', plugin_dir_url( __FILE__ ) . '/includes/lamoud.js', array(), '1.0.0', true);
    wp_enqueue_style( 'lamoud-style', plugin_dir_url( __FILE__ ) . 'includes/lamoud.css', array(), '1.0.0', 'all' );
    if ( is_rtl() ) {
      wp_enqueue_style( 'lamoud-style-rtl', plugin_dir_url( __FILE__ ) . '/includes/lamoud-rtl.css', array(), '1.0.0', 'all' );
    }
  }

  add_action( 'init', 'wpdocs_load_textdomain' ); 
  /**
   * Load plugin textdomain.
   */
  function wpdocs_load_textdomain() {
    load_plugin_textdomain( 'lamoud', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
  }
  
  

// function that runs when shortcode is called
function creat_lamoud_Pregnancy_Calculator_shortcode() { 
  include_once dirname(__FILE__) . '/includes/calc_form.php';
 } 
 add_shortcode('lamoud_Pregnancy_Calculator', 'creat_lamoud_Pregnancy_Calculator_shortcode');


