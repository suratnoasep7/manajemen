<div id="sidebar" class="box-content ani-width">
    <div id="sidebar-scroll">
        <ul class="" id="sidebar-menu">
            <?php
            $dashboard_menu = array("name" => "dashboard", "url" => "dashboard", "class" => "fa-desktop dashboard-menu");

            $selected_dashboard_id = get_setting("user_" . $this->login_user->id . "_dashboard");
            if ($selected_dashboard_id) {
                $dashboard_menu = array("name" => "dashboard", "url" => "dashboard/view/" . $selected_dashboard_id, "class" => "fa-desktop dashboard-menu");
            }


            if ($this->login_user->user_type == "staff") {

                $sidebar_menu = array();

                $sidebar_menu[] = $dashboard_menu;

                $permissions = $this->login_user->permissions;

                $access_expense = get_array_value($permissions, "expense");
                $access_invoice = get_array_value($permissions, "invoice");
                $access_ticket = get_array_value($permissions, "ticket");
                $access_client = get_array_value($permissions, "client");
                $access_lead = get_array_value($permissions, "lead");
                $access_timecard = get_array_value($permissions, "attendance");
                $access_leave = get_array_value($permissions, "leave");
                $access_estimate = get_array_value($permissions, "estimate");
                $access_items = ($this->login_user->is_admin || $access_invoice || $access_estimate);

                $manage_help_and_knowledge_base = ($this->login_user->is_admin || get_array_value($permissions, "help_and_knowledge_base"));


                /*if (get_setting("module_timeline") == "1") {
                    $sidebar_menu[] = array("name" => "timeline", "url" => "timeline", "class" => " fa-comments font-18");
                }*/

                

                if (get_setting("module_message") == "1") {
                    $sidebar_menu[] = array("name" => "messages", "url" => "messages", "class" => "fa-envelope", "devider" => true, "badge" => count_unread_message(), "badge_class" => "badge-secondary");
                }


                if ($this->login_user->is_admin || $access_client) {
                    $sidebar_menu[] = array("name" => "clients", "url" => "clients", "class" => "fa-briefcase");
                }

            

                $project_submenu = array(
                    array("name" => "all_projects", "url" => "projects/all_projects"),
                    array("name" => "tasks", "url" => "projects/all_tasks"),
                    array("name" => "gantt", "url" => "projects/all_gantt"));
                
                $sidebar_menu[] = array("name" => "projects", "url" => "projects", "class" => "fa-th-large",
                    "submenu" => $project_submenu
                );

                if (get_array_value($this->login_user->permissions, "hide_team_members_list") != "1") {
                    $sidebar_menu[] = array("name" => "team_members", "url" => "team_members", "class" => "fa-user font-16");
                }

                



                if ($this->login_user->is_admin) {
                    $sidebar_menu[] = array("name" => "settings", "url" => "settings/general", "class" => "fa-wrench");
                }
            } else if($this->login_user->user_type == "client"){
                $sidebar_menu[] = $dashboard_menu;
                $sidebar_menu[] = array("name" => "messages", "url" => "messages", "class" => "fa-envelope", "badge" => count_unread_message());
                $sidebar_menu[] = array("name" => "projects", "url" => "projects/all_projects", "class" => "fa fa-th-large");
            } else if($this->login_user->user_type == "engineer") {
                $sidebar_menu[] = $dashboard_menu;
                $sidebar_menu[] = array("name" => "events", "url" => "events", "class" => "fa-calendar");
                //$sidebar_menu[] = array("name" => "timeline", "url" => "timeline", "class" => " fa-comments font-18");
                $sidebar_menu[] = array("name" => "messages", "url" => "messages", "class" => "fa-envelope", "devider" => true, "badge" => count_unread_message(), "badge_class" => "badge-secondary");
                $project_submenu = array(
                    array("name" => "all_projects", "url" => "projects/all_projects"),
                    array("name" => "tasks", "url" => "projects/all_tasks"),
                    array("name" => "gantt", "url" => "projects/all_gantt"));
                
                $sidebar_menu[] = array("name" => "projects", "url" => "projects", "class" => "fa-th-large",
                    "submenu" => $project_submenu
                );
                $sidebar_menu[] = array("name" => "team_members", "url" => "team_members", "class" => "fa-user font-16");
            } else if($this->login_user->user_type == "reviewer") {
                $sidebar_menu[] = $dashboard_menu;
                $sidebar_menu[] = array("name" => "events", "url" => "events", "class" => "fa-calendar");
                //$sidebar_menu[] = array("name" => "timeline", "url" => "timeline", "class" => " fa-comments font-18");
                $sidebar_menu[] = array("name" => "messages", "url" => "messages", "class" => "fa-envelope", "devider" => true, "badge" => count_unread_message(), "badge_class" => "badge-secondary");
                $project_submenu = array(
                    array("name" => "all_projects", "url" => "projects/all_projects"));
                
                $sidebar_menu[] = array("name" => "projects", "url" => "projects", "class" => "fa-th-large",
                    "submenu" => $project_submenu
                );
                $sidebar_menu[] = array("name" => "team_members", "url" => "team_members", "class" => "fa-user font-16");
            } else {
                //client menu
                //get the array of hidden menu
                $hidden_menu = explode(",", get_setting("hidden_client_menus"));

                $sidebar_menu[] = $dashboard_menu;

                if (get_setting("module_event") == "1" && !in_array("events", $hidden_menu)) {
                    $sidebar_menu[] = array("name" => "events", "url" => "events", "class" => "fa-calendar");
                }

                //check message access settings for clients
                
                if (get_setting("module_estimate") && !in_array("estimates", $hidden_menu)) {
                    $sidebar_menu[] = array("name" => "estimates", "url" => "estimates", "class" => "fa-file");
                }

                if (get_setting("module_invoice") == "1") {
                    if (!in_array("invoices", $hidden_menu)) {
                        $sidebar_menu[] = array("name" => "invoices", "url" => "invoices", "class" => "fa-file-text");
                    }
                    if (!in_array("payments", $hidden_menu)) {
                        $sidebar_menu[] = array("name" => "invoice_payments", "url" => "invoice_payments", "class" => "fa-money");
                    }
                }

                if (get_setting("module_ticket") == "1" && !in_array("tickets", $hidden_menu)) {
                    $sidebar_menu[] = array("name" => "tickets", "url" => "tickets", "class" => "fa-life-ring");
                }

                if (get_setting("module_announcement") == "1" && !in_array("announcements", $hidden_menu)) {
                    $sidebar_menu[] = array("name" => "announcements", "url" => "announcements", "class" => "fa-bullhorn");
                }

                $sidebar_menu[] = array("name" => "users", "url" => "clients/users", "class" => "fa-user");
                $sidebar_menu[] = array("name" => "my_profile", "url" => "clients/contact_profile/" . $this->login_user->id, "class" => "fa-cog");

                if (get_setting("module_knowledge_base") == "1" && !in_array("knowledge_base", $hidden_menu)) {
                    $sidebar_menu[] = array("name" => "knowledge_base", "url" => "knowledge_base", "class" => "fa-question-circle");
                }
            }

            foreach ($sidebar_menu as $main_menu) {
                $submenu = get_array_value($main_menu, "submenu");
                $expend_class = $submenu ? " expand " : "";
                $active_class = active_menu($main_menu['name'], $submenu);
                $submenu_open_class = "";
                if ($expend_class && $active_class) {
                    $submenu_open_class = " open ";
                }

                $devider_class = get_array_value($main_menu, "devider") ? "devider" : "";
                $badge = get_array_value($main_menu, "badge");
                $badge_class = get_array_value($main_menu, "badge_class");
                ?>
                <li class="<?php echo $active_class . " " . $expend_class . " " . $submenu_open_class . " $devider_class"; ?> main">
                    <a href="<?php echo_uri($main_menu['url']); ?>">
                        <i class="fa <?php echo ($main_menu['class']); ?>"></i>
                        <span><?php echo lang($main_menu['name']); ?></span>
                        <?php
                        if ($badge) {
                            echo "<span class='badge $badge_class'>$badge</span>";
                        }
                        ?>
                    </a>
                    <?php
                    if ($submenu) {
                        echo "<ul>";
                        foreach ($submenu as $s_menu) {
                            ?>
                        <li>
                            <a href="<?php echo_uri($s_menu['url']); ?>">
                                <i class="dot fa fa-circle"></i>
                                <span><?php echo lang($s_menu['name']); ?></span>
                            </a>
                        </li>
                        <?php
                    }
                    echo "</ul>";
                }
                ?>
                </li>
            <?php } ?>
        </ul>
    </div>
</div><!-- sidebar menu end -->