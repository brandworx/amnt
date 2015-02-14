<?php
/*
Plugin Name: Ninja FOrms - Mail Chimp
Plugin URL: http://wpninjas.com/downloads/mail-chimp
Description: Sign users up for your Mail Chimp newsletter when submitting Ninja Forms
Version: 1.1.2
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Contributors: Pippin Williamson
*/

define( 'NINJA_FORMS_EDD_MC_PRODUCT_NAME', 'Mail Chimp' );


/**
 * Plugin text domain
 *
 * @since       1.0
 * @return      void
 */
function ninja_forms_mc_textdomain() {

	// Set filter for plugin's languages directory
	$edd_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	$edd_lang_dir = apply_filters( 'ninja_forms_mc_languages_directory', $edd_lang_dir );

	// Load the translations
	load_plugin_textdomain( 'ninja-forms-mc', false, $edd_lang_dir );
}
add_action( 'init', 'ninja_forms_mc_textdomain' );


/**
 * Add the Mail Chimp tab to the Plugin Settings screen
 *
 * @since       1.0
 * @return      void
 */

function ninja_forms_mc_add_tab() {

	if ( ! function_exists( 'ninja_forms_register_tab_metabox_options' ) )
		return;

	$tab_args              = array(
		'name'             => 'Mail Chimp',
		'page'             => 'ninja-forms-settings',
		'display_function' => '',
		'save_function'    => 'ninja_forms_save_license_settings',
	);
	ninja_forms_register_tab( 'mail_chimp', $tab_args );

}
add_action( 'admin_init', 'ninja_forms_mc_add_tab' );


/**
 * PRegister the settings in the Mail Chimp Tab
 *
 * @since       1.0
 * @return      void
 */
function ninja_forms_mc_add_plugin_settings() {

	if ( ! function_exists( 'ninja_forms_register_tab_metabox_options' ) )
		return;

	$mc_args = array(
		'page'     => 'ninja-forms-settings',
		'tab'      => 'mail_chimp',
		'slug'     => 'mail_chimp',
		'title'    => __( ' Mail Chimp', 'ninja-forms-mc' ),
		'settings' => array(
			array(
				'name' => 'ninja_forms_mc_api',
				'label' => __( 'Mail Chimp API Key', 'ninja-forms-mc' ),
				'desc' => __( 'Enter your Mail Chimp API key', 'ninja-forms-mc' ),
				'type' => 'text',
				'size' => 'regular'
			)
		)
	);
	ninja_forms_register_tab_metabox( $mc_args );
}
add_action( 'admin_init', 'ninja_forms_mc_add_plugin_settings', 100 );


/**
 * Register the form-specific settings
 *
 * @since       1.0
 * @return      void
 */
function ninja_forms_mc_add_form_settings() {

	if ( ! function_exists( 'ninja_forms_register_tab_metabox_options' ) )
		return;

	$args = array();
	$args['page'] = 'ninja-forms';
	$args['tab']  = 'form_settings';
	$args['slug'] = 'basic_settings';
	$args['settings'] = array(
		array(
			'name'      => 'mailchimp_signup_form',
			'type'      => 'checkbox',
			'label'     => __( 'Mail Chimp', 'ninja-forms-mc' ),
			'desc'      => __( 'Enable Mail Chimp signup for this form?', 'ninja-forms-mc' ),
			'help_text' => __( 'This will cause all email fields in this form to be sent to Mail Chimp', 'ninja-forms-mc' ),
		),
		array(
			'name'    => 'ninja_forms_mc_list',
			'label'   => __( 'Choose a list', 'edda' ),
			'desc'    => __( 'Select the list you wish to subscribe buyers to', 'ninja-forms-mc' ),
			'type'    => 'select',
			'options' => ninja_forms_mc_get_mailchimp_lists()
		),
		array(
			'name'    => 'ninja_forms_mc_double_opt_in',
			'label'   => __( 'Double Opt-In', 'ninja-forms-mc' ),
			'desc'    => __( 'When checked, users will be sent a confirmation email after signing up, and will only be adding once they have confirmed the subscription.', 'ninja-forms-mc' ),
			'type'    => 'checkbox'
		)
	);
	ninja_forms_register_tab_metabox_options( $args );

}
add_action( 'admin_init', 'ninja_forms_mc_add_form_settings', 100 );


/**
 * Retrieve an array of Mail Chimp lists
 *
 * @since       1.0
 * @return      array
 */
function ninja_forms_mc_get_mailchimp_lists() {

	global $pagenow, $edd_settings_page;

	if ( ! isset( $_GET['page'] ) || ! isset( $_GET['tab'] ) || $_GET['page'] != 'ninja-forms' || $_GET['tab'] != 'form_settings' )
		return;

	$options = get_option( "ninja_forms_settings" );

	if ( isset( $options['ninja_forms_mc_api'] ) && strlen( trim( $options['ninja_forms_mc_api'] ) ) > 0 ) {

		$lists = array();
		if ( ! class_exists( 'Mailchimp' ) ) {
			require_once 'Mailchimp.php';
		}

		$api       = new Mailchimp( $options['ninja_forms_mc_api'] );
		$list_data = $api->call( 'lists/list', array( 'limit' => 100 ) );
		if ( $list_data ) {
			foreach ( $list_data['data'] as $key => $list ) {
				$lists[] = array(
					'value' => $list['id'],
					'name'  => $list['name']
				);
			}
		}
		return $lists;
	}
	return array();
}


/**
 * Subscribe an email address to a Mail Chimp list
 *
 * @since       1.0
 * @return      bool
 */
function ninja_forms_mc_subscribe_email( $subscriber = array(), $list_id = '', $double_opt = true ) {

	$options = get_option( "ninja_forms_settings" );

	if ( empty( $list_id ) || empty( $subscriber ) )
		return false;

	if ( ! class_exists( 'Mailchimp' ) ) {
		require_once 'Mailchimp.php';
	}

	$api = new Mailchimp( trim( $options['ninja_forms_mc_api'] ) );

	$vars = array(
		'optin_ip' => ninja_forms_get_ip(),
	);

	if ( ! empty( $subscriber['first_name'] ) ) {
		$vars['FNAME'] = $subscriber['first_name'];
	}

	if ( ! empty( $subscriber['last_name'] ) ) {
		$vars['LNAME'] = $subscriber['last_name'];
	}

	if ( ! empty( $subscriber['user_phone'] ) ) {
		$vars['phone'] = $subscriber['user_phone'];
	}

	if ( ! empty( $subscriber['user_zip'] ) ) {
		$vars['zip'] = $subscriber['user_zip'];
	}

	try {
		$result = $api->call( 'lists/subscribe', array(
			'id'                => $list_id,
			'email'             => array( 'email' => $subscriber['email'] ),
			'merge_vars'        => $vars,
			'double_optin'      => $double_opt,
			'update_existing'   => true,
			'replace_interests' => false,
			'send_welcome'      => false,
		) );

	} catch( Exception $e ) {

		//wp_die( print_r( $e, true ) );

		$result = false;

	}

	return (bool) $result;
}


/**
 * Check for newsletter signups on form submission
 *
 * @since       1.0
 * @return      void
 */
function ninja_forms_mc_check_for_email_signup() {

	if ( ! function_exists( 'ninja_forms_register_tab_metabox_options' ) )
		return;

	global $ninja_forms_processing;

	$form = $ninja_forms_processing->get_all_form_settings();

	// Check if Mail Chimp is enabled for this form
	if ( empty( $form['mailchimp_signup_form'] ) )
		return;

	$double_opt = ! empty( $form['ninja_forms_mc_double_opt_in'] );

	//Get all the user submitted values
	$all_fields = $ninja_forms_processing->get_all_fields();

	if ( is_array( $all_fields ) ) { //Make sure $all_fields is an array.
		//Loop through each of our submitted values.
		$subscriber = array();
		foreach ( $all_fields as $field_id => $value ) {

			$field = $ninja_forms_processing->get_field_settings( $field_id );

			if ( ! empty( $field['data']['email'] ) && is_email( $value ) ) {
				$subscriber['email'] = $value;
			}

			if ( ! empty( $field['data']['first_name'] ) ) {
				$subscriber['first_name'] = $value;
			}

			if ( ! empty( $field['data']['last_name'] ) ) {
				$subscriber['last_name'] = $value;
			}

			if ( ! empty( $field['data']['user_zip'] ) ) {
				$subscriber['user_zip'] = $value;
			}

			if ( ! empty( $field['data']['user_phone'] ) ) {
				$subscriber['user_phone'] = $value;
			}

		}

		if ( ! empty( $subscriber ) ) {
			ninja_forms_mc_subscribe_email( $subscriber, $form['ninja_forms_mc_list'], $double_opt );
		}
	}
}


/**
 * Connect our signup check to form processing
 *
 * @since       1.0
 * @return      void
 */
function ninja_forms_mc_hook_into_processing() {
	add_action( 'ninja_forms_post_process', 'ninja_forms_mc_check_for_email_signup' );
}
add_action( 'init', 'ninja_forms_mc_hook_into_processing' );


/**
 * Plugin Updater / licensing
 *
 * @since       1.0.2
 * @return      void
 */

function ninja_forms_mc_extension_setup_license() {
    if ( class_exists( 'NF_Extension_Updater' ) ) {
        $NF_Extension_Updater = new NF_Extension_Updater( 'MailChimp', '1.1.2', 'Pippin Williamson', __FILE__, 'mailchimp' );
    }
}
add_action( 'admin_init', 'ninja_forms_mc_extension_setup_license' );

if( ! function_exists( 'ninja_forms_get_ip' ) ) {

	/**
	 * Get User IP
	 *
	 * Returns the IP address of the current visitor
	 *
	 * @since 1.1
	 * @return string $ip User's IP address
	 */
	function ninja_forms_get_ip() {

		$ip = '127.0.0.1';

		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
			//check ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
			//to check ip is pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif( ! empty( $_SERVER['REMOTE_ADDR'] ) ) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}

		return apply_filters( 'ninja_forms_get_ip', $ip );
	}

}