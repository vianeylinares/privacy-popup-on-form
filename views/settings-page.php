<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
    
    <form action="options.php" method="post">
        <?php
            
            settings_fields( 'pf_on_pu_group' );
            do_settings_sections( 'pf_on_pu_page1' );
            
            submit_button( esc_html__( 'Save Settings', 'pf-on-pu' ) );

        ?>
    </form>
</div>