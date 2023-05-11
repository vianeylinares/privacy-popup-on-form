<?php
/**
* Plugin Name: Privacy form on popup
* Plugin URI: 
* Description: Privacy form on popup description
* Version: 1.0
* Requires at least: 5.6
* Author: Vianey Linares
* Author URL: 
* Licence: GPL v2 or later
* Licence URL: https://www.gnu.org/licences/gp;-2.0.html
* Text Domain: privacy-popup-on-form
* Domain Path: /languages
*/

 /*
Privacy form on popup is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
Privacy form on popup is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with Privacy form on popup. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

// Prevents direct access to .php file through URL
if( ! defined('ABSPATH') ){
    exit;
}

if( ! class_exists ( 'PF_on_PU' ) ){

    class PF_on_PU{

        function __construct(){

            $this->define_constants();

            add_action( 'admin_menu', array( $this, 'PF_on_PU_add_menu' ) );

            require_once( PF_on_PU_PATH . 'class.pf-on-pu-settings.php' );
            $PF_on_PU_Settings = new PF_on_PU_Settings();

        }

        public function define_constants(){
            define( 'PF_on_PU_PATH', plugin_dir_path(__FILE__) );
            define( 'PF_on_PU_URL', plugin_dir_url(__FILE__) );
            define( 'PF_on_PU_VERSION', '1.0.0' );
        }

        public static function activate(){
            update_option( 'rewrite_rules', '');
        }

        public static function deactivate(){
            flush_rewrite_rules();
        }

        public static function uninstall(){

        }

        public function PF_on_PU_add_menu(){

            add_menu_page(
                esc_html__( 'Privacy form on popup Options', 'pf-on-pu' ),
                esc_html__( 'Privacy form on popup', 'pf-on-pu' ),
                'manage_options',
                'pf-on-pu_admin',
                array( $this, 'PF_on_PU_settings_page' ),
                'dashicons-images-alt2',
                //10
            );

        }

        public function PF_on_PU_settings_page(){

            if( ! current_user_can( 'manage_options' ) ){
                return;
            }

            require( PF_on_PU_PATH . 'views/settings-page.php' );

        }

    }


}

if( class_exists( 'PF_on_PU' ) ){

    register_activation_hook( __FILE__, array( 'PF_on_PU', 'activate' ) );
    register_deactivation_hook( __FILE__, array( 'PF_on_PU', 'deactivate' ) );
    register_uninstall_hook( __FILE__, array( 'PF_on_PU', 'uninstall' ) );

    $pf_on_pb = new PF_on_PU();

}
