<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {

        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('top');
        $this->load->view('_foot');
    }

    public function Weekly()
    {

        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('top');
        $this->load->view('_foot');
    }


    public function Monthly()
    {

        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('top');
        $this->load->view('_foot');
    }
}
