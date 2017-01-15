<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $user_id=$this->session->userdata("user_id");

        $data=array();
        $data["userInfo"] = $this->account_model->getUserAllInfoByUserID($user_id);

        $this->load->view('_head');
        $this->load->view('account',$data);
        $this->load->view('_foot');
    }
}
