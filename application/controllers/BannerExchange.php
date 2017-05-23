<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerExchange extends CI_Controller
{


    public function index()
    {
        if ($this->session->userdata('user_id') == NULL)
            redirect("index.php/Login");
        else {
            $user_id = $this->session->userdata("user_id");

            $this->load->helper(['language', 'lang', 'url']);
            dilSecici();

            $data = array();
            $data["userid"] = $user_id;
            $data["sites"] = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);
            $data["userWallet"] = $this->sites_model->getWalletByUserID($user_id);

            $data["todayTop250"] = $this->statics_model->getTop250DailyVisit();
            $data["weeklyTop250"] = $this->statics_model->getTop250WeeklyVisit();
            $data["monthlyTop250"] = $this->statics_model->getTop250MountlyVisit();

            $this->load->view('_head');
            $this->load->view('bannerexchange', $data);
            $this->load->view('_foot');
        }

    }

    public function addSite()
    {

        $dateTime = date('Y-m-d H:i:s');

        $dataSites = array();
        $dataSites["user_id"] = $this->session->userdata("user_id");
        $dataSites["url_title"] = $this->input->post("title");
        $dataSites["url"] = $this->input->post("url");
        $dataSites["url_img"] = $this->input->post("banner_img_url");
        $dataSites["visit_cost"] = "1";
        $dataSites["duration_sec_id"] = "15";

        $dataSites["record_status"] = 1;
        $dataSites["insert_date"] = $dateTime;
        $dataSites["insert_user"] = 0;
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = 0;

        $site_id = $this->generalTables_model->insertTables("websitesbanner", $dataSites);
        return $site_id;
    }

    public function updateSite()
    {
        $site_id = $this->input->post("site_id");
        $dateTime = date('Y-m-d H:i:s');

        $dataSites = array();
        $dataSites["url_title"] = $this->input->post("title");
        $dataSites["url"] = $this->input->post("url");
        $dataSites["url_img"] = $this->input->post("banner_img_url");
        $dataSites["visit_cost"] = "1";
        $dataSites["duration_sec_id"] = "15";

        $dataSites["record_status"] = $this->input->post("status");
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websitesbanner", $site_id, $dataSites);
        return $site_id;
    }

    public function deleteSite($site_id)
    {
        $user_id = $this->session->userdata("user_id");
        $this->db->where('websites_id', $site_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('websitesbanner');
        return true;
    }

    public function controllMySites()
    {
        $this->load->helper(['language', 'lang', 'url']);
        dilSecici();

        $user_id = $this->session->userdata("user_id");
        $return = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);
        $HTML = "";
        foreach ($return as $site) {
            $HTML .= "<tr>
                                                <td id='updateSite_siteID_" . $site["websites_id"] . "' >" . $site["websites_id"] . "</td>
                                                <td id='updateSite_title_" . $site["websites_id"] . "'>" . substr($site["url_title"], 0, 15) . "</td>
                                                <td id='updateSite_url_" . $site["websites_id"] . "'>" . substr(preg_replace('#^https?://#', '', rtrim($site["url"], '/')), 0, 20) . "</td>
                                                <td style='display:none' id='updateBanner_img_url_" . $site["websites_id"] . "'>" . $site["url_img"] . "</td>
                                                
                                                <td style='display: none' id='updateSite_status_" . $site["websites_id"] . "'>" . $site["record_status"] . "</td>
                                                
                                                <td>" . $site["TotalVisit"] . "</td>
                                                <td>" . $site["TodayVisit"] . "</td>
                                                <td><a name='sites_selector' site_id='" . $site["websites_id"] . "' onclick=\"setUpdateSite(" . $site["websites_id"] . ");\"  href=\"#modal_addSite\"  data-toggle=\"modal\" class=\"btn btn-outline green btn-sm purple\"><i class=\"fa fa-edit\"></i> " . lang("sites_edit") . " </a></td>
                                            </tr>";
        }
        echo $HTML;
    }

    public function Call($size, $userid)
    {
        $data = array();
        $data['userid'] = $userid;
        $data['size'] = $size;

        $this->load->view('bannercall', $data);
    }

    public function Show($userid)
    {
        $data = array();
        $data["userid"] = $userid;
        $data["visitsite"] = $this->sites_model->getBannerFromDatabaseNotBlockedAndNotMySites($userid);

        $this->GiveCreditToShower($userid);
        $this->TakeCreditFromShowed($data["visitsite"][0]["websites_id"]);
        $this->RecordShowed($data["visitsite"][0]["websites_id"]);
        $this->load->view('banner', $data);
    }

    public function GiveCreditToShower($userid)
    {
        // userid nin user_wallet > banner_credits +1


        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getWalletByUserID($userid);

        $wallet_id = $userWallet[0]["user_wallet_id"];


        $userWallet[0]["banner_credits"] = $userWallet[0]["banner_credits"] + 1;

        $dataSites = array();
        $dataSites["banner_credits"] = $userWallet[0]["banner_credits"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet", $wallet_id, $dataSites);

    }

    public function TakeCreditFromShowed($siteid)
    {
        //  TakeCreditFromShowed
        // websiteid nin websitesbanner> websiteid si eşleşen sitenin
        // websiteid  websitesbanner>showed +1
        // useridnin user_wallet > banner_credits -1

        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getBannersInfoBySiteID($siteid);

        $wallet_id = $userWallet[0]["user_wallet_id"];

        $userWallet[0]["banner_credits"] = $userWallet[0]["banner_credits"] - 1;

        $dataSites = array();
        $dataSites["banner_credits"] = $userWallet[0]["banner_credits"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $wallet_id = $this->generalTables_model->updateTable("user_wallet", $wallet_id, $dataSites);

        $site_id = $userWallet[0]["websites_id"];

        $userWallet[0]["showed"] = $userWallet[0]["showed"] + 1;

        $dataSites = array();
        $dataSites["showed"] = $userWallet[0]["showed"];

        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $this->session->userdata("user_id");

        $site_id = $this->generalTables_model->updateTable("websitesbanner", $site_id, $dataSites);

    }


    public function RecordShowed($siteid)
    {

        $dateTime = date('Y-m-d H:i:s');

        $userWallet = $this->sites_model->getBannersInfoBySiteID($siteid);

        $user_id = $userWallet[0]["user_id"];

        $userDetail = $this->sites_model->getMyBannerByUserIDAllWithVisits($user_id);


        $dataSites = array();
        $dataSites["user_id"] = $userWallet[0]["user_id"];
        $dataSites["website_id"] = $userDetail[0]["websites_id"];
        $dataSites["ip"] = $_SERVER["REMOTE_ADDR"];
        $dataSites["surf_date"] = $dateTime;
        $dataSites["record_status"] = "1";
        $dataSites["insert_date"] = $dateTime;
        $dataSites["insert_user"] = $user_id;
        $dataSites["update_date"] = $dateTime;
        $dataSites["update_user"] = $user_id;

        $wallet_id = $this->generalTables_model->insertTables("static_banner_info", $dataSites);

    }


    public function Go($user)
    {
        $data = array();
        $data["userid"] = $user;

        header("Location:https://bilgiotu.com");
    }
}
