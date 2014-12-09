<?php
/**
 * Adds a template to the templates to be printed.
 *
 *
 * Usage: holotree\ht_enqueue_handlebars\enqueue::enqueue( 'handle', 'path-to-template' );
 *
 * @package holotree\enqueue_handlebars
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2014 Josh Pollock
 */

namespace holotree\ht_enqueue_handlebars;

/**
 * Class enqueue_handlebars
 * @package holotree\enqueue_handlebars
 */
class enqueue {
	/**
	 * Add a template to the templates to output array
	 *
	 * @param string $handle Handle for the template
	 * @param string $path Path to template
	 */
	public static function enqueue( $handle, $path ) {
		$printer = self::get_printer();
		$printer->add( $handle, $path );

	}

	/**
	 * Remove template to the templates to output array
	 *
	 * @param string $handle Handle for the template
	 */
	public static function deenqueue( $handle ) {
		$printer = self::get_printer();
		$printer->remove( $handle );
	}


	/**
	 * Get the global instance or create on of the printer class.
	 *
	 * @return print_handlebars
	 */
	private static function get_printer() {
		global $print_handlebars;
		if ( ! is_object( $print_handlebars ) ) {
			$print_handlebars = new print_handlebars();
		}

		return $print_handlebars;

	}


} 
