<?php
namespace Durgelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Durg elementor counters widget.
 *
 * @since 1.0
 */
class Durg_Counters extends Widget_Base {

	public function get_name() {
		return 'durg-counters';
	}

	public function get_title() {
		return __( 'Counters', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Counters content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Counters content', 'durg-companion' ),
			]
		);
        $this->add_control(
            'counters', [
                'label' => __( 'Add An Item', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ counter_value }}}',
                'fields' => [
                    [
                        'name' => 'icon_img',
                        'label' => esc_html__( 'Icon Image', 'durg-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'counter_value',
                        'label' => __( 'Counter Value', 'durg-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( '400', 'durg-companion' ),
                    ],
                    [
                        'name' => 'counter_txt',
                        'label' => __( 'Counter Text', 'durg-companion' ),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Business <span>Completed</span>', 'durg-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'icon_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'counter_value'   => __( '400', 'durg-companion' ),
                        'counter_txt'   => __( 'Business <span>Completed</span>', 'durg-companion' ),
                    ],
                    [
                        'icon_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'counter_value'   => __( '30', 'durg-companion' ),
                        'counter_txt'   => __( 'Dedicated team <span>Business</span>', 'durg-companion' ),
                    ],
                    [
                        'icon_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'counter_value'   => __( '350', 'durg-companion' ),
                        'counter_txt'   => __( 'Positive <span>review</span>', 'durg-companion' ),
                    ],
                ]
            ]
        );

		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Sub Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_subtitle', [
				'label' => __( 'Style Sub Title', 'durg-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'counter_number_col', [
				'label' => __( 'Counter Number Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-area .single-counter .counter-number h3 span' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'counter_first_word_col', [
				'label' => __( 'Counter First Word Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-area .single-counter .counter-number p' => 'color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'counter_sec_word_col', [
				'label' => __( 'Counter Second Word Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-area .single-counter .counter-number p span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'sec_bg_styles_sep',
            [
                'label' => esc_html__( 'Section BG Style', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
			'sec_bg_col', [
				'label' => __( 'Section Bg Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .counter-area' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

    protected function render() {

    // call load widget script
    $this->load_widget_script();
    $settings = $this->get_settings();
    $counters  = !empty( $settings['counters'] ) ? $settings['counters'] : '';

    function durg_get_single_counter_item( $icon_img, $counter_value, $counter_txt ) { ?>
        <div class="col-xl-4 col-md-4">
            <div class="single-counter">
                <div class="icon">
                    <?php
                        if ( $icon_img ) {
                            echo $icon_img;
                        }
                    ?>
                </div>
                <div class="counter-number">
                    <h3><span class="counter"><?php echo esc_html( $counter_value )?></span><span>+</span></h3>
                    <p><?php echo wp_kses_post( nl2br($counter_txt) )?> </p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- counter-start -->
    <div class="counter-area gray-bg">
        <div class="container">
            <div class="row">
                <?php
                    if( is_array( $counters ) && count( $counters ) > 0 ){
                        foreach ( $counters as $counter ) {                               
                            $icon_img      = !empty( $counter['icon_img']['id'] ) ? wp_get_attachment_image( $counter['icon_img']['id'], 'durg_counter_icon_thumb_50x42', '' ) : '';
                            $counter_value = !empty( $counter['counter_value'] ) ? $counter['counter_value'] : '';
                            $counter_txt   = !empty( $counter['counter_txt'] ) ? $counter['counter_txt'] : '';

                            durg_get_single_counter_item( $icon_img, $counter_value, $counter_txt );
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- counter-start -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // counter 
            $('.counter').counterUp({
                delay: 10,
                time: 10000
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
