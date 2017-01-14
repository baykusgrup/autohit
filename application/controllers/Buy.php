<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('buy');
        $this->load->view('_foot');
    }
}
