
<div id="admin-cards">
<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=publish&post_type=agp_workshop' ?>')">
              <div class="card p-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-event text-success simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->publish; print $count_posts; ?></h3>
                        <span>Published Workshop</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=draft&post_type=agp_workshop' ?>')">
              <div class="card p-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-exclamation text-danger simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->draft; print $count_posts; ?></h3>
                        <span>Workshop Drafts</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card p-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-people text-secondary simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->draft; print $count_posts; ?></h3>
                        <span>New Registrations</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card p-0">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-exclamation text-danger simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->draft; print $count_posts; ?></h3>
                        <span>Inactive Workshop</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  

</div>
<div class="row card-deck p-sm-0 p-3">
                <div class="card col-xl-8 col-12">
                <?php require_once( get_template_directory() . '/inc/admin_menu_templates/dashboard/sales_charts.php'); ?>
                </div>

                <div class="card col-xl-4 col-lg-8 col-md-6 col-12">
                abcd
                </div>
 </div> 

<div class="row">
            <div class="col-xl-4 col-lg-4 col-md-6 col-12" onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=draft&post_type=agp_workshop' ?>')">
                <div class="card">
                
                </div>
            </div> 
            <div class="col-xl-4 col-lg-6 col-md-6 col-12" onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=draft&post_type=agp_workshop' ?>')">
                <div class="card">
                
                </div>
            </div> 
            <div class="col-xl-4 col-lg-6 col-md-6 col-12" onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=draft&post_type=agp_workshop' ?>')">
                <div class="card">
                
                </div>
            </div> 

</div>
<script>
		jQuery(document).ready(function($) {
            $('#welcome-panel').after($('#admin-cards').show());
            $('.postbox-container').addClass("d-none");
        });
</script>

