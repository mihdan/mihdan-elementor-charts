<?php
namespace Mihdan_Elementor_Charts\Widgets\Line\Line_Chart;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Line_Chart
 *
 * @package Mihdan_Elementor_Charts\Widgets\Line\Line_Chart
 */
class Line_Chart extends Widget_Base {
	public function get_name() {
		return 'mihdan-elementor-charts';
	}
	public function get_title() {
		return __( 'Line Chart', 'elementor' );
	}
	public function get_icon() {
		return 'fa fa-line-chart';
	}
	public function get_categories() {
		return [ 'mihdan' ];
	}

	public function get_script_depends() {
		return [ 'mihdan-elementor-charts' ];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_map',
			[
				'label' => __( 'Map', 'elementor' ),
			]
		);

		$this->add_control(
			'map_type',
			[
				'label'   => __( 'Map Type', 'elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'map'       => __( 'Road Map', 'elementor' ),
					'satellite' => __( 'Satellite', 'elementor' ),
					'hybrid'    => __( 'Hybrid', 'elementor' ),
				],
				'default' => 'map',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		echo '<div class="title">line chart';//print_r($settings);

		//echo $settings['title'];
		echo '</div>';
	}

	protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>
		<?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Line_Chart() );

// eof;
