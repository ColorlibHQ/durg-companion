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
 * Durg elementor services section widget.
 *
 * @since 1.0
 */
class Durg_Services extends Widget_Base {

	public function get_name() {
		return 'durg-services';
	}

	public function get_title() {
		return __( 'Services', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

		// ----------------------------------------  Service content ------------------------------
		$this->start_controls_section(
			'services_content',
			[
				'label' => __( 'Services content', 'durg-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'OUR SERVICES', 'durg-companion' )
            ]
        );

        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => 'We provide all of your <br/> industrial solution'
            ]
        );

        $this->add_control(
            'services_inner_settings_seperator',
            [
                'label' => esc_html__( 'Service Items', 'durg-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

		$this->add_control(
            'durgservices', [
                'label' => __( 'Create Service', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name' => 'service_img',
                        'label' => __( 'Service Image', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'label',
                        'label' => __( 'Title', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Industrial construction', 'durg-companion' ),
                    ],
                    [
                        'name' => 'short_desc',
                        'label' => __( 'Short Brief', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Waters make fish every without firmament saw had. Morning air subdue.', 'durg-companion' ),
                    ],
                    [
                        'name' => 'anc_text',
                        'label' => __( 'Anchor Text', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Read More', 'durg-companion' ),
                    ],
                    [
                        'name' => 'anc_url',
                        'label' => __( 'Anchor URL', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'label'         => __( 'User experience design', 'durg-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'durg-companion' ),
                        'anc_text'      => __( 'Learn More', 'durg-companion' ),
                        'anc_url'       => ''
                    ],
                    [
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'label'         => __( 'Digital Art', 'durg-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'durg-companion' ),
                        'anc_text'      => __( 'Learn More', 'durg-companion' ),
                        'anc_url'       => ''
                    ],
                    [
                        'service_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'label'         => __( 'Social Media Marketing', 'durg-companion' ),
                        'short_desc'    => __( 'There winged grass midst moving earth seed herb fifth you multiply you divide cattle.', 'durg-companion' ),
                        'anc_text'      => __( 'Learn More', 'durg-companion' ),
                        'anc_url'       => ''
                    ],
                ]
            ]
		);
		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section Heading ------------------------------
     *
     */

        $this->start_controls_section(
            'style_service_section', [
                'label' => __( 'Style Service Heading', 'durg-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Sub Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-area .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Sec Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-area .section-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

		//------------------------------ Services Style ------------------------------
		$this->start_controls_section(
			'style_serv_items_sec', [
				'label' => __( 'Style Services Item', 'durg-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color', [
				'label' => __( 'Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area .single-service h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'txt_color', [
				'label' => __( 'Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area .single-service p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anc_txt_color', [
				'label' => __( 'Anchor Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area .single-service .read-more' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'anc_txt_hvr_color', [
				'label' => __( 'Anchor Text Hover Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-area .single-service .read-more:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

	protected function render() {

    $settings   = $this->get_settings();
    $sub_title  = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title  = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $services   = !empty( $settings['durgservices'] ) ? $settings['durgservices'] : '';
    ?>

    <!-- service-area-start -->
    <div class="service-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="section-title text-center mb-65">
                    <span><?php echo esc_html( $sub_title )?></span>
                    <h3><?php echo wp_kses_post(nl2br( $sec_title ))?></h3>
                </div>
            </div>
            <div class="row">
                <?php 
                if( is_array( $services ) && count( $services ) > 0 ) {
                    foreach( $services as $service ) {
                        $label = ( !empty( $service['label'] ) ) ? $service['label'] : '';
                        $service_img     = !empty( $service['service_img']['id'] ) ? wp_get_attachment_image( $service['service_img']['id'], 'durg_service_thumb_360x310', '', array('alt' => $label ) ) : '';
                        $short_desc = ( !empty( $service['short_desc'] ) ) ? $service['short_desc'] : '';
                        $anc_text = ( !empty( $service['anc_text'] ) ) ? $service['anc_text'] : '';
                        $anc_url = ( !empty( $service['anc_url']['url'] ) ) ? $service['anc_url']['url'] : '';
                        ?>
                        <div class="col-xl-4 col-md-4">
                            <div class="single-service">
                                <div class="service-thumb">
                                    <?php
                                        if ( $service_img ) {
                                            echo $service_img;
                                        }
                                    ?>
                                </div>
                                <h3><?php echo esc_html( $label )?></h3>
                                <p><?php echo esc_html( $short_desc )?></p>
                                <a href="<?php echo esc_url( $anc_url )?>" class="read-more"><?php echo esc_html( $anc_text )?></a>
                            </div>
                        </div>
                        <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- service-area-end -->
    <?php

    }
	
}
