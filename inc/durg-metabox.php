<?php
function durg_portfolio_metabox( $meta_boxes ) {

	$durg_prefix = '_durg_';
	$meta_boxes[] = array(
		'id'        => 'portfolio_single_metaboxs',
		'title'     => esc_html__( 'Project Options', 'durg-companion' ),
		'post_types'=> array( 'project' ),
		'context'   => 'side',
		'priority'  => 'high',
		'autosave'  => 'false',
		'fields'    => array(
			array(
				'id'    => $durg_prefix . 'short_brief',
				'type'  => 'textarea',
				'name'  => esc_html__( 'Project Short Brief', 'durg-companion' ),
				'placeholder' => esc_html__( 'Project Short Brief', 'durg-companion' ),
			),
			array(
				'id'    => $durg_prefix . 'project_img',
				'type'  => 'image_advanced',
				'name'  => esc_html__( 'Project Big Image', 'durg-companion' ),
				'placeholder' => esc_html__( 'Project Big Image', 'durg-companion' ),
				'max_file_uploads' => 1,
				'max_status'       => false
			),
			array(
				'id'    => $durg_prefix . 'details_txt_left',
				'type'  => 'wysiwyg',
				'name'  => esc_html__( 'Project Details Text Left', 'durg-companion' ),
				'options' => [
					'textarea_rows' => 4,
					'teeny'			=> true
				]
			),
			array(
				'id'    => $durg_prefix . 'details_txt_right',
				'type'  => 'wysiwyg',
				'name'  => esc_html__( 'Project Details Text Right', 'durg-companion' ),
				'options' => [
					'textarea_rows' => 4,
					'teeny'			=> true
				],
			),
		),
	);


	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'durg_portfolio_metabox' );