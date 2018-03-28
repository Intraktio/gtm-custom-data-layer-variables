<?php
/*
Plugin Name:    GTM custom data layer variables
Plugin URI:     https://github.com/Intraktio/gtm-custom-data-layer-variables
Description:    Add custom data layer variables for Google Tag Manager. Requires Meta Box and MB Fieldset Any plugins.
Version:        20180327
Author:         Intraktio Ltd
Author URI:     https://intraktio.com
License:        MIT
Domain Path:    /languages
 */

if ( !class_exists( 'RWMB_Field' ) ) {
  echo __('Meta Box plugin required.', 'gtm_custom_data_layer_variables');
}
if (!class_exists( 'RWMB_Fieldset_Any_Field' ) ) {
  echo __('MB Fieldset Any plugin required.', 'gtm_custom_data_layer_variables');
}

class GTM_Custom_Data_Layer_Variables {
  function init() {
    add_action( 'rwmb_meta_boxes', array($this, 'init_meta_box'), 10 );
  }

  function init_meta_box( $meta_boxes ) {
    $prefix = 'gtm_data_layer_';

    $meta_boxes[] = array(
      'id' => 'gtm_data_layer_variables',
      'title' => esc_html__( 'GTM data layer', 'gtm_custom_data_layer_variables' ),
      //'post_types' => array( 'post', 'page' ),
      'context' => 'side',
      'priority' => 'default',
      'autosave' => false,
      'fields' => array(
	array(
	  'id' => $prefix . 'variables',
	  'type' => 'fieldset_any',
	  'name' => esc_html__( 'Variables', 'gtm_custom_data_layer_variables' ),
	  'clone' => true,
	  'options' => array(
	    array(
	      'id' => 'key',
	      'name' => __('Key', 'jumbpo-post-types'),
	      'type' => 'text',
	      'size' => '12'
	    ),
	    array(
	      'id' => 'value',
	      'name' => __('Value', 'jumbpo-post-types'),
	      'type' => 'textarea',
	    ),
	  )
	),
      )
    );

    return $meta_boxes;
  }
}

(new GTM_Custom_Data_Layer_Variables())->init();