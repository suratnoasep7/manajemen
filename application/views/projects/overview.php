<div class="clearfix bg-white">

    <div class="row" style="background-color:#E5E9EC;">
        <div class="col-md-6">
            <div class="row">

                <?php if($this->login_user->user_type == "staff"){
                ?>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_progress_chart_info"); ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_task_pie_chart"); ?>
                </div>

                <div class="col-md-12 col-sm-12 project-custom-fields">
                    <?php $this->load->view('projects/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                </div>

                <?php if ($project_info->estimate_id) { ?>
                    <div class="col-md-12 col-sm-12">
                        <?php $this->load->view("projects/estimates/index"); ?>
                    </div> 
                <?php } ?>

                <div class="col-md-12 col-sm-12">
                    <?php $this->load->view("projects/project_members/index"); ?>
                </div>  

                <div class="col-md-12 col-sm-12">
                    <?php $this->load->view("projects/project_description"); ?>
                </div>
                <?php    
                } ?>

                <?php if($this->login_user->user_type == "client") {

                ?>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_progress_chart_info"); ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_description"); ?>
                </div>
                <?php    
                } ?>

                <?php
                    if($this->login_user->user_type == "engineer" || $this->login_user->user_type == "reviewer") {
                ?>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_progress_chart_info"); ?>
                </div>
                <div class="col-md-6 col-sm-12">
                    <?php $this->load->view("projects/project_task_pie_chart"); ?>
                </div>

                <div class="col-md-12 col-sm-12 project-custom-fields">
                    <?php $this->load->view('projects/custom_fields_list', array("custom_fields_list" => $custom_fields_list)); ?>
                </div>
                <div class="col-md-12 col-sm-12">
                        <?php $this->load->view("projects/estimates/index"); ?>
                </div> 
                <div class="col-md-12 col-sm-12">
                    <?php $this->load->view("projects/project_members/index"); ?>
                </div>  

                <div class="col-md-12 col-sm-12">
                    <?php $this->load->view("projects/project_description"); ?>
                </div>
                
                <?php
                    }
                 ?>
                

            </div>
        </div>
        <?php
            if($this->login_user->user_type == "staff") {
        ?>
        <div class="col-md-6">
            <div class="panel">
                <div class="tab-title clearfix">
                    <h4><?php echo lang('activity'); ?></h4>
                </div>
                <?php $this->load->view("projects/history/index"); ?>
            </div>
        </div>
        <?php
            }
         ?>

         <?php
            if($this->login_user->user_type == "engineer" || $this->login_user->user_type == "reviewer") {
        ?>
        <div class="col-md-6">
            <div class="panel">
                <?php $this->load->view("projects/files_client/index"); ?>
            </div>
        </div>
        <?php
            }
         ?>
    </div>
</div>


