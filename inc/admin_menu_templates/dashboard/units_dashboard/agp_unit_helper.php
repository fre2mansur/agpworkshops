<div id="admin-cards">
<div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=publish&post_type=agp_workshop' ?>')">
              <div class="card p-0 pointer">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-event text-success simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->publish; print $count_posts; ?></h3>
                        <span><?php if($count_posts = "1"){print "Published Workshop";}  else {print "Published Workshops";}?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12" onclick="window.open('<?php echo get_admin_url('/') . 'edit.php?post_status=draft&post_type=agp_workshop' ?>')" >
              <div class="card p-0 pointer">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="icon-exclamation text-danger simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_workshop' )->draft; print $count_posts; ?></h3>
                        <span><?php if($count_posts = "1"){print "Workshop Draft";}  else {print "Workshop Drafts";}?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 ">
              <div class="card p-0 pointer">
                <div class="card-content">
                  <div class="card-body">
                    <div class="justify-content-between d-flex">
                      <div class="align-self-center">
                        <i class="<?php if($count_posts = "1"){print "icon-user ";}  else {print "icon-people";}?> text-info simple-dash-icons float-left"></i>
                      </div>
                      <div class="text-right">
                        <h3><?php $count_posts = wp_count_posts( 'agp_facilitator' )->publish; print $count_posts; ?></h3>
                        <span><?php if($count_posts = "1"){print "Registered Facilitator";}  else {print "Registered Facilitators";}?></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>  
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="card p-0 pointer">
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
</div>

<script>
		jQuery(document).ready(function($) {
            $('#dashboard-widgets-wrap').after($('#admin-cards').show());
            $('.postbox-container').addClass("d-none");
        });
</script>
