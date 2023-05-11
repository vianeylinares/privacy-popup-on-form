<?php

if( ! class_exists( 'PF_on_PU_Settings' ) ){

    class PF_on_PU_Settings{

        public static $options;

        public function __construct(){

            self::$options = get_option( 'pf_on_pu_options' );
            
        }

        

    }

}