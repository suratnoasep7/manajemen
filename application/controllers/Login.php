<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('email');
    }

    function index() {
        $this->load->view('signin/index');
    }

    function save() {
        if($this->authenticate($this->input->post('email'))) {
            redirect('dashboard');
        } else {
            redirect('signin');
        }
    }

    function authenticate($email) {

        $password = $this->input->post("password");
        if (!$this->Users_model->authenticate($email, $password)) {
            $this->form_validation->set_message('authenticate', lang("authentication_failed"));
            return false;
        }
        return true;
    }

}
