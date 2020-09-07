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
 * Durg elementor services details section widget.
 *
 * @since 1.0
 */
class Durg_Service_Details extends Widget_Base {

	public function get_name() {
		return 'durg-service-details';
	}

	public function get_title() {
		return __( 'Service Details', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-settings';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Service Details content ------------------------------
		$this->start_controls_section(
			'service_details_content',
			[
				'label' => __( 'Service Details content', 'durg-companion' ),
			]
        );

		$this->add_control(
            'service_details', [
                'label' => __( 'Create Item', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ item_title }}}',
                'fields' => [
                    [
                        'name' => 'item_title',
                        'label' => __( 'Item Title', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'Industrial Construction', 'durg-companion' ),
                    ],
                    [
                        'name' => 'item_img',
                        'label' => __( 'Item Image', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'service_text_item_1',
                        'label' => __( 'Service Text Item 1', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::WYSIWYG,
                    ],
                    [
                        'name' => 'service_text_item_2',
                        'label' => __( 'Service Text Item 2', 'durg-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::WYSIWYG,
                    ],
                ],
                'default'   => [
                    [
                        'item_title'         => __( 'Industrial Construction', 'durg-companion' ),
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'service_text_item_1'    => '',
                        'service_text_item_2'    => '',
                        
                    ],
                    [
                        'item_title'         => __( 'Mechanical engineering', 'durg-companion' ),
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'service_text_item_1'    => '',
                        'service_text_item_2'    => '',
                    ],
                    [
                        'item_title'         => __( 'Bridge construction', 'durg-companion' ),
                        'item_img'    => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'service_text_item_1'    => '',
                        'service_text_item_2'    => '',
                    ],
                ]
            ]
        );
        $this->add_control(
            'btn_label',
            [
                'label'     => esc_html__( 'Button Label', 'durg-companion' ),
                'type'      => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__('Download broucher', 'durg-companion')
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label'     => esc_html__( 'Button URL', 'durg-companion' ),
                'type'      => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
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
            'style_service_details_section', [
                'label' => __( 'Style Service Details Section', 'durg-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_title_col', [
                'label' => __( 'Service Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details .details-nav ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_service_title_col', [
                'label' => __( 'Active Service Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details .details-nav ul li a.active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .service-details .details-nav ul li a.active:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_txt_col', [
                'label' => __( 'Button Text Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details .details-nav .download-brouser' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'btn_bg_col', [
                'label' => __( 'Button BG Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-details .details-nav .download-brouser' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
	}

	protected function render() {
    $settings   = $this->get_settings();
    $services   = !empty( $settings['service_details'] ) ? $settings['service_details'] : '';
    $btn_label  = !empty( $settings['btn_label'] ) ? $settings['btn_label'] : '';
    $btn_url    = !empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '';
    ?>

    
    <!-- service-details-start -->
    <div class="service-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="details-nav">
                        <nav>
                            <ul class="nav" id="myTab" role="tablist">
                                <?php 
                                if( is_array( $services ) && count( $services ) > 0 ) {
                                    $counter = 0;
                                    foreach( $services as $service ) {
                                        $item_title = ( !empty( $service['item_title'] ) ) ? $service['item_title'] : '';
                                        $counter++;
                                        ?>
                                        <li class="nav-item">
                                            <a class="nav-link<?php echo ($counter == 1) ? ' active' : '' ?>" id="<?php echo (str_replace(' ', '-', strtolower($item_title)))?>-tab" data-toggle="tab" href="#<?php echo (str_replace(' ', '-', strtolower($item_title)))?>" role="tab"
                                                aria-controls="<?php echo (str_replace(' ', '-', strtolower($item_title)))?>" aria-selected="<?php echo ($counter == 1) ? 'true' : 'false' ?>"><?php echo esc_html( $item_title )?></a>
                                        </li>
                                        <?php 
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                        <a href="<?php echo esc_url( $btn_url )?>" class="download-brouser"><?php echo esc_html( $btn_label )?></a>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="single-details">
                        <div class="tab-content" id="myTabContent">
                            <?php 
                            if( is_array( $services ) && count( $services ) > 0 ) {
                                $counter2 = 0;
                                foreach( $services as $service ) {
                                    $item_title = ( !empty( $service['item_title'] ) ) ? $service['item_title'] : '';
                                    $service_img     = !empty( $service['item_img']['id'] ) ? wp_get_attachment_image( $service['item_img']['id'], 'durg_service_details_thumb_750x476', '', array('alt' => $item_title ) ) : '';
                                    $item_text = ( !empty( $service['item_text'] ) ) ? $service['item_text'] : '';
                                    $service_text_item_1 = ( !empty( $service['service_text_item_1'] ) ) ? $service['service_text_item_1'] : '';
                                    $service_text_item_2 = ( !empty( $service['service_text_item_2'] ) ) ? $service['service_text_item_2'] : '';
                                    $counter2++;
                                    ?>
                                    <div class="tab-pane fade<?php echo ($counter2 == 1) ? ' show active' : '' ?>" id="<?php echo (str_replace(' ', '-', strtolower($item_title)))?>" role="tabpanel" aria-labelledby="<?php echo (str_replace(' ', '-', strtolower($item_title)))?>-tab">
                                        <div class="details-wrap">
                                            <div class="details-thumb">
                                                <?php
                                                    if ( $service_img ) {
                                                        echo $service_img;
                                                    }
                                                ?>
                                            </div>
                                            <div class="details-info">
                                                <?php echo nl2br( wp_kses_post( $service_text_item_1 ))?>
                                            </div>
                                            <div class="details-info">
                                                <?php echo nl2br( wp_kses_post( $service_text_item_2 ))?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-details-end -->
    <?php

    }
	
}
