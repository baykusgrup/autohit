<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('statistics');
        $this->load->view('_foot');
    }
}
