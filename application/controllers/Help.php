<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('help');
        $this->load->view('_foot');
    }
}
