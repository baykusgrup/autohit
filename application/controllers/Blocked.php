<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blocked extends CI_Controller {

    public function index()
    {

        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $user_id=$this->session->userdata('user_id');


            $data=array();
            $data["blocked"]=$this->sites_model->getMyBlockedSitesByUserID($user_id);

            $this->load->view('_head');
            $this->load->view('blocked',$data);
            $this->load->view('_foot');
        }
    }
    public function getActiveSite($site_id)
    {
        $dateTime = date('Y-m-d H:i:s');
        $dataSites=array();

        $dataSites["blocked"]=0;

        $dataSites["record_status"]=1;
        $dataSites["update_user"]=$this->session->userdata("user_id");
        $dataSites["update_date"]=$dateTime;

        $site_id = $this->generalTables_model->updateTable("websites",$site_id,$dataSites);
        return $site_id;

    }
    public function controllBlockedSites()
    {
        $user_id=$this->session->userdata('user_id');

        $return=$this->sites_model->getMyBlockedSitesByUserID($user_id);
        $HTML="";
        foreach ($return as $site){
            $HTML.= "<tr>
                                    <td> ".$site["websites_id"]."</td>
                                    <td>".$site["url"]."
                                    </td>
                                    <td width=\"82px\"><a  onclick=\"getActiveSite(".$site["websites_id"].")\" class=\"btn btn-outline green btn-sm purple\">
                                            <i class=\"fa fa-edit\"></i> Active </a></td>
                                </tr>";
        }
        echo $HTML;
    }
}
