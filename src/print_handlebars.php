<?php
/**
 * Prints handlebar templates in footer
 *
 * @package holotree\enqueue_handlebars
 * @author    Josh Pollock <Josh@JoshPress.net>
 * @license   GPL-2.0+
 * @link
 * @copyright 2014 Josh Pollock
 */

namespace holotree\ht_enqueue_handlebars;

/**
 * Class print_handlebars
 * @package holotree\enqueue_handlebars
 */
class print_handlebars {

	/**
	 * @var array The templates
	 */
	private $templates;

	/**
	 * Constructor for class
	 *
	 * @param bool $skip_cache
	 */
	public function __construct( $skip_cache = false ) {
		$this->skip_cache = $skip_cache;
		add_action( 'wp_footer', array( $this, 'print_output' ) );
	}

	/**
	 * Prints the output if possible
	 */
	public function print_output() {
		$output = $this->create_output();

		if ( ! empty( $output ) ) {
			$output = $this->add_comments( $output );
		}

		if ( ! empty( $output ) ) {
			echo implode( '', $output );
		}

	}

	/**
	 * Adds the HTML comments to output array
	 *
	 * @param $output
	 *
	 * @return array
	 */
	private function add_comments( $output ) {
		array_unshift( $output, '<!--Print Handlebars-->' );
		$output[] = '<!--/Print Handlebars-->';

		return $output;

	}

	/**
	 * Creates the output array
	 *
	 * @return array
	 */
	private function create_output() {
		$output = false;
		if ( is_array( $this->templates ) && ! empty( $this->templates ) ) {
			foreach( $this->templates as $handle => $path ) {
				if ( file_exists( $path ) ) {
					$template = file_get_contents( $path );
					$output[] = $template;

				}

			}

		}

		return $output;

	}

	/**
	 * Add a template to the templates to output array
	 *
	 * @param string $handle Handle for the template
	 * @param string $path Path to template
	 */
	function add( $handle, $path ) {
		if ( ! $path  || !  file_exists( $path ) ) {
			return;
		}

		$templates = $this->templates;
		if ( ! is_array( $this->templates ) ) {
			$templates = array();
		}

		if ( ! isset( $templates[ $handle ] ) ) {
			$templates[ $handle ] = $path;
		}

		$this->templates = $templates;



	}

	/**
	 *
	 * @param $handle
	 */
	function remove( $handle ) {
		$templates = $this->templates;
		if ( ! isset( $templates[ $handle ] ) ) {
			unset( $templates[ $handle ] );
		}
	}


}
