<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ciberfreak_Switchover_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve list widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'cbw';
    }

    /**
     * Get widget title.
     *
     * Retrieve list widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Switch Over', 'ciberfreak');
    }

    /**
     * Get widget icon.
     *
     * Retrieve list widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-dual-button';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['ciberfreak-el-widgets'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the list widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['ciberfreak switchover widgets', 'switchover', 'custom switchover'];
    }

    public function get_script_depends()
    {
        return ['ciberfreak-switchover-widget'];
    }

    public function get_style_depends()
    {
        return ['ciberfreak-switchover-widget'];
    }


    /**
     * Register list widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('State One', 'ciberfreak'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'stateone_title',
			[
				'label' => esc_html__( 'Title', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'FUNKCIONALNA MEDICINA', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your title here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'stateone_link',
			[
				'label' => esc_html__( 'Link', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'stateone_col_one',
			[
				'label' => esc_html__( 'Column One', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul>
                        <li>Avtoimuna obolenja</li>
                        <li>Kronične bolezni</li>
                        <li>Sistemska stanja</li>
                        <li>Izgorelost</li>
                    </ul>', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your description here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'stateone_col_two',
			[
				'label' => esc_html__( 'Column Two', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul class="two">
                        <li>Akutna stanja</li>
                        <li>Črevesje</li>
                        <li>Hormoni</li>
                        <li>Šport</li>
                    </ul>', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your description here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'stateone_image',
			[
				'label' => esc_html__( 'Choose Image', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => CSW_PLUGIN_ASSETS_FILE . "/images/girl.png",
				],
			]
		);

        $this->add_responsive_control(
			'stateone_height',
			[
				'label' => esc_html__( 'Image Height', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 450,
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_one .image-row img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'stateone_width',
			[
				'label' => esc_html__( 'Image Width', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_one .image-row img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'stateone_size',
			[
				'label' => esc_html__( 'Image Size', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'contain',
				'options' => [
					'contain' => esc_html__( 'contain', 'ciberfreak' ),
					'cover'  => esc_html__( 'cover', 'ciberfreak' ),
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_one .image-row img' => 'object-fit: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'stateone_posx',
			[
				'label' => esc_html__( 'Image Position X', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -5000,
						'max' => 5000,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_one .image-row' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'stateone_posy',
			[
				'label' => esc_html__( 'Image Position Y', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -5000,
						'max' => 5000,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_one .image-row' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section_two',
            [
                'label' => esc_html__('State Two', 'ciberfreak'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'statetwo_title',
			[
				'label' => esc_html__( 'Title', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ESTETSKA MEDICINA', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your title here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'statetwo_link',
			[
				'label' => esc_html__( 'Link', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

        $this->add_control(
			'statetwo_col_one',
			[
				'label' => esc_html__( 'Column One', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul>
                        <li>Avtoimuna obolenja 2</li>
                        <li>Kronične bolezni 2</li>
                        <li>Sistemska stanja 2</li>
                        <li>Izgorelost 2</li>
                    </ul>', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your description here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'statetwo_col_two',
			[
				'label' => esc_html__( 'Column Two', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( '<ul class="two">
                        <li>Akutna stanja 2</li>
                        <li>Črevesje 2</li>
                        <li>Hormoni 2</li>
                        <li>Šport 2</li>
                    </ul>', 'ciberfreak' ),
				'placeholder' => esc_html__( 'Type your description here', 'ciberfreak' ),
			]
		);

        $this->add_control(
			'statetwo_image',
			[
				'label' => esc_html__( 'Choose Image', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => CSW_PLUGIN_ASSETS_FILE . "/images/girl2.png",
				],
			]
		);

        $this->add_responsive_control(
			'statetwo_height',
			[
				'label' => esc_html__( 'Image Height', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 510,
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_two .image-row img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'statetwo_width',
			[
				'label' => esc_html__( 'Image Width', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_two .image-row img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
			'statetwo_size',
			[
				'label' => esc_html__( 'Image Size', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'contain',
				'options' => [
					'contain' => esc_html__( 'contain', 'ciberfreak' ),
					'cover'  => esc_html__( 'cover', 'ciberfreak' ),
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_two .image-row img' => 'object-fit: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'statetwo_posx',
			[
				'label' => esc_html__( 'Image Position X', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -5000,
						'max' => 5000,
						'step' => 5,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_two .image-row' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'statetwo_posy',
			[
				'label' => esc_html__( 'Image Position Y', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -5000,
						'max' => 5000,
						'step' => 5,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => -40,
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .tab_two .image-row' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style', 'ciberfreak'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
			'section_padding',
			[
				'label' => esc_html__( 'Section Padding', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'row_margin',
			[
				'label' => esc_html__( 'Row One Margin', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'items_margin',
			[
				'label' => esc_html__( 'List Items Margin', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-two ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'rowtwo_min_height',
			[
				'label' => esc_html__( 'Row Two Min Height', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5000,
						'step' => 5,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 410,
				],
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-two' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Links Typography', 'ciberfreak' ),
				'name' => 'links_typography',
				'selector' => '{{WRAPPER}} .switch_over_section .row-one a',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Items Typography', 'ciberfreak' ),
				'name' => 'items_typography',
				'selector' => '{{WRAPPER}} .switch_over_section .row-two ul li, {{WRAPPER}} .switch_over_section .row-two col',
			]
		);

        $this->add_control(
			'links_color',
			[
				'label' => esc_html__( 'Links Color', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-one a' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'items_color',
			[
				'label' => esc_html__( 'Items Color', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-two ul li' => 'color: {{VALUE}}',
					'{{WRAPPER}} .switch_over_section .row-two col' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'switch_color',
			[
				'label' => esc_html__( 'Switch Color', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-one .slider' => 'background-color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'switch_color_active',
			[
				'label' => esc_html__( 'Switch Color Active', 'ciberfreak' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .switch_over_section .row-one input:focus + .slider' => '-webkit-box-shadow: {{VALUE}}',
					'{{WRAPPER}} .switch_over_section .row-one input:focus + .slider' => 'box-shadow: {{VALUE}}',
					'{{WRAPPER}} .switch_over_section .row-one input:checked + .slider' => 'background-color: {{VALUE}}',
				],
			]
		);


        $this->end_controls_section();

    }

    /**
     * Render list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="switch_over_section">
                <div class="image-bg">
                    <img style="height: 100%" src="<?php echo CSW_PLUGIN_ASSETS_FILE; ?>/images/bg-flower.png" alt="flower image">
                </div>
                <div class="row-one">
                    <div class="link_one">
                        <?php
                            if ( ! empty( $settings['stateone_link']['url'] ) ) {
                                $this->add_link_attributes( 'stateone_link', $settings['stateone_link'] );
                            }
                        ?>
                        <a class="active" <?php $this->print_render_attribute_string( 'stateone_link' ); ?> ><?php echo $settings['stateone_title']; ?></a>
                    </div>
                    <div class="switchover">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    </div>
                    <div class="link_two">
                    <?php
                            if ( ! empty( $settings['statetwo_link']['url'] ) ) {
                                $this->add_link_attributes( 'statetwo_link', $settings['statetwo_link'] );
                            }
                        ?>
                        <a class="active" <?php $this->print_render_attribute_string( 'statetwo_link' ); ?> ><?php echo $settings['statetwo_title']; ?></a>
                    </div>
                </div>
                <div class="row-two tab_one">
                    <div class="col">
                        <?php echo $settings['stateone_col_one']; ?>
                    </div>
                    <div class="col">
                        <?php echo $settings['stateone_col_two']; ?>
                    </div>
                    <div class="image-row">
                        <img src="<?php echo $settings['stateone_image']['url']; ?>" alt="girl image">
                    </div>
                </div>
                <div class="row-two tab_two d-none">
                    <div class="col">
                        <?php echo $settings['statetwo_col_one']; ?>
                    </div>
                    <div class="col">
                        <?php echo $settings['statetwo_col_one']; ?>
                    </div>
                    <div class="image-row">
                    <img src="<?php echo $settings['statetwo_image']['url']; ?>" alt="girl image">
                    </div>
                </div>
            </div>
        <?php
    }
}
