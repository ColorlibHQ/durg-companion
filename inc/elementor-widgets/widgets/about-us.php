<?php
namespace Durgelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Utils;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Durg elementor about us section widget.
 *
 * @since 1.0
 */
class Durg_About_Us extends Widget_Base {

	public function get_name() {
		return 'durg-aboutus';
	}

	public function get_title() {
		return __( 'About Us', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-column';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

        // ----------------------------------------  About us content ------------------------------
        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'durg-companion' ),
            ]
        );
        $this->add_control(
            'select_style',
            [
                'label' => esc_html__( 'Select Style', 'durg-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options'   => [
                    'style_1' => 'Style 1',
                    'style_2' => 'Style 2',
                    'style_3' => 'Style 3',

                ],
                'default' => 'style_1'
            ]
        );
        $this->add_control(
            'about_img',
            [
                'label' => esc_html__( 'Left Image', 'durg-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'reverse_image',
            [
                'label' => esc_html__( 'Reverse Style', 'durg-companion' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options'   => [
                    'style_1' => 'No',
                    'style_2' => 'Yes',

                ],
                'default' => 'style_1',
                'condition' => [
                    'select_style'  => [
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'pattern_img',
            [
                'label' => esc_html__( 'Pattern BG Image', 'durg-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'select_style'  => 'style_1'
                ]
            ]
        );
        
        $this->add_control(
            'video_url',
            [
                'label' => esc_html__( 'Popup Video URL', 'durg-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => 'https://www.youtube.com/watch?v=vb9uYBtqmeM'
                ],
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2',
                    ],
                    'reverse_image!' => 'style_2',
                ]
            ]
        );

        $this->add_control(
            'right_sec_sep',
            [
                'label' => esc_html__( 'About Right Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'About Company', 'durg-companion' ),
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => 'Deliver inovative <br> Industrial solution',
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'about_text',
            [
                'label' => esc_html__( 'About Text', 'durg-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Waters makte fish every without firmament saw had. Morning air subdue very one. Whales grass is fish whales winged.', 'durg-companion' ),
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_2'
                    ]
                ]
            ]
        );
        $this->add_control(
            'signature_img',
            [
                'label' => esc_html__( 'Signature Image', 'durg-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'select_style'  => 'style_2',
                    'reverse_image!' => 'style_2',
                ]
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__( 'Button Text', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Learn More', 'durg-companion' ),
                'condition' => [
                    'select_style'  => 'style_1'
                ]
            ]
        );
        $this->add_control(
            'btn_url',
            [
                'label' => esc_html__( 'Button URL', 'durg-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default'   => [
                    'url'   => '#'
                ],
                'condition' => [
                    'select_style'  => 'style_1'
                ]
            ]
        );
        
        $this->end_controls_section(); // End about us content

        // ----------------------------------------  Reviews Section ------------------------------
        $this->start_controls_section(
            'reviews_section',
            [
                'label' => __( 'Reviews Section', 'durg-companion' ),
                'condition' => [
                    'select_style'  => [
                        'style_1',
                        'style_3'
                    ]
                ]
            ]
        );
        $this->add_control(
            'reviews', [
                'label' => __( 'Create New', 'durg-companion' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ client_name }}}',
                'fields' => [
                    [
                        'name'  => 'rev_txt',
                        'label' => __( 'Review Text', 'durg-companion' ),
                        'type'  => Controls_Manager::TEXTAREA,
                        'default' => __( 'Waters make fish every without firmament saw had. Morning air subdue very one. Whales grass is fish whales winged.', 'durg-companion' )
                    ],
                    [
                        'name'  => 'client_img',
                        'label' => __( 'Client Image', 'durg-companion' ),
                        'type'  => Controls_Manager::MEDIA,
                        'default'   => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ]
                    ],
                    [
                        'name'  => 'client_name',
                        'label' => __( 'Client Name', 'durg-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Jon Snow', 'durg-companion' )
                    ],
                    [
                        'name'  => 'client_designation',
                        'label' => __( 'Client Designation', 'durg-companion' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => __( 'Business Owner', 'durg-companion' )
                    ],
                    [
		                'name' => 'reviewstar',
		                'label' => __('Star Review', 'durg-companion'),
		                'type' => Controls_Manager::CHOOSE,
		                'options' => [
			                '1' => [
				                'title' => __('1', 'durg-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '2' => [
				                'title' => __('2', 'durg-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '3' => [
				                'title' => __('3', 'durg-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '4' => [
				                'title' => __('4', 'durg-companion'),
				                'icon' => 'fa fa-star',
			                ],
			                '5' => [
				                'title' => __('5', 'durg-companion'),
				                'icon' => 'fa fa-star',
			                ],
                        ],
                        'default'  => '5'
	                ],
                ],
                'default' => [
                    [
                        'rev_txt'            => __( 'Waters make fish every without firmament saw had. Morning air subdue very one. Whales grass is fish whales winged.', 'durg-companion' ),
                        'client_img'        => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'        => __( 'Mosan Cameron', 'durg-companion' ),
                        'client_designation' => __( 'Business Owner', 'durg-companion' ),
                        'reviewstar'         => '5',
                    ],
                    [
                        'rev_txt'            => __( 'Waters make fish every without firmament saw had. Morning air subdue very one. Whales grass is fish whales winged.', 'durg-companion' ),
                        'client_img'        => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'        => __( 'Mosan Cameron', 'durg-companion' ),
                        'client_designation' => __( 'Business Owner', 'durg-companion' ),
                        'reviewstar'         => '5',
                    ],
                    [
                        'rev_txt'            => __( 'Waters make fish every without firmament saw had. Morning air subdue very one. Whales grass is fish whales winged.', 'durg-companion' ),
                        'client_img'        => [
                            'url'   => Utils::get_placeholder_image_src(),
                        ],
                        'client_name'        => __( 'Mosan Cameron', 'durg-companion' ),
                        'client_designation' => __( 'Business Owner', 'durg-companion' ),
                        'reviewstar'         => '5',
                    ],
                ]
            ]
        );

        $this->add_control(
            'rev_right_sec_sep',
            [
                'label' => esc_html__( 'Right Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
        $this->add_control(
            'right_img',
            [
                'label' => esc_html__( 'Right Image', 'durg-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block'  => true,
            ]
        );
        $this->add_control(
            'total_reviews',
            [
                'label' => esc_html__( 'Total Reviews', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block'  => true,
                'default'       => __( '350+', 'durg-companion' )
            ]
        );
        $this->add_control(
            'review_second_line',
            [
                'label' => esc_html__( 'Second Line', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block'  => true,
                'default'       => __( 'Positive review', 'durg-companion' )
            ]
        );

        $this->end_controls_section(); // End experience

        //------------------------------ Style title ------------------------------
        
        // Top Section Styles
        $this->start_controls_section(
            'left_sec_style', [
                'label' => __( 'Top Section Styles', 'durg-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_title_col', [
				'label' => __( 'Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'sec_txt_col', [
				'label' => __( 'Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title p' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_col', [
				'label' => __( 'Button Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title .boxed-btn' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_bg_col', [
				'label' => __( 'Button BG Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title .boxed-btn' => 'background-color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'button_hvr_col', [
				'label' => __( 'Button Hover Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .section-title .boxed-btn:hover' => 'border-color: {{VALUE}} !important; background-color: transparent; color: {{VALUE}} !important',
				],
			]
        );

        $this->end_controls_section();

        // Bottom Section Styles
        $this->start_controls_section(
            'right_sec_style', [
                'label' => __( 'Bottom Section Styles', 'durg-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
			'quote_color', [
				'label' => __( 'Quote Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-info-text .quote' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'stars_col', [
				'label' => __( 'Stars Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-info-text .about-ratting i' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'review_txt_col', [
				'label' => __( 'Review Text Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-info-text p.about-text' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
            'reviewer_styles_sep',
            [
                'label' => esc_html__( 'Reviewer Styles Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'reviewer_name_col', [
				'label' => __( 'Reviewer Name Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-info-text .about-author .auhor-text span' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'reviewer_desig_col', [
				'label' => __( 'Reviewer Designation Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-info-text .about-author .auhor-text p' => 'color: {{VALUE}};',
				],
			]
        );
        
        $this->add_control(
            'reviews_right_sec_styles_sep',
            [
                'label' => esc_html__( 'Reviews Right Section Styles', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
			'reviews_first_line_col', [
				'label' => __( 'First Line Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-review .project-review h3' => 'color: {{VALUE}};',
				],
			]
        );

        $this->add_control(
			'reviews_sec_line_col', [
				'label' => __( 'Second Line Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-area .about-review .project-review p' => 'color: {{VALUE}} !important;',
				],
			]
        );

        $this->end_controls_section();

	}

	public function get_durg_reviews_section( $reviewstar, $rev_txt, $client_img, $client_name, $client_designation, $right_img, $total_reviews, $review_second_line ) {
    ?>
    <div class="row align-items-center">
        <div class="col-xl-6 col-md-6 col-lg-6 ">
            <div class="about-info-text">
                <div class="quote">
                    <i class="Flaticon flaticon-quote"></i>
                </div>
                <div class="about-ratting">
                    <?php
                    if ( $reviewstar ) {
                        for ($i = 1; $i <= 5; $i++) {
                            if ($reviewstar >= $i) {
                                echo '<i class="fa fa-star"></i>';
                            }
                        }
                    }
                    ?>
                </div>
                <p class="about-text"><?php echo esc_html( $rev_txt )?></p>
                <div class="about-author">
                    <div class="autor-thumb">
                        <?php
                            if ( $client_img ) {
                                echo $client_img;
                            }
                        ?>
                    </div>
                    <div class="auhor-text">
                        <span><?php echo esc_html( $client_name )?></span>
                        <p><?php echo esc_html( $client_designation )?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5 offset-xl-1 col-md-6">
            <div class="about-review">
                <?php
                    if ( $right_img ) {
                        echo $right_img;
                    }
                ?>
                <div class="project-review">
                    <h3><?php echo esc_html( $total_reviews )?></h3>
                    <p><?php echo esc_html( $review_second_line )?></p>
                </div>
            </div>
        </div>
    </div>
    <?php
    }

    public function get_durg_pattern_bg_img_section( $pattern_img, $default_pattern_img ) {
        ?>
        <div class="pattent-bg-img">
            <?php
                if ( $pattern_img ) {
                    echo $pattern_img;
                } else {
                    echo '<img src="'.$default_pattern_img.'">';
                }
            ?>
        </div>
        <?php
    }

    public function get_durg_about_thumb_section( $about_img, $reverse_image, $video_url ) {
        ?>
        <div class="about-thumb">
            <?php
                if ( $about_img ) {
                    echo $about_img;
                }

                if ( $reverse_image == 'style_1' ) {
                    ?>
                    <a class="video-icon popup-video" href="<?php echo esc_url( $video_url )?>">
                        <i class="fa fa-play"></i>
                    </a>
                    <?php
                }
            ?>
        </div>
    <?php
    }

    public function get_durg_about_text_section( $sub_title, $sec_title, $about_text, $section_style, $btn_url, $btn_text, $signature_img = '' ) {
        ?>
        <div class="section-title mb-65">
            <span><?php echo esc_html( $sub_title )?></span>
            <h3><?php echo nl2br( wp_kses_post( $sec_title ) )?></h3>
            <p class="para-text"><?php echo esc_html( $about_text )?></p>
            <?php 
            if( $section_style == 'style_1' ) { ?>
                <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn"><?php echo esc_html( $btn_text )?></a>
                <?php 
            } else { ?>
                <div class="name">
                    <?php
                        if ( $signature_img ) {
                            echo $signature_img;
                        }
                    ?>
                </div>
                <?php 
            } ?>
        </div>
        <?php
    }

	protected function render() {
    $settings = $this->get_settings();
    
    // call load widget script
    $this->load_widget_script();

    $section_style  = $settings['select_style'];
    $sub_title      = !empty( $settings['sub_title'] ) ?  $settings['sub_title'] : '';
    $about_img      = !empty( $settings['about_img']['id'] ) ? wp_get_attachment_image( $settings['about_img']['id'], 'durg_about_thumb_652x538', '', array('alt' => $sub_title ) ) : '';
    $video_url      = !empty( $settings['video_url']['url'] ) ?  $settings['video_url']['url'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ?  $settings['sec_title'] : '';
    $about_text     = !empty( $settings['about_text'] ) ?  $settings['about_text'] : '';
    $reverse_image = '';
    $btn_text = '';
    $btn_url = '';
    $signature_img = '';
    if ( $section_style == 'style_2' ) {
        $signature_img   = !empty( $settings['signature_img']['id'] ) ? wp_get_attachment_image( $settings['signature_img']['id'], 'durg_about_signature_thumb_138x31', '', array('alt' => 'about signature image' ) ) : '';
        $reverse_image = !empty( $settings['reverse_image'] ) ?  $settings['reverse_image'] : '';
    } else {
        $pattern_img    = !empty( $settings['pattern_img']['id'] ) ? wp_get_attachment_image( $settings['pattern_img']['id'], 'durg_about_pattern_600x382', '', array('alt' => 'about pattern image' ) ) : '';
        $default_pattern_img    = DURG_DIR_IMGS_URI . 'pattern.png';
        $btn_text       = !empty( $settings['btn_text'] ) ?  $settings['btn_text'] : '';
        $btn_url        = !empty( $settings['btn_url']['url'] ) ?  $settings['btn_url']['url'] : '';
        $reviews        = !empty( $settings['reviews'] ) ?  $settings['reviews'] : '';
        $right_img          = !empty( $settings['right_img']['id'] ) ? wp_get_attachment_image( $settings['right_img']['id'], 'durg_review_right_thumb_487x560', '', array('alt' => 'review right image' ) ) : '';
        $total_reviews      = !empty( $settings['total_reviews'] ) ?  $settings['total_reviews'] : '';
        $review_second_line = !empty( $settings['review_second_line'] ) ?  $settings['review_second_line'] : '';
    }
    ?>

    <!-- about start -->
    <div class="about-area section-padding">
        <?php if( $section_style == 'style_1' ) {
            $this->get_durg_pattern_bg_img_section( $pattern_img, $default_pattern_img );
        } ?>
        <div class="container">
            <?php if( ($section_style == 'style_1') || ($section_style == 'style_2') ) { ?>
            <div class="row align-items-center">
                <?php 
                    if ( $reverse_image == 'style_1' ) { ?>
                        <div class="col-xl-7 col-md-12 col-lg-6">
                            <?php
                                $this->get_durg_about_thumb_section( $about_img, $reverse_image, $video_url );
                            ?>
                        </div>
                        <div class="col-xl-5 col-md-12 col-lg-6">
                            <?php
                                $this->get_durg_about_text_section( $sub_title, $sec_title, $about_text, $section_style, $btn_url, $btn_text, $signature_img );
                            ?>
                        </div>
                        <?php 
                    } else { ?>
                        <div class="col-xl-5 col-md-12 col-lg-6">
                            <?php
                                $this->get_durg_about_text_section( $sub_title, $sec_title, $about_text, $section_style, $btn_url, $btn_text, $signature_img );
                            ?>
                        </div>
                        <div class="col-xl-7 col-md-12 col-lg-6">
                            <?php
                                $this->get_durg_about_thumb_section( $about_img, $reverse_image, $video_url );
                            ?>
                        </div>
                        <?php 
                    }
                ?>
            </div>
            <?php } 
            if ( ($section_style == 'style_1') || ($section_style == 'style_3') ) {
                $dynamic_class = $section_style != 'style_3' ? ' pt-120' : '';
            ?>
            <div class="about-pro-active owl-carousel<?php echo esc_attr( $dynamic_class )?>">
                <?php 
                if( is_array( $reviews ) && count( $reviews ) > 0 ) {
                    foreach( $reviews as $review ) {
                        $rev_txt = !empty( $review['rev_txt'] ) ? $review['rev_txt'] : '';
                        $client_name = !empty( $review['client_name'] ) ? $review['client_name'] : '';
                        $client_designation = !empty( $review['client_designation'] ) ? $review['client_designation'] : '';
                        $client_img     = !empty( $review['client_img']['id'] ) ? wp_get_attachment_image( $review['client_img']['id'], 'durg_widget_post_thumb', '', array('alt' => $client_name ) ) : '';
                        $reviewstar = !empty( $review['reviewstar'] ) ? $review['reviewstar'] : '';

                        $this->get_durg_reviews_section( $reviewstar, $rev_txt, $client_img, $client_name, $client_designation, $right_img, $total_reviews, $review_second_line );
                        
                    }
                }
                ?>
            </div>
            <?php 
            } ?>
        </div>
    </div>
    <!-- about end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            //about-pro-active
            $('.about-pro-active').owlCarousel({
                loop:true,
                margin:30,
            items:1,
            // autoplay:true,
            navText:['<i class="Flaticon flaticon-left-arrow"></i>','<i class="Flaticon flaticon-right-arrow"></i>'],
            nav:true,
            dots:false,
            // autoplayHoverPause: true,
            // autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        nav:false
            
                    },
                    767:{
                        items:1,
                        nav:false
                    },
                    992:{
                        items:1,
                        nav:false
                    },
                    1200:{
                        items:1,
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	
}
