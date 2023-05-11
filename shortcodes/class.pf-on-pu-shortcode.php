<?php

if( ! class_exists( 'PF_on_PU_Shortcode' ) ){

    class PF_on_PU_Shortcode{

        function __construct(){

            add_shortcode( 'privacy_popup_on_form', array( $this, 'privacy_popup_on_form_shortcode' ) );

        }

        public function privacy_popup_on_form_shortcode(){

            ob_start();

            


            return ob_get_clean();

        }

    }

}