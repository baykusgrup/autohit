<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Earn extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $this->load->view('_head');
            $this->load->view('earn');
            $this->load->view('_foot');
        }
    }


    public function Surf()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $this->load->view('_head');
        $this->load->view('surf');
        $this->load->view('_foot');
    }

    public function getUrlsFromDatabase()
    {
        $result= $this->sites_model->getUrlsFromDatabase();
        $HTML = "";

        foreach ($result as $site){
            $HTML .= "<tr>
                        <td name='sites_selector'  visit_cost='".$site["visit_cost"]."'  credits='".$site["credits"]."'  durations='".$site["durations_sec"]."'  >".$site["url"]."</td>
                      </tr>";
        }

        echo $HTML;
    }
}
