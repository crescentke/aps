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
            'dgroup' => $this->Crud->get_where('displaygroup', 'DisplayGroupID', $id),
            'vdata' => $this->Crud->get_group_info($id),
            'videos' => $this->Crud->get_all('video'),
            'error' => "",
            'exstatus' => TRUE
        );


        $this->load->view('view_feed', $data);
    }

    function schedule_save() {
        $this->db->where('displayGroup', $this->input->post('site_code'));
        $this->db->where('mediaUrl', $this->input->post('media_url'));
        $play_time = $this->db->get('site_schedule');
        $play_times = $play_time->result();

        if (count($play_times) > 0) {
            $data = array(
                'playStart' => $this->input->post('play_start'),
                'playStop' => $this->input->post('play_stop')
            );

            $this->db->where('displayGroup', $this->input->post('site_code'));
            $this->db->where('mediaUrl', $this->input->post('media_url'));
            $this->db->update('site_schedule', $data);
        } else {
            $data = array(
                'displayGroup' => $this->input->post('site_code'),
                'mediaUrl' => $this->input->post('media_url'),
                'playStart' => $this->input->post('play_start'),
                'playStop' => $this->input->post('play_stop')
            );

            $this->db->insert('site_schedule', $data);
        }

        redirect("dg-feed/" . $this->input->post('site_code'));
    }

    public function sch() {

        $schedule_all = $this->Crud->get_table('site_schedule');

        $decoded_schedule = json_decode(json_encode($schedule_all), true);

        $this->array2xml($decoded_schedule);
    }

    function array2xml($array, $xml = false) {

        if ($xml === false) {
            $xml = new SimpleXMLElement('<sites/>');
        }

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $this->array2xml($value, $xml->addChild($key));
            } else {
                $xml->addChild($key, $value);
            }
        }

        echo '<pre>';
        print($xml->asXML());

        $data = $xml->asXML();
        if (!write_file('./apsfile/config.xml', $data)) {
            echo 'Unable to write the file';
        } else {
            echo 'File written!';
        }
    }

}
