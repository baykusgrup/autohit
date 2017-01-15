<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data = array();
            $data["helps"] = $this->prtTable_model->getHelps();

            $this->load->view('_head');
            $this->load->view('help', $data);
            $this->load->view('_foot');
        }
    }
}
