<?php
/**
 * Plugin Name: Mihdan: Elementor Charts
 */
namespace Mihdan_Elementor_Charts;

if ( ! defined( 'WPINC' ) ) {
	exit;
}

class Core {

	private static $instance = null;

	public static function get_instance() {

		if ( is_null( self::$instance ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	public function __construct() {
		$this->hooks();
	}

	public function include_widgets() {
		require_once __DIR__ . '/widgets/line/line-chart.php';
	}



	/**
	 * Добавить свою категорию виджетов
	 *
	 * @param \Elementor\Elements_Manager $elements_manager
	 *
	 * @return void
	 *
	 * @link https://developers.elementor.com/widget-categories/
	 */
	public function register_widget_categories( \Elementor\Elements_Manager $elements_manager ) {
		$elements_manager->add_category(
			'mihdan',
			[
				'title' => __( 'Mihdan Widgets', 'plugin-name' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}

	public function hooks() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'register_scripts' ) );
		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'include_widgets' ) );
		//add_action( 'elementor/elements/categories_registered', array( $this, 'register_widget_categories' ) );
	}

	public function register_scripts() {

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_register_script( 'mihdan-elementor-charts', plugins_url( '/assets/js/Chart' . $suffix . '.js', __FILE__ ), array( 'jquery' ), false, true );
	}
}

Core::get_instance();

// eof;
