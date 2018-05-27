<?php
/**
 * This file provides configuration.
 *
 * @author  Tech Banker
 * @package wp-mail-bank/includes
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
if ( ! class_exists( 'Mail_Bank_Configuration_Provider' ) ) {
	/**
	 * This class used to manage configuration.
	 *
	 * @package    wp-mail-bank
	 * @subpackage includes
	 *
	 * @author  Tech Banker
	 */
	class Mail_Bank_Configuration_Provider {
		/**
		 * This function used to get configuration settings.
		 */
		public function get_configuration_settings() {
			global $wpdb;
			$email_configuration_data  = $wpdb->get_var(
				$wpdb->prepare(
					'SELECT meta_value FROM ' . $wpdb->prefix . 'mail_bank_meta WHERE meta_key=%s', 'email_configuration'
				)
			);// WPCS: db call ok; no-cache ok.
			$email_configuration_array = maybe_unserialize( $email_configuration_data );
			return $email_configuration_array;
		}
	}
}
