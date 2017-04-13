<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function user_id() {
        $session_data = $this->session->userdata('adsuser');
        return $session_data['user_id'];
    }

    public function index() {
        if ($this->session->userdata('adsuser')) {
            redirect('home');
        } else {
            $this->load->view('welcome_page');
        }
    }

    function login() {

        $this->form_validation->set_rules('uname', 'Email', 'trim|required');
        $this->form_validation->set_rules('upassword', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('welcome_page');
        } else {
            redirect('home');
        }
    }

    function logout() {

        $this->session->unsetuserdata['adsuser'];
        $this->session->sess_destroy();

        redirect(base_url());
    }

    function check_database($upassword) {
        $uname = $this->input->post('uname');

        $result = $this->login_model->user_login($uname, $upassword);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'adsu_id' => $row->adsu_id,
                    'adsu_name' => $row->adsu_name
                );
                $this->session->set_userdata('adsuser', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', "The details you entered did not match our records. Cross-check and try again.");
            return false;
        }
    }

}
