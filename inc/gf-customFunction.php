<?php

       
        add_action('wp_ajax_nopriv_gfcustom_Ajax_Call','gfcustom_Ajax_function');
        add_action('wp_ajax_gfcustom_Ajax_Call','gfcustom_Ajax_function');

        function gfcustom_Ajax_function(){
        

        $startDateSelectedByUser = esc_html($_POST['start_Date']);
        $workshopPriceByUser = esc_html($_POST['workshop_Price']);
        
        return $startDateSelectedByUser;
        //echo $workshopPriceByUser;


        die();
        }
    
        $someFucks = gfcustom_Ajax_function();
            add_filter( 'gform_field_value_start_Date', 'gf_date_get_from_date_selection' );
            function gf_date_get_from_date_selection($someFucks) {
           
            return $someFucks;

            }
            add_filter( 'gform_field_value_workshop_Price', 'gf_date_get_from_wsprice_selection' );
            function gf_date_get_from_wsprice_selection( $workshopPriceByUser ) {
            return $workshopPriceByUser;
            }
        
?>