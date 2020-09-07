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
 * elementor portfolio section widget.
 *
 * @since 1.0
 */
class Durg_Portfolio extends Widget_Base {

	public function get_name() {
		return 'durg-portfolio';
	}

	public function get_title() {
		return __( 'Projects', 'durg-companion' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'durg-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  portfolio settings ------------------------------
        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'Project Settings', 'durg-companion' ),
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

                ],
                'default' => 'style_1'
            ]
        );
        $this->add_control(
            'sec_title',
            [
                'label' => esc_html__( 'Section Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Take a look around <br> our projects',
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Waters make fish every without firmament saw had. <br> Morning air subdue.',
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'more_btn_label',
            [
                'label' => esc_html__( 'More Button Label', 'durg-companion' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => esc_html__( 'More Projects', 'durg-companion' ),
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'more_btn_url',
            [
                'label' => esc_html__( 'More Button URL', 'durg-companion' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'portfolio_inner_settings_seperator',
            [
                'label' => esc_html__( 'Project Settings', 'durg-companion' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'bg_img',
            [
                'label' => esc_html__( 'Project BG Image', 'durg-companion' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'select_style'  => [
                        'style_1',
                    ]
                ],
            ]
        );

        $this->add_control(
            'portfolio_number',
            [
                'label' => esc_html__( 'Project Item Number', 'durg-companion' ),
                'type' => Controls_Manager::NUMBER,
                'label_block' => true,
                'default' => 5
            ]
        );

        $this->end_controls_section(); // End portfolio settings


        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Title', 'durg-companion' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'sub_title_col', [
                'label' => __( 'Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .section-title h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sec_title_col', [
                'label' => __( 'Text Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .section-title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'anchor_txt_col', [
                'label' => __( 'Anchor Text Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .more-project a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'anchor_txt_hvr_col', [
                'label' => __( 'Anchor Text Hover Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .more-project a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'sing_project_item_styles_sep',
            [
                'label' => esc_html__( 'Single Project Item Styles', 'durg-companion' ),
                'type'  => Controls_Manager::HEADING,
                'separator' => 'after'
            ]
        );

        $this->add_control(
            'project_title_col', [
                'label' => __( 'Project Title Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .project-active .single-project .project-info span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'project_brief_col', [
                'label' => __( 'Project Short Brief Color', 'durg-companion' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-area .project-active .single-project .project-info h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

	}

	protected function render() {
        $settings = $this->get_settings();
        $this->load_widget_script();
        $style_type = !empty( $settings['select_style'] ) ? $settings['select_style'] : '';
        $project_number = !empty( $settings['portfolio_number'] ) ? $settings['portfolio_number'] : '';
        if ( $style_type == 'style_1' ) {
            $portfolio_page_id = get_page_by_title( 'Our Projects' )->ID;
            $portfolio_page_url = get_page_link($portfolio_page_id);
            $sec_title = !empty( $settings['sec_title'] ) ? $settings['sec_title'] : '';
            $sub_title = !empty( $settings['sub_title'] ) ? $settings['sub_title'] : '';
            $more_btn_label = !empty( $settings['more_btn_label'] ) ? $settings['more_btn_label'] : '';
            $more_btn_url = !empty( $settings['more_btn_url']['url'] ) ? $settings['more_btn_url']['url'] : $portfolio_page_url;
            $bg_img = !empty( $settings['bg_img']['url'] ) ? $settings['bg_img']['url'] : '';
            ?>
            <!-- project-area-start -->
            <div class="project-area bg-img-2 overlay" <?php echo durg_inline_bg_img( esc_url( $bg_img ) ); ?>>
                <div class="container-fluid p-lg-0">
                    <div class="row justify-content-end no-gutters">
                        <div class="col-xl-4 col-md-6">
                            <div class="section-title text-white mb-65 ml-80">
                                <h3><?php echo wp_kses_post( nl2br( $sec_title ) )?></h3>
                                <p><?php echo wp_kses_post( nl2br( $sub_title ) )?></p>
                                <div class="more-project">
                                    <a href="<?php echo esc_url( $more_btn_url )?>"><?php echo esc_html( $more_btn_label )?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="project-active owl-carousel">
                                <?php
                                    durg_project_section( $project_number );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- project-area-end -->
            <?php 
        } else { ?>
            <!-- main-project-area-start -->
            <div class="main-project-area">
                <div class="container">
                    <div class="row">
                        <?php
                            durg_project2_section( $project_number );
                        ?>
                    </div>
                </div>
            </div>
            <!-- main-project-area-end -->
            <?php
        }
    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            
            //project-active
            $('.project-active').owlCarousel({
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
                    items:2,
                    nav:false
                },
                1200:{
                    items:1,
                },
                1501:{
                    items:2,
                }
            }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
