<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Play extends CI_Controller {

    public function index($dg) {
        
        //Load db m files
        $data = array(
            'vplay' => $this->Crud->get_playing($dg),
            'dg' => $dg
        );
        $this->load->view('view_play', $data);
    }

}
