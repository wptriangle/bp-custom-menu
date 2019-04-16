<?php
/**
 * Menu Page Options Metabox Extended
 *
 * @since      1.0
 * @package    BuddyPress Custom Menu
 * @author     Nahid Ferdous Mohit
 */

/*
 * If this file is called directly, abort.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Extended Menu Page Options 
 */

function menu_page_options_extend_attributes_meta_box( $post ) {

	if ( 'bp_custom_menu_page' == get_post_type( $post->ID ) ) {

		$values = get_post_custom( $post->ID );

		$default_submenu = ( isset( $values[ 'default_submenu' ][ 0 ] ) && '' !== $values[ 'default_submenu' ][ 0 ] ) ? $values[ 'default_submenu' ][ 0 ] : '';

		wp_nonce_field( 'bp_custom_menu_meta_box_nonce', 'meta_box_nonce' );

		$args = array(
		    'post_parent' => $post->ID,
		    'post_type'   => 'bp_custom_menu_page',
		);
		$submenus = get_children( $args );

		if ( ! empty( $submenus ) ) {
			?>
				<div class="menu-page-options-metabox">
			        <div class="components-base-control__field">
			            <p class="post-attributes-label-wrapper"><strong><?php esc_html_e( 'Set Default Submenu', 'buddypress-custom-menu' ); ?></strong></p>
			            <select name="default_submenu" id="default_submenu">
			            	<option value="<?php esc_attr_e( '', 'buddypress-custom-menu' ); ?>"<?php selected( $default_submenu, '' ); ?>><?php esc_html_e( 'None', 'buddypress-custom-menu' ); ?></option>
				            <?php 
					            foreach ( $submenus as $submenu ) {
					            	?>
					            		<option value="<?php echo $submenu->post_name ?>" <?php selected( $default_submenu, $submenu->post_name ); ?>><?php echo $submenu->post_title; ?></option>
					            	<?php
					            }
				            ?>
			            </select>
			        </div>
			    </div>
			<?php
		}
	}
}
add_action( 'page_attributes_misc_attributes', 'menu_page_options_extend_attributes_meta_box' );

function save_menu_page_options( $post_id ) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'bp_custom_menu_meta_box_nonce' ) ) return;

	if( !current_user_can( 'edit_post' ) ) return;

	/* Default Submenu */

	if( isset( $_POST['default_submenu'] ) )
        update_post_meta( $post_id, 'default_submenu', esc_attr( $_POST['default_submenu'] ) );
}
add_action( 'save_post', 'save_menu_page_options' );
