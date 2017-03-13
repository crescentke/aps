<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Home extends CI_Controller {

    public function index() {

        if ($this->session->userdata('adsuser')) {
            $data = array(
                'displayg' => $this->Crud->get_table('displaygroup'),
                'videos' => $this->Crud->get_all('video')
            );
            $this->load->view('home', $data);
        } else {
            $this->load->view('welcome_page');
        }
    }
    
    public function viewgroup($id) {
        $data = array(
            'vdata' => $this->Crud->get_group_info($id),
            'videos' => $this->Crud->get_all('video'),
            'error' => "",
            'exstatus' => TRUE
        );


        $this->load->view('view_config', $data);
    }

    public function feeds() {

        if ($this->session->userdata('adsuser')) {
            $data = array(
                'displayg' => $this->Crud->get_table('displaygroup'),
                'videos' => $this->Crud->get_all('video')
            );
            $this->load->view('feed', $data);
        } else {
            $this->load->view('welcome_page');
        }
    }
    
    public function viewfeed($id) {
        $data = array(
            'vdata' => $this->Crud->get_group_info($id),
            'videos' => $this->Crud->get_all('video'),
            'error' => "",
            'exstatus' => TRUE
        );


        $this->load->view('view_feed', $data);
    }

}
