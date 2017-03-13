<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model {

    function user_login($adsu_name, $adsu_pass) {
        $this->db->where('adsu_name', $adsu_name);
        $this->db->where('adsu_pass', md5($adsu_pass));
        $this->db->limit(1);
        $get_result = $this->db->get('ads_user');
        return $get_result->result();
    }

}
