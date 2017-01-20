<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            if ($_COOKIE['dil'] == "tr") {
                $dil = 1;
            } else if ($_COOKIE['dil'] == "en") {
                $dil = 2;
            } else {
                $dil = 2;
            }

            $data = array();
            $data["helps"] = $this->prtTable_model->getHelpsByLanguageID($dil);

            $this->load->view('_head');
            $this->load->view('help', $data);
            $this->load->view('_foot');
        }
    }
}
