<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sites extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $user_id=$this->session->userdata("user_id");

            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data=array();
            $data["durations"]=$this->prtTable_model->getDurations();
            $data["sites"]=$this->sites_model->getMySitesByUserIDAllWithVisits($user_id);
            $data["userWallet"]=$this->sites_model->getWalletByUserID($user_id);

            $data["todayTop250"]= $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"]= $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"]= $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('sites',$data);
            $this->load->view('_foot');
        }

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

    public function updateSite()
    {
        $site_id = $this->input->post("siteID");
        $dateTime = date('Y-m-d H:i:s');

        $dataSites =array();
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

        $dataSites["record_status"] = $this->input->post("status");
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"]= $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websites",$site_id,$dataSites);
        return $site_id ;
    }

    public function deleteSite($site_id)
        {
            $user_id=$this->session->userdata("user_id");
            $this->db->where('websites_id', $site_id);
            $this->db->where('user_id', $user_id );
            $this->db->delete('websites');
            return true;
        }

    public function controllMySites()
    {
        $user_id = $this->session->userdata("user_id");
        $return = $this->sites_model->getMySitesByUserIDAllWithVisits($user_id);
        $HTML ="";
        foreach ($return as $site){
            $HTML .=  "<tr>
                                                <td id='updateSite_siteID_" . $site["websites_id"] . "' >" . $site["websites_id"] . "</td>
                                                <td id='updateSite_title_" . $site["websites_id"] . "'>" . substr($site["page_title"], 0, 15) . "</td>
                                                <td id='updateSite_url_" . $site["websites_id"] . "'>" . substr($site["url"], 0, 25) . "</td>
                                                <td style='display: none' id='updateSite_status_" . $site["websites_id"] . "'>" . $site["record_status"] . "</td>
                                                <td id='updateSite_credits_" . $site["websites_id"] . "'>" . $site["credits"] . "</td>
                                                <td style='display:none' id='updateSite_duration_" . $site["websites_id"] . "'>" . $site["duration_sec_id"] . "</td>
                                                <td>" . $site["TotalVisit"] . "</td>
                                                <td>" . $site["TodayVisit"] . "</td>
                                                <td><a name='sites_selector' site_id='" . $site["websites_id"] . "' onclick=\"setUpdateSite(" . $site["websites_id"] . ");\"  href=\"#modal_addSite\"  data-toggle=\"modal\" class=\"btn btn-outline green btn-sm purple\">
                                                       <i class=\"fa fa-edit\"></i> Edit </a></td>
                                            </tr>";
        }
        echo $HTML;
    }
}
