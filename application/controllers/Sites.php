<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

    public function index()
    {
        $user_id=$this->session->userdata("user_id");
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $data=array();
        $data["durations"]=$this->prtTable_model->getDurations();
        $data["sites"]=$this->sites_model->getMySitesByUserID($user_id);

        $this->load->view('_head');
        $this->load->view('sites',$data);
        $this->load->view('_foot');
    }

    public function addSite()
    {

        $dateTime = date('Y-m-d H:i:s');

        $dataSites =array();
        $dataSites["user_id"] = $this->session->userdata("user_id");
        $dataSites["page_title"] = $this->input->post("title");
        $dataSites["url"] = $this->input->post("url");
        $dataSites["credits"] = $this->input->post("credits");
        $dataSites["visit_cost"] = $this->input->post("visits_cost");
        $dataSites["duration_sec_id"] = $this->input->post("duration_id");

        /*daha sonra doldurulabilir
        $dataSites["unique_ip"] = $this->input->post();
        $dataSites["hide_referer"] = $this->input->post();
        $dataSites["random_referer"] = $this->input->post();
        */

        $dataSites["record_status"] = 1;
        $dataSites["insert_date"] = $dateTime;
        $dataSites["insert_user"] =0;
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"]= 0;

        $site_id = $this->generalTables_model->insertTables("websites",$dataSites);
        return $site_id ;
    }

    public function controllMySites()
    {
        $user_id = $this->session->userdata("user_id");
        $return = $this->sites_model->getMySitesByUserID($user_id);
        $HTML ="";
        foreach ($return as $site){
            $HTML .= "<tr>
                                                <td>" . substr($site["page_title"], 0, 15) . "</td>
                                                <td>" . substr($site["url"], 0, 25) . "</td>
                                                <td>" . $site["credits"] . "</td>
                                                <td>sss</td>
                                                <td><a href=\"javascript:;\" class=\"btn btn-outline green btn-sm purple\">
                                                                                    <i class=\"fa fa-edit\"></i> Edit </a></td>
                                            </tr>";
        }
        echo $HTML;
    }
}
