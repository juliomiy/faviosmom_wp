<?php
/**
 * This file contains code for remove tables and options at uninstall.
 *
 * @author  Tech Banker
 * @package wp-mail-bank/lib
 * @version 2.0.0
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
   die;
}
if (!current_user_can("manage_options")) {
   return;
} else {
   global $wpdb;
   if (is_multisite()) {
      $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
      foreach ($blog_ids as $blog_id) {
         switch_to_blog($blog_id);
         $version = get_option("mail-bank-version-number");
         if ($version != "") {
            $settings_remove_tables = $wpdb->get_var
                (
                $wpdb->prepare
                    (
                    "SELECT meta_value FROM " . $wpdb->prefix . "mail_bank_meta
                                         WHERE meta_key = %s", "settings"
                )
            );
            $settings_remove_tables_unserialize = maybe_unserialize($settings_remove_tables);
            if (esc_attr($settings_remove_tables_unserialize["remove_tables_at_uninstall"]) == "enable") {
               $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank");
               $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank_meta");
               $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank_email_logs");
               // Delete options
               delete_option("mail-bank-version-number");
               delete_option("mb_admin_notice");
               delete_option("mail-bank-welcome-page");
            }
         }
         restore_current_blog();
      }
   } else {
      $version = get_option("mail-bank-version-number");
      if ($version != "") {
         // Drop Tables
         $settings_remove_tables = $wpdb->get_var
             (
             $wpdb->prepare
                 (
                 "SELECT meta_value FROM " . $wpdb->prefix . "mail_bank_meta
                                     WHERE meta_key = %s", "settings"
             )
         );
         $settings_remove_tables_unserialize = maybe_unserialize($settings_remove_tables);

         if (esc_attr($settings_remove_tables_unserialize["remove_tables_at_uninstall"]) == "enable") {
            $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank");
            $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank_meta");
            $wpdb->query("DROP TABLE IF EXISTS " . $wpdb->prefix . "mail_bank_email_logs");
            // Delete options
            delete_option("mail-bank-version-number");
            delete_option("mb_admin_notice");
            delete_option("mail-bank-welcome-page");
         }
      }
   }
}