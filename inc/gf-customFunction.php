<?php
   
       
// update '1' to the ID of your form
add_filter( 'gform_pre_render_2', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>
 
    <script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a textarea with a class of gf_readonly */
            jQuery("li.gf_readonly input").attr("readonly","readonly");
        });
    </script>
 
    <?php
    return $form;
}

        
?>