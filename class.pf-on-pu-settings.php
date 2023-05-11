<?php

if( ! class_exists( 'PF_on_PU_Settings' ) ){

    class PF_on_PU_Settings{

        public static $options;

        public function __construct(){

            self::$options = get_option( 'pf_on_pu_options' );
            add_action( 'admin_init', array( $this, 'PF_on_PU_admin_init' ) );

        }

        public function PF_on_PU_admin_init(){

            register_setting( 'pf_on_pu_group', 'pf_on_pu_options', array( $this, 'pf_on_pu_validate' ) );

            add_settings_section(
                'pf_on_pu_main_section',
                esc_html__( 'How does it work?', 'pf-on-pu' ),
                null,
                'pf_on_pu_page1'
            );


            add_settings_field(
                'pf_on_pu_shortcode',
                esc_html__( 'Shortcode', 'pf-on-pu' ),
                array( $this, 'pf_on_pu_shortcode_callback' ),
                'pf_on_pu_page1',
                'pf_on_pu_main_section'
            );

            add_settings_field(
                'pf_on_pu_form',
                esc_html__( 'HTML form', 'pf-on-pu' ),
                array( $this, 'pf_on_pu_form_callback' ),
                'pf_on_pu_page1',
                'pf_on_pu_main_section',
                array(
                    'label_for' => 'pf_on_pu_form'
                )
            );

        }

        public function pf_on_pu_shortcode_callback(){
            ?>

                <p>
                    <?php esc_html_e( 'Use the shortcode [privacy_popup_on_form] to display the form and the popup in any page/post/widget', 'pf-on-pu' ); ?>
                </p>

            <?php
        }

        public function pf_on_pu_form_callback( $args ){
            ?>

                <textarea 
                    name="pf_on_pu_options[pf_on_pu_form]"
                    id="pf_on_pu_form"
                    >
                    <?php echo isset( self::$options['pf_on_pu_form'] ) ? esc_attr( self::$options['pf_on_pu_form'] ) : '' ; ?>
                </textarea>
                <label for="pf_on_pu_form" style="display: block;">
                    <?php esc_html_e( 'Include id "policy-box" in privacy policy checkbox definition', 'pf-on-pu' ); ?>
                </label>


            <?php
        }

        public function pf_on_pu_validate( $input ){

            $new_input = array();

            foreach( $input as $key => $value ){
                switch( $key ){
                    case 'pf_on_pu_form':
                        if( empty( $value ) ){
                            add_settings_error( 'pf_on_pu_options', 'pf_on_pu_message', esc_html__( 'The HTML form field cannot be empty', 'pf-on-pu' ) );
                            $value = esc_html__( "Please, type some HTML code", 'pf-on-pu' );
                        }
                        $new_input[$key] = esc_html( $value );
                        break;
                    default:
                        $new_input[$key] = sanitize_text_field( $value );
                        break;
                }
            }

            return $new_input;
        }

    }

}