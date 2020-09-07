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
 * Durg elementor team widget.
 *
 * @since 1.0
 */
class Durg_Team extends Widget_Base {

	public function get_name() {
		return 'durg-team';
	}

	public function get_title() {
		return __( 'Team', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Team content ------------------------------
		$this->start_controls_section(
			'team_content_section',
			[
				'label' => __( 'Team content', 'durg-companion' ),
			]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'OUR INDUSTRIAL EXPERTS', 'durg-companion' ),
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Sec Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html__( 'Meet with our Industrial experts', 'durg-companion' ),
            ]
        );
        $this->add_control(
            'team_contents', [
                'label' => __( 'Add An Item', 'durg-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ member_name }}}',
                'fields' => [
                    [
                        'name' => 'member_img',
                        'label' => esc_html__( 'Member Image', 'durg-companion' ),
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'member_name',
                        'label' => __( 'Member Name', 'durg-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default' => __( 'Kamal Dowlat', 'durg-companion' ),
                    ],
                    [
                        'name' => 'member_designation',
                        'label' => __( 'Member Designation', 'durg-companion' ),
                        'type' => Controls_Manager::TEXT,
                        'label_block'   => true,
                        'default' => __( 'Industrial engineer', 'durg-companion' ),
                    ],
                    [
                        'name' => 'social_profiles_seperator',
                        'label' => __( 'Social Profiles', 'durg-companion' ),
                        'type' => Controls_Manager::HEADING,
                        'separator' => 'before'
                    ],
                    [
                        'name' => 'fb_url',
                        'label' => __( 'Facebook Profile URL', 'durg-companion' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'tw_url',
                        'label' => __( 'Twitter Profile URL', 'durg-companion' ),
                        'type' => Controls_Manager::URL,
                    ],
                    [
                        'name' => 'linkedin_url',
                        'label' => __( 'Linkedin Profile URL', 'durg-companion' ),
                        'type' => Controls_Manager::URL,
                    ],
                ],
                'default'   => [
                    [
                        'member_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'           => __( 'Kamal Dowlat', 'durg-companion' ),
                        'member_designation'    => __( 'Industrial engineer', 'durg-companion' ),
                        'fb_url'                => [
                            'url'               => '#'
                        ],
                        'tw_url'                => [
                            'url'               => '#'
                        ],
                        'linkedin_url'          => [
                            'url'               => '#'
                        ]                        
                    ],
                    [
                        'member_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'           => __( 'Miller Jonson', 'durg-companion' ),
                        'member_designation'    => __( 'Chief engineer', 'durg-companion' ),
                        'fb_url'                => [
                            'url'               => '#'
                        ],
                        'tw_url'                => [
                            'url'               => '#'
                        ],
                        'linkedin_url'          => [
                            'url'               => '#'
                        ]                        
                    ],
                    [
                        'member_img'            => [
                            'url'               => Utils::get_placeholder_image_src(),
                        ],
                        'member_name'           => __( 'Aristetol Smith', 'durg-companion' ),
                        'member_designation'    => __( 'Civil engineer', 'durg-companion' ),
                        'fb_url'                => [
                            'url'               => '#'
                        ],
                        'tw_url'                => [
                            'url'               => '#'
                        ],
                        'linkedin_url'          => [
                            'url'               => '#'
                        ]                        
                    ],
                ]
            ]
        );

		$this->end_controls_section(); // End service content

    /**
     * Style Tab
     * ------------------------------ Style Section ------------------------------
     *
     */
        $this->start_controls_section(
			'style_team_sections', [
				'label' => __( 'Style Team Section', 'durg-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-area .section-title span' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'sec_title_col', [
				'label' => __( 'Section Title Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-area .section-title h3' => 'color: {{VALUE}};',
				],
			]
        );
        $this->add_control(
            'single_item_styles_sep',
            [
                'label' => esc_html__( 'Single Item Style Section', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );
		$this->add_control(
			'member_name_col', [
				'label' => __( 'Member Name Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-area .single-team .team-info h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'member_desg_color', [
				'label' => __( 'Member Designation Color', 'durg-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .team-area .single-team .team-info p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .team-area' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->end_controls_section();

	}

    protected function render() {
    $settings       = $this->get_settings();
    $sub_title      = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
    $sec_title      = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
    $team_contents  = !empty( $settings['team_contents'] ) ? $settings['team_contents'] : '';

    function durg_get_single_team_item( $member_img, $member_name, $member_designation, $fb_url, $tw_url, $linkedin_url ) { ?>
        <div class="col-xl-4 col-lg-4 col-md-6">
            <div class="single-team">
                <div class="team-thumb">
                    <?php
                        if ( $member_img ) {
                            echo $member_img;
                        }
                    ?>
                    <div class="team-hover">
                        <div class="team-link">
                            <ul>
                                <li><a href="<?php echo esc_url( $fb_url )?>"> <i class="fa fa-facebook"></i> </a></li>
                                <li><a href="<?php echo esc_url( $tw_url )?>"> <i class="fa fa-twitter"></i> </a></li>
                                <li><a href="<?php echo esc_url( $linkedin_url )?>"> <i class="fa fa-linkedin"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="team-info text-center">
                    <h3><?php echo esc_html( $member_name )?></h3>
                    <p><?php echo esc_html( $member_designation )?></p>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- team-start -->
    <div class="team-area section-padding gray-bg">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="section-title text-center mb-65">
                    <span><?php echo esc_html( $sub_title )?></span>
                    <h3><?php echo esc_html( $sec_title )?></h3>
                </div>
            </div>
            <div class="row">
                <?php
                if( is_array( $team_contents ) && count( $team_contents ) > 0 ){
                    foreach ( $team_contents as $single_item ) {                               
                        $member_name = !empty( $single_item['member_name'] ) ? $single_item['member_name'] : '';
                        $member_img      = !empty( $single_item['member_img']['id'] ) ? wp_get_attachment_image( $single_item['member_img']['id'], 'durg_team_thumb_360x350', '', ['alt' => $member_name] ) : '';
                        $member_designation   = !empty( $single_item['member_designation'] ) ? $single_item['member_designation'] : '';
                        $fb_url   = !empty( $single_item['fb_url']['url'] ) ? $single_item['fb_url']['url'] : '';
                        $tw_url   = !empty( $single_item['tw_url']['url'] ) ? $single_item['tw_url']['url'] : '';
                        $linkedin_url   = !empty( $single_item['linkedin_url']['url'] ) ? $single_item['linkedin_url']['url'] : '';

                        durg_get_single_team_item( $member_img, $member_name, $member_designation, $fb_url, $tw_url, $linkedin_url );
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- team-end -->
    <?php

    }
	
}
