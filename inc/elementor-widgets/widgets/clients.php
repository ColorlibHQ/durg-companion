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
 * Durg elementor clients widget.
 *
 * @since 1.0
 */
class Durg_Clients extends Widget_Base {

	public function get_name() {
		return 'durg-clients';
	}

	public function get_title() {
		return __( 'Clients', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Clients content ------------------------------
		$this->start_controls_section(
			'cta_content',
			[
				'label' => __( 'Clients content', 'durg-companion' ),
			]
		);
        $this->add_control(
            'clients', [
                'label' => __( 'Add A Client', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name' => 'client_img',
                        'label' => esc_html__( 'Client Image', 'durg-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'client_name',
                        'label' => __( 'Client Name', 'durg-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                ],
                'default'   => [
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
                    ],
                    [
                        'client_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'   => __( 'Mosan Cameron', 'durg-companion' ),
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
			'sec_title_col', [
				'label' => __( 'Section Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .section_tittle p' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'rev_styles_sep',
            [
                'label' => esc_html__( 'Reviews Style Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
			'rev_txt_col', [
				'label' => __( 'Review Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text > p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'client_name_col', [
				'label' => __( 'Client Name Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'client_desig_col', [
				'label' => __( 'Client Designation Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .review_part .client_review_single .client_review_text .client_review_img p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .review_part' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

    protected function render() {

    // call load widget script
    $this->load_widget_script();
    $settings = $this->get_settings();
    $clients  = !empty( $settings['clients'] ) ? $settings['clients'] : '';

    function durg_get_single_client_item( $client_img, $client_name ) { ?>
        <div class="single-brand">
            <?php
                if ( $client_img ) {
                    echo $client_img;
                }
            ?>
        </div>
        <?php
    }
    ?>

    <!-- brand-area-start -->
    <div class="brand-area gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-active owl-carousel">
                        <?php
                        if( is_array( $clients ) && count( $clients ) > 0 ){
                            foreach ( $clients as $client ) {
                                $client_name    = !empty( $client['client_name'] ) ? $client['client_name'] : '';
                                $client_img     = !empty( $client['client_img']['id'] ) ? wp_get_attachment_image( $client['client_img']['id'], 'durg_client_logo_thumb', '', array('alt' => $client_name ) ) : '';

                                durg_get_single_client_item( $client_img, $client_name );
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            //brand-active
            $('.brand-active').owlCarousel({
            loop:true,
            margin:30,
            items:1,
            autoplay:true,
            nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
            responsive:{
                0:{
                    items:1,
                    nav:false

                },
                767:{
                    items:4
                },
                992:{
                    items:7
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
