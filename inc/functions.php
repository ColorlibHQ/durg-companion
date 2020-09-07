<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Durg Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */

// Section Heading
function durg_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'durg_companion_frontend_scripts', 99 );
function durg_companion_frontend_scripts() {

	wp_enqueue_script( 'durg-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'durg-common-js', plugins_url( '../js/common.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_durg_portfolio_ajax', 'durg_portfolio_ajax' );

add_action( 'wp_ajax_nopriv_durg_portfolio_ajax', 'durg_portfolio_ajax' );
function durg_portfolio_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo durg_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}


// Project Custom Post
function durg_custom_posts() {	
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name', 'durg-companion' ),
		'singular_name'      => _x( 'Project', 'post type singular name', 'durg-companion' ),
		'menu_name'          => _x( 'Projects', 'admin menu', 'durg-companion' ),
		'name_admin_bar'     => _x( 'Project', 'add new on admin bar', 'durg-companion' ),
		'add_new'            => _x( 'Add New', 'project', 'durg-companion' ),
		'add_new_item'       => __( 'Add New Project', 'durg-companion' ),
		'new_item'           => __( 'New Project', 'durg-companion' ),
		'edit_item'          => __( 'Edit Project', 'durg-companion' ),
		'view_item'          => __( 'View Project', 'durg-companion' ),
		'all_items'          => __( 'All Projects', 'durg-companion' ),
		'search_items'       => __( 'Search Projects', 'durg-companion' ),
		'parent_item_colon'  => __( 'Parent Projects:', 'durg-companion' ),
		'not_found'          => __( 'No projects found.', 'durg-companion' ),
		'not_found_in_trash' => __( 'No projects found in Trash.', 'durg-companion' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'durg-companion' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'       	 => 'dashicons-list-view',
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'project', $args );

}
add_action( 'init', 'durg_custom_posts' );



/*=========================================================
    Projects Section
========================================================*/
function durg_project_section( $pNumber = 5 ){ 
	$projects = new WP_Query( array(
		'post_type' => 'project',
		'order'		=> 'ASC',
		'posts_per_page'=> $pNumber,

	) );
	
	if( $projects->have_posts() ) {
		while ( $projects->have_posts() ) {
			$projects->the_post();					
			$project_short_brief = durg_meta( 'short_brief');				
			?>
			<div class="single-project">
				<div class="project-thumb">
					<?php the_post_thumbnail( 'durg_project_thumb_554x428', ['alt' => get_the_title()] )?>
				</div>
				<div class="project-info">
					<span><?php the_title()?></span>
					<?php if ( $project_short_brief ) { ?>
						<h3><?php echo esc_html( $project_short_brief )?></h3>
					<?php } ?>
				</div>
			</div>
			<?php
		}
	}
}

// Project2 part
function durg_project2_section( $pNumber = 4 ){
	$projects = new WP_Query( array(
		'post_type' => 'project',
		'order'		=> 'ASC',
		'posts_per_page'=> $pNumber,

	) );
	
	if( $projects->have_posts() ) {
		while ( $projects->have_posts() ) {
			$projects->the_post();					
			$project_short_brief = durg_meta( 'short_brief');				
			?>
			<div class="col-xl-6 col-md-6">
				<div class="single-project">
					<div class="project-thumb">
						<?php the_post_thumbnail( 'durg_project_thumb_554x428', ['alt' => get_the_title()] )?>
					</div>
					<div class="project-info">
						<span><?php echo esc_html( $project_short_brief )?></span>
						<h3><a href="<?php the_permalink()?>"><?php the_title()?></a></h3>
					</div>
				</div>
			</div>
			<?php
		}
	}
}