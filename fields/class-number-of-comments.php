<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package conditional-display-api
 */

namespace Thrive\ConditionalDisplayDemo\Fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Number_Of_Comments
 * Extends the general 'Field' class from Thrive Architect.
 * @package Thrive\ConditionalDisplayDemo\Fields
 */
class Number_Of_Comments extends \TCB\ConditionalDisplay\Field {
	/**
	 * This attaches the field to the existing 'User' entity
	 * @return string
	 */
	public static function get_entity() {
		return 'user_data';
	}

	/**
	 * @return string
	 */
	public static function get_key() {
		return 'demo_number_of_comments';
	}

	public static function get_label() {
		return 'Number of comments - Demo';
	}

	/**
	 * @return string[]
	 */
	public static function get_conditions() {
		return [ 'number_comparison' ];
	}

	/**
	 * Returns the current value of the field.
	 * This will be compared with the value selected inside the rule, using a comparator mode selected from the UI ( 'is less than', 'is equal to', 'is more than' ).
	 * A conditional rule set as 'Display content when number of comments > 5' will display it when this function returns a value larger than 5.
	 *
	 * @param $user_data - the value sent by the User entity contains data about the currently logged in user
	 *
	 * @return string
	 */
	public function get_value( $user_data ) {
		$comments_count = 0;

		if ( ! empty( $user_data ) ) {
			$args = [
				'author_email'  => $user_data->user_email,
				'no_found_rows' => false,
				'number'        => 10,
				'status'        => 'all,spam,trash',
			];

			$query = new \WP_Comment_Query;
			$query->query( $args );

			$comments_count = (int) $query->found_comments;
		}

		return $comments_count;
	}

	/**
	 * Determines the display order in the modal field select
	 *
	 * @return int
	 */
	public static function get_display_order() {
		return 55;
	}
}
