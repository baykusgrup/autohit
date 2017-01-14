<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('blocked');
        $this->load->view('_foot');
    }
}
