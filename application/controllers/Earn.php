<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earn extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('earn');
        $this->load->view('_foot');
    }
}
