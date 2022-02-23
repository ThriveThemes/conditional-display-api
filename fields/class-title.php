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
 * Class Title
 * Extends the general 'Field' class from Thrive Architect.
 * @package Thrive\ConditionalDisplayDemo\Fields
 */
class Title extends \TCB\ConditionalDisplay\Field {
	/**
	 * This points to the entity where this field should show.
	 * Since we want the 'Title - Demo' field to show for the 'Page' entity, we use that key here.
	 * @return string
	 * @see Page::get_key
	 *
	 */
	public static function get_entity() {
		return 'demo_page_data';
	}

	/**
	 * Identifier for this field
	 *
	 * @return string
	 */
	public static function get_key() {
		return 'demo_page_title';
	}

	/**
	 * The label shown for this field in the conditional display modal inside Thrive Architect
	 * @return string
	 */
	public static function get_label() {
		return 'Title - Demo';
	}

	/**
	 * This sets the type of conditional comparator that we want to use. 'Autocomplete' gives the option to select multiple values with which to compare the current value of the field.
	 * There are other types of comparators, but autocomplete is the most common one ( Check 'class-number-of-comments.php' for a different comparator type ).
	 *
	 * @return string[]
	 */
	public static function get_conditions() {
		return [ 'autocomplete' ];
	}

	/**
	 * Returns the current value of the field.
	 * This will be compared with the value selected inside the rule, so a conditional rule set as 'Display content when page = "Home"' will display it when this function returns "Home".
	 *
	 * @param $page - this is sent by the Page entity and contains data about the current page
	 *
	 * @return string
	 * @see Page::create_object
	 */
	public function get_value( $page ) {
		return empty( $page ) ? '' : $page->ID;
	}

	/**
	 * Displays the pages in the dropdown opened from the autocomplete search input.
	 * Conditions that do not display an existing list of options do not need this.
	 *
	 * @param array  $selected_values
	 * @param string $searched_keyword
	 *
	 * @return array
	 */
	public static function get_options( $selected_values = [], $searched_keyword = '' ) {
		$query = [
			'posts_per_page' => empty( $selected_values ) ? min( 100, max( 20, strlen( $searched_keyword ) * 3 ) ) : - 1,
			'post_type'      => 'page',
			'orderby'        => 'title',
			'order'          => 'ASC',
		];

		if ( ! empty( $searched_keyword ) ) {
			$query['s'] = $searched_keyword;
		}
		if ( ! empty( $selected_values ) ) {
			$query['include'] = $selected_values;
		}

		$pages = [];

		foreach ( get_posts( $query ) as $page ) {
			/* 'filter_options' makes sure that only relevant results are returned when there is a searched keyword or when some values are already selected */
			if ( static::filter_options( $page->ID, $page->post_title, $selected_values, $searched_keyword ) ) {
				$pages[] = [
					'value' => (string) $page->ID,
					'label' => $page->post_title,
				];
			}
		}

		return $pages;
	}

	/**
	 * @return string
	 */
	public static function get_autocomplete_placeholder() {
		return 'Search pages';
	}

	/**
	 * Determines the display order in the modal field select.
	 *
	 * @return int
	 */
	public static function get_display_order() {
		return 100;
	}
}
