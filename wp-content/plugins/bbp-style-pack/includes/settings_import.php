<?php

function bsp_style_settings_import() {
		echo '<div class="wrap">';
		echo '<h2>' . __( 'Import BBP Style Pack Settings', 'bbp-style-pack' ) . '</h2>';
		echo '<h2>' . __( 'Warning - the uploaded file will overwrite your current Style Pack settings', 'bbp-style-pack' ) . '</h2>';
		

		if ( empty( $_GET['step'] ) ) {
			$_GET['step'] = 0;
		}

		switch ( intval( $_GET['step'] ) ) {
			case 0:
				echo '<div class="narrow">';
				echo '<p>'.__( 'If you have exported settings to a file using the \'Export plugin settings\' tab, you can import that file here.', 'bbp-style-pack' ).'</p>';
				echo '<p>'.__( 'Choose a JSON (.json) file to upload, then click Upload file and import.', 'bbp-style-pack' ).'</p>';
				wp_import_upload_form( 'admin.php?import=bsp-import&amp;step=1' );
				echo '</div>';
				break;
			case 1:
				if ( bsp_handle_upload() ) {
					//pre_import();
				} else {
					echo '<p><a href="' . esc_url( admin_url( '/options-general.php?page=bbp-style-pack' ) ) . '">' . __( 'Return to BBP Style Pack settings', 'bbp-style-pack' ) . '</a></p>';
				}
				break;
			case 2:
				//check_admin_referer( 'import-wordpress-options' );
				$file_id = intval( $_POST['import_id'] );
				//if ( false !== ( $import_data = get_transient( bsp_transient_key($file_id) ) ) ) {
					bsp_import();
				//}
				break;
		}

		echo '</div>';
}
	
	
function bsp_handle_upload() {
		$file = wp_import_handle_upload();

		if ( isset( $file['error'] ) ) {
			return bsp_error_message(
				__( 'Sorry, there has been an error.', 'bbp-style-pack' ),
				esc_html( $file['error'] )
			);
		}

		if ( ! isset( $file['file'], $file['id'] ) ) {
			return bsp_error_message(
				__( 'Sorry, there has been an error.', 'bbp-style-pack' ),
				__( 'The file did not upload properly. Please try again.', 'bbp-style-pack' )
			);
		}

		$file_id = intval( $file['id'] );

		if ( ! file_exists( $file['file'] ) ) {
			wp_import_cleanup( $file_id );
			return bsp_error_message(
				__( 'Sorry, there has been an error.', 'bbp-style-pack' ),
				sprintf( __( 'The export file could not be found at <code>%s</code>. It is likely that this was caused by a permissions problem.', 'bbp-style-pack' ), esc_html( $file['file'] ) )
			);
		}

		if ( ! is_file( $file['file'] ) ) {
			wp_import_cleanup( $file_id );
			return bsp_error_message(
				__( 'Sorry, there has been an error.', 'wordpress-importer' ),
				__( 'The path is not a file, please try again.', 'wordpress-importer' )
			);
		}
		$file_contents = file_get_contents( $file['file'] );
		$import_data = json_decode( $file_contents, true );
		$transient_key = 'options-import-%d';
		set_transient( $transient_key, $import_data, DAY_IN_SECONDS );
		wp_import_cleanup( $file_id );
		//return bsp_run_data_check($import_data);
		bsp_import($import_data) ;
	}
	
function bsp_error_message( $message, $details = '' ) {
		echo '<div class="error"><p><strong>' . $message . '</strong>';
		if ( ! empty( $details ) ) {
			echo '<br />' . $details;
		}
		echo '</p></div>';
		return false;
	}
	
	
function bsp_run_data_check($import_data) {
	$min_version = 1 ;
		if ( empty( $import_data['version'] ) ) {
		return bsp_error_message( __( 'Sorry, there has been an error. This file may not contain data or is corrupt.', 'bbp-style-pack' ) );
		}

		if ( $import_data['version'] < $min_version ) {
			return bsp_error_message( sprintf( __( 'This JSON file (version %s) is not supported by this version of the importer. Please update the plugin on the source, or download an older version of the plugin to this installation.', 'bbp-style-pack' ), intval( $import_data['version'] ) ) );
		}


		if ( empty( $import_data['options'] ) ) {
			return bsp_error_message( __( 'Sorry, there has been an error. This file appears valid, but does not seem to have any options.', 'bbp-style-pack' ) );
		}

		return true;
	}
	
	
function bsp_transient_key($file_id='') {
	$transient_key = 'options-import-%d';
	
		return sprintf( $transient_key, $file_id );
	}

	

function bsp_import($import_data) {
		if ( bsp_run_data_check($import_data) ) {
			
			$options_to_import = array (
			'bsp_style_settings_f',
			'bsp_style_settings_ti',
			'bsp_style_settings_t',
			'bsp_style_settings_la',
			'bsp_style_settings_form',
			'bsp_profile',
			'bsp_forum_display',
			'bsp_forum_order',
			'bsp_login',
			'bsp_breadcrumb',
			'bsp_templates',
			'bsp_css',
			'bsp_roles',
			'bsp_css_location',
			'bsp_style_settings_freshness',
			'bsp_style_settings_buttons',
			'bsp_topic_order',
			'bsp_style_settings_search',
			'bsp_style_settings_unread',
			) ;

			foreach ( (array) $options_to_import as $option_name ) {
				if ( isset( $import_data['options'][ $option_name ] ) ) {
								
					$option_value = maybe_unserialize( $import_data['options'][ $option_name ] );
					
					update_option( $option_name, $option_value );
			}

			}
	echo '<p>' . __( 'All done !', 'bbp-style-pack' ).'</p>';
		
		}
}

add_action( 'admin_init', 'bsp_register_importer' );



	/**
	 * Register our importer.
	 *
	 * @return void
	 */
function bsp_register_importer() {
		if ( function_exists( 'register_importer' ) ) {
			register_importer( 'bsp-import', __( 'BBP Style Pack settings', 'bbp-style-pack' ), __( 'Import BBP Style Pack settings from a JSON file', 'bbp-style-pack' ), 'bsp_style_settings_import' ) ;
		}
	}
