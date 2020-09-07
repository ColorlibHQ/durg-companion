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
 * Durg elementor hero section widget.
 *
 * @since 1.0
 */
class Durg_Hero extends Widget_Base {

	public function get_name() {
		return 'durg-hero';
	}

	public function get_title() {
		return __( 'Hero Slider Section', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero Slider content', 'durg-companion' ),
			]
        );
		$this->add_control(
            'sliders', [
                'label' => __( 'Create Slider', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ sub_title }}}',
                'fields' => [
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Image', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Sub Title', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Quality work. Trustable service. Dedicated team', 'durg-companion' ),
                    ],
                    [
                        'name' => 'big_title',
                        'label' => __( 'Big Title', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'We provide your Industrial solution', 'durg-companion' ),
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Our Services', 'durg-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'sub_title'     => __( 'Quality work. Trustable service. Dedicated team', 'durg-companion' ),
                        'big_title'     => __( 'We provide your Industrial solution', 'durg-companion' ),
                        'btn_label'     => __( 'Our Services', 'durg-companion' ),
                        'btn_url'       => '#',
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'sub_title'     => __( 'Quality work. Trustable service. Dedicated team', 'durg-companion' ),
                        'big_title'     => __( 'We provide your Industrial solution', 'durg-companion' ),
                        'btn_label'     => __( 'Our Services', 'durg-companion' ),
                        'btn_url'       => '#',
                    ],
                    [
                        'slider_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'sub_title'     => __( 'Quality work. Trustable service. Dedicated team', 'durg-companion' ),
                        'big_title'     => __( 'We provide your Industrial solution', 'durg-companion' ),
                        'btn_label'     => __( 'Our Services', 'durg-companion' ),
                        'btn_url'       => '#',
                    ],
                ]
            ]
		);
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Title', 'durg-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .single-slider .slider-content p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sec_title_col', [
				'label' => __( 'Section Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .single-slider .slider-content h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_styles_sep',
            [
                'label' => esc_html__( 'Button Style Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'btn_txt_col', [
				'label' => __( 'Button Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .slider-content .boxed-btn2' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_bg_col', [
				'label' => __( 'Button Bg Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .slider-content .boxed-btn2' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'btn_hvr_styles_sep',
            [
                'label' => esc_html__( 'Button Hover Style Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'btn_hvr_txt_col', [
				'label' => __( 'Button Hover Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .slider-content .boxed-btn2:hover' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'btn_hvr_bg_col', [
				'label' => __( 'Button Hover Bg Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider-area .slider-content .boxed-btn2:hover' => 'background-color: {{VALUE}};',
				],
			]
        );
		$this->end_controls_section();
	}

	protected function render() {

    // call load widget script
    $this->load_widget_script();

    $settings = $this->get_settings();
    $sliders = !empty( $settings['sliders'] ) ? $settings['sliders'] : '';
    ?>

    <!-- slider-area-start -->
    <div class="slider-area">
        <div class="slider-active owl-carousel">
            <?php
            if( is_array( $sliders ) && count( $sliders ) > 0 ){
                foreach ( $sliders as $slider ) {
                    $slider_img = !empty( $slider['slider_img']['url'] ) ? $slider['slider_img']['url'] : '';
                    $sub_title = !empty( $slider['sub_title'] ) ? $slider['sub_title'] : '';
                    $big_title = !empty( $slider['big_title'] ) ? $slider['big_title'] : '';
                    $btn_label = !empty( $slider['btn_label'] ) ? $slider['btn_label'] : '';
                    $btn_url = !empty( $slider['btn_url']['url'] ) ? $slider['btn_url']['url'] : '';
                    ?>
                    <div class="single-slider" <?php echo durg_inline_bg_img( esc_url( $slider_img ) ); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 offset-xl-1 col-lg-7">
                                    <div class="slider-content">
                                        <p><?php echo esc_html( $sub_title )?></p>
                                        <h3><?php echo esc_html( $big_title )?></h3>
                                        <div class="slider-btn">
                                            <a class="boxed-btn2" href="<?php echo esc_url( $btn_url )?>"><?php echo esc_html( $btn_label )?> <i class="Flaticon flaticon-right-arrow"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- slider-area-end -->    
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // slider-active
            $('.slider-active').owlCarousel({
                loop:true,
                margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                nav:false,
            dots:true,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        dots:false
                    },
                    767:{
                        items:1,
                        dots:false
                    },
                    992:{
                        items:1
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
