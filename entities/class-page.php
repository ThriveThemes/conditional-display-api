<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package conditional-display-api
 */

namespace Thrive\ConditionalDisplayDemo\Entities;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Page
 * Represents the 'Page' post type.
 * Extends the general 'Entity' class from Thrive Architect.
 * @package Thrive\ConditionalDisplayDemo\Entities
 */
class Page extends \TCB\ConditionalDisplay\Entity {
	/**
	 * Identifier for this entity
	 *
	 * @return string
	 */
	public static function get_key() {
		return 'demo_page_data';
	}

	/**
	 * The label shown for this entity in the conditional display modal inside Thrive Architect
	 * @return string
	 */
	public static function get_label() {
		return 'Page - Demo';
	}

	/**
	 * Creates the base object containing data in the current context ( page/post ID, author, published date, etc ).
	 * In this case it is the post object, but we only return it if the post_type is 'page'.
	 *
	 * @param $param
	 *
	 * @return mixed
	 */
	public function create_object( $param ) {
		$post_data = get_post();

		return ! empty( $post_data ) && $post_data->post_type === 'page' ? $post_data : null;
	}

	/**
	 * Determines the display order in the entity dropdown of the conditional display modal.
	 * The lowest priority is displayed first ( the order of the 'User' entity is 0, so it is first in the list. The order of this is 100, so it should be the last in the list )
	 *
	 * @return int
	 */
	public static function get_display_order() {
		return 100;
	}
}
