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
        <div class="col-md-4 col-sm-6 widget-container">
            <div class="panel panel-primary">
                <div class="panel-body ">
                    <div class="widget-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="widget-details">
                        Your Task
                    </div>
                    <div class="total">
                        <?php echo $total_task ?>    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 widget-container">
            <div class="panel panel-success">
                <div class="panel-body ">
                    <div class="widget-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="widget-details">
                        Team Member
                    </div>
                    <div class="total">
                        <?php echo $total_member ?>    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 widget-container">
            <div class="panel panel-sky">
                <div class="panel-body ">
                    <div class="widget-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="widget-details">
                        Client
                    </div>
                    <div class="total">
                        <?php echo $total_clients ?>    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 widget-container">
            <div class="panel panel-coral">
                <div class="panel-body ">
                    <div class="widget-icon">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="widget-details">
                        Your File Document
                    </div>
                    <div class="total">
                        <?php echo $total_document ?>    
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-12 widget-container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Document
                </div>
                <div class="panel-body">
                    <canvas id="chart"></canvas>
                </div>
            </div>  
        </div>
        <?php if ($show_event) { ?>
            <div class="col-md-6 widget-container">
                <?php events_widget(); ?>
            </div>
        <?php } ?>

        <div class="col-md-6 widget-container">
            <?php sticky_note_widget(); ?>
        </div>
         
    </div>

</div>
<script type="text/javascript">
    $(document).ready(function () {
        initScrollbar('#project-timeline-container', {
            setHeight: 955
        });

        //update dashboard link
        $(".dashboard-menu, .dashboard-image").closest("a").attr("href", window.location.href);

    });

 var data = [{
  data: [1,2,3,4],
  backgroundColor: [
    "#4b77a9",
    "#5f255f",
    "#d21243",
    "#B27200"
  ],
  borderColor: "#fff"
}];

var options = {
  tooltips: {
    enabled: false
  },
  plugins: {
    datalabels: {
      formatter: (value, ctx) => {

        let sum = ctx.dataset._meta[0].total;
        let percentage = (value * 100 / sum).toFixed(2) + "%";
        return percentage;


      },
      color: '#fff',
    }
  }
};


var ctx = document.getElementById("chart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
  labels: ['RAR', 'ZIP', 'DOCX', 'PDF'],
    datasets: data
  },
  options: options
});

</script>    

