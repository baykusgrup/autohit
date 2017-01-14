<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('sites');
        $this->load->view('_foot');
    }
}
