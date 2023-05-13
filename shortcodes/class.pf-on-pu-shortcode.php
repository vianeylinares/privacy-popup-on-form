<?php

if( ! class_exists( 'PF_on_PU_Shortcode' ) ){

    class PF_on_PU_Shortcode{

        function __construct(){

            add_shortcode( 'privacy_popup_on_form', array( $this, 'privacy_popup_on_form_shortcode' ) );

        }

        public function privacy_popup_on_form_shortcode(){

            ob_start();

            require( PF_on_PU_PATH . 'views/pf-on-pu-shortcode.php' );
            
            wp_enqueue_script( 'magnific-popup-js' );
            wp_enqueue_script( 'pf-on-pu-frontend-js' );
            wp_enqueue_style( 'magnific-popup-css' );
            wp_enqueue_style( 'pf-on-pu-frontend-css' );
            add_action( 'wp_head', function(){
                $custom_styles = ( isset( PF_on_PU_Settings::$options['pf_on_pu_custom_styles'] ) ) ? PF_on_PU_Settings::$options['pf_on_pu_custom_styles'] : '' ;

                if( $custom_styles != '' ){
                    echo "<style>";
                    echo $custom_styles;
                    echo "</style>";
                }
            }, 999 );

            return ob_get_clean();

        }

    }

}