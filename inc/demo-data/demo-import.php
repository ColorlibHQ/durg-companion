<?php 
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : Durg Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// demo import file
function durg_import_files() {
	
	$demoImg = '<img src="'.plugins_url( 'screen-image.jpg', __FILE__ ) .'" alt="'.esc_attr__( 'Demo Preview Imgae', 'durg-companion' ).'" />';
	
  return array(
    array(
      'import_file_name'             => 'Durg Demo',
      'local_import_file'            => DURG_COMPANION_DEMO_DIR_PATH .'durg-demo.xml',
      'local_import_widget_file'     => DURG_COMPANION_DEMO_DIR_PATH .'durg-widgets-demo.wie',
      'import_customizer_file_url'   => plugins_url( 'durg-customizer.dat', __FILE__ ),
      'import_notice' => $demoImg,
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'durg_import_files' );
	
// demo import setup
function durg_after_import_setup() {
	// Assign menus to their locations.
	$top_menu    = get_term_by( 'name', 'Top Bar Menu', 'nav_menu' );
	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
	$company   	 = get_term_by( 'name', 'Company', 'nav_menu' );
	$solutions   = get_term_by( 'name', 'Solutions', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
			'top-bar-menu' 	=> $top_menu->term_id,
			'primary-menu'  => $main_menu->term_id,
			'company'  		=> $company->term_id,
			'solutions'  	=> $solutions->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Homepage' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	// Add an option to check after import is done
	update_option( 'durg-import-data', true );

}
add_action( 'pt-ocdi/after_import', 'durg_after_import_setup' );

//disable the branding notice after successful demo import
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

//change the location, title and other parameters of the plugin page
function durg_import_plugin_page_setup( $default_settings ) {
	$default_settings['parent_slug'] = 'themes.php';
	$default_settings['page_title']  = esc_html__( 'One Click Demo Import' , 'durg-companion' );
	$default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'durg-companion' );
	$default_settings['capability']  = 'import';
	$default_settings['menu_slug']   = 'durg-demo-import';

	return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'durg_import_plugin_page_setup' );

// Enqueue scripts
function durg_demo_import_custom_scripts(){
	
	
	if( isset( $_GET['page'] ) && $_GET['page'] == 'durg-demo-import' ){
		// style
		wp_enqueue_style( 'durg-demo-import', plugins_url( 'css/demo-import.css', __FILE__ ), array(), '1.0', false );
	}
	
	
}
add_action( 'admin_enqueue_scripts', 'durg_demo_import_custom_scripts' );
