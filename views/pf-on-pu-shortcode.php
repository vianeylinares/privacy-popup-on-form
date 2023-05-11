<?php $form_registered = ( isset( PF_on_PU_Settings::$options['pf_on_pu_form'] ) ) ? PF_on_PU_Settings::$options['pf_on_pu_form'] : 'No form registered' ; ?>

<div class="pf-on-pu">

    <?php echo $form_registered; ?>

    <a class="popup-with-zoom-anim" id="politic-popup" href="#small-dialog" style="display: none;">Open with fade-zoom animation</a>

    <div id="small-dialog" class="zoom-anim-dialog mfp-hide" style="text-align: left; color: #000;">
    
        <?php

            $args = array(
                'post_type' => 'any',
                'p' => 3, // Privacy policy page ID number
            );

            $query = new WP_Query($args);

            while($query->have_posts()) : $query->the_post();
            
                ?>                  

                    <div>
                        <?php the_title(); ?>
                    </div>
                    <div>
                        <?php the_content(); ?>
                    </div>
                            
                <?php           
    
            endwhile; wp_reset_postdata();

        ?>

    </div>

</div>