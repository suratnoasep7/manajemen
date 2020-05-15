<style type="text/css">
    .total {
        position: absolute;
        bottom: 40px;
        right: 40px;
        font-size: 2em;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
<div id="page-content" class="p20 clearfix">

    <?php
    if (count($dashboards)) {
        $this->load->view("dashboards/dashboard_header");
    }

    announcements_alert_widget();
    ?>

    <div class="row">
        <div class="col-md-4 col-sm-6 widget-container">
            <div class="panel panel-info">
                <div class="panel-body ">
                    <div class="widget-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="widget-details">
                        <div class="description">
                            Your Project    
                        </div>
                    </div>
                    <div class="total">
                        <?php echo $total_project ?>    
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-6 widget-container">
            <?php events_widget(); ?>
        </div>

        <div class="col-md-6 widget-container">
            <?php sticky_note_widget(); ?>
        </div>
         
    </div>

</div>
