<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        $this->load->view('head');
        $this->load->view('account');
        $this->load->view('foot');
    }
}
