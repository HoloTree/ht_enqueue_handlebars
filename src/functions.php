<?php
/**
 * Helper functions for adding or removing handlebars templates
 *
 * @package holotree\enqueue_handlebars
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link      
 * @copyright 2014 Josh Pollock
 */ 

if ( ! function_exists( 'ht_dms_enqueue_handlebar' ) ) :
	/**
	 * Add a template to the templates to output array
	 *
	 * @param string $handle Handle for the template
	 * @param string $path Path to template
	 */
	function ht_dms_enqueue_handlebar( $handle, $path ){
		return holotree\ht_enqueue_handlebars\enqueue::enqueue( $handle, $path );
	}
endif;

if ( ! function_exists( 'ht_dms_deenqueue_handlebar' ) ) :
	/**
	 * Remove template to the templates to output array
	 *
	 * @param string $handle Handle for the template
	 */
	 function ht_dms_deenqueue_handlebar( $handle ) {
		 return holotree\ht_enqueue_handlebars\enqueue::deenqueue( $handle );

	 }
endif;
