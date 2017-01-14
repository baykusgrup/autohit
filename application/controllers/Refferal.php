<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refferal extends CI_Controller {

    public function index()
    {
        $this->load->view('_head');
        $this->load->view('refferal');
        $this->load->view('_foot');
    }
}
