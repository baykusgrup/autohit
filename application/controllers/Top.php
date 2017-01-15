<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Top extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('top');
        $this->load->view('_foot');
        }
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
