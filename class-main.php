<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package conditional-display-api
 */

namespace Thrive\ConditionalDisplayDemo;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Main
 *
 * @package TVE\Architect\ConditionalDisplay
 */
class Main {
	public static function init() {
		static::register_page_entity_and_field();
		static::register_number_of_comments_field();
	}

	/**
	 * In this example we register a new entity called 'Page - Demo' and attach a field called 'Title - Demo' to it.
	 * This makes it possible to add conditional display rules that apply if the current page is a specific one.
	 */
	public static function register_page_entity_and_field() {
		require_once __DIR__ . '/entities/class-page.php';

		/* in order to add the extended entity to the API, this function must be called */
		tve_register_condition_entity( Entities\Page::class );

		require_once __DIR__ . '/fields/class-title.php';

		/* in order to add the extended field to the API, this function must be called */
		tve_register_condition_field( Fields\Title::class );
	}

	/**
	 * This exemplifies the way to add a new field to an existing entity.
	 */
	public static function register_number_of_comments_field() {
		require_once __DIR__ . '/fields/class-number-of-comments.php';
		tve_register_condition_field( Fields\Number_Of_Comments::class );
	}
}
